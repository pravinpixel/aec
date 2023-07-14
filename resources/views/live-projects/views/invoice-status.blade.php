@php
    $invoice = $project->invoicePlan;
    $invoices = json_decode($project->invoicePlan->invoice_data)->invoices;
@endphp

<table class="table table-bordered">
    <thead style="background: #e3e3e3" class="text-dark">
        <tr>
            <th colspan="1" class="text-center font-16">Invoices</th>
            <td colspan="8" style="padding: 0 !important">
                <table class="table table-bordered m-0">
                    <thead>
                        <tr>
                            <th class="small">Project Cost</th>
                            <th class="small">VO Cost</th>
                            <th class="small">Total Cost</th>
                            <th class="small">Project Start date</th>
                            <th class="small">Project End date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $invoice->project_cost }}</td>
                            <td>{{ getVoCostByProjectId($project->id) }}</td>
                            <td>{{ $invoice->project_cost + getVoCostByProjectId($project->id) }}</td>
                            <td>{{ SetDateFormat($project->start_date) }}</td>
                            <td>{{ SetDateFormat($project->delivery_date) }}</td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="bg-primary text-center">
            <th scope="col" class="text-dark text-center">#</th>
            <th scope="col" class="text-dark">24/7 Product</th>
            <th scope="col" class="text-dark">24/7 Order ID</th>
            <th scope="col" class="text-dark">24/7 Invoice ID</th>
            <th scope="col" class="text-dark">24/7 Invoice Status</th>
            <th scope="col" class="text-dark">Date</th>
            <th scope="col" class="text-dark">Name</th>
            <th scope="col" class="text-dark">Quantity</th>
            <th scope="col" class="text-dark">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project->LiveProjectInvoice as $index => $invoice)
            <tr>
                <th class="text-center">{{ $index + 1 }}</th>
                <td>{{ Get24SevenProducts($invoice->product_id)['Name'] }}</td>
                <td>{{ $invoice->order_id }}</td>
                <td>{{ $invoice->invoice_id }}</td>
                <td>{{ $invoice->order_status }}</td>
                <td>{{ $invoice->date_invoiced }}</td>
                <td>{{ $invoice->name }}</td>
                <td class="text-center">{{ $invoice->quantity }}</td>
                <td class="text-end">{{ $invoice->price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@if (count(getVOrdersByProjectId($project->id)))
    <table class="table table-bordered">
        <thead>
            <th colspan="4" class="text-center font-14">VO Invoices</th>
            <tr>
                <th scope="col" class="text-secondary">#</th>
                <th scope="col" class="text-secondary">Date</th>
                <th scope="col" class="text-secondary">Description</th>
                <th scope="col" class="text-secondary">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach (getVOrdersByProjectId($project->id) as $index => $row)
                <tr>
                    <th scope="row">{{ $index + 1 }}</th>
                    <td>{{ SetDateFormat($row->created_at) }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->price * $row->hours }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<x-chat-box status="1" :moduleId="Project()->id" moduleName="LIVE_PROJECT"
    menuName="{{ str_replace('-', '_', strtoupper(request()->route()->menu_type)) }}" />
