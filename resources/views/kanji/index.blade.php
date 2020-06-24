@extends('template')

@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/customs/deleteform.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
	<style type="text/css">
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
						<h3 class="float-left d-inline-block mt-2">Kanji</h3>
						<div class="float-right mt-2">
							<a class="btn btn-white-cardbutton" href="{{route('kanji.create')}}">
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
						<h5>All Kanji List</h5>
							<table id="kanjilist" class="display table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kanji</th>
										<th>No of words</th>
										<th>Created at</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 0 @endphp
									@foreach($kanjis as $kanji)
									@php $i++ @endphp 
									<tr id="tr-{{$kanji->id}}">
										<td>{{$i}}.</td>
										<td>{{$kanji->kanji}}</td>
										<td>{{$kanji->kanjiwords_count}}</td>
										<td>{{$kanji->created_at->toFormattedDateString()}}</td>
										<td>
											<a href="{{route('kanji.show', $kanji->id)}}" class="btn btn-outline-info btn-sm"><i class="fas fa-external-link-alt"></i> View</a>

											<a href="#" class="btn btn-outline-success btn-sm edit-bttn" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>

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

	<!-- Edit Modal -->
	<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="staticBackdropLabel">Edit Form</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form id="updateForm" class="edited-form">
	      	  <input type="hidden" name="detail_update" value="true"/>

			  		<div class="form-row mt-4">
			  			<div class="form-group col-md-2">
			  				<div class="group">      
				          <input id="eInput1" type="text" name="kanji" required>
				          <span class="highlight"></span>
				          <span class="bar"></span>
				          <label>漢字</label>
						    </div>
			  			</div>
			  			<div class="form-group col-md-5">
			  				<div class="group">      
				          <input id="input003" type="text" name="onyomi" required>
				          <span class="highlight"></span>
				          <span class="bar"></span>
				          <label>音読み</label>
						    </div>
			  			</div>
			  			<div class="form-group col-md-5">
			  				<div class="group">      
				          <input id="input001" type="text" name="konyomi" required>
				          <span class="highlight"></span>
				          <span class="bar"></span>
				          <label>訓読み</label>
						    </div>
			  			</div>
			  		</div>

			  		<div class="form-row" style="margin-top: -30px;">
			  			<div class="form-group col-md-12">
			  				<p class="m-1">Example</p>
			  				<textarea class="form-control" name="example" id="summernote" rows="3"></textarea>
			  			</div>
			  		</div>	

			  		<div class="form-row">
			  			<div class="col-6 my-3">
			  				<button type="button" class="btn btn-outline-secondary btn-block py-2" data-dismiss="modal">Close</button>
			  			</div>
			  			<div class="col-6 my-3">
			  				<button type="submit" class="btn btn-add btn-block py-2" data-dismiss="modal">Update</button>
			  			</div>
			  		</div>
					</form>
				</div>
	    </div>
	  </div>
	</div>

@endsection

@section('js')
	<script type="text/javascript" src="{{asset('assets/customs/asynctable.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#summernote').summernote({
			  	dialogsFade: true,
			  	shortcuts: true,
			  	height: 150,                 
				  minHeight: 150,
				  maxHeight: 500,
				  toolbar: [
				    ['style', ['bold', 'italic', 'underline', 'clear']],
	  				['fontname', ['fontname']],
				    ['fontsize', ['fontsize']],
				    ['font', ['strikethrough', 'superscript', 'subscript']],
				    ['color', ['color']],
				    ['para', ['ul', 'ol', 'paragraph']],
				    ['height', ['height']]
				  ]
			});
		    var dt = $('#kanjilist').DataTable({
		    	responsive: true
		    });

			let asynctable = new AsyncTable(dt, "{{csrf_token()}}", "{{url('kanji')}}");
		   	$('#kanjilist tbody').on('click', 'a.delete-bttn', event => {
				let tr = $(event.target).closest('tr');
				asynctable.targetRow = tr;
			});
			$('#deleteModal button.btn-danger').on('click', event => {
				asynctable.deleteRow();
			});

			$('#kanjilist tbody').on('click', 'a.edit-bttn', event => {
				let tr = $(event.target).closest('tr');
				let modal_func = (data) => {
					$('#editModal').find('input[name="kanji"]').val(data.kanji);
					$('#editModal').find('input[name="onyomi"]').val(data.onyomi);
					$('#editModal').find('input[name="konyomi"]').val(data.konyomi);
					$('#summernote').summernote('code', data.example);
					$('#editModal').modal('show');
				}
				asynctable.targetRow = tr;
				asynctable.editRow(modal_func);
			});
			$('#editModal').on('click', ':submit', event => {
				event.preventDefault();
				let insertOrder = ['', 'kanji'];
				asynctable.updateRow($('#updateForm'), insertOrder);
			});
		});
	</script>
@endsection