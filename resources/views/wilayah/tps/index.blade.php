@extends('layouts.app')

@section('title', 'List TPS')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List Tps</div>

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
                                <th>TPS</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($tpsList as $key => $tps)
                                <tr>
                                    <td>{{ $tpsList->firstItem() + $key }}</td>
                                    <td>{{ $tps->desa->kecamatan->kecamatan }}</td>
                                    <td>{{ $tps->desa->desa }}</td>
                                    <td>{{ $tps->tps }}</td>
                                    <td>
                                        <form action="{{ route('admin.tps.destroy', [$tps]) }}" method="POST">
                                            @csrf
                                            @method('delete')

                                            <a href="{{ route('admin.tps.edit', $tps) }}" class="btn btn-success btn-sm">Edit</a>
                                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                        </form>
                                    </td>
                                </tr>  
                            @empty
                                <h2 class="text-center">Data Tidak Ada . . .</h2>
                            @endforelse   
                        </tbody>
                    </table>
                   {{ $tpsList->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tambah TPS</div>
                <div class="card-body">
                    <form action="{{ route('admin.tps.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-2">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" onchange="getKecamatan(this)">
                                <option value="" readonly selected>Pilih Kecamatan . . .</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}">{{ $kecamatan->kecamatan }}</option>
                                @endforeach
                            </select>
                            @error('kecamatan')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>
        
                        <div class="form-group mb-3">
                            <label for="desa">Desa</label>
                            <select name="desa" id="desa" class="form-control @error('desa') is-invalid @enderror">
                                <option value="" readonly selected>Pilih desa . . .</option>
                            </select>
                            
                            @error('desa')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tps">TPS</label>
                            <input type="text" name="tps" id="tps" class="form-control @error('tps') @enderror mb-2" value="{{ old('tps') }}">
                            
                            @error('tps')
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

@push('after-script')
    <script>
        function getKecamatan(id)
        {
            var desa = document.getElementById('desa')
            desa.innerHTML = ""
            desa.add(new Option("Pilih Desa . . . ", ""))

            var xhr = new XMLHttpRequest()
            var url = "http://localhost:8000/admin/wilayah/get-desa/" + id.value

            xhr.onerror = function(){
                console.log("Gagal Mengambil Data")
            }

            xhr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    if(this.responseText != ''){
                        var datas = JSON.parse(this.responseText);
                        
                        for(let [key, value] of Object.entries(datas)){
                            desa.add(new Option(`${value}`, `${key}`))
                        }
                    }
                }
            };

            xhr.open('GET', url, true)
            xhr.send()  
        }
    </script>
@endpush
