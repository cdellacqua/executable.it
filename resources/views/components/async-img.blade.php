<div class="async-img-container {{ ($class ?? false) ? "$class" : '' }}" style="{{ ($style ?? false) ? "$style" : '' }}" {!!
    implode(' ', array_map(function ($key, $value) {
        return "data-$key=\"$value\"";
    }, array_keys($data ?? []), array_values($data ?? [])))
!!}>
    <div class="async-img-placeholder {{ ($round ?? false) ? '-round' : '' }}" data-ratio="{{ trim(number_format($ratio ?? 1, 10), '0') }}0">
        <img src="{{ $src }}" class="async-img" alt="{{ $alt ?? __('immagine') }}">
    </div>

    <i class="loading loading-lg"></i>
</div>
