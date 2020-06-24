@extends('template')

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/customs/deleteform.css') }}">
<style type="text/css">
	@media (max-width: 768px) {
		.action-td {
			width: 200px;
			display: block;
		}
	}
</style>
@endsection

@section('content')

	<main id="maincontent">

		<section>

			<div class="container">
				<div class="row">
					@include('part.teachermenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">Grammar</h3>
						<div class="float-right mt-2">
							<a href="{{ route('grammar.create') }}" class="btn btn-white-cardbutton" role="button">
								<i class="fas fa-plus pr-2"></i> Add New
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- practice -->
						<div class="my-4">
							<a href="#" class="btn btn-block btn-white-cardbutton rounded-0">
								<i class="fas fa-plus-circle pr-2"></i> Create Practice Question
							</a>
						</div>
						
						<!-- data table -->
						<div class="table-responsive shadow p-3 mt-3">
						<h5>All Vocabulary List</h5>
							<table id="vocablist" class="display table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Topic</th>
										<th>Create at</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 0 @endphp
									@foreach($grammars as $grammar)
									@php $i++ @endphp 
									<tr id='tr-{{$grammar->id}}'>
										<td>{{$i}}.</td>
										<td>{{$grammar->title}}</td>
										<td>{{$grammar->created_at->toFormattedDateString()}}</td>
										<td class="action-td">
											<a href="{{route('grammar.show', $grammar->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-external-link-alt"></i> View</a>

											<a href="#deleteModal" data-toggle="modal" name="btndelete" class="btn btn-outline-danger btn-sm delete-bttn"><i class="far fa-trash-alt"></i> Remove</a>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

					</div>
				</div> <!-- row -->
			</div>	<!-- container end -->

		</section>

	</main>

@endsection

@section('modal')
	@include('modals.delete_confirm')
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('assets/customs/asynctable.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    var dt = $('#vocablist').DataTable({
		    	responsive: true
		    });
		    let asynctable = new AsyncTable(dt, "{{csrf_token()}}", "{{url('grammar')}}");
			$('#vocablist tbody').on('click', 'a.delete-bttn', event => {
				let tr = $(event.target).closest('tr');
				asynctable.targetRow = tr;
			});
			$('#deleteModal button.btn-danger').on('click', event => {
				asynctable.deleteRow();
			});
		});
	</script>
@endsection