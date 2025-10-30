@extends('master')
@section('title', 'Daftar Absensi')
@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Absensi</b></h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('attendance.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Absensi</a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px;">ID Pegawai</th>
                        <th>Tanggal Absensi</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Pulang</th>
                        <th>Status Absensi</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attendance as $item)
                    <tr>
                        <td>{{ $item->karyawan_id }}</td>
                        <td>{{ $item->tanggal }}</td>
                        <td>{{ $item->waktu_masuk }}</td>
                        <td>{{ $item->waktu_keluar }}</td>
                        <td>
                            @if($item->status_absensi == 'hadir')
                                <span class="badge bg-success">Hadir</span>
                            @elseif($item->status_absensi == 'izin')
                                <span class="badge bg-warning text-dark">Izin</span>
                            @elseif($item->status_absensi == 'sakit')
                                <span class="badge bg-info">Sakit</span>
                            @else
                                <span class="badge bg-danger">Alpha</span>
                            @endif
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('attendance.show', $item->id) }}" class="view" title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('attendance.edit', $item->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                            <form action="{{ route('attendance.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" title="Delete" data-toggle="tooltip" style="border: none; background: none; padding: 0; cursor: pointer;"><i class="fa fa-trash-o"></i></button>
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
