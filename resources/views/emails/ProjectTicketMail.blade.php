@component("mail::message")
<div >
    <table class='table custom my-table table-bordered' style="width:100% !important" >
        <thead>
           <tr>
              <td colspan='2' class='text-center' style='background: #F4F4F4'><b class='h4'>Variation Request - 01</b></td>
           </tr>
           <tr>
              <td colspan='2' class='text-center' style="padding: 10px !important">
                <b class='h4'> {!! $details['title'] !!} </b>
            </td>
           </tr>
        </thead>
        <tbody>
           <tr>
              <td width='200px' style="padding: 10px !important"><b>Project Name</b></td>
              <td style="padding: 10px !important">{{ $details['project_name'] }}</td>
           </tr>
           <tr>
              <td style="padding: 10px !important"><b>Client Name</b></td>
              <td style="padding: 10px !important">{{ $details['company_name'] }}</td>
           </tr>
           <tr>
              <td style="padding: 10px !important"><b>Project Incharge</b></td>
              <td style="padding: 10px !important">{{ $details['incharge'] }}</td>
           </tr>
           <tr>
              <td style="padding: 10px !important"><b>Date of Change Request</b></td>
              <td style="padding: 10px !important">{{ $details['changedate'] }}</td>
           </tr>
        </tbody>
     </table>
     <table class='table custom my-table table-bordered' style="width:100% !important">
        <tbody>
           <tr>
              <td colspan='2' class='text-center' style='background: #F4F4F4'><b>Change Request Overview</b></td>
           </tr>
           <tr>
              <td  width='200px' style="padding: 10px !important" width='250px'><b>Description of Variation / Change</b></td>
              <td style="padding: 10px !important">{!!$details['description']!!}</td>
           </tr>
           <tr>
              <td style="padding: 10px !important"><b>Reason for Variation / Change</b></td>
              <td style="padding: 10px !important">{!!$details['respone']!!}</td>
           </tr>
        </tbody>
     </table>
     <table class='table custom my-table table-bordered' style="width:100% !important">
        <tbody>
           <tr>
              <td colspan='4'class='text-center' style='background: #F4F4F4'><b>Change in Contract Price</b></td>
           </tr>
           <tr>
              <td  width='200px' style="padding: 10px !important" ><b>Estimated Hours</b></td>
              <td style="padding: 10px !important" ><b>Price/Hr</b></td>
              <td style="padding: 10px !important"  rowspan='2'></td>
              <td style="padding: 10px !important"  rowspan='2' class='text-center'>kr {{number_format($details['total_price'],3)}}</td>
           </tr>
           <tr>
              <td style="padding: 10px !important">{{$details['project_hrs']}}</td>
              <td style="padding: 10px !important">kr {{number_format($details['project_price'],3)}}</td>
           </tr>
        </tbody>
        <tfoot>
           <tr>
              <td colspan='2'></td>
              <td rowspan='2' class='text-end'><b>Total Price</b></td>
              <td rowspan='2' class='text-center'><b>kr  {{number_format($details['total_price'],3)}}</b></td>
           </tr>
        </tfoot>
     </table>
    <div> <center><b>Thank you</b></center></div>
</div>
@endcomponent
