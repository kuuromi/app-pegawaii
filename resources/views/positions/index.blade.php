@extends('master')
@section('title', 'Daftar Jabatan')
@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Jabatan</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <a href="{{ route('positions.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Jabatan</a> 
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="text-white" style="background-color: var(--app-purple);">
                        <th style="width: 50px;">No</th>
                        <th>Nama Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($positions as $position)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $position->nama_jabatan }}</td> 
                        <td>Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($position->description, 50, '...') }}</td>
                        <td class="text-nowrap">
                            {{-- Menggunakan ikon fa dan data-bs-toggle --}}
                            <a href="{{ route('positions.show', $position->id) }}" class="view" title="Detail" data-bs-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('positions.edit', $position->id) }}" class="edit" title="Edit" data-bs-toggle="tooltip"><i class="fa fa-edit"></i></a>
                            
                            <form action="{{ route('positions.destroy', $position->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus jabatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" title="Hapus" data-bs-toggle="tooltip" style="border: none; background: none; padding: 0; cursor: pointer;"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data jabatan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            
            @if ($positions->hasPages())
            <div class="clearfix">
                <div class="hint-text">Menampilkan <b>{{ $positions->count() }}</b> dari <b>{{ $positions->total() }}</b> jabatan</div>
                {{ $positions->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection