<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    //
    public function index()
    {
        $materi = Materi::with('kursus')->get();
        if ($materi->isEmpty()) {
            return response()->json([
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data berhasil ditampilkan',
            'data' => $materi
        ], 200);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kursus_id' => 'required|integer',
                'judul' => 'required',
                'deskripsi' => 'required',
                'embed_link' => 'required',
            ]);

            $materi = Materi::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => $materi,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $materi = Materi::find($id);
        if ($materi) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditemukan',
                'data' => $materi,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'orders_id' => 'sometimes|integer',
            'status' => 'sometimes|in:PENDING,PAID',
            'type' => 'sometimes|in:PAYPAL,TRANSFER,VA,CC',
        ]);

        $materi = Materi::find($id);
        if (is_null($materi)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $materi->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui',
            'data' => $materi,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $materi = Materi::find($id);
        if (is_null($materi)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $materi->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ], 204);
    }
}
