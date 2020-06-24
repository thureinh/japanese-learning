@extends('template')
@section('content')

	<main id="maincontent">

		<section>

			<div class="container">
				<div class="row">
					@include('part.teachermenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="float-left d-inline-block mt-2">{{ $showwriting->title }}</h3>
						<div class="float-right mt-2">
							<a href="{{ route('writing.index') }}" class="btn btn-white-cardbutton">
								<i class="fas fa-angle-left pr-2"></i> Back
							</a>
						</div>
						<div class="clearfix"></div>
						
						<!-- instruction -->
						<div class="shadow p-3 mt-3">
						<h5 class="mb-4 py-2">Instruction</h5>
							{!! $showwriting->instruction !!}
							<div class="row mb-3">
								<div class="col-7">
									<span class="font-weight-bold text-gray-dark">Deadline - {{$showwriting->deadline->toFormattedDateString()}}</span>
								</div>
								<div class="col-5 text-right">
									<span>Maximum Mark: {{$showwriting->max_mark}}</span>
								</div>
							</div>
						</div>

						<!-- data table -->
						<div class="table-responsive shadow p-3 mt-3">
						<h5>Submitted Students ({{ count($detail) }}) </h5>
							<table id="writinglist" class="display table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Name</th>
										<th>Submitted Time</th>
										<th>Mark</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 0 @endphp
									@foreach($detail as $userwriting)
									@php $i++ @endphp 

									<tr>
										<td>{{ $i }}.</td>
										<td>{{ $userwriting->firstname }} {{ $userwriting->lastname }}</td>
										<td>{{ date('H:s, M d, Y', strtotime($userwriting->submitted_datetime)) }}</td>
										<td>
											@if($userwriting->userwriting->mark)
												{{ $userwriting->userwriting->mark }} / {{ $showwriting->max_mark }}
											@else
												-- / {{ $showwriting->max_mark }}
											@endif
										</td>
										<td>
											@if($userwriting->userwriting->status == 'Submitted')
												<span class="badge badge-info">Haven't checked</span>
											@else
												<span class="badge badge-success">{{ $userwriting->userwriting->status }}</span>
											@endif
										</td>
										<td class="action-td">
											<a href="{{ route('writing.checkwriting', [$userwriting->id, $showwriting->id]) }}" class="btn btn-outline-info btn-sm"><i class="fas fa-external-link-alt"></i> View</a>
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

@section('js')
	<script type="text/javascript">
		$(document).ready(function() {
	    var dt = $('#writinglist').DataTable({
	    	responsive: true
	    });
		});
	</script>
@endsection