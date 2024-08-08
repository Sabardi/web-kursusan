<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kursus = Kursus::with('materi')->get();
        return view('admin.kursus.index', compact('kursus'));
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required',
        ]);

        Kursus::create($request->all());
        return redirect()->route('kursus.index')->with('success', 'Data  berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kursus = Kursus::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kursus $id)
    {
        //
        $kursus = Kursus::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kursus $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'durasi' => 'required',
        ]);

        // $kursus = Kursus::find($id);
        $id->update($request->all());
        return redirect()->route('kursus.index')->with('success', 'Data  berhasil disimpan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kursus $id)
    {
        $id->delete();
        return redirect()->route('kursus.index')->with('success', 'Data  berhasil disimpan.');
    }
}
