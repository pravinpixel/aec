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
                    <div style="max-height: 60vh;overflow:auto">
                        {!! $result->documentary_content !!} 
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="btn btn-danger px-4 py-2 me-2" href="{{ route('customer-approval',['id'=>$result->enquirie_id, 'type' => 0]) }}"><i class="fa fa-times-circle"></i> Deny</a>
                        <a class="btn btn-success px-4 py-2" href="{{ route('customer-approval',['id'=>$result->enquirie_id, 'type' => 1]) }}"><i class="fa fa-check-circle"></i>Approve</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- end page --> 
    <footer class="footer footer-alt">
          © {{ now()->year }} All rights reserved | AecPrefab
    </footer> 
</body>
@endsection