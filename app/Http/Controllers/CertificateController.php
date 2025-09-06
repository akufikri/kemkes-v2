<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\Certificate;
use App\Traits\ApiResponder;
use App\Helpers\DateHelper;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CertificateController extends Controller
{
    use ApiResponder;

    public function getView() {
        return view('admin.certificate');
    }

    /**
     * Display a listing of certificates
     */
    public function index(): JsonResponse
    {
        $certificates = Certificate::with('biodata')->get();
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
                'expired_date' => 'required|date',
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
                'expired_date' => 'sometimes|required|date',
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
            
            $query = Biodata::with(['certificate' => function($query) {
                $query->orderBy('created_at', 'desc');
            }, 'typeDocument'])->where('no_document', $no_document);
            
            if ($type_document) {
                $query->whereHas('typeDocument', function($q) use ($type_document) {
                    $q->where('name', $type_document);
                });
            }
            
            $data = $query->first();

            if (!$data) {
                return $this->error("Certificate not found", null, 404);
            }

            $data->url_qr_code = env('APP_URL') . "/index.php/welcome/check_document?t=" . $data->no_document;
            $data->date_of_birth = DateHelper::formatDate($data->date_of_birth);
            
            if ($data->certificate) {
                foreach ($data->certificate as $certificate) {
                    $certificate->start_date = DateHelper::formatDate($certificate->start_date);
                    $certificate->expired_date = DateHelper::formatDate($certificate->expired_date);
                    $certificate->next_booster = DateHelper::formatDate($certificate->next_booster);
                    $certificate->facility = $data->facility;
                }
            }

            return $this->success($data, "Successfully get certificate", 200);
        } catch (\Exception $e) {
            return $this->error("Failed fetch certificate", $e->getMessage(), 500);
        }
    }
    
}
