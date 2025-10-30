@extends('master')
@section('title', 'Input Gaji Pegawai')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="form-wrapper">
                <div class="table-title">
                    <h2 style="color: var(--app-text);"><b>Input Data Gaji</b></h2>
                </div>
                
                <form action="{{ route('salaries.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="karyawan_id" class="form-label">Karyawan:</label>
                        <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                            <option value="">-- Pilih Karyawan --</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}" {{ old('karyawan_id') == $employee->id ? 'selected' : '' }}>
                                    {{ $employee->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="bulan" class="form-label">Bulan:</label>
                        <input type="month" class="form-control" id="bulan" name="bulan" value="{{ old('bulan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="gaji_pokok" class="form-label">Gaji Pokok (Rp):</label>
                        <input type="number" step="0.01" class="form-control" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tunjangan" class="form-label">Tunjangan (Rp):</label>
                        <input type="number" step="0.01" class="form-control" id="tunjangan" name="tunjangan" value="{{ old('tunjangan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="potongan" class="form-label">Potongan (Rp):</label>
                        <input type="number" step="0.01" class="form-control" id="potongan" name="potongan" value="{{ old('potongan') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="total_gaji" class="form-label">Total Gaji (Rp):</label>
                        <input type="number" step="0.01" class="form-control" id="total_gaji" name="total_gaji" value="{{ old('total_gaji') }}" placeholder="Otomatis dihitung">
                        <div class="form-text">Otomatis dihitung (Gaji Pokok + Tunjangan - Potongan). Boleh dikosongkan.</div>
                    </div>
                    
                    <a href="{{ route('salaries.index') }}" class="btn btn-secondary">Batal</a> 
                    <button type="submit" class="btn text-white float-end" style="background-color: var(--app-purple);">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
    (function () {
        const gaji = document.getElementById('gaji_pokok');
        const tunj = document.getElementById('tunjangan');
        const pot  = document.getElementById('potongan');
        const total= document.getElementById('total_gaji');

        function toNum(v){ return parseFloat(v || 0) || 0; }

        function hitungTotal() {
            const result = toNum(gaji.value) + toNum(tunj.value) - toNum(pot.value);
            if (document.activeElement !== total || total.value === '' ) {
                total.value = result.toFixed(2);
            }
        }

        ['input','change'].forEach(evt => {
            gaji.addEventListener(evt, hitungTotal);
            tunj.addEventListener(evt, hitungTotal);
            pot.addEventListener(evt, hitungTotal);
        });

        hitungTotal();
    })();
</script>
@endpush
