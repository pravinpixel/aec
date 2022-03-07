@extends('layouts.aproval')

@section('content')
@include('flash::message')

    <div class="account-pages ">
        <div class="container py-4">
            <div class="card my-4"> 
                <div class="card-header d-flex justify-content-between">
                    <div><img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="150px"></div>
                    <h1 class="h3 text-dark-50 text-center text-primary"> <i class="fa fa-user"></i> Proposal Approval Portal</h1>
                </div>
                <div class="card-body">
                    
                    <div class="text-end">
                        <a download="{{ asset($result->pdf_file_name) }}" href="{{ asset($result->pdf_file_name) }}" type="button" class="btn btn-primary mb-3"><i class="mdi mdi-download me-1"></i> <span>Download PDF</span> </a>
                    </div>
                    <div style="max-height: 60vh;overflow:auto">
                        {!! $result->documentary_content !!} 
                    </div>
                </div>
                @include('admin.enquiry.approvals.denied-modal')
                <div class="card-footer">
                    <div class="text-center">
                        <a type="button"class="btn btn-danger px-4 py-2 me-2"  data-bs-toggle="modal" data-bs-target="#proposal-denied"><i class="fa fa-times-circle"></i> Deny</a>
                        <a class="btn btn-success px-4 py-2"  onclick="event.preventDefault(); document.getElementById('proposalApproveForm').submit();"><i class="fa fa-check-circle"></i>Approve</a>
                    </div>
                </div>
                <form id="proposalApproveForm" action="{{ route('customer-approval',['id'=>$enquiry_id, 'type' => 1]) }}" method="GET" class="d-none">
                    {{-- @csrf --}}
                    <input type="hidden" name="pid" value="{{ $additionalInfo['proposal_id'] }}">
                    <input type="hidden" name="vid" value="{{ $additionalInfo['version_id'] }}">
                </form>
            </div>
        </div>
    </div> 

    <!-- end page --> 
    <footer class="footer footer-alt">
          © {{ now()->year }} All rights reserved | AecPrefab
    </footer> 
</body>
@endsection