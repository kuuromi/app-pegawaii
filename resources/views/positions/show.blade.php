@extends('master')
@section('title', 'Detail Jabatan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Detail Jabatan</b></h2>
                </div>
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 30%;">ID</th>
                        <td>{{ $position->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama Jabatan</th>
                        <td>{{ $position->nama_jabatan }}</td> 
                    </tr>
                    <tr>
                        <th style="width: 30%;">Gaji Pokok</th>
                        <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                    </tr>
                    <!-- <tr>
                        <th style="width: 30%;">Deskripsi</th>
                        <td>{{ $position->description }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Dibuat Pada</th>
                        <td>{{ $position->created_at ? $position->created_at->format('d M Y H:i:s') : '-' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Diperbarui Pada</th>
                        <td>{{ $position->updated_at ? $position->updated_at->format('d M Y H:i:s') : '-' }}</td>
                    </tr> -->
                </table>
                <a href="{{ route('positions.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection