<div class="card mt-3">
    <div class="card-header">Kandidat Wakil</div>
    
    <form action="{{ route('admin.kandidat.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">    
            <div class="form-group">
                <label for="fotoKampanye">Foto Ketua dan Wakil</label>
                <input type="file" name="fotoKampanye" id="fotoKampanye" class="form-control" accept="image/*">
            </div>  
        </div>

        <div class="card-footer">
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
</div>