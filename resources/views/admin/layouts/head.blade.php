 
<meta charset="utf-8" />
<title> AEC Prefab | Admin Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
<meta content="Coderthemes" name="author" />

<!-- App favicon -->

{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css" rel="stylesheet" /> --}}

<link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">
<input type="hidden" name="baseurl" value="{{URL::to('/')}}/" id="baseurl">
<!-- App css -->

<link href="{{ asset('public/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('public/assets/css/app.css') }}"  rel="stylesheet" type="text/css" id="light-style" />
<link href="{{ asset('public/assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">

<link rel="stylesheet" href="https://dropways.github.io/feathericons/assets/themes/twitter/css/feather.css"> 
<link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
<style>
    
        .filepond--credits {
            display: none !important
        }
        .table td,th {
            padding: 5px 10px !important     ;
            vertical-align: middle !important
        }
        .table thead,th {
            background: #757CF2 !important;
            color: white !important
        }
        .table tbody thead,th {
            color: white !important ;
            background: #757CF2 !important
        }
        #scroll-vertical-datatable th{
            padding:  0px !important     
        }
        
        #scroll-vertical-datatable_wrapper .row:nth-child(1) {
            display: none !important
        }
        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before {
            top : 2px !important
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after {
            top : 2px !important
        }
        
            @keyframes pop {
                0%    { transform: translateY(-6px) }
                100%  { transform: translateY(0px) }
            }
            /* Custom style */
            .error-msg {
                position: relative; 
            }
            .error-text , .error {
                /* position: absolute; */
                left: 0;
                top: 50%;
                color: red;
                animation: pop .2s;
                /* font-size: 0.75rem !important; */
                font-weight: normal !important;
            }
            .invert {
                filter: invert(1) !important
            }
            .accordion-button::after {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%)
            }
            .accordion-button::before {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(90deg)
            }
            .accordion-button:not(.collapsed)::after {
                position: absolute;
                content: "";
                height: 7px;
                width: 2px;
                background: white;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) rotate(90deg)
            }
            .accordion-button{
                padding: 7px 6px;
                position: relative;
                cursor: pointer;
            }
            .icon {
                margin-right: 10px !important
            }
            .linear-activity {
                overflow: hidden;
                width: 100%;
                height: 4px;
                background-color: #E6E7FC;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 11111111111 !important;
            }

            .determinate {
                position: relative;
                max-width: 100%;
                height: 100%;
                -webkit-transition: width 200ms ease-out .5s;
                -moz-transition: width 200ms ease-out .5s;
                    -o-transition: width 200ms ease-out .5s;
                        transition: width 200ms ease-out .5s;
                background-color: #757CF2;
            }

            .indeterminate {
                position: relative;
                width: 100%;
                height: 100%;
            }

            .indeterminate:before {
                content: '';
                position: absolute;
                height: 100%;
                background-color: #757CF2;
                animation: indeterminate_first .5s infinite ease-out;
            }

            .indeterminate:after {
                content: '';
                position: absolute;
                height: 100%;
                background-color: #757CF2;
                animation: indeterminate_second .5s infinite ease-in;
            }
            .ng-touched.ng-invalid-required , input.error{     
                /* border-color: #dc3545; */
                border-bottom: red solid 1px ;
                /* background-image: url("https://cdn-icons-png.flaticon.com/512/179/179386.png");
                background-repeat: no-repeat;
                background-position: right calc(0.375em + 0.1875rem) center;
                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem); */
            } 
            /* .ng-touched.ng-valid-required {
                border-color: #198754;
                background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0naHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmcnIHZpZXdCb3g9JzAgMCA4IDgnPjxwYXRoIGZpbGw9JyMxOTg3NTQnIGQ9J00yLjMgNi43M0wuNiA0LjUzYy0uNC0xLjA0LjQ2LTEuNCAxLjEtLjhsMS4xIDEuNCAzLjQtMy44Yy42LS42MyAxLjYtLjI3IDEuMi43bC00IDQuNmMtLjQzLjUtLjguNC0xLjEuMXonLz48L3N2Zz4=");
                background-repeat: no-repeat;   
                background-position: right calc(0.375em + 0.1875rem) center;
                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
            } */
           
            .ng-touched.ng-invalid-pattern ,  .ng-invalid-email.ng-valid-required , .ng-invalid-maxlength{
                border-bottom: red solid 1px  !important;
                background-image: none !important
                /* border-color: #dc3545 !important;
                background-image: url("https://cdn-icons-png.flaticon.com/512/179/179386.png") !important;
                background-repeat: no-repeat !important;
                background-position: right calc(0.375em + 0.1875rem) center !important;
                background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem) !important; */
            }

            @keyframes indeterminate_first {
                0% {
                    left: -100%;
                    width: 100%;
                }
                100% {
                    left: 100%;
                    width: 10%;
                }
            }

            @keyframes indeterminate_second {
                0% {
                    left: -150%;
                    width: 100%;
                }
                100% {
                    left: 100%;
                    width: 10%;
                }
            }
</style>