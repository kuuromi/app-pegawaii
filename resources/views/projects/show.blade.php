@extends('master')
@section('title', 'Detail Proyek')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Detail Proyek</b></h2>
                </div>
                
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 30%;">ID</th>
                        <td>{{ $project->id }}</td>
                    </tr>
                    <tr>
                        <th style="width: 30%;">Nama Proyek</th>
                        <td>{{ $project->nama_proyek }}</td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $project->departemen->nama_departemen ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>{{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Target Selesai</th>
                        <td>{{ $project->tanggal_selesai ? \Carbon\Carbon::parse($project->tanggal_selesai)->format('d F Y') : 'Belum Ditetapkan' }}</td>
                    </tr>
                    <tr class="{{ $project->status == 'aktif' ? 'table-success' : ($project->status == 'selesai' ? 'table-primary' : 'table-danger') }}">
                        <th>Status</th>
                        <td><strong>{{ ucfirst($project->status) }}</strong></td>
                    </tr>
                </table>
                <a href="{{ route('projects.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection