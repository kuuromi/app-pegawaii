@extends('master')
@section('title', 'Daftar Departemen')
@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Departemen</b></h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('departemen.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Departemen</a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50px;">No</th>
                        <th>Nama Departemen</i></th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departemen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_departemen }}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('departemen.show', $item->id) }}" class="view" title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i></a> 
                            <a href="{{ route('departemen.edit', $item->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                            
                            <form action="{{ route('departemen.destroy', $item->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus departemen ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" title="Hapus" data-toggle="tooltip" style="border: none; background: none; padding: 0; cursor: pointer;"><i class="fa fa-trash-o"></i></button>
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
