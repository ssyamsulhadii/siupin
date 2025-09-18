<div class="form-group mb-2">
    <div class="d-flex flex-column justify-content-center">
        <label>{{ $label }}</label>
        <label
            style="border: 1px solid rgb(242, 242, 242); padding: 7px; font-size: 13px; background-color: rgb(245, 245, 245); color: rgb(116, 116, 116); min-height: 36px;">
            {{ $value ?? $slot }}
        </label>
    </div>
</div>
