formatData = (project) => {
    return {...project, ...{'start_date': new Date(project.start_date), 'delivery_date' : new Date(project.start_date)}}
}

app.controller('CreateProjectController', function ($scope, $http, API_URL, $location){
    let project_id =  $("#project_id").val();
     //get building types
    $http.get(`${API_URL}get-building-type`)
    .then((res)=> {
        $scope.buildingTypes = res.data;
    });
    //get delivery types
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });
    //get project types
    $http.get(`${API_URL}get-delivery-type`)
    .then((res)=> {
        $scope.deliveryTypes = res.data;
    });

    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = formatData(res.data);
    });
//postalcode api
    $scope.getZipcode = function() {
        let zipcode = $("#zipcode").val();
        if(typeof(zipcode) == 'undefined' || zipcode.length != 4){
            return false;
        }
        $http({
            method: 'GET',
            url: `https://api.zippopotam.us/NO/${zipcode}`
        }).then(function successCallback(res) {
            $scope.zipcodeData = res.data
            $scope.project = {
                ...$scope.project, 
                ...{
                    'state'     :  $scope.zipcodeData.places[0].state,
                    'place'     :  $scope.zipcodeData.places[0]['place name'],
                    'country'   :  $scope.zipcodeData.country,
                    'zipcode'   :  zipcode,
                }
            };
        }, function errorCallback(error) {
            Message('danger', 'Invalid zipcode');
            $scope.project = {
                ...$scope.project, 
                ...{
                    'state'     : '',
                    'place'     : '',
                    'country'   : '',
                    'zipcode'   :  zipcode,
                }
            };
            return false;
        });
    } 
//company api
    $scope.getCompany = (text) => {
        $http.get(`https://hotell.difi.no/api/json/brreg/enhetsregisteret?query=${text}`)
        .then(function successCallback(res){
            $scope.companyList = res.data.entries.slice(0, 50)
                .map((item) => {
                    return {'company':item.navn, 'mobile': item.tlf_mobil, 'zip_code': item.forradrpostnr, 'site_address': item.forretningsadr} 
                });
                if($scope.companyList.length == 1) {
                    $scope.project.company_name = $scope.companyList[0].company;
                    $scope.project.mobile_number = $scope.companyList[0].mobile.split(" ").join("");
                    $("#zipcode").val($scope.companyList[0].zip_code);
                    $scope.getZipcode();
                }
        }, function errorCallback(error){
            console.log(error);
        });
    }

    $scope.submitCreateProjectForm = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.project, type:'create_project'})
        .then((res) => {
            $location.path('platform')
            console.log(res);
        })
    }

});

app.controller('ConnectPlatformController', function($scope, $http, API_URL, $location){
    let project_id =  $("#project_id").val();
    $http.get(`${API_URL}get-project-type`)
    .then((res)=> {
        $scope.projectTypes = res.data;
    });
    $http.get(`${API_URL}project/${project_id}`)
    .then((res)=> {
        $scope.project = formatData(res.data);
    });

    $http.get(`${API_URL}project/enquiry/${project_id}`)
    .then((res)=> {
       $scope.enquiry = res.data;
    });

    $scope.submitConnectPlatformForm = () => {
        $http.put(`${API_URL}project/${project_id}`, {data: $scope.project, type:'create_project'})
        .then((res) => {
            $location.path('team-setup')
        })
    }
});

app.controller('TeamSetupController', function ($scope, $http, API_URL, $location){

    $http.get(`${API_URL}role`).then((res) => {
        $scope.roles = res.data;
    })
    $scope.teamSetups = [{role:'', team:{}}];
    $scope.addResource = () => {
        $scope.teamSetups.push( {role:'', team:{}});
    }
    $scope.removeResource = (index) => {
        $scope.teamSetups.splice(index, 1);
    }
    $scope.teamSetupForm = () => {
        console.log('form called');
    }
    $scope.index
    $scope.getItem = (index) =>{
        $scope.index = index;
        console.log($scope.index)
    }
    $scope.tagBox = {};
    // console.log($scope.tagBox.dataSourceUsage);
});

app.directive('getRoleUser',function getRoleUser($http, API_URL){
    return {
        restrict: 'A',
        link : function (scope, element, attrs) {
            console.log(attrs.value)
            element.on('change', function () {
        
                $http({
                    method: 'GET',
                    url: `${API_URL}role/${scope.teamSetup.role}`,
                    params : {role: scope.teamSetups.role}
                    }).then(function success(res) {
                        scope.tagBox = {
                            customTemplate: {
                            dataSource:  res.data.data,
                            displayExpr: 'first_Name',
                            valueExpr: 'id',
                            itemTemplate: 'customItem',
                            searchEnabled: true,
                            onValueChanged(e) {
                                scope.teamSetups[attrs.value].team = e.value;
                            },
                            },
                        };
                        console.log(scope);
                      
                    }, function error(res) {
                });
            });
        },
    };
});

app.directive('selectuser', function(){
    var directive = {};
    directive.restrict = 'E';
    directive.scope = {
        users : "=users",
    },
    directive.link= function (scope) {
        console.log(scope)
        scope.tagBox = {
            customTemplate: {
            dataSource:  res.data.data,
            displayExpr: 'first_Name',
            valueExpr: 'id',
            itemTemplate: 'customItem',
            searchEnabled: true,
            onValueChanged(e) {
                
            },
            },
        };
    },
    directive.template = `<div class="btn-group w-100 border rounded"> 
    <div dx-tag-box="tagBox.customTemplate" dx-item-alias="product" select-user>
        <div data-options="dxTemplate: { name: 'customItem' }">
          <div class="custom-item" dx-click="getItem($key)">
            <div class="product-name"> @{{product.first_Name}}</div>
          </div>
        </div>
      </div>
    <a class="btn btn-light" ng-click="removeResource($key)"><i class="text-danger fa fa-trash"></i></a>
    </div>`;
    return directive;
});


app.directive('getRoleUser',function getRoleUser($http, API_URL){
    return {
        restrict: 'A',
        link : function (scope, element, attrs) {
            element.on('change', function () {
                $http({
                    method: 'GET',
                    url: `${API_URL}role/${scope.teamSetup.role}`,
                    params : {role: scope.teamSetups.role}
                    }).then(function success(res) {
                        scope.roleUsers = res.data.data.users;
                    }, function error(res) {
                });
            });
        },
    };
});


const products = [{
    ID: 1,
    Name: 'HD Video Player',
    Price: 330,
    Current_Inventory: 225,
    Backorder: 0,
    Manufacturing: 10,
    Category: 'Video Players',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/1.png',
  }, {
    ID: 2,
    Name: 'SuperHD Video Player',
    Price: 400,
    Current_Inventory: 150,
    Backorder: 0,
    Manufacturing: 25,
    Category: 'Video Players',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/2.png',
  }, {
    ID: 3,
    Name: 'SuperPlasma 50',
    Price: 2400,
    Current_Inventory: 0,
    Backorder: 0,
    Manufacturing: 0,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/3.png',
  }, {
    ID: 4,
    Name: 'SuperLED 50',
    Price: 1600,
    Current_Inventory: 77,
    Backorder: 0,
    Manufacturing: 55,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/4.png',
  }, {
    ID: 5,
    Name: 'SuperLED 42',
    Price: 1450,
    Current_Inventory: 445,
    Backorder: 0,
    Manufacturing: 0,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/5.png',
  }, {
    ID: 6,
    Name: 'SuperLCD 55',
    Price: 1350,
    Current_Inventory: 345,
    Backorder: 0,
    Manufacturing: 5,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/6.png',
  }, {
    ID: 7,
    Name: 'SuperLCD 42',
    Price: 1200,
    Current_Inventory: 210,
    Backorder: 0,
    Manufacturing: 20,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/7.png',
  }, {
    ID: 8,
    Name: 'SuperPlasma 65',
    Price: 3500,
    Current_Inventory: 0,
    Backorder: 0,
    Manufacturing: 0,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/8.png',
  }, {
    ID: 9,
    Name: 'SuperLCD 70',
    Price: 4000,
    Current_Inventory: 95,
    Backorder: 0,
    Manufacturing: 5,
    Category: 'Televisions',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/9.png',
  }, {
    ID: 10,
    Name: 'DesktopLED 21',
    Price: 175,
    Current_Inventory: null,
    Backorder: 425,
    Manufacturing: 75,
    Category: 'Monitors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/10.png',
  }, {
    ID: 12,
    Name: 'DesktopLCD 21',
    Price: 170,
    Current_Inventory: 210,
    Backorder: 0,
    Manufacturing: 60,
    Category: 'Monitors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/12.png',
  }, {
    ID: 13,
    Name: 'DesktopLCD 19',
    Price: 160,
    Current_Inventory: 150,
    Backorder: 0,
    Manufacturing: 210,
    Category: 'Monitors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/13.png',
  }, {
    ID: 14,
    Name: 'Projector Plus',
    Price: 550,
    Current_Inventory: null,
    Backorder: 55,
    Manufacturing: 10,
    Category: 'Projectors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/14.png',
  }, {
    ID: 15,
    Name: 'Projector PlusHD',
    Price: 750,
    Current_Inventory: 110,
    Backorder: 0,
    Manufacturing: 90,
    Category: 'Projectors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/15.png',
  }, {
    ID: 16,
    Name: 'Projector PlusHT',
    Price: 1050,
    Current_Inventory: 0,
    Backorder: 75,
    Manufacturing: 57,
    Category: 'Projectors',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/16.png',
  }, {
    ID: 17,
    Name: 'ExcelRemote IR',
    Price: 150,
    Current_Inventory: 650,
    Backorder: 0,
    Manufacturing: 190,
    Category: 'Automation',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/17.png',
  }, {
    ID: 18,
    Name: 'ExcelRemote Bluetooth',
    Price: 180,
    Current_Inventory: 310,
    Backorder: 0,
    Manufacturing: 0,
    Category: 'Automation',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/18.png',
  }, {
    ID: 19,
    Name: 'ExcelRemote IP',
    Price: 200,
    Current_Inventory: 0,
    Backorder: 325,
    Manufacturing: 225,
    Category: 'Automation',
    ImageSrc: 'https://js.devexpress.com/Demos/WidgetsGallery/JSDemos/images/products/19.png',
  }];
  