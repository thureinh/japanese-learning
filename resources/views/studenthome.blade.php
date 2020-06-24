@extends('template')

@section('content')

	<main id="maincontent">

		<section >
			<div class="container">
				<div class="row">
					@include('part.studentmenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="mt-2">Student's Dashboard</h3>

						<!-- summary cards -->
						<h5>Summary</h5>

						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="row card-body px-4">
										<div class="col-5 col-md-4">
											<i class="fas fa-swatchbook fa-3x green"></i>
										</div>
										<div class="col-7 col-md-8">
											<div class="numbers text-right">
												<span>302</span>
												<p class="m-0">TOTAL MARKS</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="card">
									<div class="row card-body px-4">
										<div class="col-5 col-md-4">
											<i class="fas fa-pencil-ruler fa-3x yellow"></i>
										</div>
										<div class="col-7 col-md-8">
											<div class="numbers text-right">
												<span>20</span>
												<p class="m-0">PRACTICES</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="card">
									<div class="row card-body px-4">
										<div class="col-5 col-md-4">
											<i class="fas fa-clipboard-check fa-3x text-info"></i>
										</div>
										<div class="col-7 col-md-8">
											<div class="numbers text-right">
												<span>2</span>
												<p class="m-0">TEST TAKEN</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- This week table -->
						<h5>Lectures of this week</h5>
						<div class="shadow p-4 table-responsive mb-5">
							<table class="table table-hover border-bottom">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Title</th>
									<th scope="col">Type</th>
									<th scope="col">Date</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Kanji</td>
									<td>Lecture</td>
									<td>17 Mar, 2020</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Grammar</td>
									<td>Exercise</td>
									<td>17 Mar, 2020</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Reading</td>
									<td>Exercise</td>
									<td>15 Mar, 2020</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>Vocabulary</td>
									<td>Lecture</td>
									<td>13 Mar, 2020</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td>Writing</td>
									<td>Exercise</td>
									<td>11 Mar, 2020</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
							</tbody>
							</table>
						</div>
						
						<!-- Progress -->
						<h5>Progress</h5>
						<div class="row mb-4">
							<div class="col-lg-8">
								<div class="shadow table-responsive p-3">
								<h6>Last Result</h6>
									<table class="table table-hover border-bottom">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Title</th>
												<th scope="col">Status</th>
												<th scope="col">Mark</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Kanji</td>
												<td><span class="badge badge-success">checked</span></td>
												<td>10</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Grammar</td>
												<td><span class="badge badge-success">checked</span></td>
												<td>15</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Writing</td>
												<td><span class="badge badge-success">checked</span></td>
												<td>20</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="shadow table-responsive p-3">
									<h6>Top 3</h6>
									<table class="table table-hover border-bottom">
										<thead>
											<tr>
												<th scope="col">Name</th>
												<th scope="col" class="text-right">Rank</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													<img src="{{ asset('assets/img/testimonial-2.jpg')}}" width="30px" class="rounded-circle mr-2">Ren
												</td>
												<th scope="row" class="text-right">1</th>
											</tr>
											<tr>
												<td>
													<img src="{{ asset('assets/img/testimonial-3.jpg')}}" width="30px" class="rounded-circle mr-2">Krystal
												</td>
												<th scope="row" class="text-right">2</th>
											</tr>
											<tr>
												<td>
													<img src="{{ asset('assets/img/testimonial-4.jpg')}}" width="30px" class="rounded-circle mr-2">Kazuki
												</td>
												<th scope="row" class="text-right">3</th>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>

	</main>

@endsection