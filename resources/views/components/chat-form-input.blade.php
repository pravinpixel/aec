@if ($status == 'DISABLED')
    @else
        <div class="text-end bg-light shadow-sm border rounded-3 p-3 d-flex">
            <div class="d-flex w-100">
                <input type="hidden" name="menu_name" value="{{ $menuName }}" placeholder="Example : Project Information ">
                <input type="hidden" name="module_name" value="{{ $moduleName }}" placeholder="Example : Enquiry">
                <input type="hidden" name="module_id" value="{{ $moduleId }}"  placeholder="Example : Enquiry ID">
                <input type="text" onkeypress="disableEnter(event)" name="message" class="form-control me-1 rounded-pill" placeholder="Type here...">
                <button onclick="sendMessage(this)" type="button" class="btn rounded-pill btn-sm btn-primary">
                    <i class="fa fa-send"></i>
                </button>
            </div>
        </div>
@endif
