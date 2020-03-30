<div class="async-img-container {{ ($class ?? false) ? "$class" : '' }}" style="{{ ($style ?? false) ? "$style" : '' }}">
    <div class="async-img-placeholder {{ ($round ?? false) ? '-round' : '' }}" data-ratio="{{ $ratio ?? 1 }}">
        <img src="{{ $src }}" class="async-img">
    </div>

    <i class="loading loading-lg"></i>
</div>
