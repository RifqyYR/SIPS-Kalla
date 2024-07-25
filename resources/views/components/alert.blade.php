<script>
    @if (session()->has('success'))
        Swal.fire({
            position: "center",
            icon: "success",
            confirmButtonColor: '#01803D',
            title: '{{ session('success') }}',
        });
    @elseif (session()->has('error'))
        Swal.fire({
            position: "center",
            icon: "error",
            confirmButtonColor: '#01803D',
            title: '{{ session('error') }}',
        });
    @endif
</script>
