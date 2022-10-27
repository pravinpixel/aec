@foreach ($history as $index => $data) 
    <div class="custom-accordion card border shadow-sm rounded bg-primary-2">
        <div class="card-header {{ $index !== 0 ? 'collapsed' : '' }}" aria-expanded="true" id="custom-accordion-head-{{ $index }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-{{ $index }}">
            <div class="card-title d-flex justify-content-between m-0 align-items-center">
                <div>
                    <strong class="me-auto">
                        Version : {{ count($history) - $index }}
                    </strong>
                    <span> - </span>
                    <span>
                        <span class="fa fa-calendar"></span>
                        <small>{{ $data->created_at }}</small>
                    </span>
                </div>
                <div class="d-flex align-items-center pe-5">
                    <strong><small>Modified by </small>:</strong>
                    <h5 class="mx-2 my-0 font-14"> {{  $data->employee->user_name ?? '' }}</h5>
                    <span class="badge badge-dark-lighten p-1 font-14">{{  $data->role->name ?? '' }}</span>
                </div>
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