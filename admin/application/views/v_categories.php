<?php 
$base = str_replace(basename(base_url())."/", '', base_url());
 ?>

<div class="row">
	<div class="col-sm-12">
		<div class="box box-default bos-solid">
			<div class="box-header bg-purple">
				Categories
			</div>
			<div class="box-body">
				<button class="btn btn-flat btn-sm btn-success" data-toggle="modal" data-target="#addCat">Add Categories</button>
				<div class="mt-15px">
					<table class="table table-bordered table hover table-striped">
						<thead>
							<th>Category</th>
							<th>Slug</th>
							<th>Action</th>
						</thead>
						<tbody>
						<?php foreach ($categories as $cat): ?>
							<tr>
								<td><?=$cat->name;?></td>
								<td><span class="text-muted"><?=$base;?></span> <?=$cat->slug;?></td>
								<td>
									<button class="btn btn-xs btn-flat btn-warning btn-edit" id="<?=$cat->id_category;?>">Edit</button>
									<button class="btn btn-xs btn-flat btn-danger btn-delete" id="<?=$cat->id_category;?>">Delete</button>
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

<!-- Modal Add Categories -->
<div class="modal fade" id="addCat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Category</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('categories/add');?>" method="post">
					<div class="form-group">
						<label for="Name">Name :</label>
						<input type="text" name="name" id="Name" class="form-control">
					</div>
					<div class="form-group">
						<label for="Slug">Slug :</label>
						<input type="text" name="slug" id="Slug" class="form-control" placeholder="default">
					</div>
					<button type="submit" class="btn btn-flat btn-success">Add New Category</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Modal Edit Categories -->
<div class="modal fade" id="editCat">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Category</h4>
			</div>
			<div class="modal-body">
				<form id="formEdit" action="" method="post">
					<div class="form-group">
						<label for="Name">Name :</label>
						<input type="text" name="name" id="Name" class="form-control">
					</div>
					<div class="form-group">
						<label for="Slug">Slug :</label>
						<input type="text" name="slug" id="Slug" class="form-control" placeholder="default">
					</div>
					<button type="submit" class="btn btn-flat btn-success">Save</button>
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
				url: base_url + 'categories/getById/' + id,
				success: function(data){
					$('#editCat').modal('show');
					$('[name="name"]').val(data.name);
					$('[name="slug"]').val(data.slug);
					$('#formEdit').attr('action', base_url+'categories/edit/'+id);
				}
			})
		})
		$('.btn-delete').on('click', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			Swal.fire({
				type: 'question',
				title: 'Hapus Kategori',
				text: 'Anda akan menghapus Kategori tersebut?',
				showCancelButton: true,
				confirmButtonText: 'Delete'
			}).then((result) => {
				if (result.value) {
					window.location.assign(base_url + 'categories/delete/' + id);
				}
			})
		})
	})
</script>