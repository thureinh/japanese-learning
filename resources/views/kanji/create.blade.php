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
						<h3 class="float-left d-inline-block mt-2">New Kanji</h3>
						<div class="float-right mt-2">
							<a href="{{ route('kanji.index') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- Adding new vocabularies -->
						<div class="shadow px-4 py-3 mb-5">
							<h5 class="mb-4 py-2">Add New Kanji</h5>
							<form class="edited-form" method="POST" action="{{ route('kanji.store') }}">
      				@csrf
      					<div class="row">
      						<div class="col-12">
      							<div class="group">
											<input  id="kanji" type="text" name="kanji" required autocomplete="off" value="{{ old('kanji') }}" autofocus>
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('kanji')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>漢字</label>
						        </div>
      						</div>
      					</div>

								<div class="row">
									<div class="col-lg-6">
										<div class="group">
											<input  id="onyomi" type="text" name="onyomi" required autocomplete="off" value="{{ old('onyomi') }}">
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('onyomi')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>音読み</label>
						        </div>
									</div>
									<div class="col-lg-6">
										<div class="group">
											<input  id="kunyomi" type="text" name="kunyomi" required autocomplete="off" value="{{ old('kunyomi') }}">
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('kunyomi')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>訓読み</label>
						        </div>
									</div>
								</div>

								<div class="row">
									<div class="col-12 py-3">
										<textarea id="summernote" name="example" class="w-100">{{ old('example') }}</textarea>
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
		  	placeholder: 'Example sentence...',
		  	dialogsFade: true,
		  	shortcuts: true,
		  	height: 220,                 
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