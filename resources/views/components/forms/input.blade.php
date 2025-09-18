<div class="form-group mb-2">
    <label class="form-label required" for="{{ $name }}">{!! $label !!}</label>
    <input type="{{ $type ?? 'text' }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}"
        placeholder="{{ $phr ?? '' }}" id="{{ $name }}" value="{!! old($name, $item ?? '') !!}" {{ $attributes }}>
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
