@extends('template')

@section('content')
	<main id="maincontent">
		<section>
			<div class="container">
				<div class="row">
					@include('part.studentmenu')
					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">Dictionary</h3>
						<div class="clearfix"></div>
						<div id="dictionary"></div>
					</div>
				</div> <!-- row end -->
			</div>	<!-- container end -->
		</section>
	</main>
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
@endsection