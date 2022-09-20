     
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
                    <div class="card-header bg-light">
                        <div class="d-flex align-items-center justify-content-between">
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
                        <div id="collapseFour" class="collapse"
                            aria-labelledby="headingFour"
                            data-bs-parent="#custom-accordion-one">
                            <div class="row m-0 pt-3">
                                @foreach (config('documentary.merge_data') as $key => $col)
                                    <div class="col-6">
                                        <x-accordion path="false" title="{{ $key }}" open="false">
                                            <table class="table table-striped border shadow-sm m-0">
                                                @foreach ($col as $colKey => $var )
                                                    <tr>
                                                        <th>{{ $colKey }}</th>
                                                        <td>-</td>
                                                        <td style="color: #9500ff">{ {{ $var }} }</td>
                                                    </tr>
                                                @endforeach 
                                            </table> 
                                        </x-accordion> 
                                    </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <div>
                            <textarea name="documentary_content" id="textEditor">
                                <table class="table custom table-borderless">
                                    <tr>
                                        <td>
                                            <h1>{project_name}</h1>
                                        </td>
                                        <td>
                                            <img width="150px" src="data:image/png;base64,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" alt="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Offer: {offer_no}  Revision: {revision_no},<br>
                                            <strong> To : </strong>
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