<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Traits\ApiResponder;
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
}
