@extends('master')
@section('title', 'Edit Data Absensi')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 style="color: var(--app-text);"><b>Edit Data Absensi</b></h2>
                </div>
                <div class="panel-body">
                    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="karyawan_id" class="form-label">Nama Pegawai</label>
                            <select class="form-select" name="karyawan_id" id="karyawan_id" required>
                                <option value="">-- Pilih Pegawai --</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}" 
                                        {{ old('karyawan_id', $attendance->karyawan_id) == $employee->id ? 'selected' : '' }}>
                                        {{ $employee->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_masuk" class="form-label">Waktu Masuk Kerja</label>
                            <input type="time" class="form-control" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="waktu_keluar" class="form-label">Waktu Pulang Kerja</label>
                            <input type="time" class="form-control" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}">
                        </div>
                        <div class="mb-3">
                            <label for="status_absensi" class="form-label">Status Absensi</label>
                            <select class="form-select" name="status_absensi" required>
                                <option value="hadir" {{ old('status_absensi', $attendance->status_absensi) == 'hadir' ? 'selected' : '' }}>Hadir</option>
                                <option value="izin" {{ old('status_absensi', $attendance->status_absensi) == 'izin' ? 'selected' : '' }}>Izin</option>
                                <option value="sakit" {{ old('status_absensi', $attendance->status_absensi) == 'sakit' ? 'selected' : '' }}>Sakit</option>
                                <option value="alpha" {{ old('status_absensi', $attendance->status_absensi) == 'alpha' ? 'selected' : '' }}>Alpha</option>
                            </select>
                        </div>
                        <a href="{{ route('attendance.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn text-white float-end" style="background-color: var(--app-purple);">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
