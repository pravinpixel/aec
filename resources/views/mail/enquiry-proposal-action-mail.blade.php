@component('mail::message')
    @if ($details['mail_type'] === 'CUSTOMER')
        <div>
            <b>Hi  {{ $details['customer']['full_name'] }},</b> <br>
            <p>You've {{ ucfirst(strtolower(str_replace('_',' ', $details['proposal']['customer_status']))) }} your prposal.</p>
        </div>
        @else
        <div>
            <b>Dear AECPrefab,</b> <br>
            <div> {{ $details['customer']['full_name'] }} was changed proposal status </div> <br>
            <table>
                <tbody>
                    <tr>
                        <td>Customer Name</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <th>{{ $details['customer']['full_name'] }}</th>
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
                        <td>Proposal Status</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <th class="text-dark"> {!! proposalStatusBadge($details['proposal']['customer_status'],'bg-dark px-3 ') !!}</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
    @endif
<b>Thanks</b>,<br>
{{ config('app.name') }}
@endcomponent