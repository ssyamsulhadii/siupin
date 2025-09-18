<a class="btn btn-dark btn-sm waves-effect waves-light" style="background: rgb(13, 38, 90)" href="{{ $urledit }}">
    {{ $text ?? 'Edit' }}
</a>

<form method="POST" action="{{ $urldelete }}" class="d-inline form-hapus">
    @csrf @method('DELETE')
    <button type="button" class="btn btn-danger btn-sm waves-effect waves-light">Hapus</button>
</form>
