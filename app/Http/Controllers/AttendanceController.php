<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendance = Attendance::latest()->paginate(10);
        return view('attendance.index', compact('attendance'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::orderBy('nama_lengkap')->get();
        return view('attendance.create', compact('employees'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id'    => 'required|exists:employees,id',
            'tanggal'        => 'required',
            'waktu_masuk'    => 'required',
            'waktu_keluar'   => 'nullable',
            'status_absensi' => 'required|in:hadir,izin,sakit,alpha',
        ]);

        Attendance::create($validated);

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil disimpan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = Employee::orderBy('nama_lengkap')->get();
        
        return view('attendance.edit', compact('attendance', 'employees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'karyawan_id'       => 'required|exists:employees,id', 
            'tanggal'           => 'required',
            'waktu_masuk'       => 'required',
            'waktu_keluar'      => 'nullable', 
            'status_absensi'    => 'required|in:hadir,izin,sakit,alpha',
        ]);


        $attendance = Attendance::findOrFail($id);
        $attendance->update($validated); 

        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $attendance = Attendance::findOrFail($id);
        
        $attendance->delete();
        
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil dihapus.');
    }
}