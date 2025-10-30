@extends('master')
@section('title', 'Input Departemen')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Input Data Departemen</b></h2>
                </div>
                
                <form action="{{ route('departemen.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nama_departemen">Nama Departemen</label>
                        <input type="text" name="nama_departemen" id="nama_departemen" class="form-control" value="{{ old('nama_departemen') }}" required>
                    </div>
                    <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn text-white float-end" style="background-color: var(--app-purple);">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
