@if (session('status'))
<div id="successAlert"
    class="alert z-3 alert-{{ session('status') ?? 'info' }} fade show shadow-sm text-center position-fixed translate-middle bottom-0 start-50 mb-2 py-2"
    role="alert">
    @switch(session('status'))
        @case('success')
            <i class="fa-solid fa-xs fa-check"></i>
        @break

        @case('warning')
            <i class="fa-solid fa-xs fa-warning"></i>
        @break

        @case('danger')
            <i class="fa-solid fa-xs fa-xmark"></i>
        @break

        @case('info')
            <i class="fa-solid fa-xs fa-circle-info"></i>
        @break

        @default
            <i class="fa-solid fa-xs fa-circle-info"></i>
        @break
    @endswitch
    {{ session('message') }}
    <button hidden type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif