@if(session('status'))
        
<div class="mt-4 alert alert-{{session('status')}} alert-dismissible fade show" role="alert">
    @if(session('status') == 'success')
        <i class="fa-solid fa-xs fa-check"></i>
    @else
        <i class="fa-solid fa-xmark"></i>
    @endif

    {{session('message')}}
    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<hr class="mt-0">
@endif