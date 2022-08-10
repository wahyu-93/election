@if(Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span>{{ Session::get('success') }}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif