@extends('template')
@section('content')
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<main id="maincontent">

		<section id="profile">

			<div class="container">
				<div class="row">
					<div class="col-md-3 profile-image">
						<div class="img-wrap shadow">
							<img src="{{ asset($student->profile_pic) }}" alt="5" class="img-fluid">
						</div>

						<div class="mobile-view pt-3">
							<h4 class="text-center">{{ $student->firstname }} {{ $student->lastname }}</h4>
							<h6 class="text-secondary text-center">Student</h6>
						</div>

						<div class="py-3">
							<a href='{{ url("/student/setting") }}' class="btn btn-add btn-block"><i class="far fa-edit"></i> Edit Profile</a>
							<a href="{{ route('password.request') }}" class="btn btn-outline-secondary btn-block"><i class="fas fa-key"></i> Change Password</a>
						</div>
					</div>

					<div class="col-md-9 sub-menu-content">
						<div class="px-lg-4">
							<div class="desktop-view">
								<h4>{{ $student->firstname }} {{ $student->lastname }}</h4>
								<h6 class="text-secondary">Student</h6>
							</div>

							<div class="shadow p-4 rounded info">
								<h6 class="font-italic" style="color: #aaa;">Basic Information</h6>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Name: </label>
									<div class="col-8 col-lg-9">{{ $student->firstname }} {{ $student->lastname }}</div>
								</div>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Date of Birth: </label>
									<div class="col-8 col-lg-9">{{ $student->dateofbirth->format('M j, Y') }}</div>
								</div>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Address: </label>
									<div class="col-8 col-lg-9">{{ $student->address }}</div>
								</div>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Email: </label>
									<div class="col-8 col-lg-9">{{ $student->email }}</div>
								</div>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Phone: </label>
									<div class="col-8 col-lg-9">{{ $student->phone }}</div>
								</div>

								<hr>

								<h6 class="font-italic" style="color: #aaa;">Class Information</h6>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Batch No: </label>
									<div class="col-8 col-lg-9"> Batch - {{ $student->batch_no }}</div>
								</div>
								<div class="row">
									<label class="col-4 col-lg-3 font-weight-bold">Roll No: </label>
									<div class="col-8 col-lg-9"> 1C - {{ $student->roll_no }}</div>
								</div>
							</div>


							<div class="my-4">
								<a href="{{ route('studenthome') }}" class="btn btn-block btn-white-cardbutton rounded-0">
									<i class="fas fa-home pr-2"></i> Back to Dashboard
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
@endsection