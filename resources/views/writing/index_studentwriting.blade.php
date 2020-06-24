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
						<h5 class="d-inline float-left">New</h5><a href="{{route('writing.showallnew')}}" class="float-right">View all</a>	
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


<!-- DRAFTS -->
						<!-- new writings -->
						<h5 class="d-inline float-left">Drafts</h5><a href="{{route('writing.showalldraft')}}" class="float-right">View all</a>	
						<div class="clearfix"></div>						
						@if (count($draftwritings) == 0)

							<p class="ml-3 font-italic">Woohoo, there is no draft writing...</p>
							<hr>

						@else

							<div class="row mb-5">

								@php 
									$i = 0;
									$today = date('Y-m-d') 
								@endphp
								@foreach($draftwritings as $draftwriting)
								@php $i++ @endphp 

								<div class="col-sm-12 col-md-6">
									<div class="writing-card shadow px-4 pt-4 pb-3">
										<h6 class="title-h6">Title - {{$draftwriting->title}}</h6>
										<p class="mb-3">{!!$draftwriting->instruction!!}</p>
										<div class="row">
											<div class="col-6"><small class="font-weight-bold text-gray-dark">Dead line - {{ date('M d, Y', strtotime($draftwriting->deadline))}}</small></div>


											<div class="col-6 text-right font-italic text-secondary"><small class="mr-3">
												Posted at
												@if (date('Y-m-d', strtotime($draftwriting->created_at)) == $today)
													{{ date('h:m A', strtotime($draftwriting->created_at)) }}
												@else 
													{{ date('d.m.Y', strtotime($draftwriting->created_at)) }}
												@endif
											</small></div>
										</div>

										<form class="edited-form" method="POST" action="{{ route('writing.storewriting', $draftwriting->id) }}">
    										@csrf
    										<input type="hidden" name="just_submit" value="true" />
    									</form>

										<p class="text-right my-2">
											<a href="#" onclick="document.getElementsByClassName('edited-form')[0].submit()" class="btn"><i class="fas fa-cloud-upload-alt"></i> Submit</a>
											<a href="{{ route('writing.edit',  $draftwriting->id) }}" class="btn"><i class="fas fa-pen-alt"></i> Edit</a>
										</p>
									</div>
								</div>

								@endforeach

							</div> <!-- second inner row end -->

						@endif


						<!-- past writing list -->
						<h5 class="mt-3">Past Writings</h5>
						<div class="table-responsive shadow p-3 mt-3">
							<table id="writinglist" class="display table table-bordered table-hover">
								<thead>
									<tr>
										<th>No.</th>
										<th>Title</th>
										<th>Mark</th>
										<th>Status</th>
										<th>Submitted Time</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@php $i = 0 @endphp
									@foreach($userwritings as $userwriting)
									@php $i++ @endphp 
									<tr>
										<td>{{$i}}.</td>
										<td>{{$userwriting->title}}</td>
										<td>
											@if (!$userwriting->userwriting->mark)
												?? / {{$userwriting->max_mark}}
											@else
											  {{$userwriting->userwriting->mark}} / {{$userwriting->max_mark}}
											@endif
										</td>
										<td>
											@if ($userwriting->userwriting->status == 'Submitted')
												<span class="badge badge-info">{{$userwriting->userwriting->status}}</span>
											@elseif ($userwriting->userwriting->status == 'Checked') 
												<span class="badge badge-success">{{$userwriting->userwriting->status}}</span>
											@endif
										</td>
										<td>{{ date('H:s, M d, Y', strtotime($userwriting->userwriting->submitted_datetime)) }}</td>
										<td class="action-td">
											<a href="" class="btn btn-outline-info btn-sm"><i class="fas fa-external-link-alt"></i> View</a>

										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>

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