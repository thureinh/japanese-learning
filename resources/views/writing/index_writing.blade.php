@extends('template')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/customs/deleteform.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<style type="text/css">
	#draw svg {
		padding: 5px;
	}
	.note-editor.note-frame {
	    border: 0.5px solid #ccc;
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
						<h3 class="float-left d-inline-block mt-2">Writing</h3>
						<div class="float-right mt-2">
							<a class="btn btn-white-cardbutton" href="{{route('writing.create')}}">
								<i class="fas fa-plus pr-2"></i> Add New
							</a>
						</div>
						<div class="clearfix"></div>
						
						<!-- data table -->
						<div class="table-responsive shadow p-3 mt-3">
						<h5>All Writing List</h5>
							<table id="writinglist" class="display table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Topic</th>
										<th>Submitted Students</th>
										<th>Deadline</th>
										<th>Created at</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 0 @endphp
									@foreach($writings as $writing)
									@php $i++ @endphp 
									<tr id='tr-{{$writing->id}}'>
										<td>{{$i}}.</td>
										<td>{{$writing->title}}</td>
										<td></td>
										<td>{{$writing->deadline->toFormattedDateString()}}</td>
										<td>{{$writing->created_at->toFormattedDateString()}}</td>
										<td class="action-td">
											<a href="{{route('writing.show', $writing->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-external-link-alt"></i> View</a>

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
		    var dt = $('#writinglist').DataTable({
		    	responsive: true
		    });
			let asynctable = new AsyncTable(dt, "{{csrf_token()}}", "{{url('writing')}}");
		   	$('#writinglist tbody').on('click', 'a.delete-bttn', event => {
				let tr = $(event.target).closest('tr');
				asynctable.targetRow = tr;
			});
			$('#deleteModal button.btn-danger').on('click', event => {
				asynctable.deleteRow();
			});
		});
	</script>
@endsection