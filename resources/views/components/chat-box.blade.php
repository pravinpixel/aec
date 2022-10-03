@if($status == 1)  
    <div class="mt-3">
        <div class="text-end bg-light shadow-sm border rounded-3 p-3">
            <form onsubmit="return sendMessage(event)"  class="d-flex">
                <input type="hidden" name="menu_name" value="{{ $menuName }}">  {{-- Example : Project Information --}}
                <input type="hidden" name="module_id" value="{{ $moduleId }}"> {{-- Example : Enquiry ID --}}
                <input type="hidden" name="module_name" value="{{ $moduleName }}"> {{-- Example : Enquiry --}}
                <input type="text" name="message" class="form-control me-1 rounded-pill " placeholder="Type here...">
                <button  class="btn rounded-pill btn-sm btn-primary"><i class="fa fa-send"></i></button>
            </form>
        </div>
        <div class="text-end mt-2">
            <button class="btn btn-sm btn-link" data-bs-toggle="modal" data-bs-target="#viewMyInbox"><i class="mdi mdi-eye me-1"></i> Previous chat history</button>
        </div>
    </div>
@endif  
 
<div id="viewMyInbox" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog shadow-sm border-start modal-md-2 modal-right w-100">
        <div class="modal-content h-100">
            <div class="border-bottom shadow-sm text-white bg-primary2 modal-header ">
                <h5>{{ strtoupper('Conversations') }}</h5>
                <button class="btn btn-sm text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body p-0" style="background:#EEE7DE"> 
                <ul id="inbox-conversation-list" class="{{ AuthUser() }}-chat-box m-0">
                    @isset($conversations)
                        @foreach ($conversations as $message) 
                            <li class="{{ $message->sender_role }}-message" >
                                <div>{{ $message->message }}</div>
                                <small>{{ $message->sender_role }} | {{ $message->send_date  }}</small>
                            </li>
                        @endforeach
                    @endisset
                </ul>
                <form onsubmit="return sendMessage(event)"  class="d-flex p-3">
                    <input type="hidden" name="menu_name" value="{{ $menuName }}">  {{-- Example : Project Information --}}
                    <input type="hidden" name="module_id" value="{{ $moduleId }}"> {{-- Example : Enquiry ID --}}
                    <input type="hidden" name="module_name" value="{{ $moduleName }}"> {{-- Example : Enquiry --}}
                    <input type="text" name="message" class="form-control me-1 rounded-pill " placeholder="Type here...">
                    <button  class="btn rounded-pill btn-sm btn-primary"><i class="fa fa-send"></i></button>
                </form>
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->