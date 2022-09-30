<form id="serviceSelection" name="serviceSelection" ng-submit="submitService(!serviceList.length)" method="post" class="form-horizontal" novalidate>
    <div class="p-3">
        <ul class="nav nav-tabs" style="transform: translateY(1px);">
            <li class="nav-item " ng-repeat="(index,outputType) in outputTypes">
                <a href="#tab_@{{ outputType.id }}_content" data-bs-toggle="tab" aria-expanded="true" class="nav-link @{{ index == 0 ? 'active' :'' }}">
                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                    <span>@{{ outputType.output_type_name }}</span>
                </a>
            </li> 
        </ul>
      
        <div class="container p-4 border">
            <div ng-show="formSubmit">
                <h5 class="text-danger" >Select the service of your choice</h5>
            </div>
            <div class="tab-content">
                <div class="tab-pane @{{ index == 0 ? 'active' :'' }}"  id="tab_@{{ outputType.id }}_content" ng-repeat="(index,outputType) in outputTypes">
                    <div class="row justify-content-start">
                        <div class="col-4 p-2" ng-repeat="service in outputType.services">
                            <label for="service_@{{ service.id }}" style="cursor: pointer" class="hover-bg-primary d-flex shadow-sm border rounded justify-content-start align-items-center" style="min-height: 50px" >
                                <div class="lable-check p-0 "> 
                                    <input id="service_@{{ service.id }}"  style="transform:scale(1.6)"   ng-model="service.selected" type="checkbox" value="@{{ service.id  }}" name="@{{ service.service_name  }}" class="m-2" ng-change="changeService(service.id, service.selected)" >
                                    <span>@{{ service.service_name }}</span>
                                </div>
                            </label> 
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <br>
        <div class="card border shadow-sm mb-0 col-md-4 ms-auto"  ng-show="commentShow">
            <div class="card-header bg-light"><strong>CHAT BOX</strong></div>
            <div class="card-body">
                <div class="d-flex align-items-center" ng-show="commentShow">
                    <div>
                        <open-comment  data="
                        {'modalState':'viewConversations',
                        'type': 'service', 
                        'header':'Selected Services',
                        'enquiry_id':enquiry_id,
                        send_by: {{ Customer()->id }},
                        'from':'Customer'
                        }"/> 
                    </div>
                    <div class="ms-2">
                        <comment data="
                         {'modalState':'viewConversations',
                            'type': 'service', 
                            'header':'Selected Services',
                            'enquiry_id':enquiry_id,
                            send_by: {{ Customer()->id }},
                            'from':'Customer'
                            }"
                        />
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="card-footer">
        <ul class="list-inline wizard">
            <li class="previous list-inline-item disabled"><a href="#!/" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input type="submit" name="submit" value="Next" class="btn btn-primary"></li>
            <li class="next list-inline-item float-end mx-2"><input class="btn btn-light border shadow-sm" ng-click="saveAndSubmitService(!serviceList.length)" type="button" name="submit" value="Save and Submit Later"/></li>
        </ul>
    </div>
</form>

<style> 
    .serviceSelection .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
    .nav-link.active {
        font-weight: bold !important;
        color: white !important;
        background-color:  var(--primary-bg) !important;
    }
</style> 