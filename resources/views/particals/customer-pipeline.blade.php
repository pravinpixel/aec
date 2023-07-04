<div class="btn-group">
    <button onclick="EnquiryQuickView({{ $data->id  }},this)" class="btn progress-btn {{ $data->project_info == 1 ? 'active' : '' }}" title="Project Information"></button>
    <button onclick="viewCustomerEnquiryProposal({{ $data->id }})" class="btn progress-btn {{ $data->proposal_email_status == 1 ? 'active' : '' }}" title="Proposal Received"></button>
    <button class="btn progress-btn {{ $data->customer_response == 1 ? 'active' : '' }}" title="Proposal Approved"></button>
</div>