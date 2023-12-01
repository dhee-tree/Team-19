@if(session('status'))
        
<div class="mt-4 alert alert-{{session('status')}}" role="alert">
    @if(session('status') == 'success')
        <i class="fa-solid fa-xs fa-check"></i>
    @else
        <i class="fa-solid fa-xmark"></i>
    @endif

    {{session('message')}}
</div>

<hr class="mt-0">
@endif