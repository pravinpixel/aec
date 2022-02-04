     
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
                <div class="col-md-6 ">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-3">
                            <form class="needs-validations"  novalidate name="frm">
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
                                        <textarea name="editor1" id="editor1" ng-model="module_enquirie.documentary_content">
                                            
                                        </textarea>
                                    </div>  
                                
                                    <div class="text-end mt-3">
                                        <button type="reset" class="btn btn-outline-secondary font-weight-bold px-3"><i class="fa fa-ban "></i> Cancel</button>
                                        <button ng-click="submit(module_enquirie.id);" ng-disabled="frm.$invalid || frm.$pending" class="btn btn-primary font-weight-bold px-3"><i class="fa fa-check-circle "></i> Send </button>
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

                            <!-- <div ng-repeat="(key,value) in enquire_module" ng-click="insertAtCaret(value)">@{{key}} : <a>{ @{{value}} }</a></div> -->
                            <div id="dataEnquire"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-0">
                    <div class="card shadow-lg mb-0">
                        <div class="card-body p-4">
                            <strong>Customer</strong> 
                            <br>
                            <div id="dataCustomer"></div>
                            <!-- <div ng-repeat="(key,value) in customer_module">@{{key}} : <a>{ @{{value}} }</a></div> -->
                        </div>
                    </div>
                    <div class="card shadow-lg mb-0 mt-3">
                        <div class="card-body p-4">
                            <strong>Customer</strong> 
                            <br>
                            <div id="userData"></div>
                            <!-- <div ng-repeat="(key,value) in customer_module">@{{key}} : <a>{ @{{value}} }</a></div> -->
                        </div>
                    </div>
                    </div>
                </div>
                <!-- <textarea id="textareaid" class="form-control" ></textarea> -->
                <!-- <a href="#" onclick="insertAtCaret('textareaid', '<h1>text to insert</h1>');return false;">Click Here to Insert</a> -->
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
#cke_1_contents{
      height:400px !important;
  }
     
  
        
    </style>
    
@endpush

@push('custom-scripts')

    
   
    <script type="text/javascript">
        
      var text;
     $(document).ready(function() {
       
        CKEDITOR.replace( 'editor1' );
        // CKEDITOR.instances.my_editor.insertHtml('<p>This is a new paragraph.</p>');
            CKEDITOR.on( 'instanceReady', function( evt )
              {

                var editor = evt.editor;
            
               editor.on('change', function (e) { 
               text = editor.editable().getData();
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

                //   **********editor*******

                        // $scope.orightml = '';
                        // $scope.htmlcontent = $scope.orightml;
                        // $scope.disabled = false;


                // alert($scope.orightml)


                //        **********editor*******
                //     $scope.addValue = function(e){
                // // alert(e)

                // $scope.htmlcontent += e;
                // }
                $scope.callEmployee = () =>  {
          
                var id = {{ $id }} ;
                    // alert(id) 
                    $http({
                    method: 'GET',
                    url: API_URL + "admin/documentary/" + id + "/edit",
                }).then(function(res){
              
                    $scope.module_enquirie =    res.data.data
                    CKEDITOR.instances["editor1"].insertHtml(res.data.data.documentary_content);
                   
                    console.log(res.data.data.documentary_content);
                    
                });
            },
      $scope.callEmployee ();
          
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
                                <td>${key} :  <a href="">{${value}}</a></td>
                            <tr>
                            `);

                            });
                    }
                    });

           
            }
            // <div onclick="insertAtCaret('textareaid','${value}')">${key} : <a href=""> ${value} </a></div>
            $scope.getCustomerData = function($http, API_URL) {
                    // $http({
                    //     method: 'GET',
                    //     url: "{{ route('admin.documentary.customer') }}",
                        
                    //     }).then(function successCallback(response) {
                    //         $scope.customer_module = response.data;	 
                    //     }, function errorCallback(response) {
                            
                    //     });
                    $.ajax({
                    type: "GET",
                    url: "{{ route('admin.documentary.customer') }}",
               
                    success: function( msg ) {
                        // alert(JSON.stringify(msg))
                       var count_data = Object.keys(msg.data).length
                     
                        $.each(msg.data,function(key,value){
                            $('#dataCustomer').append(`
                           
                            <tr>
                                <td>${key} :  <a href="">{${value}}</a></td>
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
                                <td>${key} :  <a href="">{${value}}</a></td>
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

         
            $scope.submit = function (id) {
                        // alert(id)
                        $scope.module_enquirie.documentary_content = text;
                        // console.log($scope.module_enquirie);
						$http({
							method: 'PUT',
                            url: API_URL + "admin/documentary/" + id ,
							data: $.param($scope.module_enquirie),
							headers: { 'Content-Type': 'application/x-www-form-urlencoded' }

						}).then(function successCallback(response) {

                            window.location.href = API_URL +"admin/admin-documentary-view";
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