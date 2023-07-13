<SaveInvoices xmlns="http://24sevenOffice.com/webservices">
    <invoices>
        @foreach ($invoices as $invoice)
            <InvoiceOrder>
                <OrderId>1005</OrderId>
                <DateInvoiced>2023-07-13</DateInvoiced>
                <CustomerId>12</CustomerId>
                <OrderStatus>Invoiced</OrderStatus>
                <InvoiceRows>
                    <InvoiceRow>
                        <ProductId>{{ $invoice['ProductId'] }}</ProductId>
                        <Price>{{ $invoice['Price'] }}</Price>
                        <Name>{{ $invoice['Name'] }}</Name>
                        <Quantity>{{ $invoice['Quantity'] }}</Quantity>
                    </InvoiceRow>
                </InvoiceRows>
            </InvoiceOrder>
        @endforeach
    </invoices>
</SaveInvoices>
