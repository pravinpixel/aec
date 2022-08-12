<div id="enquiry-qucik-view-model" class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-right" style="width:100% !important">
        <div class="p-3 shadow-sm">
            <h3>Project Name : <b class="text-primary"> @{{ enqData.project_name }} </b></h3>
            <button type="button" class="btn-close me-3" data-bs-dismiss="modal" style="top: 33px" aria-hidden="true"></button>
        </div>
        <div class="modal-content h-100 p-4" style="overflow: auto">
            <div class="card mt-3">
                <input type="hidden" id="admin_auth_id" value="{{ Admin()->id }}">
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
                            <td class="text-start" style="text-align:left !important">@{{ enqData.enquiry_number }}</td>
                            <td>@{{ enqData.customer_info.full_name }} </td>
                            <td>@{{ enqData.customer_info.company_name }}</td>
                            <td>@{{ enqData.customer_info.mobile_no }}</td>
                            <td>@{{ enqData.customer_info.email }} </td>
                            <td>@{{ enqData.project_info.delivery_type.delivery_type_name }} </td>
                        </tr>
                    </table>
                </div>
            </div> 
            <section> 
                <x-accordion title="Project Information" path="admin.enquiry.enquiry-overview.project-information" open="true"></x-accordion>
                <x-accordion title="Selected Services" path="admin.enquiry.enquiry-overview.selected-service" open="false"></x-accordion>
                <x-accordion title="IFC Models and Uploaded Documents" path="admin.enquiry.enquiry-overview.ifc-upload" open="false"></x-accordion>
                <x-accordion title="Building Components" path="admin.enquiry.enquiry-overview.building-components" open="false"></x-accordion>
                <x-accordion title="Additional Information" path="admin.enquiry.enquiry-overview.additional-information" open="false"></x-accordion>
            </section>
        </div>
    </div>
</div><!-- /.modal -->
@include('customer.enquiry.models.document-modal')