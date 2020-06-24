@extends('template')

@section('css')
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
	<style type="text/css">
		.note-editor.note-frame {
	    border: 0.5px solid #eee;
	    box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
	    padding: 15px;
		}
		.note-editable p {
			margin-bottom: 15px !important;
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
						<h3 class="float-left d-inline-block mt-2">{{ $writing->title }}</h3>
						<div class="float-right mt-2">
							<a href="{{ route('writing.show', $writing->id) }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<form class="edited-form">
						@foreach($userwriting as $uw)
						<!-- before writing -->
						<div class="shadow p-3 mt-3">
						<h5 class="mb-3 py-2">Student Info</h5>
							<div class="row mb-2">
								<div class="col-3 font-weight-bold">Name: </div>
								<div class="col-9">{{ $uw->firstname }} {{ $uw->lastname }} (C1 - {{ $uw->roll_no }})</div>
							</div>
							<div class="row mb-2">
								<div class="col-3 font-weight-bold">Submitted Time: </div>
								<div class="col-9">{{ date('H:s, M d, Y', strtotime($uw->userwriting->submitted_datetime)) }}</div>
							</div>
							<div class="row mb-2 mt-4">
								<div class="col-6 col-md-5">
									<div class="group mb-3">      
					          <input  id="mark" type="text" name="mark" required>
					          <span class="highlight"></span>
					          <span class="bar"></span>
					          <label>Mark</label>
							    </div>
								</div>
								<div class="col-6 col-md-1 pt-3">/ {{$writing->max_mark}}</div>
								<div class="col-6 col-md-3 pt-2">
									<button type="submit" class="btn btn-add btn-block">Done</button>
								</div>
								<div class="col-6 col-md-3 pt-2">
									<button type="button" id="btnedit" class="btn btn-outline-secondary btn-block">Edit Mistake</button>
									<button type="button" id="btnback" class="btn btn-outline-secondary btn-block mt-0">Back</button>
								</div>
							</div>
						</div>

						<div class="shadow p-3 mt-3" id="studentwriting">
							<h5 class="mb-3 py-2">Writing</h5>
							{!! $uw->userwriting->student_writing !!}
						</div>

						<div class="mt-3" id="checkwriting">
							<textarea id="summernote" name="checkwriting" class="w-100">{{ $uw->userwriting->student_writing }}</textarea>
						</div>

						@endforeach
						</form>

					</div>
				</div> <!-- row -->
			</div>	<!-- container end -->

		</section>

	</main>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

	<script type="text/javascript">
		$('#checkwriting').hide();
		$('#btnback').hide();
		$(document).ready(function() {

			$('#btnedit').click(function(){
				$('#studentwriting').hide(500);
				$('#checkwriting').show(500);

				$('#btnedit').hide();
				$('#btnback').show();
			});

			$('#btnback').click(function(){
				$('#checkwriting').hide(100);
				$('#studentwriting').show(100);

				$('#btnedit').show();
				$('#btnback').hide();
			});

		  $('#summernote').summernote({
		  	placeholder: 'Start writing here...',
		  	dialogsFade: true,
		  	shortcuts: true,
		  	height: 450,                 
			  minHeight: 200,
			  maxHeight: 1000,
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
		  $('#summernote').summernote('focus');
		});

	</script>
@endsection