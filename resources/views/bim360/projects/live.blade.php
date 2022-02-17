{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

<div class="card card-custom">
	<div class="card-body">
		<a class="btn btn-primary" href="{{ route('/bim360/projects/create') }}">Create Project</a>
		<hr class="my-4" />
		<table id="tblProjectList" class="display stripe" style="width:100%">
			<thead class="bg-light-primary">
				<tr>
					<th></th>
					<th>Project Name</th>
					<th>Job Number</th>
					<th>Construction Type</th>
					<th>Contract Type</th>
					<th>Value</th>
					<th>Start Date</th>
					<th>End Updated</th>
					<th>Status</th>
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
	var projectListTable;
	function fillProjectList(projectdata) {
		projectListTable = $('#tblProjectList').DataTable({
			data: projectdata,
			paging: true,
			searching: true,
			ordering: true,
			info: true,
			createdRow: function(row, data, dataIndex) {
			},

			columns: [
				{
					data: 'id',
					render: function(data, type, row, meta) {
						return "<a class='text-white p-2' target='_blank' href='"+"{{ route('/bim360/projects/detail')}}?id=" + data+"'><i class='flaticon-eye text-info'></i></a><a class='text-white p-2' target='_blank' href='"+"{{ route('/bim360/projects/edit')}}?id=" + data+"' ><i class='flaticon-edit text-info'></i></a>";
					}
				},
				{
					data: 'name',
				},
				{
					data: 'job_number',
				},
				{
					data: 'construction_type',
				},
				{
					data: 'contract_type',
				},
				{
					data: 'value',
					render:function(data,type,row,meta){
						var amount=data;
						var unit=row['currency'];
						if(amount==null)
						{
							amount='';
						}
						if(unit==null){
							unit='';
						}
						return amount+' '+unit;
					}
				},
				{
					data: 'start_date',
				},
				{
					data: 'end_date',
				},
				{
					data: 'status',
				}
			],
		});

	}

	function loadProjectList() {
		var fd = new FormData();
		fd.append('_token', '{{csrf_token()}}');
		$.ajax({
			url: "{{ route('/bim360/projects/getliveprojects') }}",
			type: 'post',
			data: fd,
			contentType: false,
			processData: false,
			success: function(response) {
				console.log(response);
				fillProjectList(response);
			},
		});
	}

	$(document).ready(function() {
		loadProjectList();
	});
	
</script>
@endsection