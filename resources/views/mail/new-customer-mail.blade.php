@component('mail::message')
<div>
    <b>Dear AECPrefab,<br></b>
    <div> New user was register on AECPrefab customer portal!</div> <br>
    <table>
        <tbody>
            <tr>
                <td>Customer Name</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <th>{{ $details['first_name'] }}</th>
            </tr>
            <tr>
                <td>Email Address</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <th>{{ $details['email'] }}</th>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <th>{{ $details['phone_no'] }}</th>
            </tr>
            <tr>
                <td>Date of Registration</td>
                <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                <th>{{ $details['created_at'] }}</th>
            </tr>
        </tbody>
    </table>
    <br>
    <b>Thanks</b>,<br>
    Team AECPrefab AS
</div>
@endcomponent
