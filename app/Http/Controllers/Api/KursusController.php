<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    //
    public function index()
    {
        $kursus = Kursus::with('materi')->get();
        return response()->json(
            [
                'message' => 'Data berhasil ditampilkan',
                'data' => $kursus
            ],
            200
        );
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
                'judul' => 'required',
                'deskripsi' => 'required',
                'durasi' => 'required',
            ]);

            $kursus = Kursus::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => $kursus,
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
        $kursus = Kursus::find($id);
        if ($kursus) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil ditemukan',
                'data' => $kursus,
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
    public function edit(Kursus $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required',
        ]);

        $kursus = Kursus::find($id);
        if (is_null($kursus)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $kursus->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui',
            'data' => $kursus,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kursus = Kursus::find($id);
        if (is_null($kursus)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $kursus->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus'
        ], 204);
    }
}
