@extends('template')

@section('css')
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
						<h3 class="float-left d-inline-block mt-2">New Writing</h3>
						<div class="float-right mt-2">
							<a href="{{ route('writing.index') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- Adding new writing -->
						<div class="shadow px-4 py-3 mb-5">
							<h5 class="mb-4 py-2">Add New Writing</h5>
							<form class="edited-form" method="POST" action="{{ route('writing.store') }}">
      				@csrf
      					<div class="row">
      						<div class="col-12">
      							<div class="group">
											<input  id="title" type="text" name="title" required autocomplete="off" value="{{ old('title') }}" autofocus>
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('title')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>Title</label>
						        </div>
      						</div>
      					</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="group">
											<input  id="maxmark" type="number" name="maxmark" required autocomplete="off" value="{{ old('maxmark') }}" min="1" max="100">
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('maxmark')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>Maximum Mark</label>
						        </div>
									</div>
									<div class="col-lg-6">
										@php 
											$date = date('Y-m-d');
											$mindate = date('Y-m-d', strtotime($date))." +1 day";
					        		$mindate = date('Y-m-d', strtotime($mindate));
										@endphp
										<div class="group">
											<input  id="deadline" type="date" name="deadline" required autocomplete="off" value="{{ old('deadline') }}" min="{{$mindate}}"> 
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('deadline')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label class="extra-label">Deadline</label>
						        </div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 py-3">
										<textarea id="summernote" name="instruction" class="w-100">{{ old('instruction') }}</textarea>
									</div>
								</div>
								

								<div class="row">
									<div class="col-12">
										<button type="submit" class="btn btn-add w-100 py-2 my-4">Add</button>
									</div>
								</div>
							</form>
						</div>

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
		  $('#summernote').summernote({
		  	placeholder: 'Instruction here...',
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
		});
	</script>
@endsection