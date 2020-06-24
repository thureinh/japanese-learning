@extends('template')

@section('content')

	<main id="maincontent">

		<section >
			<div class="container">
				<div class="row">
					@include('part.teachermenu')

					<div class="col-lg-9 sub-menu-content">
						<h3 class="mt-2">Sensei's Dashboard</h3>

						<!-- summary cards -->
						<h5>Total</h5>

						<div class="row">
							<div class="col-lg-4">
								<div class="card">
									<div class="row card-body px-4">
										<div class="col-5 col-md-4">
											<i class="fas fa-user-friends fa-3x green"></i>
										</div>
										<div class="col-7 col-md-8">
											<div class="numbers text-right">
												<span>{{$studentcount}}</span>
												<p class="m-0">STUDENTS</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="card">
									<div class="row card-body px-4">
										<div class="col-5 col-md-4">
											<i class="fas fa-chalkboard-teacher fa-3x yellow"></i>
										</div>
										<div class="col-7 col-md-8">
											<div class="numbers text-right">
												<span>{{$teachercount}}</span>
												<p class="m-0">TEACHERS</p>
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
												<p class="m-0">TEST CREATED</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Student list -->
						<h5>Top 5 of This Month</h5>
						<div class="shadow p-4 table-responsive mb-5">
							<table class="table table-hover border-bottom">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Name</th>
									<th scope="col">Roll No</th>
									<th scope="col">Total Marks</th>
									<th scope="col">Action</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row">1</th>
									<td>Ren</td>
									<td>C100 - 1</td>
									<td>304</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">2</th>
									<td>Krystal</td>
									<td>C100 - 2</td>
									<td>270</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">3</th>
									<td>Kazuki</td>
									<td>C100 - 3</td>
									<td>265</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">4</th>
									<td>Ayato</td>
									<td>C100 - 4</td>
									<td>250</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
								<tr>
									<th scope="row">5</th>
									<td>Hanako</td>
									<td>C100 - 5</td>
									<td>240</td>
									<td><a href="#" class="btn btn-outline-info btn-sm">View</a></td>
								</tr>
							</tbody>
							</table>
							<div class="text-center">
								<button class="btn">Show All <i class="fas fa-angle-down"></i></button>
							</div>
						</div>
						
						<!-- Submit list -->
						<h5>Today Submission</h5>
						<div class="row mb-4">
							<div class="col-lg-8">
								<div class="shadow table-responsive p-3">
								<h6>List of Today Submission</h6>
									<table class="table table-hover border-bottom">
										<thead>
											<tr>
												<th scope="col">#</th>
												<th scope="col">Name</th>
												<th scope="col">Type</th>
												<th scope="col">Submitted Time</th>
												<th scope="col">Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th scope="row">1</th>
												<td>Kazuki</td>
												<td>Kanji</td>
												<td>11:31 a.m.</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
											<tr>
												<th scope="row">2</th>
												<td>Ren</td>
												<td>Grammar</td>
												<td>11:28 a.m.</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
											<tr>
												<th scope="row">3</th>
												<td>Ayato</td>
												<td>Reading</td>
												<td>10:11 a.m.</td>
												<td><a href="#" class="btn btn-outline-success btn-sm">Detail</a></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>

							<div class="col-lg-4">
								<div class="shadow table-responsive p-3">
									<h6>Last Tests</h6>
									<table class="table table-hover border-bottom">
										<thead>
											<tr>
												<th scope="col">Name</th>
												<th scope="col" class="text-right">Date</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<th>Test 3</th>
												<td scope="row" class="text-right">11 Mar</td>
											</tr>
											<tr>
												<th>Test 2</th>
												<td scope="row" class="text-right">10 Feb</td>
											</tr>
											<tr>
												<th>Test 1</th>
												<td scope="row" class="text-right">28 Jan</td>
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