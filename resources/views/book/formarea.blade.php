<label for="{{ $name }}" class="form-label">{{ $title }}</label>
<textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
{{ old($name) }}
</textarea>