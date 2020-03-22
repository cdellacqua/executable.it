<div class="async-img-container {{ ($class ?? false) ? "$class" : '' }}" style="{{ ($style ?? false) ? "$style" : '' }}">
    <div data-src="{{ $src }}" class="async-img {{ ($round ?? false) ? '-round' : '' }}" data-ratio="{{ $ratio ?? 1 }}"></div>

    <i class="loading loading-lg"></i>
    <i class="icon icon-cross"></i>
</div>
