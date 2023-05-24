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

<script data-require="jquery@*" data-semver="2.0.3" src="{{ asset('public/assets/js/cdns/admin/jquery-2.0.3.min.js') }}"></script>
<script data-require="jqueryui@*" data-semver="1.10.0" src="{{ asset('public/assets/js/cdns/admin/jquery-ui.js') }}"></script>
<script src='{{ asset('public/assets/js/cdns/admin/angular.min.js') }}'></script>
<script src="{{ asset('public/assets/js/cdns/admin/angular-route.min.js') }}"></script>
<script src='{{ asset('public/assets/js/cdns/admin/textAngular.min.js') }}'></script>
<script src="{{ asset('public/assets/js/cdns/admin/scrollglue.js') }}"></script>
<script src='{{ asset('public/assets/js/cdns/admin/angular-sanitize.min.js') }}'></script>
<script type="text/javascript" src="{{ asset('public/custom/js/date-picker.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.2/rollups/md5.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-animate.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-aria.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-messages.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/t-114/svg-assets-cache.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.2.5/angular-material.js"></script>

<!-- ====== Ajax Call Loader Js ========== -->
<script type='text/javascript' src='{{ asset('public/assets/js/cdns/admin/loading-bar.min.js') }}'>
</script>

<!-- ==== For Angular JS Data Table  -->
<script src="{{ asset('public/assets/js/cdns/admin/angular-datatables.js') }}"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- =========  Angular APP ======== JS -->
<script src="{{ asset('public/custom/js/ngControllers/ngApp.js') }}"></script>

<!-- =========  Alerts JS ======== JS -->

<script src="{{ asset('public/custom/js/ngControllers/alerts.js') }}"></script>
<script src="{{ asset('public/assets/js/cdns/admin/sweetalert.min.js') }}"></script>
<script src="{{ asset('public/assets/js/cdns/admin/sweetalert2@11') }}"></script>

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
<script src="{{ asset('public/assets/js/cdns/admin/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/js/cdns/admin/moment-with-locales.js') }}"></script>
<script src="{{ asset('public/assets/js/cdns/admin/axios.min.js') }}"></script>
<!-- ========= For Vendors Js ===========-->
<!-- ========= For Validation Js ===========-->

<!-- ========= Text Editor ========== -->
<script src="{{ asset('public/assets/js/cdns/admin/dx-quill.min.js') }}"></script>
<script src="{{ asset('public/assets/js/cdns/admin/dx.all.js') }}"></script>

<script type="text/javascript" src="{{ asset('public/assets/js/cdns/admin/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/cdns/admin/daterangepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("public/js/datepicker.js") }}"></script>
<script type="text/javascript" src="{{ asset("public/js/ckeditor.js") }}"></script>
<script>
    SetEditor = (element) => {
        ClassicEditor.create( document.querySelector(element)).then( newEditor  => {
            editor = newEditor;
            if(element == '#customer_comments') {
                newEditor.enableReadOnlyMode(element);
            }
            else if(element == '#admin_comments'){
                newEditor.ui.focusTracker.on('change:isFocused', (evt, name, isFocused) => {
                            if (!isFocused) {
                                console.log('check');
                                getAdminCKValue();
                            }
                });
            }
        }).catch( error => {
            console.error( error.stack );
        });
    }
</script>
<script>
    $(".alert.alert-custom").fadeTo(3000, 1000).slideUp(1000, function() {
        $(".alert.alert-custom").slideUp(1000);
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
