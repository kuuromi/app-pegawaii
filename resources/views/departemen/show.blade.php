@extends('master')
@section('title', 'Detail Departemen')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 class="text-uppercase" style="color: var(--app-text);"><b>Detail Departemen</b></h2>
                </div>

                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width: 30%;">ID</th>
                        <td>{{ $departemen->id }}</td>
                    </tr>
                    <tr>
                        <th>Nama Departemen</th>
                        <td>{{ $departemen->nama_departemen }}</td>
                    </tr>
                </table>
                <a href="{{ route('departemen.index') }}" class="btn text-white" style="background-color: var(--app-purple);">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
