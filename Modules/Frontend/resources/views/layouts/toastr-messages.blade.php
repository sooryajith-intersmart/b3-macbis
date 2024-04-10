@foreach (['success', 'info', 'error', 'warning'] as $type)
    @if (session($type))
        <script>
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 5000,
                });
                Toast.fire({
                    icon: "{{ $type }}",
                    title: "{{ session($type) }}",
                });
            });
        </script>
        @php
            session()->forget($type);
        @endphp
    @endif
@endforeach
