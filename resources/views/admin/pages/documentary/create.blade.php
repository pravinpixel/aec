     
@extends('layouts.admin')

@section('admin-content')
    <div class="content-page" >
        <div class="content">
            @include('admin.includes.top-bar')
            <div class="container-fluid">
                @include('admin.includes.page-navigater') 
            </div>                
            <form action="{{ route('admin.store-documentary') }}" method="POST">
                @method('POST')
                @csrf
                <div class="card shadow-sm border">
                    <div class="card-header bg-light d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <label class="form-label m-0 px-3" >Title<sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control col-6"  name="documentary_title" value="{{ old('documentary_title') }}" placeholder="Type Here..." ng-required="true">
                        </div>
                        <div>
                            <a class="btn btn-light btn-sm border shadow-sm"
                                data-bs-toggle="collapse" href="#collapseFour"
                                aria-expanded="true" aria-controls="collapseFour">
                                View merge fields  <i
                                    class="mdi mdi-chevron-down accordion-arrow"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="collapseFour" class="collapse show"
                            aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <table class="table table-bordered border shadow-sm">
                                <thead>
                                    <tr class="bg-light"> 
                                        <th scope="col"><b>Enquiries</b></th>
                                        <th scope="col"><b>Customer</b></th>
                                        <th scope="col"><b>Others</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="">
                                        <td scope="row">
                                            <table>
                                                @foreach ($enquiries as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td scope="row">
                                            <table>
                                                @foreach ($customers as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                        <td scope="row"  style="vertical-align: top !important">
                                            <table>
                                                @foreach ($user_data as $name =>  $var)
                                                    <tr>
                                                        <td><small>{{ $name }}</small></td> 
                                                        <td class="px-2">-</td> 
                                                        <td class="text-primary"><small>{ {{ $var }} }</small></td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <textarea name="documentary_content" id="textEditor">
                                <table class="table custom table-borderless">
                                    <tr>
                                        <td>
                                            <h1>{project_name}</h1>
                                        </td>
                                        <td>
                                            <img width="150px" src="{{ asset("public/assets/images/logo_customer.png") }}" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Offer: {offer_no}  Revision: {revision_no},<br>
                                        <strong> To</strong><br>
                                        <strong>{full_name}</strong><br>
                                        <strong>{organization_number}</strong><br>
                                    
                                        <strong>{customer_address}</strong><br>

                                        </td>
                                        <td width="20%">Date: {today_date}</td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Our ref: {admin_user}</td>
                                        <td>Your ref: </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Re.: {document_title}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>1. Leveransepris</strong>
                                            <ol>
                                                <li>We thank you for your request and hereby send offers for the provision of engineering services for concrete elements as directed in their attached documents by e-mail of Wednesday 05.01.2022. The project for item delivery is <strong>{project_name}</strong>.</li>
                                                <li>Chapter 2 below indicates delivery that applies to the price given. We understand that staircases are not included in the price, and that you get hole decks for roofs from others. Thus, hole cover also expires from the delivery. But global statics are to be included. The total price for the delivery of engineering documentation and the relevant project coordination of engineering work are: <strong>{project_cost} kr + mva</strong></li>
                                                <li>Pris for sideman control is included and responsibility is accepted for RIB engineering of elements with respect to solutions and static strength for all components specified.</li>
                                                <li>All prices are exclusive of VAT.</li>
                                            </ol>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>2. Leveransebeskrivelse</strong>
                                            <p>The delivery includes all digital production drawings for items specified in the delivery price table.</p>
                                            <p>Structures for documented calculations</p>
                                            <ol>
                                                <li>Veggelementer</li>
                                                <li>Internal Firewall</li>
                                            </ol>
                                            <p>Digital produksjonstegninger</p>
                                            <ol>
                                                <li>Produksjonstegninger</li>
                                                <li>All necessary details</li>
                                                <li>Structure drawings of all elements</li>
                                                <li>Production drawings of all elements</li>
                                                <li>Montasjetegninger</li>
                                            </ol>
                                        </td>                                    
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>3.  Prerequisites, avtale and delivery plan </strong></p> 
                                            <p><strong>3.1  Prerequisites for offers </strong></p> 
                                            <p>The offer is based on some assumptions/caveats as follows. If these assumptions are not proved to be true, or otherwise fail or prove incorrect, this may lead to adjustments in progress/fulfilment of the deadlines for consequences from the Purchase Order that are to be perceived as the agreement in this context.</p><br>
                                            <p>The following assumptions are specified in connection with the offer:</p>
                                            <ol>
                                                <li>Agreed project implementation plan - It is therefore assumed that we arrive at an agreed progress plan that is feasible for both parties.  AEC Prefab needs 4-5 weeks from the agreed start-up until we can deliver the product digitally. The pleas agree on a decision plan that has realistic deadlines for feedback and/or confirmation of factors that AEC Prefab needs to clarify in order to maintain the production of drawings and elements  safely in accordance with the agreed progress plan.   It should be added a couple of weeks for slack in relation to this. So 8 weeks of production time looks like a good plan on our part.</li>
                                                <li>Information about existing buildings - It is assumed that TB will receive an IFC model and sufficient information about existing buildings, including structural details, for modeling the concrete structure and performing static calculations.  This means that reports from previous works are made available to AEC Prefab so that we can ensure power transmissions in a prudent manner.</li>
                                                <li>Payment plan – AEC Prefab assumes that a agreed payment plan is reached that involves 50% in advance, 50% after completing the assignment, 30 days payment plan. Any changes must be clarified especially along the way.</li>
                                                <li>The caveats and provisions contained in this offer are repeated in the Purchase Order which, upon signing, applies as an agreement for the assignment.</li>
                                            
                                            </ol>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>3.2  Duration of offer and confirmation</strong>
                                            <p>Offer valid until 14 days from today' date. If they wish to accept the offer we ask that they confirm this in writing by email before the end of this time.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>3.3  Leveranseplan</strong>
                                            <p>The start date  of the design assignment is set by the signature of purchase orders that form the basis for our production planning.  An internal progress plan is drawn up for the assignment, in accordance with the aforementioned agreed project execution plan (Egersund Betongteknikk sin project plan) and the assignment then goes into our production plan.</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>4. Attachment to offer</strong>
                                            <p>Nobody</p>
                                            
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>
                                                For AEC Prefab AS <br><br>
                                                Sincerely,<br>
                                                <strong style="font-size: 15px;">{admin_user}</strong><br>
                                                <strong style="font-size: 15px;">{role}</strong>  <br>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </textarea>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <a href="{{ route('admin-documentary-view') }}" class="btn btn-light border me-2">Cancle & Back</a>
                        <button type="submit" class="btn btn-success">Save & Submit</button>
                    </div>
                </div>
            </form>
        </div> <!-- content -->
    </div> 
@endsection
           
@push('custom-scripts')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> 
    <script>
        CKEDITOR.replace( 'textEditor',{
            height : 500
        });
    </script>
@endpush