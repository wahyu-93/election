@extends('layouts.app')

@section('title', 'List Kecamatan')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Kecamatan</div>

                <div class="card-body">
                    @include('components.alert')

                    <form action="" method="GET">
                        <input type="search" name="q" id="q" class="form-control mb-2" placeholder="Pencarian . . ."><hr>
                    </form>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kecamatan</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($kecamatans as $key => $kecamatan)
                                <tr>
                                    <td>{{ $kecamatans->firstItem() + $key }}</td>
                                    <td>{{ $kecamatan->kecamatan }}</td>
                                    <td>
                                        <form action="{{ route('admin.kecamatan.destroy', [$kecamatan]) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.kecamatan.edit', $kecamatan) }}" class="btn btn-success btn-sm">Edit</a>
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>  
                            @empty
                                <h2 class="text-center">Data Tidak Ada . . .</h2>
                            @endforelse   
                        </tbody>
                    </table>
                   {{ $kecamatans->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah Kecamatan</div>
                <div class="card-body">
                    <form action="{{ route('admin.kecamatan.store') }}" method="POST">
                        @csrf
        
                        <div class="form-group mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <input type="text" name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') @enderror mb-2" value="{{ old('kecamatan') }}" autofocus>
                            
                            @error('kecamatan')
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
