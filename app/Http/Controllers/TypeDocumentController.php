<?php

namespace App\Http\Controllers;

use App\Models\TypeDocument;
use App\Traits\ApiResponder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TypeDocumentController extends Controller
{
    use ApiResponder;

    public function index(): JsonResponse
    {
        try {
            $typeDocuments = TypeDocument::orderBy('id', 'desc')->get();
            return $this->success($typeDocuments, 'Type documents retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve type documents', null, 500);
        }
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_documents,name'
        ]);

        try {
            $typeDocument = TypeDocument::create([
                'name' => $request->name
            ]);
            return $this->success($typeDocument, 'Type document created successfully', 201);
        } catch (\Exception $e) {
            return $this->error('Failed to create type document', null, 500);
        }
    }

    public function show($id): JsonResponse
    {
        try {
            $typeDocument = TypeDocument::findOrFail($id);
            return $this->success($typeDocument, 'Type document retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Type document not found', null, 404);
        }
    }

    public function update(Request $request, $id): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:type_documents,name,' . $id
        ]);

        try {
            $typeDocument = TypeDocument::findOrFail($id);
            $typeDocument->update([
                'name' => $request->name
            ]);
            return $this->success($typeDocument, 'Type document updated successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to update type document', null, 500);
        }
    }

    public function destroy($id): JsonResponse
    {
        try {
            $typeDocument = TypeDocument::findOrFail($id);
            $typeDocument->delete();
            return $this->success(null, 'Type document deleted successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to delete type document', null, 500);
        }
    }

    public function getView()
    {
        return view('admin.type_document');
    }
}
