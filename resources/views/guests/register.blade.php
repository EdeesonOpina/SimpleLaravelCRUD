@include('layouts.guests.header')

	<div class="container">
		<div class="row">

			<div class="col-md-3">

			</div>


			<div class="col-md-6">

				<div class="card" style="margin-top: 25%">

					<div class="card-body">

						@if($errors->any())
							<div class="alert alert-danger" role="alert">
								<h4>Whoops!</h4>
								@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</div>
						@endif

						<a href="{{ url('/') }}"><button class="btn btn-primary"><i class="fa fa-chevron-left" style="margin-right: 7px"></i>Go Back</button></a>
						<br><br>

						<h3 style="margin-bottom: 15px">Register</h3>

						<form action="{{ url('register') }}" method="post">
							
							{{ csrf_field() }}

							<label>Name</label>
							<input type="text" name="name" class="form-control" placeholder="Name">

							<br>

							<label>Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address">

							<br>

							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password">

							<br>

							<label>Confirm Password</label>
							<input type="password" name="confirm_password" class="form-control" placeholder="Password">

							<br>

							<input type="submit" value="Register" class="btn btn-primary form-control">

						</form>

					</div>
				</div>
			</div>

			<div class="col-md-3">

			</div>

		</div>
	</div>

@include('layouts.guests.footer')