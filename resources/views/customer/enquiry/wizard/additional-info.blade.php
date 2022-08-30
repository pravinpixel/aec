<form class="row m-0" ng-submit="submitAdditionalinfoForm()" name="additionalinfoForm" novalidate id="additionalInformation">
    <div class="col-sm-8 mx-auto">
        <div>
            <h3 class="text-center">Specify additional details</h3>
            <div class="py-3">
                <div class="form-floating" id="additional_info_text_editor">
                    <div dx-html-editor="htmlEditorOptions"> </div>
                    </div>
                </div>
                </div> 
            </div>
        </div>
    </div>
    <hr ng-show="commentShow">  
    <div class="col-md-4 ms-auto">
        <div class="card border shadow-sm mb-0">
            <div class="card-header bg-light"><strong>CHAT BOX</strong></div>
            <div class="card-body">
                <div class="d-flex align-items-center" ng-show="commentShow">
                    <div>
                        <open-comment  data="
                        {'modalState':'viewConversations',
                        'type': 'add_info', 
                        'header':'Additional Information',
                        'enquiry_id':enquiry_id,
                        send_by: {{ Customer()->id }},
                        'from':'Customer'
                        }"/> 
                    </div>
                    <div class="ms-2">
                      <comment  ng-show="commentShow" data="
                        {'modalState':'viewConversations',
                        'type': 'add_info', 
                        'header':'Additional Information',
                        'enquiry_id':enquiry_id,
                        send_by: {{ Customer()->id }},
                        'from':'Customer'
                        }"/>
                    </div> 
                </div>
            </div>
        </div>  
    </div>  
    <div class="card-footer border-0 p-0">
        <ul class="list-inline wizard mb-0 pt-3">
            <li class="previous list-inline-item disabled"><a href="#!/building-component" class="btn btn-light border shadow-sm">Prev</a></li>
            <li class="next list-inline-item float-end"><input  class="btn btn-primary" type="submit" name="submit" value="Next"/></li>
            <li class="next list-inline-item float-end mx-2"><input class="btn btn-light border shadow-sm"  ng-click="saveAndSubmitAdditionalinfoForm()" type="button" name="submit"  value="Save & Submit Later"/></li>
        </ul>
    </div> 
</form> 
<style> 
    .additionalInformation .timeline-step .inner-circle{
        background: var(--secondary-bg) !important;
        transform: scale(1.2);
        box-shadow: 0px 5px 10px #4f4f4fb2 !important
    }
</style>