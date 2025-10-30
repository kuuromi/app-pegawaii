@extends('master')
@section('title', 'Detail Pegawai')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Detail Pegawai</b></h2>
                </div>
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 30%;">ID</th>
                        <td>{{ $employee->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama Lengkap</th>
                        <td>{{ $employee->nama_lengkap }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td>{{ $employee->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Lahir</th>
                        <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $employee->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Masuk</th>
                        <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</td>
                    </tr>
                    <tr class="{{ $employee->status == 'aktif' ? 'table-success' : 'table-danger' }}">
                        <th>Status</th>
                        <td><strong>{{ ucfirst($employee->status) }}</strong></td>
                    </tr>
                </table>
                <a href="{{ route('employees.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
