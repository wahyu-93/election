@extends('layouts.app')
@section('title', 'Ubah TPS')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Ubah Tps</div>
                <div class="card-body">
                    <form action="{{ route('admin.tps.update', $tps->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group mb-3">
                            <label for="kecamatan">Kecamatan</label>
                            <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror" onchange="getKecamatan(this)">
                                <option value="" readonly selected>Pilih Kecamatan . . .</option>
                                @foreach ($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == $tps->desa->kecamatan_id ? 'selected' : '' }} >{{ $kecamatan->kecamatan }}</option>
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
                                @foreach ($desas as $desa)
                                    <option value="{{ $desa->id }}" {{ $desa->id == $tps->desa_id ? 'selected' : '' }} >{{ $desa->desa }}</option>
                                @endforeach
                            </select>
                            
                            @error('desa')
                                <span class="text-danger text-small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="tps">TPS</label>
                            <input type="text" name="tps" id="tps" class="form-control @error('tps') @enderror mb-2" value="{{ $tps->tps ?? old('tps') }}" autofocus>
                            
                            @error('tps')
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

            xhr.onloadend = function(){
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

