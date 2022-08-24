@foreach ($history as $index => $data) 
    <div class="custom-accordion card border shadow-sm rounded bg-primary-2">
        <div class="card-header {{ $index !== 0 ? 'collapsed' : '' }}" aria-expanded="true" id="custom-accordion-head-{{ $index }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-{{ $index }}">
            <div class="card-title">
                <strong class="me-auto">Version : {{ count($history) - $index }}</strong>
                <span> - </span>
                <span>
                    <span class="fa fa-calendar"></span>
                    <small>{{ $data->created_at->format('d-m-YY h:m:s A') }}</small>
                </span>
            </div> 
            <i class="accordion-icon"></i> 
        </div>
        <div class="card-body collapse {{ $index === 0 ? 'show' : '' }}" id="custom-accordion-collapse-{{ $index }}">
            <div class="card-content">
                {!! $data->history !!}
            </div>
        </div>
    </div>
@endforeach