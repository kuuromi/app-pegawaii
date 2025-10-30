<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    public function index()
    {
        $positions = Position::latest()->paginate(10);
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        return view('positions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan', 
            'gaji_pokok'   => 'required|numeric|min:0',
            'description'  => 'required|string',
        ]);
        
        Position::create($validated); 

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.show', compact('position'));
    }

    public function edit(string $id)
    {
        $position = Position::findOrFail($id);
        return view('positions.edit', compact('position'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_jabatan' => 'required|string|max:100|unique:positions,nama_jabatan,'.$id, 
            'gaji_pokok'   => 'required|numeric|min:0',
            'description'  => 'required|string',
        ]);        
        
        $position = Position::findOrFail($id);
        
        $position->update($validated); 

        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil diperbarui.');
    }

    public function destroy(string $id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        
        return redirect()->route('positions.index')->with('success', 'Jabatan berhasil dihapus.');
    }
}