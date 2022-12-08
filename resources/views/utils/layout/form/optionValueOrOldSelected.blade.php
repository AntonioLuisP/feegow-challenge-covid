@foreach ($values as $key => $value)
    {{ old($name) }}
    <option value="{{ $key }}"
        {{ old($name)
            ? (old($name) === $key
                ? 'selected'
                : '')
            : ($parameter
                ? ($parameter === $key
                    ? 'selected'
                    : '')
                : '') }}>
        {{ $value }}
    </option>
@endforeach
