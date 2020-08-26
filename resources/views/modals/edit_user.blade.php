@foreach($users as $user)
<div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ url('user/edit') }}" method="post">
							
		  {{ csrf_field() }}

      <input type="hidden" name="user_id" value="{{ $user->id }}">

      <div class="modal-body">

			<label>Name</label>
			<input type="text" name="name" class="form-control" placeholder="Name" value="{{ $user->name }}">

			<br>

			<label>Email Address</label>
			<input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ $user->email }}">


      </div>
      <div class="modal-footer">
        <input type="submit" value="Update" class="btn btn-success form-control">
      </div>

	</form>

    </div>
  </div>
</div>
@endforeach