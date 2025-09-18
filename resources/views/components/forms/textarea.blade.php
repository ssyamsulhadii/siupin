<div class="form-group mb-2">
    <label class="form-label required" for="{{ $name }}">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" rows="{{ $rows }}"
        class="form-control @error($name) is-invalid @enderror" placeholder="{{ $phr ?? '' }}">{!! old($name, $item ?? '') !!}</textarea>
    {{ $slot }}
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
