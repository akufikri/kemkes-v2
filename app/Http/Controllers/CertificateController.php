<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Certificate;
use App\Traits\ApiResponder;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use PDF;

class CertificateController extends Controller
{
    use ApiResponder;

    public function getView()
    {
        return view('admin.certificate');
    }

    /**
     * Display a listing of certificates
     */
    public function index(): JsonResponse
    {
        $certificates = Certificate::with('biodata')
            ->latest()
            ->get();
        return $this->success($certificates, 'Certificates retrieved successfully', 200);
    }

    /**
     * Store a newly created certificate
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'id_biodata' => 'required|integer|exists:biodatas,id',
                'vaccine_name' => 'nullable|string|max:255',
                'start_date' => 'required|date',
                'docter' => 'nullable|string|max:255',
                'batch_number' => 'nullable|string|max:255',
                'expired_date' => 'nullable|date',
                'next_booster' => 'nullable|date',
                'dease_target' => 'nullable|string'
            ]);

            $certificate = Certificate::create($validatedData);
            $certificate->load('biodata');

            return $this->success($certificate, 'Certificate created successfully', 201);
        } catch (ValidationException $e) {
            return $this->error('Validation failed', $e->errors(), 422);
        }
    }

    /**
     * Display the specified certificate
     */
    public function show(Certificate $certificate): JsonResponse
    {
        $certificate->load('biodata');
        return $this->success($certificate, 'Certificate retrieved successfully', 200);
    }

    /**
     * Update the specified certificate
     */
    public function update(Request $request, Certificate $certificate): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'id_biodata' => 'sometimes|required|integer|exists:biodatas,id',
                'vaccine_name' => 'nullable|string|max:255',
                'start_date' => 'sometimes|required|date',
                'docter' => 'nullable|string|max:255',
                'batch_number' => 'nullable|string|max:255',
                'expired_date' => 'sometimes|date',
                'next_booster' => 'nullable|date',
                'dease_target' => 'nullable|string'
            ]);

            $certificate->update($validatedData);
            $certificate->load('biodata');

            return $this->success($certificate, 'Certificate updated successfully', 200);
        } catch (ValidationException $e) {
            return $this->error('Validation failed', $e->errors(), 422);
        }
    }

    /**
     * Remove the specified certificate
     */
    public function destroy(Certificate $certificate): JsonResponse
    {
        $certificate->delete();

        return $this->success(null, 'Certificate deleted successfully', 200);
    }
    /**
     * Show certificate user
     */
    public function getCertificate()
    {
        try {
            $no_document = request()->input('no_document');
            $type_document = request()->input('type_document');

            // Load data tanpa ordering khusus di relationship
            $data = Biodata::with(['certificate', 'typeDocument'])
                ->where('no_document', $no_document)
                ->first();

            if (!$data) {
                return $this->error("Certificate not found", null, 404);
            }

            if ($type_document && $data->typeDocument && $data->typeDocument->name !== $type_document) {
                return $this->error("Certificate not found for this document type", null, 404);
            }

            $data->url_qr_code = env('APP_URL') . "/index.php/welcome/check_document?t=" . $data->no_document;
            $data->date_of_birth = DateHelper::formatDate($data->date_of_birth);

            if ($data->certificate) {
                // Custom sorting: MENINGITIS first, then by created_at desc
                $data->certificate = $data->certificate->sort(function ($a, $b) {
                    $aHasMeningitis = stripos($a->vaccine_name, 'MENINGITIS') !== false;
                    $bHasMeningitis = stripos($b->vaccine_name, 'MENINGITIS') !== false;

                    // If one has MENINGITIS and other doesn't
                    if ($aHasMeningitis && !$bHasMeningitis) return -1;
                    if (!$aHasMeningitis && $bHasMeningitis) return 1;

                    // If both have or both don't have MENINGITIS, sort by created_at desc
                    return $b->created_at <=> $a->created_at;
                })->values(); // Reset array keys

                foreach ($data->certificate as $certificate) {
                    $certificate->start_date = DateHelper::formatDate($certificate->start_date);
                    $certificate->expired_date = DateHelper::formatDate($certificate->expired_date);
                    $certificate->next_booster = DateHelper::formatDate($certificate->next_booster);
                    $certificate->facility = $data->facility;
                    $certificate->date = DateHelper::formatDate(($certificate->created_at));
                }
            }

            return $this->success($data, "Successfully get certificate", 200);
        } catch (\Exception $e) {
            return $this->error("Failed fetch certificate", $e->getMessage(), 500);
        }
    }

    /**
     * Download result pdf
     */
    public function downloadPdf($no_document)
    {
        try {
            $query = Biodata::with(['certificate' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }, 'typeDocument'])->where('no_document', $no_document);

            $biodata = $query->first();

            if (!$biodata) {
                return response()->json([
                    'success' => false,
                    'message' => 'Certificate not found'
                ], 404);
            }

            $biodata->date_of_birth = DateHelper::formatDate($biodata->date_of_birth);

            $certificates = [];
            if ($biodata->certificate) {
                // Custom sorting: MENINGITIS first, then by created_at desc
                $sortedCertificates = $biodata->certificate->sort(function ($a, $b) {
                    $aHasMeningitis = stripos($a->vaccine_name, 'MENINGITIS') !== false;
                    $bHasMeningitis = stripos($b->vaccine_name, 'MENINGITIS') !== false;

                    if ($aHasMeningitis && !$bHasMeningitis) return -1;
                    if (!$aHasMeningitis && $bHasMeningitis) return 1;

                    return $b->created_at <=> $a->created_at;
                })->values(); // Reset array keys

                foreach ($sortedCertificates as $certificate) {
                    $certificate->start_date = DateHelper::formatDate($certificate->start_date);
                    $certificate->expired_date = DateHelper::formatDate($certificate->expired_date);
                    $certificate->next_booster = DateHelper::formatDate($certificate->next_booster);
                    $certificate->facility = $biodata->facility;
                    $certificate->date = DateHelper::formatDate($certificate->created_at);
                    $certificates[] = $certificate;
                }
            }

            $qrUrl = env('APP_URL') . "/welcome/check_document?t=" . $biodata->no_document;
            $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&margin=9&data=" . urlencode($qrUrl);

            $pdf = PDF::loadView('pdf.certificate', [
                'biodata' => $biodata,
                'certificates' => $certificates,
                'qrCodeUrl' => $qrCodeUrl
            ]);
            $pdf->setPaper('A4', 'portrait');

            $filename = ucwords($biodata->patient_name) . '.pdf';

            return $pdf->download($filename);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to download PDF: ' . $e->getMessage()
            ], 500);
        }
    }


    public function checkNoDocument($params)
    {
        $data = Biodata::where('no_document', $params)->first();
        if ($data) {
            return response()->json([
                'data' => 1
            ], 200);
        } else {
            return response()->json([
                'data' => 0
            ]);
        }
    }
}
