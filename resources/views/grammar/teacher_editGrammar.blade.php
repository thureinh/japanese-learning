@extends('template')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/drawerjs/dist/drawerJs.css') }}"/>
@endsection
@section('content')
	<main id="maincontent">

		<section>

			<div class="container">
				<div class="row">
					@include('part.teachermenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">New Grammar</h3>
						<div class="float-right mt-2">
							<a href="{{ route('grammar.show', ['grammar' => $grammar->id]) }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- Adding new vocabularies -->
						<div class="shadow px-4 py-3 mb-5">
							<h5 class="mb-4 py-2">Add New Grammar</h5>
					<form id="myForm" class="edited-form" method="POST" action="{{ route('grammar.update', ['grammar' => $grammar->id]) }}">
      				@csrf
      				@method('PUT')
      					<div class="row">
      						<div class="col-12">
      							<div class="group">
								  <input  id="grammar_topic" type="text" name="grammar_topic" required autocomplete="off" value="{{ $grammar->title }}" autofocus>
						          <span class="highlight"></span>
						          <span class="bar"></span>
						          @error('grammar_topic')
		                    <span class="error-text">{{ $message }}</span>
		                  @enderror
						          <label>Grammar Topic</label>
						        </div>
      						</div>
      					</div>
						<div class="row my-3">
								<div id="canvas-editor" class="d-flex justify-content-center mx-auto"></div>
						</div>
						<div id="editor" data-previous='{!! $grammar->example !!}'></div>
						<div class="row">
							<div class="col-6">
								<button type="submit" class="btn btn-add w-100 py-2 my-4">Update Grammar</button>
							</div>
							<div class="col-6">
								<a role="button" href="{{ route('grammar.show', ['grammar' => $grammar->id]) }}" class="btn btn-add w-100 py-2 my-4 text-white">Cancel</a>
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
	<script src="{{ asset('assets/drawerjs/dist/drawerJs.standalone.min.js') }}"></script>

	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/customs/drawerLocalization.js')}}"></script>
	<script type="text/javascript">
		var img_url = "{{asset('assets/img/white.png')}}";
		var serverCanvasData = @json($grammar->explanation);
	</script>
	<script type="text/javascript" src="{{asset('assets/customs/drawerConfig.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/customs/b64toBlob.js')}}"></script>
	<script type="text/javascript">
		$(':submit').on('click', function(e){
			window.onbeforeunload = null;
			e.preventDefault();
			drawer.api.startEditing();
		 	var myContent = tinymce.activeEditor.getContent();
			var serializedCanvasData = drawer.api.getCanvasAsJSON();
			var imageData = drawer.api.getCanvasAsImage();
			drawer.api.stopEditing();
		      $("<input />").attr("type", "hidden")
					        .attr("name", "explanation")
					        .attr("value", serializedCanvasData)
					        .appendTo("#myForm");
		      $("<input />").attr("type", "hidden")
		       	  			.attr("name", "example")
		       	  			.attr("value", myContent)
		       	  			.appendTo("#myForm");
		    var form = document.getElementById('myForm');
		    var formData = new FormData(form);
		    const b64Data = imageData.substr(imageData.indexOf(',') + 1);
		    const blob = b64toBlob(b64Data, 'image/png');
		    formData.append("explain_img", blob, "explanation.png");
		    $.ajax({
			  url: "{{ route('grammar.update', ['grammar' => $grammar->id]) }}",
			  method: 'POST',
			  data: formData,
			  processData: false,
			  contentType: false,
			  beforeSend: function( xhr ) {
			    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}')
			  }
			})
			.done(function( data ) {
			    window.location.replace(data);
			});
		});
	</script>
@endsection