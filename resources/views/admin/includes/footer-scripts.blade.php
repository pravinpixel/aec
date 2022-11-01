<!-- =============== App JS  ===========-->
<script src="{{ asset('public/assets/js/vendor.min.js') }}"></script>
<script src="{{ asset('public/assets/js/app.js') }}"></script> 

<!-- ==== For Angular JS  -->
  
{{-- <link data-require="jqueryui@*" data-semver="1.10.0" rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/css/smoothness/jquery-ui-1.10.0.custom.min.css" />
<script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script> --}}
{{-- <script data-require="angular.js@1.2.0-rc3-nonmin" data-semver="1.2.0-rc3-nonmin" src="http://code.angularjs.org/1.2.0-rc.3/angular.js"></script> --}}
{{-- <script src="https://code.angularjs.org/1.8.2/angular.min.js"></script>  --}}
{{-- <script src="https://code.angularjs.org/1.8.2/angular-route.min.js"></script> --}}


{{-- Sortable Js --}}

<script data-require="jquery@*" data-semver="2.0.3" src="https://code.jquery.com/jquery-2.0.3.min.js"></script>
<script data-require="jqueryui@*" data-semver="1.10.0" src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.10.0/jquery-ui.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.7.8/angular.min.js'></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-route.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/textAngular/1.1.2/textAngular.min.js'></script>
<script src="https://cdn.rawgit.com/Luegg/angularjs-scroll-glue/master/src/scrollglue.js"></script>
<script src='https://ajax.googleapis.com/ajax/libs/angularjs/1.2.4/angular-sanitize.min.js'></script>
<script type="text/javascript" src="{{ asset("public/custom/js/date-picker.js") }}"></script>





<!-- ====== Ajax Call Loader Js ========== -->
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/angular-loading-bar/0.9.0/loading-bar.min.js'></script>

<!-- ==== For Angular JS Data Table  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.4.3/angular-datatables.js"  crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- =========  Angular APP ======== JS -->
<script src="{{ asset("public/custom/js/ngControllers/ngApp.js") }}"></script>

<!-- =========  Alerts JS ======== JS -->

<script src="{{ asset("public/custom/js/ngControllers/alerts.js") }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ========= For Vendors Js ===========-->


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
<script src="{{ asset('public/assets/js/vendor/apexcharts.min.js') }}"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js" integrity="sha512-odNmoc1XJy5x1TMVMdC7EMs3IVdItLPlCeL5vSUPN2llYKMJ2eByTTAIiiuqLg+GdNr9hF6z81p27DArRFKT7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- ========= For Vendors Js ===========-->
<!-- ========= For Validation Js ===========-->

<!-- ========= Text Editor ========== -->
<script src="https://unpkg.com/devextreme-quill@1.5.14/dist/dx-quill.min.js"></script>
<script src="https://cdn3.devexpress.com/jslib/21.2.7/js/dx.all.js"></script>
 
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script type="text/javascript" src="{{ asset("public/js/datepicker.js") }}"></script>
<script src="{{ asset('public/custom/js/ckeditor.js') }}"></script>
<script>
    $("#alert-log").fadeTo(3000, 1000).slideUp(1000, function(){
        $("#alert-log").slideUp(5000);
    }); 
</script>

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
    (function($) {
        $(function() {
            var isoCountries = [
                { value: 'NO', id : '47', text: 'NOR (+47)'},
                { value: 'IN', id : '91', text: 'IND (+91)'}, 
                { value: 'US', id : '1', text:  'USA (+1 )'},
                { value: 'SG', id : '65', text: 'SGP (+65)'},
            ];
            
            function formatCountry (country) {
                if (!country.value) { return country.text; }
                var $country = $(`
                    <span class="flag-icon flag-icon-${country.value.toLowerCase()} flag-icon-squared"></span>
                    <span class="flag-text ps-1"><small>${country.text}</small></span>"
                `);
                return $country;
            };
            $("#country_code").select2({
                placeholder   : "Select a country",
                templateResult: formatCountry,
                data          : isoCountries
            });
        
            $('#country_code').on('change', function(e) { 
                Livewire.emit('listenerReferenceHere', 
                $("#country_code").select2({
                    placeholder   : "Select a country",
                    templateResult: formatCountry,
                    data          : isoCountries
                }));
            });
        });
    })(jQuery);     
</script> --}}