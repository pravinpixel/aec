@component('mail::message')
<b>Dear AECPrefab,<br></b>
<div> New Enquiry was receved!</div> <br>
<table>
    <tbody>
        <tr>
            <td>Customer Name</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <th>{{ $details['customer']['first_name'] }}</th>
        </tr>
        <tr>
            <td>Email Address</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <th>{{ $details['customer']['email'] }}</th>
        </tr>
        <tr>
            <td>Phone Number</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <th>{{ $details['customer']['phone_no'] }}</th>
        </tr>
        <tr>
            <td>Date of Enquiry</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <th>{{ $details['enquiry_date'] }}</th>
        </tr>
        <tr>
            <td>Enquiry Number</td>
            <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
            <th><a href="{{ route('view-enquiry', $details['id']) }}">{{ $details['enquiry_number'] }}</a></th>
        </tr>
    </tbody>
</table>
<br>
<b>Thanks</b>,<br>
Team AECPrefab AS
@endcomponent