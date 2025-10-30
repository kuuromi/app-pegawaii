<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
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
        return view('attendance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'karyawan_id'       => 'required|integer',
            'tanggal'           => 'required|date',
            'waktu_masuk'       => 'required|date_format:H:i',
            // Waktu keluar dijadikan nullable, karena karyawan mungkin belum pulang saat check-in
            'waktu_keluar'      => 'nullable|date_format:H:i', 
            'status_absensi'    => 'required|in:hadir,izin,sakit,alpha',
        ]);
        
        // Menggunakan data yang sudah divalidasi untuk membuat record baru (lebih aman)
        Attendance::create($validated);
        
        return redirect()->route('attendance.index')->with('success', 'Data absensi berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $attendance = Attendance::findOrFail($id); // Menggunakan findOrFail untuk penanganan 404 yang lebih baik
        return view('attendance.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $attendance = Attendance::findOrFail($id); // Menggunakan findOrFail
        return view('attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'karyawan_id'       => 'required|integer',
            'tanggal'           => 'required|date',
            'waktu_masuk'       => 'required|date_format:H:i',
            // Waktu keluar harus tetap nullable saat update
            'waktu_keluar'      => 'nullable|date_format:H:i', 
            'status_absensi'    => 'required|in:hadir,izin,sakit,alpha',
        ]);

        $attendance = Attendance::findOrFail($id);

        // Menggunakan Mass Assignment dengan data yang sudah divalidasi
        // Ini lebih bersih dan aman daripada mengupdate secara manual atau menggunakan $request->all()
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