@if(session('status'))
<div class="mt-4 alert alert-{{session('status')}} alert-dismissible fade show" role="alert">
    @switch(session('status'))
        @case('success')
            <i class="fa-solid fa-xs fa-check"></i>
        @break

        @case('warning')
        <i class="fa-solid fa-warning"></i>
        @break

        @case('danger')
            <i class="fa-solid fa-xmark"></i>
        @break

        @case('info')
            <i class="fa-solid fa-circle-info"></i>
        @break  

        @default
            <i class="fa-solid fa-circle-info"></i>
        @break
    @endswitch
    {{session('message')}}
    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<hr class="mt-0">
@endif