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

						@if(Session::get('success'))
							<div class="alert alert-success" role="alert">
								<h4>Great!</h4>
							  	{{ Session::get('success') }}
							</div>
						@endif

						<h3 style="margin-bottom: 15px">Login</h3>

						<form action="{{ url('login') }}" method="post">
							
							{{ csrf_field() }}

							<label>Email Address</label>
							<input type="emai" name="email" class="form-control" placeholder="Email Address">

							<br>

							<label>Password</label>
							<input type="password" name="password" class="form-control" placeholder="Password">

							<br>

							<input type="submit" value="Login" class="btn btn-primary form-control">

						</form>

							<br>
							<a href="{{ url('register') }}"><button class="btn btn-light form-control">Register</button></a>

					</div>
				</div>
			</div>

			<div class="col-md-3">

			</div>

		</div>
	</div>

@include('layouts.guests.footer')