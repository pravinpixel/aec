    $(document).on('click', '.delete-modal', function (event) {
        $("#delete-confirmation-modal").modal('show');
        var action = $(this).attr('data-action');
        $("#modal-title").html($(this).attr('data-header-title'));
        $("#message").html($(this).attr('data-title'));
        $("#method").val($(this).attr('data-method'))
        var csrfToken = $('meta[name=csrf-token]').attr("content");
        var modal = $("#delete-confirmation-modal");
        modal.find('.modal-footer form').prop("action", action);
        modal.find('input[name="_token"]').prop("value", csrfToken);
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;
        return true;
    }

    function getNum (val) {
        if (isNaN(val) || val == '') {
            return 0;
        }
        return Math.round((val + Number.EPSILON) * 100) / 100;
    }

    function enableActiveTabs(tabs) {
        (tabs.project_info == 0) ? $("#project-info").addClass('activeTab')  : $("#project-info").removeClass('activeTab');
        (tabs.service == 0) ? $("#service").addClass('activeTab') : $("#service").removeClass('activeTab');
        (tabs.ifc_model_upload == 0) ? $("#ifc-model-upload").addClass('activeTab') : $("#ifc-model-upload").removeClass('activeTab');
        (tabs.building_component == 0) ? $("#building-component").addClass('activeTab') : $("#building-component").removeClass('activeTab');
        (tabs.additional_info == 0) ? $("#additional-info").addClass('activeTab'): $("#additional-info").removeClass('activeTab');
        (tabs.project_info == 1 && tabs.service == 1 && tabs.ifc_model_upload == 1 && tabs.building_component == 1) ?
        $("#review").removeClass('activeTab') : $("#review").addClass('activeTab');
        (tabs.project_info == 1) ? $("#project-info").addClass('active')  : $("#project-info").removeClass('active');
        (tabs.service == 1) ? $("#service").addClass('active') : $("#service").removeClass('active');
        (tabs.ifc_model_upload == 1) ? $("#ifc-model-upload").addClass('active') : $("#ifc-model-upload").removeClass('active');
        (tabs.building_component == 1) ? $("#building-component").addClass('active') : $("#building-component").removeClass('active');
        (tabs.additional_info ==1) ? $("#additional-info").addClass('active'): $("#additional-info").removeClass('active');
        (tabs.project_info == 1 && tabs.service == 1 && tabs.ifc_model_upload == 1 && tabs.building_component == 1) ?
        $("#review").addClass('active') : $("#review").removeClass('active');
    }
    function statusBadge($status) {
        switch($status){
            case "not_send": 
                return "-";
            
            case "approved":
                return   "<span class='badge badge-outline-success rounded-pill'>Approved</span>";
              
            case "obsolete":
                return   "<span class='badge badge-outline-primary rounded-pill'>Obsolete</span>";
        
            case "denied":
                return   "<span class='badge badge-outline-danger rounded-pill'>Denied</span>";
        
            default:
                return   "-";
            
        }    
    }
    