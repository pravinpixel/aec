<div class="modal-content h-100 w-100">
    <div class="modal-header">
        <h4 class="custom-modal-title d-flex align-items-center" id="create-variation-orderLabel"> 
            <b  class="text-primary">Create Invoice</b>
            <span> - VERSION - {{ $variation->version }}</span>
            <div class="vr mx-2"></div>
            <a href="{{ route('live-project.menus-index', ['menu_type' => 'issues', 'id' => session()->get('current_project')->id]) }}" class="btn-outline-primary btn-quick-view p-1">
                {{ $variation->VariationOrder->Issues->issue_id }}
            </a>
        </h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>
    <form class="modal-body" method="post" action="{{ route('live-project.store-invoice', $variation->id) }}">
        @csrf
        <table class="table table-lg border">
            <tbody>
                <tr>
                    <td>Title</td>
                    <td>:</td>
                    <th>{{ $variation->title }}</th>
                </tr>
                <tr>
                    <td>Description of Variation</td>
                    <td>:</td>
                    <th>{{ $variation->description }}</th>
                </tr>
                <tr>
                    <td>Estimated Hours</td>
                    <td>:</td>
                    <th>{{ $variation->hours }}</th>
                </tr>
                <tr>
                    <td>Estimated Price/Hr</td>
                    <td>:</td>
                    <th>{{ $variation->price }}</th>
                </tr>
                <tr>
                    <td>Total Cost:</td>
                    <td>:</td>
                    <th>{{ $variation->price * $variation->hours }}</th>
                </tr>
                @if ($variation->comments)
                    <tr class="bg-light">
                        <td>Change Request Comments</td>
                        <td>:</td>
                        <th>{{ $variation->comments }}</th>
                    </tr>
                @endif
            </tbody>
        </table>
        <table class="table table-lg border table-striped">
            <tbody>
                <tr><th colspan="3" class="text-primary text-center">Invoice Details</th></tr>
                <tr>
                    <td>Invoice Amount</td>
                    <td>:</td>
                    <th><input type="hidden" name="invoice_price" value="{{ $variation->price * $variation->hours }}"> {{ $variation->price * $variation->hours }}</th>
                </tr>
                <tr>
                    <td>Invoice Date</td>
                    <td>:</td> 
                    <th><input name="invoice_date" type="date" min="{{ date('Y-m-d') }}" class="border d-block w-100" required></th>
                </tr>
                <tr>
                    <td>24/7 Product</td>
                    <td>:</td>
                    <th>
                        <select name="24_seven_project_id" class="border d-block w-100" required>
                            <option value=""> -- select --</option>
                            @foreach (Get24SevenProducts() as $product)
                                <option value="{{ $product['Id'] }}">{{ $product['Name'] }}</option>
                            @endforeach
                        </select>
                    </th>
                </tr>
                <tr>
                    <td>Invoice Name</td>
                    <td>:</td>
                    <th>
                        <input type="text" name="invoice_name" class="border d-block w-100" required maxlength="60">
                    </th>
                </tr>
            </tbody>
        </table>
        <div class="text-end">
            <button type="submit" class="btn-primary rounded-pill">Create Invoice</button>
        </div>
    </form>
</div>