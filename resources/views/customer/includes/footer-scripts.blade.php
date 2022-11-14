<!-- bundle -->
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('public/assets/js/app.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/buttons.bootstrap5.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/buttons.print.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/dataTables.select.min.js') }}"></script>
{{-- <script src="{{ asset('public/assets/js/pages/demo.datatable-init.js') }}"></script> --}}
{{-- <script src="{{ asset('public/assets/js/pages/demo.form-wizard.js') }}"></script> --}}
<script src="{{ asset('public/assets/js/vendor/dropzone.min.js') }}"></script>
<script src="{{ asset('public/assets/js/ui/component.fileupload.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/handlebars.min.js') }}"></script>
<script src="{{ asset('public/assets/js/vendor/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/demo.typehead.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/demo.timepicker.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- Drog and Drop JS --}}
<link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
<script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>

{{-- Angular JS  --}}
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular-route.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
<script src="https://cdn.rawgit.com/Luegg/angularjs-scroll-glue/master/src/scrollglue.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ng-ckeditor/0.2.1/ng-ckeditor.min.js"></script>

<script src="{{ asset("public/custom/js/ngControllers/alerts.js") }}"></script>
<script src="{{ asset('public/assets/js/angularjs/ui-notification.js') }}"></script>
<script src="{{ asset('public/custom/js/ngControllers/ngCustomerApp.js') }}"></script>
<script src="{{ asset('public/assets/js/pages/customers/directives.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('public/assets/js/custom.js') }}"></script>
{{-- Angular JS  --}}


<!-- ========= Text Editor ========== -->
<script src="https://unpkg.com/devextreme-quill@1.5.14/dist/dx-quill.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/21.2.7/js/dx.all.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{ asset("public/js/datepicker.js") }}"></script>
<!-- ========= Text Editor ========== -->

<script type="text/javascript" src="{{ asset("public/js/ckeditor.js") }}"></script>
<script>
    SetEditor = (element) => {
        ClassicEditor.create( document.querySelector(element)).then( editor => {
            console.log( 'Editor was initialized', editor );
            if(element=='#aec_admin_client_page'){
                editor.enableReadOnlyMode( element );
            }
            else if(element=='#aec_client_client_page'){
                editor.ui.focusTracker.on('change:isFocused', (evt, name, isFocused) => {
                            if (!isFocused) {
                                // Do whatever you want with current editor data:
                                console.log('check');
                                clientComment();
                            }
                });
            }
        }).catch( error => {
            console.error( error.stack );
        });
    }
</script> 
<script>
    $("#alert-log").fadeTo(3000, 1000).slideUp(1000, function(){
        $("#alert-log").slideUp(5000);
    }); 
</script>