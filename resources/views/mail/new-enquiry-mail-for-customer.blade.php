@component('mail::message')
<div>
    <p><b>Dear  {{ $details['company_name'] }}</b></p> 
    <p>Thank you for reaching out to AECPrefab . We are delighted to inform you that your enquiry has been successfully received, and we are eager to assist you with your questions and provide the information you are seeking.</p>
    <div>
        <b>Enquiry Information :</b> <br>
        <table>
            <tbody>
                <tr>
                    <td>Contact Person</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th>{{ $details['contact_person'] }}</th>
                </tr>  
                <tr>
                    <td>Mobile Number</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th>{{ $details['mobile_no'] }}</th>
                </tr>
                <tr>
                    <td>Secondary Mobile Number</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th>{{ $details['secondary_mobile_no'] }}</th>
                </tr> 
                <tr>
                    <td>Enquiry Number</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th><a href="{{ route('customers.edit-enquiry', ['id' => $details['id'], 'type' => 'active']) }}">{{ $details['enquiry_number'] }}</a></th>
                </tr>
                <tr>
                    <td>Enquiry Status</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th>{{ $details['status'] }}</th>
                </tr>
                <tr>
                    <td>Date of Enquiry</td>
                    <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                    <th>{{ $details['enquiry_date'] }}</th>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    Thanks,<br>
    {{ config('app.name') }}
</div>
@endcomponent
