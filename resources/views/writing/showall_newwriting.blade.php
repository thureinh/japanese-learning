@extends('template')

@section('content')
	<main id="maincontent">

		<section>

			<div class="container">
				<div class="row">
					@include('part.studentmenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">Writing List</h3>
						<!-- <div class="float-right mt-2">
							<a class="btn btn-white-cardbutton" href="{{route('writing.create')}}">
								<i class="fas fa-plus pr-2"></i> Add New
							</a>
						</div> -->
						<div class="clearfix"></div>

						<!-- new writings -->
						<h5 class="float-left d-inline">New</h5>
						<div class="float-right">
							<a href="{{ route('writing.studentwritinglist') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>
								
						@if (count($newwritings) == 0)

							<p class="ml-3 font-italic">Woohoo, there is no new writing...</p>
							<hr>

						@else

							<div class="row mb-5">

								@php 
									$i = 0;
									$today = date('Y-m-d') 
								@endphp
								@foreach($newwritings as $newwriting)
								@php $i++ @endphp 

								<div class="col-sm-12 col-md-6">
									<div class="writing-card shadow px-4 pt-4 pb-3">
										<h6 class="title-h6">Title - {{$newwriting->title}}</h6>
										<p class="mb-3">{!!$newwriting->instruction!!}</p>
										<div class="row">
											<div class="col-6"><small class="font-weight-bold text-gray-dark">Dead line - {{ date('M d, Y', strtotime($newwriting->deadline))}}</small></div>


											<div class="col-6 text-right font-italic text-secondary"><small class="mr-3">
												Posted at
												@if (date('Y-m-d', strtotime($newwriting->created_at)) == $today)
													{{ date('h:m A', strtotime($newwriting->created_at)) }}
												@else 
													{{ date('d.m.Y', strtotime($newwriting->created_at)) }}
												@endif
											</small></div>
										</div>
										<p class="text-right my-2"><a href="{{ route('writing.studentwriting',  $newwriting->id) }}" class="btn"><i class="fas fa-pen-alt"></i> Start Writing</a>
										</p>
									</div>
								</div>

								@endforeach

							</div> <!-- second inner row end -->

						@endif

					</div>
				</div> <!-- row end -->
			</div>	<!-- container end -->

		</section>

	</main>
@endsection

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
	    var dt = $('#writinglist').DataTable({
	    	responsive: true
	    });

		});
	</script>
@endsection