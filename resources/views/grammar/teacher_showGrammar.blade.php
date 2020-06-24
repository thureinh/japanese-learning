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
						<h3 class="float-left d-inline-block mt-2">{{ $grammar->title }}</h3>
						<div class="float-right mt-2">
							<a href="{{ route('grammar.index') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>

						<!-- Adding new vocabularies -->
						<div class="shadow px-4 py-3 mb-5">
						<div class="row my-3">
								<img src="{{asset($grammar->explainedimage)}}" width="800px" height="450px" class="rounded mx-auto d-block border border-dark" alt="explanation">
						</div>
						<div id="editor" data-previous='{!! $grammar->example !!}' data-readonly='true'></div>
						<div class="row">
							<div class="col-12">
								<a href="{{ route('grammar.edit', ['grammar' => $grammar->id]) }}" role="button" class="btn btn-add w-100 py-2 my-4 text-white">Edit Grammar</a>
							</div>
						</div>

						</div>

					</div> <!-- sub-menu-content end -->
				</div> <!-- row end -->
			</div>	<!-- container end -->

		</section>

	</main>
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection