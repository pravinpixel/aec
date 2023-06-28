@extends('layouts.aproval')

@section('content')
    @include('flash::message')
    <div >
        <div class="row m-0 p-3">
            <div class="col-12">
                <div class="card card-body p-3 border shadow-sm">
                    <div class=" d-flex justify-content-between align-items-center">
                        <div><img src="{{ asset('public/assets/images/customer/logo.png') }}" alt="AEC Prefab" width="100px">
                        </div>
                        <p class="m-0 lead"> <span class="bg-primary-light rounded px-1 text-white"><i class="fa fa-user"></i>
                                <b>Proposal Approval Portal</b></span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card  border shadow-sm m-0">
                    <div class="card-body p-3">
                        <div style="max-height: 60vh;overflow:auto">
                            {!! $proposal->content !!}
                        </div>
                    </div>
                    {{-- @if ($proposal->customer_status != 'PENDING') --}}
                    <div class="card-footer text-end">
                        <form action="{{ route('download_proposal') }}" method="POST">
                            <input type="hidden" name="content" value="{{ $proposal->content }}">
                            <input type="hidden" name="documentary_status" value="{{ $proposal->customer_status }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"><i class="mdi mdi-download me-1"></i>
                                Download PDF</button>
                        </form>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
            <div class="col-md-4">
                <div>
                    @if ($proposal->customer_status == 'PENDING')
                        <div class="card card-body p-3 border shadow-sm m-0">
                            <h4>Proposal Action</h4>  
                            <form action="{{ route('customer-approval', $proposal->id) }}" method="POST" >
                                @csrf
                                <select onchange="FormAction(this.value)"  name="customer_status"  class="fw-bold form-select mt-3" required>
                                    <option value=""> --- Select ---</option>
                                    <option value="APPROVE" class="fw-bold">Approve</option>
                                    <option value="DENY" class="fw-bold">Deny</option>
                                    <option value="CHANGE_REQUEST" class="fw-bold">Change Request</option>
                                </select> 
                                <textarea  id="comments" required name="comments"  class="form-control mt-3" cols="30"  rows="10"></textarea>
                                <button class="btn rounded-pill btn-primary mt-3" type="submit">Submit</button>
                            </form>  
                        </div>
                    @else
                        <div class="card border shadow-sm">
                            <div class="card-header bg-light"><b>Proposal status</b></div>
                            <div class="card-body p-3">
                                @switch($proposal->customer_status)
                                    @case('APPROVE')
                                        <div class="shadow-sm border-white border alert alert-warning bg-success text-white fw-bold lead"
                                            role="alert">
                                            <i class="fa fa-check-circle"></i> @lang('proposal.proposal_approved')
                                        </div>
                                    @break

                                    @case('DENY')
                                        <div class="shadow-sm border-white border alert alert-warning bg-danger text-white fw-bold lead"
                                            role="alert">
                                            <i class="fa fa-times-circle"></i> @lang('proposal.proposal_denied')
                                        </div>
                                    @break

                                    @case('CHANGE_REQUEST')
                                        <div class="shadow-sm border-white border alert alert-warning bg-warning text-white fw-bold lead"
                                            role="alert">
                                            <i class="fa fa-clock"></i> @lang('proposal.proposal_obsoleted')
                                        </div>
                                    @break
                                @endswitch
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <footer class="text-center  p-3">
            © {{ now()->year }} AEC Prefab. All Rights Reserved.
        </footer>
    </div>
@endsection

@push('custom-scripts')
    <style> .footer {display: none !important}</style>
    <script>
        $('#comments').hide()
        const FormAction = (status) => {
            if(status == 'DENY' || status == 'CHANGE_REQUEST') {
                $('#comments').show()
                $('#comments').attr('required', true)
            } else {
                $('#comments').hide()
                $('#comments').attr('required', false)
            }
        }
    </script>
@endpush
