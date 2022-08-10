@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Tambah Kecamatan</div>
                <div class="card-body">
                    <form action="{{ route('admin.kecamatan.update', $kecamatan) }}" method="POST">
                        @csrf
                        @method('put')
        
                        <div class="form-group mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') @enderror mb-2" value="{{ $kecamatan->kecamatan ?? old('kecamatan') }}" autofocus>
                            
                            @error('kecamatan')
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
