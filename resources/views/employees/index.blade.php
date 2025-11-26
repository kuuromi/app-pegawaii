@extends('master')
@section('title', 'Daftar Pegawai')
@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Pegawai</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <a href="{{ route('employees.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Pegawai</a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="text-white" style="background-color: var(--app-purple);">
                        <th style="width: 50px;">No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Tanggal Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->nama_lengkap }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->nomor_telepon }}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d M Y') }}</td>
                        <td>{{ $employee->alamat }}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d M Y') }}</td>
                        <td>
                            @if($employee->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-danger">Tidak Aktif</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('employees.show', $employee->id) }}" class="view" title="Detail" data-bs-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('employees.edit', $employee->id) }}" class="edit" title="Edit" data-bs-toggle="tooltip"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data pegawai ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" title="Hapus" data-bs-toggle="tooltip" style="border: none; background: none; padding: 0; cursor: pointer;"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
