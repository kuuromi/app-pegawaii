<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    public function index()
    {
        $departemen = \App\Models\Departemen::orderBy('id', 'desc')->paginate(5);
        return view('departemen.index', compact('departemen'));
    }

    public function create()
    {
        return view('departemen.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_departemen' => 'required|string|max:255',
        ]);

        \App\Models\Departemen::create([
            'nama_departemen' => $validated['nama_departemen'],
        ]);

        return redirect()->route('departemen.index')->with('success', 'Departemen berhasil ditambahkan.');
    }


    public function show($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('departemen.show', compact('departemen'));
    }

    public function edit($id)
    {
        $departemen = Departemen::findOrFail($id);
        return view('departemen.edit', compact('departemen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_departemen' => 'required|string|max:100',
        ]);

        $departemen = Departemen::findOrFail($id);
        $departemen->update([
            'nama_departemen' => $request->nama_departemen,
        ]);

        return redirect()->route('departemen.index')->with('success', 'Department berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $departemen = Departemen::findOrFail($id);
        $departemen->delete();

        return redirect()->route('departemen.index')->with('success', 'Department berhasil dihapus.');
    }
}
