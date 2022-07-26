@component("mail::message")
<div class="text-center">
    <h2 class="text-center text-dark">Reset your Password</h2>
    <hr>
    <p class="lead ">  
        <b class="text-center text-secondary">
            <center>
                We're sending you this email because you requested
                a password reset. Click on this link to create a new
                password:
            </center>
        </b>
    </p>
    <a href="{{ route('reset.password.get', $data['token']) }}" style="background: #4188F9 !important" class="shadow-sm border my-4 btn btn-lg btn-primary rounded-pill"> 
        <small><b>Set a new password</b></small>
    </a>
    <div class="text-center">
    Please use the following temporary password to verify yourself
    </div>
    <h4><b> {{ $data['code'] }} </b></h4>
    <div class="text-center">
        <p class="text-center">If you did not initiate this request, please contact us immediately at</p>
        <p class="text-center"><a href="mailto:support@aecprefab.net">support@aecprefab.net</a></p>
        <br>
        <b>The Aec Prefab Team</b>
    </div>
</div>
@endcomponent