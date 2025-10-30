@extends('master')
@section('title', 'Input Data Absensi')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 style="color: var(--app-text);"><b>Input Data Absensi</b></h2>
                </div>
                
                <form action="{{ route('attendance.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="karyawan_id" class="form-label">ID Pegawai:</label>
                        <input type="number" class="form-control" id="karyawan_id" name="karyawan_id" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_masuk" class="form-label">Waktu Masuk Kerja:</label>
                        <input type="time" class="form-control" id="waktu_masuk" name="waktu_masuk" required>
                    </div>
                    <div class="mb-3">
                        <label for="waktu_keluar" class="form-label">Waktu Pulang Kerja:</label>
                        <input type="time" class="form-control" id="waktu_keluar" name="waktu_keluar">
                    </div>
                    <div class="mb-3">
                        <label for="status_absensi" class="form-label">Status Absensi:</label>
                        <select class="form-select" id="status_absensi" name="status_absensi" required>
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpha">Alpha</option>
                        </select>
                    </div>
                    <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn text-white float-end" style="background-color: var(--app-purple);">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
