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
startLoader = (e) => {
    e.classList.add('btn-loader')
}
stopLoader = (e) => {
    e.classList.remove('btn-loader')
}
function minmax(value, min, max) 
{
    if(parseInt(value) < min || isNaN(parseInt(value))) 
        return min; 
    else if(parseInt(value) > max) 
        return max; 
    else return value;

}

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
function projectActiveTabs(tabs) {
    (tabs.create_project == 0 || typeof(tabs.create_project) == 'undefined') ? $("#create-project").addClass('activeTab')  : $("#create-project").removeClass('activeTab');
    (tabs.create_project == 1) ? $("#create-project").addClass('active')  : $("#create-project").removeClass('active');
    (tabs.connect_platform == 0 || typeof(tabs.connect_platform) == 'undefined') ? $("#connect-platform").addClass('activeTab')  : $("#connect-platform").removeClass('activeTab');
    (tabs.connect_platform == 1) ? $("#connect-platform").addClass('active')  : $("#connect-platform").removeClass('active');
    (tabs.team_setup == 0 || typeof(tabs.team_setup) == 'undefined' ) ? $("#team-setup").addClass('activeTab')  : $("#team-setup").removeClass('activeTab');
    (tabs.team_setup == 1) ? $("#team-setup").addClass('active')  : $("#team-setup").removeClass('active');
    (tabs.invoice_plan == 0 || typeof(tabs.invoice_plan) == 'undefined' ) ? $("#invoice-plan").addClass('activeTab')  : $("#invoice-plan").removeClass('activeTab');
    (tabs.invoice_plan == 1) ? $("#invoice-plan").addClass('active')  : $("#invoice-plan").removeClass('active');
    (tabs.todo_list == 0 || typeof(tabs.todo_list) == 'undefined') ? $("#todo-list").addClass('activeTab')  : $("#todo-list").removeClass('activeTab');
    (tabs.todo_list == 1) ? $("#todo-list").addClass('active')  : $("#todo-list").removeClass('active');
    (tabs.project_scheduling == 0 || typeof(tabs.project_scheduling) == 'undefined') ? $("#project-scheduling").addClass('activeTab')  : $("#project-scheduling").removeClass('activeTab');
    (tabs.project_scheduling == 1) ? $("#project-scheduling").addClass('active')  : $("#project-scheduling").removeClass('active');
    (tabs.project_scheduling == 0 && tabs.todo_list == 0 && tabs.invoice_plan == 0 && tabs.team_setup == 0 && tabs.connect_platform == 0 && tabs.create_project == 0) ?
    $("#review").addClass('activeTab')  : $("#review").removeClass('activeTab');
    (tabs.project_scheduling == 1 && tabs.todo_list == 1 && tabs.invoice_plan == 1 && tabs.team_setup == 1 && tabs.connect_platform == 1 && tabs.create_project == 1) ?
    $("#review").removeClass('active') : $("#review").addClass('active');
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

        case "change_request":
            return   "<span class='badge badge-outline-info rounded-pill'>Change Request</span>";

        case "awaiting":
            return   "<span class='badge badge-outline-info rounded-pill'>Awaiting</span>";

        case "sent":
            return   "<span class='badge badge-outline-success rounded-pill'>Sent</span>";
    
        default:
            return   "-";
        
    }    
}

function swlAlertInfo(text, redirectRoute) {
    Swal.fire({
        title: `${text}`,
        showDenyButton: false,
        showCancelButton: false,
        confirmButtonText: 'Ok',
    }).then((result) => {
        if (result.isConfirmed) {
            location.href = redirectRoute;
        }
    });
}

function dateFormat(date, format= null)
{
    dateFormat = (format == null ?  'YYYY-MM-DD' : format);
    return moment(date).format(dateFormat);
}


function deactivateAccount()
{
    Swal.fire({
        html: `
            <h4 class="header-title"> Are you sure to deactivate your account? </h4>
            <p class="lead">
            Your Account, enquiries, projects and assets will not be accessible.
            </p>
        `,
        icon: 'warning',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        cancelButtonText: 'No',
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deactivate-form').submit();
        }
    });
}

function ifcAlertHelper(item)
{
    switch (item) {
        case "Three_dimensional_model":
            var res = " 3D Models";
            break;
        default:
            var res = " "+item.replaceAll('_', ' ');
            break;
    }
    return  res;
}

function ifcSingularAlertHelper(item)
{
    switch (item) {
        case "Three_dimensional_model":
            var res = " 3D Model";
            break;
        case "Foundation_drawings_and_others":
            var res = " Foundation drawing and others";
            break;
        case "Drawings":
            var res = " Drawing";
            break;
        default:
            var res = " "+item.replaceAll('_', ' ');
            break;
    }
    return  res;
}

function wizardactiveTabs(tableval) {
    $('.wizard_active').removeClass('active');
    $("."+tableval).attr("data-is-active","");
    
    $('#'+tableval).addClass('active');
    $("."+tableval).attr("data-is-active","active");
    //console.log(tableval);

} 

$(document).ready(function() {
    $('input').attr('autocomplete', 'off');
});

function getYesterdayDate() {
    return new Date(new Date().getTime() - 24*60*60*1000);
}

const APP_URL = $('meta[name="app-url"]').attr('content');

EnquiryQuickView = (id, element, chat) => {
    startLoader(element)
    axios.post(`${APP_URL}/enquiry-quick-view`,{
        enquiry_id   : id,
        preview_table : 1,
        chat_box     : chat, // true | false
    }).then((response) => {
        if(response.status === 200) {
            $("#EnquiryQuickViewPopUp").modal('show')
            document.getElementById("EnquiryQuickViewPopUpContent").innerHTML = response.data
            setTimeout(() => {
                refreshFsLightbox();
            }, 2000);
            stopLoader(element)
        }
    });
}


viewCustomerEnquiryProposal = (id) => {
    $("#CustomerViewProposalModal").modal('show')
    axios.get(`${APP_URL}/proposal-quick-view/${id}`).then((response) => {
        if(response.status === 200) {
            $("#CustomerViewProposalModal").modal('show')
            document.getElementById("CustomerViewProposalModalContent").innerHTML = response.data
            setTimeout(() => {
                refreshFsLightbox();
            }, 2000);
        }
    });
}

PreviousChatHistory = (element, module_id, module_name, menu_name) => {
    startLoader(element)
   
    axios.post(`${APP_URL}/get-message`, {
        module_id   : module_id,
        module_name : module_name,
        menu_name   : menu_name,
        read_status: 1
    }).then(function (response) {
        $(`.inbox_conversation_list_${menu_name}`).html(response.data.conversations)
        $(`.inbox_conversation_list_${menu_name}`).stop().animate({ 
            scrollTop: $(`.inbox_conversation_list_${menu_name}`)[0].scrollHeight
        }, 1000);
        stopLoader(element) 
        Object.entries(element.parentNode.childNodes).map((item) => {
            if(item[1].name == 'message') {
                item[1].value = ''
            }
        })
    }); 
}

refreshData = () => {
    try {
        $('#unattended-enquiries').DataTable().ajax.reload();
    } catch (error) {
        console.log(error)
    }
    try {
        $('#active-enquiries').DataTable().ajax.reload();
    } catch (error) {
        console.log(error)
    }
    try {
        $('#completed-enquiries').DataTable().ajax.reload();
    } catch (error) {
        console.log(error)
    }
}

sendMessage = (element) => { 
    var config = [] 
    Object.entries(element.parentNode.childNodes).map((item) => {
        if(item[1].localName == 'input') { 
            config[item[1].name] =  item[1].value
        }
    })
    if(config.message == '') {
        Message('danger','Can"t send Empty Message !')
        return
    }
    startLoader(element)
    axios.post(`${APP_URL}/send-message`, {
        menu_name   : config.menu_name,
        message     : config.message,
        module_id   : config.module_id,
        module_name : config.module_name
    }).then(function (response) {
        $(`.inbox_conversation_list_${config.menu_name}`).html(response.data.conversations)
        $(`.inbox_conversation_list_${config.menu_name}`).stop().animate({ 
            scrollTop: $(`.inbox_conversation_list_${config.menu_name}`)[0].scrollHeight
        }, 1000);
        stopLoader(element)
        Object.entries(element.parentNode.childNodes).map((item) => {
            if(item[1].name == 'message') {
                item[1].value = ''
            }
        })
    }); 
}

scrollMessage = (menuName) => {
    setTimeout(() => {
        $(`.inbox_conversation_list_${menuName}`).stop().animate({ 
            scrollTop: $(`.inbox_conversation_list_${menuName}`)[0].scrollHeight
        }, 1000);
    }, 500);
}