<meta charset="utf-8" />
<title> AEC Prefab | Admin Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
<input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">

<!-- App css -->
<link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css"   />
<link href="{{ asset('public/assets/css/app.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
<link rel="stylesheet" href="{{ asset('public/custom/css/alert.css') }}">
<!-- Icons Css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- custom css -->
<link rel="stylesheet" href="{{ asset('public/custom/css/variable.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/app.css') }}"> 
<link rel="stylesheet" href="{{ asset('public/custom/css/table.css') }}"> 

<link href="{{ asset('public/assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
<link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />

<!-- ====== Ajax Call Loader Css ========== -->
<link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.9.0/loading-bar.min.css' type='text/css' media='all' />
<!-- ========= Alert js Notifications ========== -->
<link rel="stylesheet" href="{{ asset('public/custom/css/wizz.css') }}"> 


<style>
    .font-weight-bold {
        font-weight: bold !important
    }
    .font-weight-bold td {
        font-weight: bold !important

    }
    .font-weight-bold * {
        font-weight: bold !important

    }
    .conversation-list  li.Admin_odd {
        flex-direction: row-reverse;
    }
    .conversation-list  li.Admin_odd  .conversation-text {
        background: #BFDDFE;
        padding: 15px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: right;
        position: relative;
    } 

    .conversation-list  li.Customer_odd  .conversation-text {
        background: #eee;
        padding: 15px;
        font-size: 14px;
        font-weight: bold ;
        border-radius: 5px;
        text-align: left;
        position: relative;
    }  
    .conversation-list  li.Admin_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #BFDDFE;
        top: 0;
        clip-path:polygon(0 100%, 0 0, 100% 0, 37% 100%)       
    } 
    .conversation-list  li.Customer_odd  .conversation-text::after{
        position: absolute;
        content: '';
        width: 25px;
        height: 25px;
        background: #eee;
        top: 0;
        clip-path:polygon(0 9%, 0 0, 100% 0, 103% 100%) ;
        left:-11px !important
    }    
</style>
