@extends('master')
@section('title', 'Input Jabatan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Input Jabatan</b></h2>
                </div>
                
                <form action="{{ route('positions.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3"> {{-- Menggunakan mb-3 --}}
                        <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" value="{{ old('nama_jabatan') }}" required>
                        @error('nama_jabatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok" class="form-control" value="{{ old('gaji_pokok') }}" required>
                        @error('gaji_pokok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
                    {{-- Tombol Simpan disamakan --}}
                    <button type="submit" class="btn float-end text-white" style="background-color: var(--app-purple);">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection