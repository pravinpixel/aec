@php  
    $form = '
        <div class="text-end bg-light shadow-sm border rounded-3 p-3 d-flex">
            <div class="d-flex w-100">
                <input type="hidden" name="menu_name" value="'.$menuName.'" placeholder="Example : Project Information ">
                <input type="hidden" name="module_name" value="'.$moduleName.'"  placeholder="Example : Enquiry">
                <input type="hidden" name="module_id" value="'.$moduleId.'"  placeholder="Example : Enquiry ID  ">
                <input type="text" name="message" class="form-control me-1 rounded-pill" placeholder="Type here...">
                <button onclick="sendMessage(this)" type="button" class="btn rounded-pill btn-sm btn-primary"><i class="fa fa-send"></i></button>
            </div>
        </div>
    '
@endphp
@if($status == 1)  
    <div>
        {!! $form !!}
        <div class="text-end mt-2">
            <button type="button" class="btn btn-sm btn-link" data-bs-toggle="modal" onclick="scrollMessage('{{ $menuName }}')" data-bs-target="#viewMyInbox{{ $menuName }}"><i class="mdi mdi-eye me-1"></i> Previous chat history</button>
        </div>
    </div>
@endif  
 
<div id="viewMyInbox{{ $menuName }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="background: #1313136e">
    <div class="modal-dialog shadow-sm border-start modal-md-2 modal-right w-100">
        <div class="modal-content h-100">
            <div class="border-bottom shadow-sm text-white bg-primary2 modal-header ">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="mdi mdi-account-circle" style="font-size: 30px"></i>
                    <div class="ms-2">
                        <small>
                            @if (!is_null(Customer()))
                                {{ ucfirst(Customer()->full_name) }} / <small class="text-success fw-bold">{{ AuthUser() }}</small>
                            @endif
                            @if (!is_null(Admin()))
                                {{ ucfirst(Admin()->display_name) }} / <small class="text-success fw-bold">{{ AuthUser() }}</small>
                            @endif
                        </small>
                        <h5 class="m-0 mt-1">{{ str_replace('_',' ',$menuName) }}</h5>
                    </div>
                </div>
                <button type="button" class="btn btn-sm text-white" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <div class="modal-body p-0" style="background:#EEE7DE"> 
                <ul id="inbox-conversation-list" class="{{ AuthUser() }}-chat-box m-0 inbox_conversation_list_{{ $menuName }}">
                    @isset($conversations)
                        {!! $conversations !!}
                    @endisset
                </ul>
                {!! $form !!}
            </div> 
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->