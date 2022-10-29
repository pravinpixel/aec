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
            {{-- <button type="button" class="btn btn-sm btn-link" data-bs-toggle="modal" onclick="scrollMessage('{{ $menuName }}')" data-bs-target="#viewMyInbox{{ $menuName }}"><i class="mdi mdi-eye me-1"></i> Previous chat history</button> --}}
            <button type="button" class="btn btn-sm btn-outline-primary position-relative" onclick="PreviousChatHistory(this, '{{ $moduleId }}', '{{ $moduleName }}' , '{{ $menuName }}' )" data-bs-toggle="modal" data-bs-target="#viewMyInbox{{ $menuName }}">
                <i class="mdi mdi-eye me-1"></i> Previous chat history  
               {!! getModuleMenuMessagesCount($moduleName, $moduleId, $menuName , 'element') !!} 
            </button>
        </div>
    </div>
@endif  

@if($status == 'CHAT_ICON') 
    @if (getModuleMenuMessagesCount($moduleName, $moduleId, $menuName , 'count') != 0)
        <span class="position-absolute wizard-chat-box" onclick="PreviousChatHistory(this, '{{ $moduleId }}', '{{ $moduleName }}' , '{{ $menuName }}' )" data-bs-toggle="modal" data-bs-target="#viewMyInbox{{ $menuName }}">
            <img src="https://cdn-icons-png.flaticon.com/512/209/209989.png" width="25px">
            <small class="wizard-chat-box-count">{{ getModuleMenuMessagesCount($moduleName, $moduleId, $menuName , 'count') }}</small>
        </span>
    @endif 
@endif

@if($status != 'CHAT_ICON') 
    <div id="viewMyInbox{{ $menuName }}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="background: #1313136e">
        <div class="modal-dialog shadow-sm border-start modal-md-2 modal-right w-100">
            <div class="modal-content h-100">
                <div class="border-bottom shadow-sm text-white bg-primary2 modal-header ">
                    <div class="d-flex justify-content-center align-items-center"> 
                        @if (!is_null(Customer()))
                            <i class="fa fa-users text-success" style="font-size: 30px;border: 2px solid;height: 35px;border-radius: 50%;width: 35px;"></i>
                            @else 
                            <img src="{{ Admin()->image }}" width="35px" height="35px" class="rounded-circle" style="object-fit: cover; border: 2px solid;">
                        @endif
                    
                        <div class="ms-2">
                            <small>
                                @if (!is_null(Customer()))
                                    AecPrefab / <small class="text-success fw-bold">support team</small>
                                @endif
                                @if (!is_null(Admin()))
                                    {{ ucfirst($customer->full_name) }} / <small class="text-success fw-bold">Customer</small>
                                @endif
                            </small>
                            <h5 class="m-0 mt-1">{{ str_replace('_',' ',$menuName) }}</h5>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm text-success" title="Refresh Chat" onclick="PreviousChatHistory(this, '{{ $moduleId }}', '{{ $moduleName }}' , '{{ $menuName }}' )"><i class="mdi-reload mdi"></i></button>
                        <button type="button" class="btn btn-sm text-danger" title="Close Chat" data-bs-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
                    </div>
                </div>
                <div class="modal-body p-0" style="background:#EEE7DE"> 
                    <ul id="inbox-conversation-list" class="m-0 inbox_conversation_list_{{ $menuName }}"></ul>
                    {!! $form !!}
                </div> 
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endif