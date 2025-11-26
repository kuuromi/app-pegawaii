<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Departemen;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(5);

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemen = Departemen::all();
        $positions = Position::all();
        
        return view('employees.create', compact('departemen', 'positions')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'status' => strtolower(trim($request->input('status')))
        ]);

        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat'        => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status'        => 'required|in:aktif,tidak aktif',
            'departemen_id' => 'required|exists:departemen,id', 
            'positions_id'  => 'required|exists:positions,id',
        ]);

        Employee::create($validated);
        
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $departemen = Departemen::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departemen', 'positions'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Di EmployeeController.php

public function update(Request $request, string $id)
{
    $request->merge([
        'status' => strtolower(trim($request->input('status')))
    ]);

    $validated = $request->validate([
        'nama_lengkap'  => 'required|string|max:255',
        'email'         => 'required|email|max:255',
        'nomor_telepon' => 'required|string|max:20',
        'tanggal_lahir' => 'required|date',
        'alamat'        => 'required|string|max:255',
        'tanggal_masuk' => 'required|date',
        'status'        => 'required|in:aktif,tidak aktif',
        'departemen_id' => 'required|exists:departemen,id', 
        'positions_id'  => 'required|exists:positions,id',
    ]);
    
    $employee = Employee::findOrFail($id);
    $employee->update($validated);

    return redirect()->route('employees.index')->with('success', 'Data pegawai berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
