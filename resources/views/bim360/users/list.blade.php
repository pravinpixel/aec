     
@extends('layouts.admin')

@section('admin-content')
         

<div class="card card-custom">
	<div class="card-body">
		<a class="btn btn-primary" href="{{ route('/bim360/users/create') }}">Create User</a>
		<hr class="my-4" />
		<table id="tblUserList" class="display stripe" style="width:100%">
			<thead class="bg-light-primary">
				<tr>
					<th></th>
					<th>Name</th>
					<th>Email</th>
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
	
	var listTable;

	function fillUsersList(projectdata) {
		listTable = $('#tblUserList').DataTable({
			data: projectdata,
			paging: true,
			searching: true,
			ordering: true,
			info: true,
			createdRow: function(row, data, dataIndex) {},

			columns: [{
					data: 'id',
					render: function(data, type, row, meta) {
						return "<a class='text-white p-2' target='_blank' href='" + "{{ route('/bim360/users/detail')}}?id=" + data + "'><i class='flaticon-eye text-info'></i></a><a class='text-white p-2' target='_blank' href='" + "{{ route('/bim360/users/edit')}}?id=" + data + "' ><i class='flaticon-edit text-info'></i></a>";
					}
				},
				{
					data: 'nickname'
				},
				{
					data: 'email'
				}
			],
		});

	}

	function loadCompanyList() {
		var fd = new FormData();
		fd.append('_token', '{{csrf_token()}}');
		$.ajax({
			url: "{{ route('/bim360/Users/getuserlist') }}",
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				fillUsersList(response);
			},
		});
	}

	$(document).ready(function() {
		loadCompanyList();
	});
</script>
@endsection