@extends('layouts.app')

@section('title', 'Create Kandidat Ketua dan Calon')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="ketua-tab" data-bs-toggle="tab" data-bs-target="#ketua" type="button" role="tab" aria-controls="ketua" aria-selected="true">Kandidat Ketua</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="wakil-tab" data-bs-toggle="tab" data-bs-target="#wakil" type="button" role="tab" aria-controls="wakil" aria-selected="false">Kandidat Wakil</button>
                </li>
                
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="foto-tab" data-bs-toggle="tab" data-bs-target="#foto" type="button" role="tab" aria-controls="foto" aria-selected="false">Foto Kampanye</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="ketua" role="tabpanel" aria-labelledby="ketua-tab">
                    @include('kandidat._ketua')
                </div>

                <div class="tab-pane fade" id="wakil" role="tabpanel" aria-labelledby="wakil-tab">
                    @include('kandidat._wakil')
                </div>
                
                <div class="tab-pane fade" id="foto" role="tabpanel" aria-labelledby="foto-tab">
                    @include('kandidat._fotoKampanye')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


