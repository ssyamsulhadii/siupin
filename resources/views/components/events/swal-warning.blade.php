@if (session()->has('swal-warning'))
    @push('script')
        <script>
            Swal.fire({
                title: "Perhatian",
                html: "{!! session()->get('swal-warning') !!}",
                icon: 'warning',
                showCancelButton: false,
                showConfirmButton: false,
                timer: 2500,
            })
        </script>
    @endpush
@endif
