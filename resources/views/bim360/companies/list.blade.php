{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
	<div class="card-body">
		<a class="btn btn-primary" href="{{ route('/bim360/companies/create') }}">Create Company</a>
		<hr class="my-4" />
		<table id="tblCompanyList" class="display stripe" style="width:100%">
			<thead class="bg-light-primary">
				<tr>
					<th></th>
					<th>Company Name</th>
					<th>Trade</th>
					<!-- <th>Address Line 1</th>
					<th>Address Line 2</th>
					<th>State/Province</th>
					<th>Country</th>
					<th>Phone</th>
					<th>Website</th> -->
					<th>Description</th>
					<th>ERP Id</th>
					<th>Tax Id</th>
				</tr>
			</thead>
		</table>
	</div>
</div>

@endsection

{{-- Styles Section --}}
@section('styles')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />

@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

{{-- page scripts --}}
<script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	// {
	// 	"name": "Jaguars",
	// 	"trade": "Concrete",
	// 	"address_line_1": "The Fifth Avenue",
	// 	"address_line_2": "#303",
	// 	"city": "New York",
	// 	"postal_code": "10011",
	// 	"state_or_province": "New York",
	// 	"country": "United States",
	// 	"phone": "(634)329-2353",
	// 	"website_url": "http://www.autodesk.com"
	// 	"description":"Jaguars is the world\"s largest concrete company."
	// 	"erp_id":"c79bf096-5a3e-41a4-aaf8-a771ed329047",
	// 	"tax_id":"413-07-5767"
	//   }
	var companyListTable;

	function fillCompaniesList(projectdata) {
		companyListTable = $('#tblCompanyList').DataTable({
			data: projectdata,
			paging: true,
			searching: true,
			ordering: true,
			info: true,
			createdRow: function(row, data, dataIndex) {},

			columns: [{
					data: 'id',
					render: function(data, type, row, meta) {
						return "<a class='text-white p-2' target='_blank' href='" + "{{ route('/bim360/companies/detail')}}?id=" + data + "'><i class='flaticon-eye text-info'></i></a><a class='text-white p-2' target='_blank' href='" + "{{ route('/bim360/companies/edit')}}?id=" + data + "' ><i class='flaticon-edit text-info'></i></a>";
					}
				},
				{
					data: 'name'
				},
				{
					data: 'trade'
				},
				// {
				// 	data: 'address_line_1'
				// },
				// {
				// 	data: 'address_line_2'
				// },
				// {
				// 	data: 'city'
				// },
				// {
				// 	data: 'postal_code'
				// },
				// {
				// 	data: 'state_or_province'
				// },
				// {
				// 	data: 'country'
				// },
				// {
				// 	data: 'phone'
				// },
				// {
				// 	data: 'website_url'
				// },
				{
					data: 'description'
				},
				{
					data: 'erp_id'
				},
				{
					data: 'tax_id'
				}
			],
		});

	}

	function loadCompanyList() {
		var fd = new FormData();
		fd.append('_token', '{{csrf_token()}}');
		$.ajax({
			url: "{{ route('/bim360/Companies/getcompanylist') }}",
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				fillCompaniesList(response);
			},
		});
	}

	$(document).ready(function() {
		loadCompanyList();
	});
</script>
@endsection