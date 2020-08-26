<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ url('user/add') }}" method="post">
							
		{{ csrf_field() }}

      <div class="modal-body">

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


      </div>
      <div class="modal-footer">
        <input type="submit" value="Add User" class="btn btn-primary form-control">
      </div>

	</form>

    </div>
  </div>
</div>