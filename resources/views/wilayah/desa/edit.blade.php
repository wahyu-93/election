@extends('layouts.app')
@section('title', 'Ubah Desa')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ubah Desa</div>
                <div class="card-body">
                    <form action="{{ route('admin.desa.update', $desa) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                                <option value="" readonly selected>Pilih Kecamatan . . .</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == $desa->kecamatan_id ? 'selected' : '' }} >{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" id="desa" class="form-control @error('desa') @enderror mb-2" value="{{ $desa->desa ?? old('desa') }}" autofocus>
                            
                            @error('desa')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
