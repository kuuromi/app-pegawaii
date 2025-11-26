@extends('master')
@section('title', 'Input Proyek')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Input Data Proyek</b></h2>
                </div>
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="nama_proyek" class="form-label">Nama Proyek</label>
                        <input type="text" name="nama_proyek" id="nama_proyek" class="form-control" value="{{ old('nama_proyek') }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="departemen_id" class="form-label">Departemen Penanggung Jawab</label>
                        <select name="departemen_id" id="departemen_id" class="form-select" required>
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($departemen as $item) 
                                <option value="{{ $item->id }}" {{ old('departemen_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_departemen }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', date('Y-m-d')) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Target Selesai (Opsional)</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}">
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Proyek</label>
                        <select name="status" id="status" class="form-select" required>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="ditunda" {{ old('status') == 'ditunda' ? 'selected' : '' }}>Ditunda</option>
                        </select>
                    </div>
                    
                    <a href="{{ route('projects.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn float-end text-white" style="background-color: var(--app-purple);">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection