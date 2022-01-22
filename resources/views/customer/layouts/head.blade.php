 
<meta charset="utf-8" />
<title> AEC Prefab | Customer Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />

<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

<!-- App css -->
<link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css" id="light-style" />
<link href="{{ asset('public/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
<link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">
<style>
    .filepond--credits {
        display: none !important
    }
    .alert {
        width: 300px;
        position: fixed;
        top: 20px;
        right: 20px;
        box-shadow: 2px 2px 3px;
        z-index: 11 !important;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-direction: row-reverse;
        font-weight: bold;
        font-weight: bold;
        opacity: .8;
        text-transform: lowercase !important;
    }
    
    .invert {
        filter: invert(1) !important
    }
</style>