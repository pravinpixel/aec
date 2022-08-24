<div class="custom-accordion card border shadow-sm rounded">
    <div class="card-header {{ $open  == 'false' ? 'collapsed' : ''}}" id="custom-accordion-head-{{ slug($title) }}" data-bs-toggle="collapse" data-bs-target="#custom-accordion-collapse-{{ slug($title) }}">
        <div class="card-title">{{ $title }}</div> 
        <i class="accordion-icon"></i> 
     
        @switch(slug($title))
            
            @case('project-information')
                <small class="comments-count" ng-if="enquiry_active_comments.project_information > 0"> @{{ enquiry_active_comments.project_information   }}</small>
                <small class="comments-count" ng-if="project_active_comments.project_information > 0"> @{{ project_active_comments.project_information   }}</small>
            @break
            @case('selected-services')
                <small class="comments-count" ng-if="enquiry_active_comments.service > 0"> @{{ enquiry_active_comments.service   }}</small>
            @break
            @case('ifc-models-and-uploaded-documents')
                <small class="comments-count" ng-if="enquiry_active_comments.ifc_model > 0"> @{{ enquiry_active_comments.ifc_model   }}</small>
            @break
            @case('building-components')
                <small class="comments-count" ng-if="enquiry_active_comments.building_components > 0"> @{{ enquiry_active_comments.building_components   }}</small>
            @break
            @case('additional-information')
                <small class="comments-count" ng-show="enquiry_active_comments.add_info > 0"> @{{ enquiry_active_comments.add_info   }}</small>
            @break
            @case('active-enquiries')
                <span id="active-count" class="comments-count" style="transform: translateY(-10px) !important;">@{{ commentsCount }}</span>
            @break
            @case('milestone')
            <small class="comments-count" ng-if="project_active_comments.milestone > 0"> @{{ project_active_comments.milestone }}</small>
            @break
            @case('notes')
            <small class="comments-count" ng-if="project_active_comments.notes > 0"> @{{ project_active_comments.notes   }}</small>
            @break
            @case('bim360')
            <small class="comments-count" ng-if="project_active_comments.bim360 > 0"> @{{ project_active_comments.bim360   }}</small>
            @break
            @case('invoice')
            <small class="comments-count" ng-if="project_active_comments.invoice > 0"> @{{ project_active_comments.invoice   }}</small>
            @break
            @case('task')
            <small class="comments-count" ng-if="project_active_comments.task > 0"> @{{ project_active_comments.task   }}</small>
            @break
      
            @default
        @endswitch
    </div>
    <div class="card-body collapse {{ $open }} {{ $open == 'true' ? "show" : '' }}" id="custom-accordion-collapse-{{ slug($title) }}">
        <div class="card-content">
            @include($path)
        </div>
    </div>
</div>