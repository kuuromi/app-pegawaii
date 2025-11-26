@extends('master')
@section('title', 'Daftar Proyek')
@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row align-items-center">
                    <div class="col-sm-8">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Proyek</b></h2>
                    </div>
                    <div class="col-sm-4 text-end">
                        <a href="{{ route('projects.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Proyek</a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="text-white" style="background-color: var(--app-purple);">
                        <th style="width: 50px;">No</th>
                        <th>Nama Proyek</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                        <th>Departemen</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->nama_proyek }}</td>
                        <td>{{ \Carbon\Carbon::parse($project->tanggal_mulai)->format('d M Y') }}</td>
                        <td>{{ $project->tanggal_selesai ? \Carbon\Carbon::parse($project->tanggal_selesai)->format('d M Y') : 'N/A' }}</td>
                        <td>
                            @if($project->status == 'aktif')
                                <span class="badge bg-success">Aktif</span>
                            @elseif($project->status == 'selesai')
                                <span class="badge bg-primary">Selesai</span>
                            @else
                                <span class="badge bg-danger">Ditunda</span>
                            @endif
                        </td>
                        <td>{{ $project->departemen->nama_departemen ?? 'N/A' }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('projects.show', $project->id) }}" class="view" title="Detail" data-bs-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="edit" title="Edit" data-bs-toggle="tooltip"><i class="fa fa-edit"></i></a>
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data proyek ini?')">
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
            {{ $projects->links() }}
        </div>
    </div>
</div>
@endsection