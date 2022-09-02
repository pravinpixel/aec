@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else 
        <div id="alert-log" class="alert alert-custom alert-{{ $message['level']}} {{ $message['important'] ? 'alert-important' : '' }} fade show text-center" role="alert" data-bs-dismiss="alert" aria-label="Close">
            <strong>{!! $message['message'] !!}</strong> 
        </div>
    @endif
@endforeach
@if($errors->all()) 
    <div id="alert-log" class="alert alert-custom  alert-dangerfade show text-center" role="alert" data-bs-dismiss="alert" aria-label="Close" style="z-index: 11111111111 !important;opacity:1 !important">
        <strong>{{ collect($errors->all(':message'))->first() }}</strong>
    </div>
@endif 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $("#alert-log").fadeTo(3000, 1000).slideUp(1000, function(){
        $("#alert-log").slideUp(5000);
    }); 
</script>
{{ session()->forget('flash_notification') }}