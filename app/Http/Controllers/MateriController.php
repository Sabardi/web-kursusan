<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materi = Materi::with('kursus')->get();
        $kursus = Kursus::with('materi')->get();
        return view('admin.materi.index', compact('materi', 'kursus'));
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
        $request->validate([
            'kursus_id' => 'required|integer',
            'judul' => 'required',
            'deskripsi' => 'required',
            'embed_link' => 'required',
        ]);

        Materi::create($request->all());
        return redirect()->route('materi.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kursus = Materi::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materi $id)
    {
        //
        $materi = Materi::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materi $id)
    {
        $request->validate([
            'kursus_id' => 'required|integer',
            'judul' => 'required',
            'deskripsi' => 'required',
            'embed_link' => 'required',
        ]);

        // $kursus = Kursus::find($id);
        $id->update($request->all());
        return redirect()->route('materi.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materi $id)
    {
        $id->delete();
        return redirect()->route('materi.index')->with('success', 'Data berhasil disimpan.');
    }
}
