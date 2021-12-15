@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert
                    alert-{{ $message['level'] }}
                    {{ $message['important'] ? 'alert-important' : '' }}"
                    role="alert"
        >
            
            <button type="button"
                    class="btn-close"
                    aria-label="Close"
                    data-bs-dismiss="alert"> 
            </button>
   

            {!! $message['message'] !!}
        </div>
    @endif
@endforeach

@if($errors->all())
    <div class="alert alert-danger">
        <button type="button" class="btn-close" data-dismiss="Close" data-bs-dismiss="alert"></button>
        <strong>{{ collect($errors->all(':message'))->first() }}</strong>
    </div>
@endif

{{ session()->forget('flash_notification') }}
