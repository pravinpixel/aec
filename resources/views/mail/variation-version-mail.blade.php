@component('mail::message')
    <h3>Raising a complaint or an issue</h3>
    <p>
        Dear <b>{{ getCustomerByProjectId($variation['project_id'])['full_name'] }}</b>,
        This mail is to inform you that a ticket has been raised for the project <b>{{ getProjectId($variation['project_id'])['project_name'] }}</b> with the reference number <b>{{ $ticket_id['issue_id']." - ".$variation['version'] }}</b> by <b>{{ Admin()->user_name }}</b>.
        <br> For more details, <a href="{{ url('/login') }}">click here</a>.
    </p> 
    <p>
        Thank You, <br>
        Regards, <br>
        Team - AEC Prefab
    </p>
@endcomponent
