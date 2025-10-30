@extends('master')
@section('title', 'Detail Gaji Pegawai')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Detail Gaji</b></h2>
                </div>
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 30%;">ID Gaji</th>
                        <td>{{ $salary->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Karyawan</th>
                        <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Bulan</th>
                        <td>{{ $salary->bulan }}</td>
                    </tr>
                    <tr>
                        <th>Gaji Pokok</th>
                        <td>Rp {{ number_format($salary->gaji_pokok, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Tunjangan</th>
                        <td>Rp {{ number_format($salary->tunjangan, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Potongan</th>
                        <td>Rp {{ number_format($salary->potongan, 2, ',', '.') }}</td>
                    </tr>
                    <tr class="table-info"> {{-- Mengubah kelas B3 'info' ke B5 'table-info' --}}
                        <th>Total Gaji</th>
                        <td><strong>Rp {{ number_format($salary->total_gaji, 2, ',', '.') }}</strong></td>
                    </tr>
                </table>
                
                <a href="{{ route('salaries.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
