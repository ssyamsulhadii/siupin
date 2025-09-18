@push('script')
    <script>
        let semuaTombol = document.querySelectorAll('.form-hapus');
        semuaTombol.forEach(function(form) {
            form.addEventListener('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'KONFIRMASI',
                    html: "Yakin menghapus data ini ?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.value) {
                        form.submit();
                    }
                })
            });
        })
    </script>
@endpush
