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
					@include('part.studentmenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">Title -「 {{ $writing->title }} 」</h3>
						<div class="float-right mt-2">
							<a href="{{ route('writing.studentwritinglist') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- instruction -->
						<div class="shadow px-4 py-3 mb-5">
							<h5 class="mb-4 py-2">Instruction</h5>
							{!! $writing->instruction !!}

							<div class="row mb-3">
								<div class="col-7">
									<span class="font-weight-bold text-gray-dark">Deadline - {{$writing->deadline->toFormattedDateString()}}</span>
								</div>
								<div class="col-5 text-right">
									<span>Maximum Mark: {{$writing->max_mark}}</span>
								</div>
							</div>
						</div>

						<!-- writing -->

						<form class="edited-form" method="POST" action="{{ route('writing.storewriting', $writing->id) }}">
    					@csrf

    					<textarea id="summernote" name="writing" class="w-100">{{ old('writing') }}</textarea>

    					<div class="row mt-5 mb-3">
			       		<div class="col-6">
			       			<button type="submit" name="btnsave" class="btn btn-outline-secondary btn-block py-2" value="save"><i class="fas fa-bookmark mr-2"></i> Save</button>
			       		</div>
			       		<div class="col-6">
			       			<button type="submit" name="btnsubmit" class="btn btn-add btn-block py-2" value="submit"><i class="fas fa-cloud-upload-alt mr-2"></i> Submit</button>
			       		</div>
			       	</div>

    				</form>

					</div> <!-- sub-menu-content end -->
				</div> <!-- row end -->
			</div>	<!-- container end -->

		</section>

	</main>
@endsection

@section('js')
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
		  var v = '{{$writing->student_writing}}';
		  console.log(v);
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

		  $("#summernote").summernote("code", "{!! $userwriting->student_writing !!}");
		  $('#summernote').summernote('focus');
		});
	</script>
@endsection