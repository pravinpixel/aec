<div class="custom-accordion card border shadow-sm rounded">
    <div class="card-header {{ $open  == 'false' ? 'collapsed' : ''}}" id="custom-accordion-head-{{ slug($title) }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-{{ slug($title) }}">
        <div class="card-title">{{ $title }}</div>
        <i class="accordion-icon"></i> 
    </div>
    <div class="card-body collapse {{ $open }}" id="custom-accordion-collapse-{{ slug($title) }}">
        <div class="card-content">
            @include($path)
        </div>
    </div>
</div>