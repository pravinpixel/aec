 
<meta charset="utf-8" />
@if (Route::is('login'))
<title> AEC Prefab | Sign in</title>
@else 
<title> AEC Prefab | Customer Portal</title>
@endif
<meta http-equiv='cache-control' content='no-cache'>
<meta http-equiv='expires' content='0'>
<meta http-equiv='pragma' content='no-cache'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{ url('') }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
 
<!-- App css -->
<link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"  />
{{-- <link href="{{ asset('public/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" /> --}}
 
<!-- Icons Css -->
<link rel="stylesheet" href="{{ asset('public/assets/css/cdns/font-awesome.min.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('public/assets/css/cdns/font-awesome-line-awesome-all.min.css') }}"> --}}
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
{{-- <link rel="stylesheet" href="{{ asset('public/assets/css/cdns/feather.css') }}">  --}}
<link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css">

<input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">
<link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/wizz.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/assets/css/pages/customer-enquiry.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/css/angularjs/ui-notification.css') }}">

<!-- SimpleMDE css -->
<link href="{{ asset('public/assets/css/vendor/simplemde.min.css') }}" rel="stylesheet" type="text/css" />

<!-- ====== Ajax Call Loader Css ========== -->
<link rel='stylesheet' href='{{ asset('public/assets/css/cdns/loading-bar.min.css') }}' type='text/css' media='all' />
<!-- ========= Alert js Notifications ========== -->

<!-- ========= Text Editor ========== -->
{{-- <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.7/css/dx.common.css" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/css/cdns/dx.light.css') }}" /> --}}
<link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/21.2.5/css/dx.light.css" />
<!-- ========= Text Editor ========== -->
<link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('public/assets/css/cdns/bootstrap-icons.css') }}" integrity="sha384-xeJqLiuOvjUBq3iGOjvSQSIlwrpqjSHXpduPd6rQpuiM3f5/ijby8pCsnbu5S81n" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css" integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('public/custom/css/date-picker.css') }}"> 
<style>
   
    .conversation-list  li.Customer_odd {
        flex-direction: row-reverse;
    }
    .conversation-list  li.Customer_odd  .conversation-text {
        background: #BFDDFE;
        padding: 10px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: right;
        position: relative;
    } 

    .conversation-list  li.Admin_odd  .conversation-text {
        background: #eee;
        padding: 10px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: left;
        position: relative;
    }  
    .conversation-list  li.Customer_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #BFDDFE;
        top: 0;
        clip-path:polygon(0 100%, 0 0, 100% 0, 37% 100%)       
    } 
    .conversation-list  li.Admin_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #eee;
        top: 0;
        clip-path:polygon(0 9%, 0 0, 100% 0, 103% 100%) ;
        left:-18px !important
    }    
    .form-control.ng-valid.ng-touched ,
    .form-select.ng-valid.ng-touched {
    border-bottom: 1px solid #008a60 !important
    }
    .activeTab {
        pointer-events: none;
    }
</style>