<div class="card mt-3">
    <div class="card-header">Kandidat Wakil</div>
    
    <form action="{{ route('admin.kandidat.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">    
            <div class="form-group mb-3">
                <label for="nkk_wakil">NKK</label>
                <input type="number" name="nkk_wakil" id="nkk_wakil" class="form-control" @error('nkk_wakil') is-invalid @enderror value="{{ old('nkk_wakil') }}" maxlength="16">
            </div>

            <div class="form-group mb-3">
                <label for="nik_wakil">NIK</label>
                <input type="number" name="nik_wakil" id="nik_wakil" class="form-control" @error('nik_wakil') is-invalid @enderror value="{{ old('nik_wakil') }}" maxlength="16">
            </div>

            <div class="form-group mb-3">
                <label for="name_wakil">Nama</label>
                <input type="text" name="name_wakil" id="name_wakil" class="form-control" @error('name_wakil') is-invalid @enderror value="{{ old('name_wakil') }}">
            </div>

            <div class="form-group mb-3">
                <label for="visi_wakil">Visi</label>
                <textarea name="visi_wakil" id="visi_wakil" rows="5" class="form-control" style="resize: none" @error('visi_wakil') is-invalid @enderror>{{ old('visi_wakil') }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="misi_wakil">Misi</label>
                <textarea name="misi_wakil" id="misi_wakil" rows="5" class="form-control" style="resize: none" @error('misi_wakil') is-invalid @enderror>{{ old('misi_wakil') }}</textarea>
            </div>

            <div class="form-group">
                <label for="fotoWakil">Foto Kandidat</label>
                <input type="file" name="fotoWakil" id="fotoWakil" class="form-control" accept="image/*">
            </div>  
        </div>

        <div class="card-footer">
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
</div>