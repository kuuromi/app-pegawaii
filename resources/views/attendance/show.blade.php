@extends('master')

@section('title', 'Detail Absensi')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 style="color: var(--app-text);"><b>Detail Absensi</b></h2>
                </div>
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 40%;">ID Pegawai</th>
                        <td>{{ $attendance->karyawan_id }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ $attendance->tanggal }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Masuk Kerja</th>
                        <td>{{ $attendance->waktu_masuk }}</td>
                    </tr>
                    <tr>
                        <th>Waktu Pulang Kerja</th>
                        <td>{{ $attendance->waktu_keluar ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status Absensi</th>
                        <td><strong>{{ ucfirst($attendance->status_absensi) }}</strong></td>
                    </tr>
                </table>
                
                <a href="{{ route('attendance.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
