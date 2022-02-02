     
@extends('layouts.admin')

@section('admin-content')
         
    
    <div class="content-page" ng-app="AppSale">
        <div class="content" ng-controller="DocumentaryController">

            @include('admin.includes.top-bar')

            <!-- Start Content-->
            <div class="container-fluid">
                
                <!-- start page title -->
                
                @include('admin.includes.page-navigater') 
               
            </div>                
            
            <div class="row m-0">
                <div class="col-md-6 ">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-3">
                            <form class="needs-validations"  novalidate name="frm">
                                <div class="row m-0">
                                 @{{module_enquirie}}
                                        
                                    <div class="col-md-12 mb-1">
                                        <div class="my-2">
                                            <label class="form-label" >Title<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control"  name="documentary_title"   value="" ng-model="module_enquirie.documentary_title" placeholder="Type Here..." ng-required="true">
                                            <div class="error-msg">
                                                <small class="error-text" ng-if="frm.documentary_title.$touched && frm.documentary_title.$error.required">This field is required!</small> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                
                                    <div class="col-md-12 mb-1">
                                        <div class="my-2">
                                            <label class="form-label" >Documentary Type<sup class="text-danger">*</sup></label>
                                            <input type="text" class="form-control" name="documentary_type"  ng-minlength="1" ng-model="module_enquirie.documentary_type" placeholder="Type Here..." ng-required="true">
                                            <div class="error-msg">
                                                <small class="error-text" ng-if="frm.documentary_type.$touched && frm.documentary_type.$error.required">This field is required!</small> 
                                            </div>
                                        </div>
                                    </div>  
                                
                                    <div class="col-md-12 mb-1">
                                   
                                      
                                        <h3>Editor</h3>
                                        <button ng-click="disabled = !disabled" unselectable>Disable text-angular Toggle</button>
                                        <div text-angular="text-angular" name="htmlcontent"  id="divID"  ng-model="htmlcontent">
                                            <!-- <textarea id="textareaid" class="form-control" ></textarea> -->
                                        </div>
                                       
                                        <!-- <textarea ng-model="htmlcontent" id="textareaid" style="width: 100%"></textarea> -->
                                      
                                        <div ng-bind-html="documentary_content"></div>
                                        
                                        <!-- <div ta-bind="text" ng-model="documentary_content" ta-readonly='disabled'></div> -->
                                        <!-- <button type="button" ng-click="htmlcontent = orightml">Reset</button> -->
                                        
                                        <!-- <text-angular name="htmlcontent"><p>Any <b>HTML</b> we put in-between the text-angular tags gets automatically put into the editor if there <strong style="font-size: 12pt;"><u><em>is not</em></u></strong> a ngModel</p></text-angular> -->

                                        <!-- <textarea id="simplemde1" name="documentary_content"  ng-model="documentary_content"></textarea> -->
                                            
                                    </div>  
                                
                                    <div class="text-end mt-3">
                                        <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                        <button ng-click="submit();" ng-disabled="frm.$invalid || frm.$pending" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
                <div class="col-md-3">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-4">
                            <strong>Enquiries</strong>
                            <br>
                               
                                <tr>
                                   
                                    <td> 
                                        <label for="">Enquiry Date:</label>
                                        <a href="" ng-click="addValue(enquire_module.Enquiry_Date)">{ @{{ enquire_module.Enquiry_Date }} }</a><br>
                                    </td>
                                    <td>
                                        <label for="">Enquiry Number:</label>
                                        <a href="" ng-click="addValue(enquire_module.Enquiry_Number)">{ @{{ enquire_module.Enquiry_Number }} }</a><br>
                                    </td>                                  
                                    <td>
                                        <label for="">Company Name:</label>
                                        <a href="" ng-click="addValue(enquire_module.Company_Name)">{ @{{ enquire_module.Company_Name }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Contact Person:</label>
                                        <a href="" ng-click="addValue(enquire_module.Contact_Person)">{ @{{ enquire_module.Contact_Person }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Mobile Number:</label>
                                        <a href="" ng-click="addValue(enquire_module.Mobile_Number)">{ @{{ enquire_module.Mobile_Number }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Secondary Mobile Number:</label>
                                        <a href="" ng-click="addValue(enquire_module.Secondary_Mobile_Number)">{ @{{ enquire_module.Secondary_Mobile_Number }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Customer Id:</label>
                                        <a href="" ng-click="addValue(enquire_module.Customer_Id)">{ @{{ enquire_module.Customer_Id }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Service Id:</label>
                                        <a href="" ng-click="addValue(enquire_module.Service_Id)">{ @{{ enquire_module.Service_Id }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Building Type Id :</label>
                                        <a href="" ng-click="addValue(enquire_module.Building_Type_Id)">{ @{{ enquire_module.Building_Type_Id }} }</a><br>
                                    </td>  

                                    <td>
                                        <label for="">Delivery Type Id:</label>
                                        <a href="" ng-click="addValue(enquire_module.Delivery_Type_Id)">{ @{{ enquire_module.Delivery_Type_Id }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Project Type Id:</label>
                                        <a href="" ng-click="addValue(enquire_module.Project_Type_Id)">{ @{{ enquire_module.Project_Type_Id }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Project Name:</label>
                                        <a href="" ng-click="addValue(enquire_module.Project_Name)">{ @{{ enquire_module.Project_Name }} }</a><br>
                                    </td>
                                    <td>
                                        <label for="">Project Date:</label>
                                        <a href="" ng-click="addValue(enquire_module.Project_Date)">{ @{{ enquire_module.Project_Date }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Place:</label>
                                        <a href="" ng-click="addValue(enquire_module.Place)">{ @{{ enquire_module.Place }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Site Address:</label>
                                        <a href="" ng-click="addValue(enquire_module.Site_Address)">{ @{{ enquire_module.Site_Address }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Country:</label>
                                        <a href="" ng-click="addValue(enquire_module.Country)">{ @{{ enquire_module.Country }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Zipcode:</label>
                                        <a href="" ng-click="addValue(enquire_module.Zipcode)">{ @{{ enquire_module.Zipcode }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> State:</label>
                                        <a href="" ng-click="addValue(enquire_module.State)">{ @{{ enquire_module.State }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> No Of Building:</label>
                                        <a href="" ng-click="addValue(enquire_module.No_Of_Building)">{ @{{ enquire_module.No_Of_Building }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Project Delivery Date:</label>
                                        <a href="" ng-click="addValue(enquire_module.Project_Delivery_Date)">{ @{{ enquire_module.Project_Delivery_Date }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Status:</label>
                                        <a href="" ng-click="addValue(enquire_module.Status)">{ @{{ enquire_module.Status }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Project Info:</label>
                                        <a href="" ng-click="addValue(enquire_module.Project_Info)">{ @{{ enquire_module.Project_Info }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Service:</label>
                                        <a href="" ng-click="addValue(enquire_module.Service)">{ @{{ enquire_module.Service }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Ifc Model Upload:</label>
                                        <a href="" ng-click="addValue(enquire_module.Ifc_Model_Upload)">{ @{{ enquire_module.Ifc_Model_Upload }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Building Component:</label>
                                        <a href="" ng-click="addValue(enquire_module.Building_Component)">{ @{{ enquire_module.Building_Component }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Active:</label>
                                        <a href="" ng-click="addValue(enquire_module.Active)">{ @{{ enquire_module.Active }} }</a><br>
                                    </td>  

                                </tr> 
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-4">
                            <strong>Customer</strong>
                            <br>
                               
                                <tr>
                                   
                                    <td> 
                                        <label for="">Customer Enquiry Date:</label>
                                        <a href="" ng-click="addValue(customer_module.Customer_Enquiry_Date)">{ @{{ customer_module.Customer_Enquiry_Date }} }</a><br>
                                    </td>
                                    <td>
                                        <label for="">First Name :</label>
                                        <a href="" ng-click="addValue(customer_module.First_Name)">{ @{{ customer_module.First_Name }} }</a><br>
                                    </td>                                  
                                    <td>
                                        <label for=""> Last Name:</label>
                                        <a href=""  ng-click="addValue(customer_module.Last_Name)">{ @{{ customer_module.Last_Name }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Full Name :</label>
                                        <a href=""  ng-click="addValue(customer_module.Full_Name)">{ @{{ customer_module.Full_Name }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Email :</label>
                                        <a href=""  ng-click="addValue(customer_module.Email)">{ @{{ customer_module.Email }} }</a><br>
                                    </td>  
                                    <!-- <td>
                                        <label for=""> Password:</label>
                                        <a href=""  ng-click="addValue(customer_module.Password)">{ @{{ customer_module.Password }} }</a><br>
                                    </td>   -->
                                    <!-- <td>
                                        <label for="">Password View:</label>
                                        <a href=""  ng-click="addValue(customer_module.Password_View)">{ @{{ customer_module.Password_View }} }</a><br>
                                    </td>   -->
                                    <td>
                                        <label for="">Mobile Number:</label>
                                        <a href=""  ng-click="addValue(customer_module.Mobile_Number)">{ @{{ customer_module.Mobile_Number }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for=""> Company Name:</label>
                                        <a href=""  ng-click="addValue(customer_module.Company_Name)">{ @{{ customer_module.Company_Name }} }</a><br>
                                    </td>  

                                    <td>
                                        <label for="">Contact Person :</label>
                                        <a href=""  ng-click="addValue(customer_module.Contact_Person)">{ @{{ customer_module.Contact_Person }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Remarks :</label>
                                        <a href=""  ng-click="addValue(customer_module.Remarks)">{ @{{ customer_module.Remarks }} }</a><br>
                                    </td>  
                                    <td>
                                        <label for="">Active:</label>
                                        <a href=""  ng-click="addValue(customer_module.Active)">{ @{{ customer_module.Active }} }</a><br>
                                    </td>
                                </tr> 
                        </div>
                    </div>
                </div>
                <textarea id="textareaid" class="form-control" ></textarea>
                <a href="#" onclick="insertAtCaret('textareaid', '<h1>text to insert</h1>');return false;">Click Here to Insert</a>
                    <!-- <input type="button" ng-click="addValue()" value="clickme"/> -->
            </div>
             
        </div> <!-- content -->


    </div> 
    <!-- ng-disabled="frm.$invalid"  -->
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
  
        
    </style>
    <style>
    .ta-editor {
  min-height: 300px;
  height: auto;
  overflow: auto;
  font-family: inherit;
  font-size: 100%;
}
</style>
@endpush

@push('custom-scripts')

<script>
function insertAtCaret(areaId, text) {
   
  var txtarea = document.getElementById(areaId);
 
  if (!txtarea) {
    return;
  }

  var scrollPos = txtarea.scrollTop;
  var strPos = 0;
  var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
    "ff" : (document.selection ? "ie" : false));
  
  if (br == "ie") {
    txtarea.focus();
    var range = document.selection.createRange();
    range.moveStart('character', -txtarea.value.length);
    strPos = range.text.length;
  } else if (br == "ff") {
    strPos = txtarea.selectionStart;
  }
// alert(txtarea.value)
  var front = (txtarea.value).substring(0, strPos);
  var back = (txtarea.value).substring(strPos, txtarea.value.length);
  txtarea.value = front + text + back;
  strPos = strPos + text.length;
  if (br == "ie") {
    txtarea.focus();
    var ieRange = document.selection.createRange();
    ieRange.moveStart('character', -txtarea.value.length);
    ieRange.moveStart('character', strPos);
    ieRange.moveEnd('character', 0);
    ieRange.select();
  } else if (br == "ff") {
    txtarea.selectionStart = strPos;
    txtarea.selectionEnd = strPos;
    txtarea.focus();
  }

  txtarea.scrollTop = scrollPos;
}
</script>
    <script>

       

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

//   **********editor*******

		$scope.orightml = '';
		$scope.htmlcontent = $scope.orightml;
		$scope.disabled = false;
// alert($scope.orightml)


//        **********editor*******
$scope.addValue = function(e){
    // alert(e)

       $scope.htmlcontent += e;
     }

            $scope.getEnquirieData = function($http, API_URL) {

            angular.element(document.querySelector("#loader")).removeClass("d-none"); 
            $http({
                method: 'GET',
                url: API_URL + "admin/documentary/enquirie",
            }).then(function (response) {
                // alert(JSON.stringify(response.data))
                $scope.enquire_module = response.data;	
               
            }, function (error) {
                console.log(error);
               
            });

           
            }
           
            $scope.getCustomerData = function($http, API_URL) {
                angular.element(document.querySelector("#loader")).removeClass("d-none"); 

                $http({
                    method: 'GET',
                    url: API_URL + "admin/documentary/customer",
                }).then(function (response) {
                    // alert(JSON.stringify(response))
                    $scope.customer_module = response.data;		
                }, function (error) {
                    console.log(error);
                
                });
                }

            $scope.getCustomerData($http, API_URL);
            $scope.getEnquirieData($http, API_URL);

         
            $scope.submit = function () {
            
                
            console.log($('#snow-editor').val());
            // console.log($('#simplemde1').val());
                        // alert(url)
                        console.log($scope.module_enquirie.documentary_content);
						$http({
							method: 'POST',
                            url: API_URL + "admin/documentary",
							data: $.param($scope.module_enquirie),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function successCallback(response) {
                            
                            
                            $scope.getCustomerData($http, API_URL);
                            $scope.getEnquirieData($http, API_URL);
                            Message('success', response.data.msg);

                        }, function errorCallback(response) {
                          
                            Message('danger',response.data.errors.documentary_title);
                        });
			    }
              
            
            
        }); 
       
            
             
        Message = function (type, head) {
            $.toast({
                heading: head,
                icon: type,
                showHideTransition: 'plain', 
                allowToastClose: true,
                hideAfter: 5000,
                stack: 10, 
                position: 'bootom-left',
                textAlign: 'left', 
                loader: true, 
                loaderBg: '#252525',                
            });
        }


    </script>
@endpush