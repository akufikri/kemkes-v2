<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BiodataController extends Controller
{
    use ApiResponder;

    public function getView()
    {
        return view('admin.biodata');
    }

    public function index()
    {
        try {
            $is_compress = request()->boolean('is_compress', false);

            $query = Biodata::with('typeDocument')->latest();

            if ($is_compress) {
                $search  = request()->input('search');
                $perPage = request()->input('per_page', 10);

                $query->select('id', 'patient_name', 'no_document');

                if ($search) {
                    $query->where(function ($q) use ($search) {
                        $q->where('patient_name', 'like', "%{$search}%")
                            ->orWhere('no_document', 'like', "%{$search}%");
                    });
                }

                $biodatas = $query->paginate($perPage);

                return response()->json([
                    'success' => true,
                    'message' => 'Data biodata berhasil diambil',
                    'data' => $biodatas->items(),
                    'pagination' => [
                        'more' => $biodatas->hasMorePages()
                    ]
                ], 200);
            } else {
                $biodatas = $query->get();
                return $this->success($biodatas, 'Data biodata berhasil diambil', 200);
            }
        } catch (\Exception $e) {
            return $this->error('Gagal mengambil data biodata', null, 500);
        }
    }


    public function store(Request $request)
    {
        try {
            $request->validate([
                'no_document' => 'required|string|max:255',
                'patient_name' => 'required|string|max:255',
                'sex' => 'required|in:MALE,FEMALE',
                'date_of_birth' => 'required|date',
                'nationality' => 'required|string|max:255',
                'nationality_doc' => 'required|string|max:255',
                'disease' => 'required|string',
                'facility' => 'required|string|max:255',
                'id_type_document' => 'required|exists:type_documents,id',
            ]);

            $biodata = Biodata::create([
                'slug' => Str::slug($request->patient_name . '-' . time()),
                'no_document' => $request->no_document,
                'patient_name' => $request->patient_name,
                'sex' => $request->sex,
                'date_of_birth' => $request->date_of_birth,
                'nationality' => $request->nationality,
                'nationality_doc' => $request->nationality_doc,
                'disease' => $request->disease,
                'facility' => $request->facility,
                'id_type_document' => $request->id_type_document,
                'status' => true
            ]);

            $biodata->load('typeDocument');
            return $this->success($biodata, 'Data biodata berhasil ditambahkan', 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->error('Validasi gagal', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->error('Gagal menambahkan data biodata', null, 500);
        }
    }

    public function show($id)
    {
        try {
            $biodata = Biodata::with('typeDocument')->findOrFail($id);
            return $this->success($biodata, 'Data biodata berhasil diambil', 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->error('Data biodata tidak ditemukan', null, 404);
        } catch (\Exception $e) {
            return $this->error('Gagal mengambil data biodata', null, 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $biodata = Biodata::findOrFail($id);

            $request->validate([
                'no_document' => 'sometimes|required|string|max:255',
                'patient_name' => 'sometimes|required|string|max:255',
                'sex' => 'sometimes|required|in:MALE,FEMALE',
                'date_of_birth' => 'sometimes|required|date',
                'nationality' => 'sometimes|required|string|max:255',
                'nationality_doc' => 'sometimes|required|string|max:255',
                'disease' => 'sometimes|required|string',
                'facility' => 'sometimes|required|string|max:255',
                'id_type_document' => 'sometimes|required|exists:type_documents,id',
            ]);

            $updateData = $request->only([
                'no_document',
                'patient_name',
                'sex',
                'date_of_birth',
                'nationality',
                'nationality_doc',
                'disease',
                'facility',
                'id_type_document'
            ]);

            if ($request->has('patient_name')) {
                $updateData['slug'] = Str::slug($request->patient_name . '-' . time());
            }

            $biodata->update($updateData);
            $biodata->load('typeDocument');

            return $this->success($biodata, 'Data biodata berhasil diperbarui', 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->error('Data biodata tidak ditemukan', null, 404);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return $this->error('Validasi gagal', $e->errors(), 422);
        } catch (\Exception $e) {
            return $this->error('Gagal memperbarui data biodata', null, 500);
        }
    }

    public function destroy($id)
    {
        try {
            $biodata = Biodata::findOrFail($id);
            $biodata->delete();

            return $this->success(null, 'Data biodata berhasil dihapus', 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return $this->error('Data biodata tidak ditemukan', null, 404);
        } catch (\Exception $e) {
            return $this->error('Gagal menghapus data biodata', null, 500);
        }
    }

    // public function getBiodata($no_document)
    // {
    //     try {
    //         $data = Biodata::where('no_document', $no_document)
    //         ->with('certificate')
    //         ->first();

    //         return $this->success($data, "Sukses mendapatkan data biodata", 200);
    //     } catch (\Exception $e){
    //         return $this->error("Gagal memuat data, tunggu beberapa saat", 500);
    //     }
    // }
}
