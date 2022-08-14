<div class="card mt-3">
    <div class="card-header">Kandidat Ketua</div>
    
    <form action="{{ route('admin.kandidat.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">    
            <div class="form-group mb-3">
                <label for="nkk">NKK</label>
                <input type="number" name="nkk" id="nkk" class="form-control" @error('nkk') is-invalid @enderror value="{{ old('nkk') }}" maxlength="16">

                @error('nkk')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="nik">NIK</label>
                <input type="number" name="nik" id="nik" class="form-control" @error('nik') is-invalid @enderror value="{{ old('nik') }}" maxlength="16">

                @error('nik')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="name">Nama</label>
                <input type="text" name="name" id="name" class="form-control" @error('name') is-invalid @enderror value="{{ old('name') }}">

                @error('name')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="visi">Visi</label>
                <textarea name="visi" id="visi" rows="5" class="form-control" style="resize: none" @error('visi') is-invalid @enderror>{{ old('visi') }}</textarea>
                
                @error('visi')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="misi">Misi</label>
                <textarea name="misi" id="misi" rows="5" class="form-control" style="resize: none" @error('misi') is-invalid @enderror>{{ old('misi') }}</textarea>

                @error('misi')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="fotoKandidat">Foto Kandidat </label>
                <input type="file" name="fotoKandidat" id="fotoKandidat" class="form-control" accept="image/*">

                @error('fotoKandidat')
                    <span class="text-danger text-small mt-2" >{{ $message }}</span>
                @enderror
            </div>  
        </div>

        <div class="card-footer">
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
</div>