     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page" >
        <div class="content" ng-controller="DocumentaryController">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
               
            </div>                
            
            <div class="row m-0">
                <div class="col-md-12">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-3">
                            <form class="needs-validations"  novalidate name="frm">

                                <div class="d-flex align-items-center justify-content-around mb-2">
                                    <div class="col">
                                        <label class="form-label" >Title<sup class="text-danger">*</sup></label>
                                        <input type="text" class="form-control"  name="documentary_title"   value="" ng-model="module_enquirie.documentary_title" placeholder="Type Here..." ng-required="true">
                                        <div class="error-msg">
                                            <small class="error-text" ng-if="frm.documentary_title.$touched && frm.documentary_title.$error.required">This field is required!</small> 
                                        </div>
                                    </div>
                                    <div class="col mt-3 mx-2 text-end">
                                        <a class="btn btn-info"
                                            data-bs-toggle="collapse" href="#collapseFour"
                                            aria-expanded="true" aria-controls="collapseFour">
                                            View merge fields  <i
                                                class="mdi mdi-chevron-down accordion-arrow"></i>
                                        </a>
                                    </div>
                                </div>

                                   
                                <div class="accordion custom-accordion" id="custom-accordion-one">
                                    <div class="card mb-0">
                                        <div id="collapseFour" class="collapse show"
                                            aria-labelledby="headingFour"
                                            data-bs-parent="#custom-accordion-one">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-body d-flex">
                                                        <div class="col-md-4 p-0">
                                                        
                                                            <strong>Enquiries</strong>
                                                            <br>
                                
                                                            <div id="dataEnquire"></div>
                                                            
                                                        </div>
                                                        <div class="col-md-4 p-0">
                                                            <strong>Customer</strong> 
                                                            <br>
                                                            <div id="dataCustomer"></div>
                                                        </div>
                                                        <div class="col-md-4 p-0">
                                                            <strong>Others</strong> 
                                                            <br>
                                                            <div id="userData"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-0">
                                 <!-- @{{module_enquirie}} -->
                                        
                                    <div class="col-md-12 mb-1">
                                        <div class="my-2">
                                            <label class="form-label" >Title<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="documentary_title"   value="" ng-model="module_enquirie.documentary_title" placeholder="Type Here..." ng-required="true">
                                            <div class="error-msg">
                                                <small class="error-text" ng-if="frm.documentary_title.$touched && frm.documentary_title.$error.required">This field is required!</small> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <!-- <div class="col-md-12 mb-1">
                                        <div class="my-2">
                                            <label class="form-label" >Documentary Type<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="documentary_type"  ng-minlength="1" ng-model="module_enquirie.documentary_type" placeholder="Type Here..." ng-required="true">
                                            <div class="error-msg">
                                                <small class="error-text" ng-if="frm.documentary_type.$touched && frm.documentary_type.$error.required">This field is required!</small> 
                                            </div>
                                        </div>
                                    </div>   -->
                                
                                    <div class="col-md-12 mb-1">
                                        <textarea name="editor1" id="editor1" >
                                        <table class="table custom table-borderless">
                                            <tr>
                                                <td>
                                                    <h1>{project_name}</h1>
                                                </td>
                                                <td>
                                                    <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Offer: {offer_no}  Revision: {revision_no},<br>
                                                <strong> To</strong><br>
                                                <strong>{full_name}</strong><br>
                                                <strong>{organization_number}</strong><br>
                                              
                                                <strong>{customer_address}</strong><br>

                                                </td>
                                                <td width="20%">Date: {today_date}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Our ref: {admin_user}</td>
                                                <td>Your ref: </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Re.: {document_title}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>1. Leveransepris</strong>
                                                    <ol>
                                                        <li>We thank you for your request and hereby send offers for the provision of engineering services for concrete elements as directed in their attached documents by e-mail of Wednesday 05.01.2022. The project for item delivery is <strong>{project_name}</strong>.</li>
                                                        <li>Chapter 2 below indicates delivery that applies to the price given. We understand that staircases are not included in the price, and that you get hole decks for roofs from others. Thus, hole cover also expires from the delivery. But global statics are to be included. The total price for the delivery of engineering documentation and the relevant project coordination of engineering work are: <strong>{project_cost} kr + mva</strong></li>
                                                        <li>Pris for sideman control is included and responsibility is accepted for RIB engineering of elements with respect to solutions and static strength for all components specified.</li>
                                                        <li>All prices are exclusive of VAT.</li>
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2. Leveransebeskrivelse</strong>
                                                    <p>The delivery includes all digital production drawings for items specified in the delivery price table.</p>
                                                    <p>Structures for documented calculations</p>
                                                    <ol>
                                                        <li>Veggelementer</li>
                                                        <li>Internal Firewall</li>
                                                    </ol>
                                                    <p>Digital produksjonstegninger</p>
                                                    <ol>
                                                        <li>Produksjonstegninger</li>
                                                        <li>All necessary details</li>
                                                        <li>Structure drawings of all elements</li>
                                                        <li>Production drawings of all elements</li>
                                                        <li>Montasjetegninger</li>
                                                    </ol>
                                                </td>                                    
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>3.  Prerequisites, avtale and delivery plan </strong></p> 
                                                    <p><strong>3.1  Prerequisites for offers </strong></p> 
                                                    <p>The offer is based on some assumptions/caveats as follows. If these assumptions are not proved to be true, or otherwise fail or prove incorrect, this may lead to adjustments in progress/fulfilment of the deadlines for consequences from the Purchase Order that are to be perceived as the agreement in this context.</p><br>
                                                    <p>The following assumptions are specified in connection with the offer:</p>
                                                    <ol>
                                                        <li>Agreed project implementation plan - It is therefore assumed that we arrive at an agreed progress plan that is feasible for both parties.  AEC Prefab needs 4-5 weeks from the agreed start-up until we can deliver the product digitally. The pleas agree on a decision plan that has realistic deadlines for feedback and/or confirmation of factors that AEC Prefab needs to clarify in order to maintain the production of drawings and elements  safely in accordance with the agreed progress plan.   It should be added a couple of weeks for slack in relation to this. So 8 weeks of production time looks like a good plan on our part.</li>
                                                        <li>Information about existing buildings - It is assumed that TB will receive an IFC model and sufficient information about existing buildings, including structural details, for modeling the concrete structure and performing static calculations.  This means that reports from previous works are made available to AEC Prefab so that we can ensure power transmissions in a prudent manner.</li>
                                                        <li>Payment plan – AEC Prefab assumes that a agreed payment plan is reached that involves 50% in advance, 50% after completing the assignment, 30 days payment plan. Any changes must be clarified especially along the way.</li>
                                                        <li>The caveats and provisions contained in this offer are repeated in the Purchase Order which, upon signing, applies as an agreement for the assignment.</li>
                                                     
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>3.2  Duration of offer and confirmation</strong>
                                                    <p>Offer valid until 14 days from today' date. If they wish to accept the offer we ask that they confirm this in writing by email before the end of this time.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>3.3  Leveranseplan</strong>
                                                    <p>The start date  of the design assignment is set by the signature of purchase orders that form the basis for our production planning.  An internal progress plan is drawn up for the assignment, in accordance with the aforementioned agreed project execution plan (Egersund Betongteknikk sin project plan) and the assignment then goes into our production plan.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>4. Attachment to offer</strong>
                                                    <p>Nobody</p>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!-- <p><strong>5. Signature</strong></p> -->
                                                    <p>
                                                            For AEC Prefab AS <br><br>
                                                            Sincerely,<br>
                                                            <strong style="font-size: 15px;">{admin_user}</strong><br>
                                                            <strong style="font-size: 15px;">{role}</strong>  <br>
                                                        </p>
                                                </td>
                                            </tr>
                                            </table>
                                        </textarea>
                                    </div>  
                                
                                    <div class="text-end mt-3">
                                        <button type="reset" ng-click="cancelForm();" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                        <button ng-click="submit();" ng-disabled="frm.$invalid || frm.$pending" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Submit </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- <textarea id="textareaid" class="form-control" ></textarea> -->
                <!-- <a href="#" onclick="insertAtCaret('textareaid', '<h1>text to insert</h1>');return false;">Click Here to Insert</a> -->
            </div>
             
        </div> <!-- content -->


    </div> 
   
@endsection
          
@push('custom-styles')
    <style>
        .table tbody tr td {
            padding: 5px !important
        }
        .help-inline {
            position: absolute !important;
            font-size: 12px;
            right: 0;
        }
        .mb-3 {
            position: relative;
        }
        
    
    .error {
      color: red;
    }

    .red-text{
  color:red;
}
  #cke_1_contents{
      height:400px !important;
  }
        
    </style>
    
@endpush

@push('custom-scripts')

    
   
    <script type="text/javascript">
        
      var text;
     $(document).ready(function() {
        // CKEDITOR.replace('body', {height: 1000});
        CKEDITOR.replace( 'editor1' );
        // console.log("t1");
        //without edit ckeditor get content
        text = CKEDITOR.instances.editor1.getData();
        console.log(text);
        // CKEDITOR.instances.my_editor.insertHtml('<p>This is a new paragraph.</p>');
            CKEDITOR.on( 'instanceReady', function( evt )
              {

                var editor = evt.editor;
            
               editor.on('change', function (e) { 
               text = editor.editable().getData();
               console.log("texttt");
                console.log(text);
                });
             });
            
        });
    </script>
    <script>
        //     function insertAtCaret(areaId,text) {
        //     // alert(areaId)
        //     CKEDITOR.instances.editor1.setData(text)
        //     console.log("arearId "+areaId)
        //     console.log("text "+text)
        //     // alert(text)
        //     var txtarea = document.getElementById(areaId);
        //     alert(txtarea)
            
        //     if (!txtarea) {
        //         return;
        //     }

        //     var scrollPos = txtarea.scrollTop;
        //     var strPos = 0;
        //     var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
        //         "ff" : (document.selection ? "ie" : false));
            
        //     if (br == "ie") {
        //         txtarea.focus();
        //         var range = document.selection.createRange();
        //         range.moveStart('character', -txtarea.value.length);
        //         strPos = range.text.length;
        //     } else if (br == "ff") {
        //         strPos = txtarea.selectionStart;
        //     }
        //     alert(txtarea.value)
        //     var front = (txtarea.value).substring(0, strPos);
        //     var back = (txtarea.value).substring(strPos, txtarea.value.length);
        //     alert((txtarea.value).substring(0, strPos))
        //     txtarea.value = front + text + back;
        //     strPos = strPos + text.length;
        //     if (br == "ie") {
        //         txtarea.focus();
        //         var ieRange = document.selection.createRange();
        //         ieRange.moveStart('character', -txtarea.value.length);
        //         ieRange.moveStart('character', strPos);
        //         ieRange.moveEnd('character', 0);
        //         ieRange.select();
        //     } else if (br == "ff") {
        //         txtarea.selectionStart = strPos;
        //         txtarea.selectionEnd = strPos;
        //         txtarea.focus();
        //     }

        //     txtarea.scrollTop = scrollPos;
        // }

        


           

       

        // var app = angular.module('AppSale', []).constant('API_URL', $("#baseurl").val()); 

        app.directive('validFile',function(){
            return {
                require:'ngModel',
                link:function(scope,el,attrs,ngModel){
                //change event is fired when file is selected
                el.bind('change',function(){   
                    scope.$apply(function(){
                        ngModel.$setViewValue(el.val());
                        ngModel.$render(); 
                    })
                })
                }
            }
        })

            const span = document.querySelector("span");

            span.onclick = function() {
              
                document.execCommand("copy");
                }

                span.addEventListener("copy", function(event) {
                event.preventDefault();
                if (event.clipboardData) {
                    event.clipboardData.setData("text/plain", span.textContent);
                    // alert(event.clipboardData.setData("text"))
                }
            });
       

      
      

        app.controller('DocumentaryController', function ($scope, $http, $rootScope,API_URL) { 

                //     $scope.addValue = function(e){
                // // alert(e)

                // $scope.htmlcontent += e;
                // }
          
            $scope.getEnquirieData = function($http, API_URL) { 
           
                        // $http({
                        // method: 'GET',
                        // url: "{{ route('admin.documentary.enquirie') }}",
                        
                        // }).then(function successCallback(response) {
                        //     $scope.enquire_module = response.data;	 
                        // }, function errorCallback(response) {
                            
                        // });
                        
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.documentary.enquirie') }}",
               
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                       var count_data = Object.keys(msg.data).length
                     
                        $.each(msg.data,function(key,value){
                            $('#dataEnquire').append(`
                           
                            <tr>
                                <td>${key} :  <span style="color: blue;">{${value}}</span></td>
                            <tr>
                            `);

                            });
                    }
                    });

           
            }
            // <div onclick="insertAtCaret('textareaid','${value}')">${key} : <a href=""> ${value} </a></div>
            $scope.getCustomerData = function($http, API_URL) {
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.documentary.customer') }}",
               
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                       var count_data = Object.keys(msg.data).length
                     
                        $.each(msg.data,function(key,value){
                            $('#dataCustomer').append(`
                           
                            <tr>
                                <td>${key} :  <span style="color: blue;">{${value}}</span></td>
                            <tr>
                            `);

                            });
                    }
                    });
               
                }
                // <div onclick="insertAtCaret('textareaid','${value}')">${key} : <a href=""> ${value} </a></div>
                $scope.getUserData = function($http, API_URL) {
                   
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.documentary.userData') }}",
               
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                       var count_data = Object.keys(msg.data).length
                     
                        $.each(msg.data,function(key,value){
                            $('#userData').append(`
                            <tr>
                                <td>${key} :  <span style="color: blue;">{${value}}</span></td>
                            <tr>
                            `);

                            });
                    }
                    });
               
                }
                // <div onclick="insertAtCaret('textareaid','${value}')">${key} : <a href=""> ${value} </a></div>
           
            $scope.getEnquirieData($http, API_URL);
            $scope.getCustomerData($http, API_URL);
            $scope.getUserData($http, API_URL);

            $scope.cancelForm = function($http, API_URL) {
                $scope.module_enquirie = {};
                
                CKEDITOR.instances.editor1.setData(`
                            <table class="table custom table-borderless">
                                            <tr>
                                                <td> <h1>{project_name}</h1></td>
                                                <td>
                                                    <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Offer: {offer_no}  Revision: {revision_no},<br>
                                                <strong> To</strong><br>
                                                <strong>{full_name}</strong><br>
                                                <strong>{organization_number}</strong><br>
                                              
                                                <strong>{customer_address}</strong><br>

                                                </td>
                                                <td width="20%">Date: {today_date}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>Our ref: {admin_user}</td>
                                                <td>Your ref: </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Re.: {document_title}</strong></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>1. Leveransepris</strong>
                                                    <ol>
                                                        <li>We thank you for your request and hereby send offers for the provision of engineering services for concrete elements as directed in their attached documents by e-mail of Wednesday 05.01.2022. The project for item delivery is <strong>Viganeset</strong>.</li>
                                                        <li>Chapter 2 below indicates delivery that applies to the price given. We understand that staircases are not included in the price, and that you get hole decks for roofs from others. Thus, hole cover also expires from the delivery. But global statics are to be included. The total price for the delivery of engineering documentation and the relevant project coordination of engineering work are: <strong>160 000 kr + mva</strong></li>
                                                        <li>Pris for sideman control is included and responsibility is accepted for RIB engineering of elements with respect to solutions and static strength for all components specified.</li>
                                                        <li>All prices are exclusive of VAT.</li>
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>2. Leveransebeskrivelse</strong>
                                                    <p>The delivery includes all digital production drawings for items specified in the delivery price table.</p>
                                                    <p>Structures for documented calculations</p>
                                                    <ol>
                                                        <li>Veggelementer</li>
                                                        <li>Internal Firewall</li>
                                                    </ol>
                                                    <p>Digital produksjonstegninger</p>
                                                    <ol>
                                                        <li>Produksjonstegninger</li>
                                                        <li>All necessary details</li>
                                                        <li>Structure drawings of all elements</li>
                                                        <li>Production drawings of all elements</li>
                                                        <li>Montasjetegninger</li>
                                                    </ol>
                                                </td>                                    
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p><strong>3.  Prerequisites, avtale and delivery plan </strong></p> 
                                                    <p><strong>3.1  Prerequisites for offers </strong></p> 
                                                    <p>The offer is based on some assumptions/caveats as follows. If these assumptions are not proved to be true, or otherwise fail or prove incorrect, this may lead to adjustments in progress/fulfilment of the deadlines for consequences from the Purchase Order that are to be perceived as the agreement in this context.</p><br>
                                                    <p>The following assumptions are specified in connection with the offer:</p>
                                                    <ol>
                                                        <li>Agreed project implementation plan - It is therefore assumed that we arrive at an agreed progress plan that is feasible for both parties.  AEC Prefab needs 4-5 weeks from the agreed start-up until we can deliver the product digitally. The pleas agree on a decision plan that has realistic deadlines for feedback and/or confirmation of factors that AEC Prefab needs to clarify in order to maintain the production of drawings and elements  safely in accordance with the agreed progress plan.   It should be added a couple of weeks for slack in relation to this. So 8 weeks of production time looks like a good plan on our part.</li>
                                                        <li>Information about existing buildings - It is assumed that TB will receive an IFC model and sufficient information about existing buildings, including structural details, for modeling the concrete structure and performing static calculations.  This means that reports from previous works are made available to AEC Prefab so that we can ensure power transmissions in a prudent manner.</li>
                                                        <li>Payment plan – AEC Prefab assumes that a agreed payment plan is reached that involves 50% in advance, 50% after completing the assignment, 30 days payment plan. Any changes must be clarified especially along the way.</li>
                                                        <li>The caveats and provisions contained in this offer are repeated in the Purchase Order which, upon signing, applies as an agreement for the assignment.</li>
                                                     
                                                    </ol>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>3.2  Duration of offer and confirmation</strong>
                                                    <p>Offer valid until 14 days from today' date. If they wish to accept the offer we ask that they confirm this in writing by email before the end of this time.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>3.3  Leveranseplan</strong>
                                                    <p>The start date  of the design assignment is set by the signature of purchase orders that form the basis for our production planning.  An internal progress plan is drawn up for the assignment, in accordance with the aforementioned agreed project execution plan (Egersund Betongteknikk sin project plan) and the assignment then goes into our production plan.</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <strong>4. Attachment to offer</strong>
                                                    <p>Nobody</p>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <!-- <p><strong>5. Signature</strong></p> -->
                                                    <p>
                                                        <b>For AEC Prefab AS</b> <br>
                                                        Sincerely,<br>
                                                        {admin_user}<br>
                                                        {role}<br>
            
                                                    </p>
                                                </td>
                                            </tr>
                                            </table>
                            
                            `)

            }
         
            $scope.submit = function () {

                        $scope.module_enquirie.documentary_content = text;
                        console.log($scope.module_enquirie.documentary_content);
						$http({
							method: 'POST',
                            url: API_URL + "admin/documentary",
							data: $.param($scope.module_enquirie),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function successCallback(response) {
                            Message('success', response.data.msg);
                            window.location.href = API_URL +"admin/admin-documentary-view";
                            // CKEDITOR.instances.editor1.setData(` `);
                            // $('#editor1').append(`
                            // `);


                        }, function errorCallback(response) {
                          
                            Message('danger',response.data.errors.documentary_title);
                        });
			}
              
            
            
        }); 
       
            
       


    </script>
@endpush