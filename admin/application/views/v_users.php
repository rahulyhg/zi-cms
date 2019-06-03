<div class="row">
	<div class="col-sm-12">
		<div class="box box-default bos-solid">
			<div class="box-header bg-purple">
				Users
			</div>
			<div class="box-body">
				<button class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#addUser">Add User</button>
				<div class="mt-15px">
					<table class="table table-bordered table hover table-striped">
						<thead>
							<th>Username</th>
							<th>Full Name</th>
							<th>Email</th>
							<th>Level</th>
							<th>#</th>
						</thead>
						<tbody>
						<?php foreach ($users as $u): ?>
							<tr>
								<td><?=$u->username;?></td>
								<td><?=$u->full_name;?></td>
								<td><?=$u->email;?></td>
								<td><?=$u->level;?></td>
								<td>
									<button class="btn btn-xs btn-flat btn-warning btn-edit" id="<?=$u->id_user;?>">Edit</button>
									<button class="btn btn-xs btn-flat btn-danger btn-delete" id="<?=$u->id_user;?>">Delete</button>
								</td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Categories -->
<div class="modal fade" id="editUser">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit User</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('users/add');?>" method="post">
					<div class="form-group">
						<label for="FullName">Full Name :</label>
						<input type="text" name="full_name" id="FullName" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="Username">Username :</label>
						<input type="text" name="username" id="Username" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="Email">Email :</label>
						<input type="text" name="email" id="Email" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="Password">Password :</label>
						<input type="password" name="password" id="Password" class="form-control">
					</div>
					<div class="form-group">
						<label for="Level">Level :</label>
						<select name="level" id="" class="form-control">
							<option value="">-- Select Level --</option>
							<option value="administrator">Administrator</option>
							<option value="author">Author</option>
						</select>
					</div>
					<button type="submit" class="btn btn-flat btn-success">Save Changes</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.btn-edit').on('click', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$.ajax({
				type: 'GET',
				url: base_url + 'users/getById/' + id,
				success: function(data){
					$('#editUser').modal('show');
					$('[name="full_name"]').val(data.full_name);
					$('[name="username"]').val(data.username);
					$('[name="email"]').val(data.email);
					$('form[method="post"]').attr('action', base_url+'users/edit/'+id);
				}
			})
		})

		$('.btn-delete').on('click', function(e){
			e.preventDefault();
			let id = $(this).attr('id');
			Swal.fire({
				type: 'error',
				title: 'Hapus User',
				text: 'Anda akan menghapus user tersebut?',
				confirmButtonText: 'Delete',
				showCancelButton: true
			}).then((result)=>{
				if (result.value) {
					window.location.assign(base_url + 'users/delete/' + id);
				}
			})
		})
	})
</script>