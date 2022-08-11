@extends('layouts.app')

@section('title', 'List Desa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Desa</div>

                <div class="card-body">
                    @include('components.alert')

                    <form action="" method="GET">
                        <input type="search" name="q" id="q" class="form-control mb-2" placeholder="Pencarian Desa . . ."><hr>
                    </form>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th>Desa</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($desas as $key => $desa)
                                <tr>
                                    <td>{{ $desas->firstItem() + $key }}</td>
                                    <td>{{ $desa->kecamatan->kecamatan }}</td>
                                    <td>{{ $desa->desa }}</td>
                                    <td>
                                        <form action="{{ route('admin.desa.destroy', [$desa]) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.desa.edit', $desa) }}" class="btn btn-success btn-sm">Edit</a>
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>  
                            @empty
                                <h2 class="text-center">Data Tidak Ada . . .</h2>
                            @endforelse   
                        </tbody>
                    </table>
                   {{ $desas->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah desa</div>
                <div class="card-body">
                    <form action="{{ route('admin.desa.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                                <option value="" readonly selected>Pilih Kecamatan . . .</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == old('kecamatan') ? 'selected' : '' }} >{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group mb-3">
                            <label for="desa">Desa</label>
                            <input type="text" name="desa" id="desa" class="form-control @error('desa') @enderror mb-2" value="{{ old('desa') }}" autofocus>
                            
                            @error('desa')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-primary btn-sm float-end">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
