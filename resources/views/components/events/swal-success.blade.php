@if (session()->has('swal-success'))
    @push('script')
        <script>
            Swal.fire({
                title: "Sukses",
                html: "{!! session()->get('swal-success') !!}",
                icon: "success",
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2500,
            })
        </script>
    @endpush
@endif
