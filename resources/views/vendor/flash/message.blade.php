@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
      
            <div class="alert alert-custom alert-{{ $message['level']}} {{ $message['important'] ? 'alert-important' : '' }} fade show text-center" role="alert" data-bs-dismiss="alert" aria-label="Close">
                <strong>{!! $message['message'] !!}</strong> 
            </div>

            
         
    @endif
@endforeach

@if($errors->all()) 
    <div class="alert alert-custom  alert-dangerfade show text-center" role="alert" data-bs-dismiss="alert" aria-label="Close" style="z-index: 11111111111 !important;opacity:1 !important">
        <strong>{{ collect($errors->all(':message'))->first() }}</strong>
    </div>
@endif

{{ session()->forget('flash_notification') }}