@extends('master')
@section('title', 'Edit Jabatan')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Edit Jabatan</b></h2>
                </div>

                <form action="{{ route('positions.update', $position->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama_jabatan" class="form-label">Nama Jabatan</label>
                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" 
                            value="{{ old('nama_jabatan', $position->nama_jabatan) }}" required>
                        @error('nama_jabatan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                        <input type="number" step="0.01" name="gaji_pokok" id="gaji_pokok" class="form-control" 
                            value="{{ old('gaji_pokok', $position->gaji_pokok) }}" required>
                        @error('gaji_pokok')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description', $position->description) }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <a href="{{ route('positions.index') }}" class="btn btn-secondary">Batal</a>
                    {{-- Tombol Update disamakan --}}
                    <button type="submit" class="btn float-end text-white" style="background-color: var(--app-purple);">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection