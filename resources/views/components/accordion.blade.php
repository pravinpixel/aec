<div class="custom-accordion card border shadow-sm rounded">
    <div class="card-header {{ $open  == 'false' ? 'collapsed' : ''}}" id="custom-accordion-head-{{ slug($title) }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-{{ slug($title) }}">
        <div class="card-title">{{ $title }} </div> 
        <i class="accordion-icon"></i>
        @if ($argument != 'null' && $argument != 0)  
            <small class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $argument }}
            </small>
        @endif
    </div>
    <div class="card-body collapse {{ $open }} {{ $open == 'true' ? "show" : '' }}" id="custom-accordion-collapse-{{ slug($title) }}" style="overflow: hidden !important">
        <div class="card-content">
            @if ($path != 'false')
                    @include($path)
                @else
                {{ $slot }}
            @endif
        </div>
    </div>
</div>