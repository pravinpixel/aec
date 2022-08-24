<div>
    <h3 class="text-center text-primary"> Version List </h3> <br>
    @foreach ($history as $index => $data) 
        <div class="card">
            <div class="card-header">
                <div class="card-title d-flex justify-content-between m-0 align-items-center">
                    <div>
                        <strong class="me-auto">
                            Version : {{ count($history) - $index }}
                        </strong>
                        <span> - </span>
                        <span>
                            <span class="fa fa-calendar"></span>
                            <small>{{ $data->created_at->format('d-m-Y h:m:s A') }}</small>
                        </span>
                    </div>
                    <div class="d-flex align-items-center">
                        <strong><small>Modified by </small>:</strong>
                        <h5 class="mx-2 my-0 font-14">Brandon Smith</h5>
                        <span class="badge badge-success-lighten p-1 font-14">Technical estimater</span>
                    </div>
                </div> 
                <i class="accordion-icon"></i> 
            </div>
            <div class="card-body">
                {!! $data->history !!}
            </div>
        </div>
    @endforeach
</div>