@php
    $invoice = $project->invoicePlan;
    $invoices = json_decode($project->invoicePlan->invoice_data)->invoices;
@endphp 
<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2" class="text-center font-16">Invoices</th>
            <td colspan="2" style="padding: 0 !important"> 
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th class="small">Project Cost</th>
                            <th class="small">No.of Invoices</th>
                            <th class="small">Project Start date</th>
                            <th class="small">Project End date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $invoice->project_cost }}</td>
                            <td>{{ count($invoices) }}</td>
                            <td>{{ SetDateFormat($project->start_date) }}</td>
                            <td>{{ SetDateFormat($project->delivery_date) }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <th scope="col" class="text-secondary">#</th>
            <th scope="col" class="text-secondary">Date</th>
            <th scope="col" class="text-secondary">Percentage</th>
            <th scope="col" class="text-secondary">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $index => $invoice )
            <tr>
                <th scope="row">{{ $index +1 }}</th>
                <td>{{ SetDateFormat(str_replace('/','-', $invoice->invoice_date)) }}</td>
                <td>{{ $invoice->percentage }}</td>
                <td>{{ $invoice->amount }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<x-chat-box
    status="1"
    :moduleId="Project()->id"
    moduleName="project"
    menuName="{{ strtoupper(request()->route()->menu_type) }}"
/>