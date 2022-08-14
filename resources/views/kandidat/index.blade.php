@extends('layouts.app')

@section('title', 'List Kandidat')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">List Kandidat</div>
                <div class="card-body">
                    @include('components.alert')

                    <a href="{{ route('admin.kandidat.create') }}" class="btn btn-primary btn-sm">Tambah Kandidat</a><hr>
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No Urut Calon</th>
                                <th>Nik </th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Visi</th>
                                <th>Misi</th>
                                <th>Foto Calon</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


