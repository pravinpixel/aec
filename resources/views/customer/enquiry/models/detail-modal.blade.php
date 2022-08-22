<div id="right-modal-progress" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Project Name : <b class="text-primary"> @{{ enquiry.project_infos.project_name  }} </b></h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
        </div>
        <div class="modal-content h-100 p-4" style="overflow: auto">
            <div class="card mt-3">
                <div class="card-body p-2">
                    <table class="custom table table-bordered m-0">
                        <tr>
                            <th>Enquiry Number</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Type of Delivery</th>
                        </tr>
                        <tr>
                            <td style="text-align: left !important;"  ng-show="enquiry.project_infos.enquiry_no">@{{ enquiry.project_infos.enquiry_no }}</td>
                            <td style="text-align: left !important;" ng-show="!enquiry.project_infos.enquiry_no">@{{ enquiry.project_infos.customer_enquiry_number }}</td>
                            <td>{{ Customer()->full_name }}</td>
                            <td>@{{ enquiry.project_infos.company_name }}</td>
                            <td>{{ Customer()->mobile_no }}</td>
                            <td>{{ Customer()->email }}</td>
                            <td>@{{ enquiry.project_infos.delivery_type.delivery_type_name}}</td>
                        </tr> 
                    </table>
                </div>
            </div> 
            <section>
                <x-accordion title="Project Information" path="customer.enquiry.enquiry-overview.project-information" open="true"></x-accordion>
                <x-accordion title="Selected Services" path="customer.enquiry.enquiry-overview.selected-service" open="false"></x-accordion>
                <x-accordion title="Building Components" path="customer.enquiry.enquiry-overview.building-components" open="false"></x-accordion>
                <x-accordion title="IFC Models and Uploaded Documents" path="customer.enquiry.enquiry-overview.ifc-upload" open="false"></x-accordion>
                <x-accordion title="Additional Information" path="customer.enquiry.enquiry-overview.additional-information" open="false"></x-accordion>
            </section> 
        </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
