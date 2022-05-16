
app.directive('viewlist', function(API_URL, $http, $route, $templateCache) {
    var directive = {};
    directive.restrict = 'E';
    directive.templateUrl = `${API_URL}customers/view-list`;
    directive.scope = {
        viewLists : "=data",
        fileType : "=fileType"
    },
    directive.link= function (scope) {
        scope.getAutodeskView = (document_id) =>{
            $http({
                method: 'GET',
                url: `${API_URL}autodesk-check-status/${document_id}`,
                }).then(function success(res) {
                    if(res.data.status == false){
                        Message('danger', res.data.msg);
                        return false;
                    }
                    var currentPageTemplate = $route.current.templateUrl;
                    $templateCache.remove(currentPageTemplate);
                    $route.reload();
                    window.open(`${API_URL}viewmodel/${document_id}`);
                }, function error(res) {

                });
        }
    }
    return directive;
 });
 app.directive('filename', function() {
    var directive = {};
    directive.restrict = 'E';
    directive.template= "{{filename}}";
    directive.scope = {
        filename : "=data"
    }

    return directive;
 });

 app.directive('fileModel', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model, modelSetter;
            attrs.$observe('fileModel', function(fileModel){
                model = $parse(attrs.fileModel);
                modelSetter = model.assign;
            });
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope.$parent, element[0].files[0]);
                });
            });
        }
    };
});

app.directive('customModal', function ($parse) {
    return {
        link: function(scope, element, attributes){
            let title = attributes.modalTitle;
            let body = attributes.modalBody;
            let route = attributes.modalRoute;
            let id = attributes.modalId;
            let view_type = attributes.modalViewType;
            let enquiry_id = attributes.modalEnquiryId;
            let method = attributes.modalMethod;
            element.bind('click', function () {
                $("#exampleModalLabel").html(title);
                $("#exampleModalBody").html(body);
                $("#exampleModalRoute").val(route);
                $("#exampleModalId").val(id);
                $("#exampleModalEnquiryId").val(enquiry_id);
                $("#exampleModalViewType").val(view_type);
                $("#exampleModalMethod").val(method);
                $("#exampleModal").modal('show');
            });
        }
    };
});

app.service('fileUpload', function ($http, $q) {
    this.uploadFileToUrl = function(file, type, view_type, uploadUrl){
        var fd = new FormData();
        fd.append('file', file);
        fd.append('type', type);
        fd.append('view_type', view_type);
      
        var deffered = $q.defer();
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (response) {
            deffered.resolve(response);
        },function (response) {
            deffered.reject(response);
        });

        return deffered.promise;

    }

    this.uploadLinkToUrl = function (link, type, view_type,  uploadUrl) {
        var fd = new FormData();
        fd.append('link', link);
        fd.append('type', type);
        fd.append('view_type',view_type);
        var deffered = $q.defer();
        var deffered = $q.defer();
        $http.post(uploadUrl, fd, {
            transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
        }).then(function (response) {
            deffered.resolve(response);
        },function (response) {
            deffered.reject(response);
        });
        return deffered.promise;
    }
});

app.directive('comment', function (API_URL, $http) {
    return {
        restrict: 'E',
        scope: {
            data: '=data'
        },
        templateUrl: `${API_URL}template/comment`,
        link: function(scope, element, attrs) {
            console.log(scope.data)
            let {modalState, type, header, enquiry_id, send_by} = scope.data;
            scope.showCommentsToggle = () => {
                $http.get(API_URL + 'admin/show-comments/'+enquiry_id+'/type/'+type ).then(function (response) {
                    scope.commentsData = response.data.chatHistory; 
                    scope.chatType     = response.data.chatType;  
                    $('#viewConversations-modal').modal('show');
                    getEnquiryCommentsCountById(enquiry_id);
                    getEnquiryActiveCommentsCountById(enquiry_id);
                });
            };
            scope.sendInboxComments  = (type) => {
                if(scope.inlineComments == '') {
                    Message('danger','Comment field required');
                    return false;
                }
                scope.sendCommentsData = {
                    "comments"        :   scope.inlineComments,
                    "enquiry_id"      :   enquiry_id,
                    "type"            :   scope.chatType,
                    "created_by"      :   type,
                    "seen_by"         :   1,
                    "send_by"         :   send_by,
                }
                $http({
                    method: "POST",  
                    url:  API_URL + 'admin/add-comments',
                    data: $.param(scope.sendCommentsData),
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded' 
                    }
                }).then(function successCallback(response) {
                    scope.inlineComments = '';
                    scope.showCommentsToggle();
                    Message('success',response.data.msg);
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            getEnquiryCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/comments-count/'+id ,
                }).then(function successCallback(response) {
                    scope.enquiry_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }

            getEnquiryActiveCommentsCountById = (id) => {
                $http({
                    method: "get",
                    url:  API_URL + 'admin/active-comments-count/'+id ,
                }).then(function successCallback(response) {
                    scope.enquiry_active_comments     = response.data;
                }, function errorCallback(response) {
                    Message('danger',response.data.errors);
                });
            }
        }
    };
});

{/* <div class="btn-group w-100 border rounded"> 
<div dx-tag-box="tagBox.customTemplate" dx-item-alias="product" select-user>
    <div data-options="dxTemplate: { name: 'customItem' }">
      <div class="custom-item" dx-click="getItem($key)">
        <div class="product-name"> @{{product.first_Name}}</div>
      </div>
    </div>
  </div>
<a class="btn btn-light" ng-click="removeResource($key)"><i class="text-danger fa fa-trash"></i></a>
</div> */}
 //popup directives
