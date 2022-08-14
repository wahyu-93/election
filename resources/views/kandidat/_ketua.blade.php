<div class="card mt-3">
    <div class="card-header">Kandidat Ketua</div>
    
    <form action="{{ route('admin.kandidat.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">    
            <div class="form-group mb-3">
                <label for="nkk_ketua">NKK</label>
                <input type="number" name="nkk_ketua" id="nkk_ketua" class="form-control" @error('nkk_ketua') is-invalid @enderror value="{{ old('nkk_ketua') }}" maxlength="16">
            </div>

            <div class="form-group mb-3">
                <label for="nik_ketua">NIK</label>
                <input type="number" name="nik_ketua" id="nik_ketua" class="form-control" @error('nik_ketua') is-invalid @enderror value="{{ old('nik_ketua') }}" maxlength="16">
            </div>

            <div class="form-group mb-3">
                <label for="name_ketua">Nama</label>
                <input type="text" name="name_ketua" id="name_ketua" class="form-control" @error('name_ketua') is-invalid @enderror value="{{ old('name_ketua') }}">
            </div>

            <div class="form-group mb-3">
                <label for="visi_ketua">Visi</label>
                <textarea name="visi_ketua" id="visi_ketua" rows="5" class="form-control" style="resize: none" @error('visi_ketua') is-invalid @enderror>{{ old('visi_ketua') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="misi_ketua">Misi</label>
                <textarea name="misi_ketua" id="misi_ketua" rows="5" class="form-control" style="resize: none" @error('misi_ketua') is-invalid @enderror>{{ old('misi_ketua') }}</textarea>
            </div>

            <div class="form-group">
                <label for="fotoKetua">Foto Kandidat</label>
                <input type="file" name="fotoKetua" id="fotoKetua" class="form-control" accept="image/*">
            </div>  
        </div>

        <div class="card-footer">
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
</div>