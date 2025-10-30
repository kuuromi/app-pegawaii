@extends('master')
@section('title', 'Daftar Gaji Pegawai')

@section('content')
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-6">
                        <h2 class="text-uppercase" style="color: var(--app-text);"><b>Daftar Gaji</b></h2>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('salaries.create') }}" class="btn text-white" style="background-color: var(--app-purple);"></i>Tambah Gaji</a>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</i></th>
                        <th>Bulan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Potongan</th>
                        <th>Total Gaji</th>
                        <th style="width: 130px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaries as $salary)
                        <tr>
                            <td>{{ $salary->id }}</td>
                            <td>{{ $salary->employee->nama_lengkap ?? '-' }}</td>
                            <td>{{ $salary->bulan }}</td>
                            <td>Rp {{ number_format($salary->gaji_pokok, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->tunjangan, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($salary->potongan, 0, ',', '.') }}</td>
                            <td><strong>Rp {{ number_format($salary->total_gaji, 0, ',', '.') }}</strong></td>
                            <td class="text-nowrap">
                                <a href="{{ route('salaries.show', $salary->id) }}" class="view" title="Detail" data-toggle="tooltip"><i class="fa fa-eye"></i></a>
                                <a href="{{ route('salaries.edit', $salary->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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

            <div class="clearfix">
                <!-- <div class="hint-text float-start">Menampilkan {{ $salaries->firstItem() }} hingga {{ $salaries->lastItem() }} dari {{ $salaries->total() }} entri</div> -->
                <div class="float-end">
                    {{ $salaries->links() }}
                </div>
            </div>
            
        </div>
    </div>        
</div>
@endsection
