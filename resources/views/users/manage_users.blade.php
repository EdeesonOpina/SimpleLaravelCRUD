@include('layouts.guests.header')
@php
use Carbon\Carbon;
@endphp

	<div class="container" style="margin-top: 7%">

				<a href="{{ url('logout') }}">
				<button type="button" class="btn btn-light">
				  <i class="fa fa-sign-out" style="margin-right: 7px"></i>Click Here To Logout
				</button>
				</a>

				<br><br>

				<div class="card">
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

						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
						  Add User
						</button>
						<br><br>

						<table class="table table-striped">
							<thead>
								<tr>
									<td>ID</td>
									<td>Name</td>
									<td>Email</td>
									<td>Status</td>
									<td>Created At</td>
									<td>Updated At</td>
									<td>Actions</td>
								</tr>
							</thead>

							<tbody>
								@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>
										@if($user->status == 1)
											<b style="color: green">Active</b>
										@else
											<b style="color: red">Inactive</b>
										@endif
									</td>
									<td>{{ Carbon::parse($user->created_at)->format('M d Y') }}</td>
									<td>{{ Carbon::parse($user->updated_at)->format('M d Y') }}</td>

									<td>
										<button class="btn btn-success" data-toggle="modal" data-target="#editUser{{ $user->id }}">Edit</button>
										<a href="{{ url('user/activate/'.$user->id) }}"><button class="btn btn-success">Activate</button></a>
										<a href="{{ url('user/deactivate/'.$user->id) }}"><button class="btn btn-danger">Deactivate</button></a>
									</td>

								</tr>
								@endforeach
							</tbody>

						</table>

						{{ $users->links() }}

					</div>
				</div>
			</div>
	</div>

@include('modals.add_user')
@include('modals.edit_user')
@include('layouts.guests.footer')