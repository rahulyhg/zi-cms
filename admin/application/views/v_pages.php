<?php 
$base = str_replace('admin/', '', base_url());
 ?>
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-default box-solid">
				<div class="box-header bg-purple with-border">
					Pages
				</div>
				<div class="box-body ">
					<a href="<?=base_url('pages/new');?>" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i> Add Pages</a>
					<div style="margin-top: 15px;">
					<table class="table dt table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Slug</th>
								<th>Dates</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($pages as $p): ?>
							<tr>
								<td>
									<h5 class="text-bold"><?=$p->title;?></h5>
									<div>
									<a href="<?=base_url('pages/edit/'.$p->id_pages);?>" class="btn btn-xs btn-flat btn-warning">Edit</a>
									<button type="button" class="btn btn-xs btn-flat btn-danger btn-delete" id="<?=$p->id_pages;?>">Delete</button>
									<a href="<?=$base.$p->slug;?>" target="_blank" class="btn btn-xs btn-flat btn-info">View</a>
									</div>
								</td>
								<td><?=$p->slug;?></td>
								<td><?=date('d M Y - H:i:s', strtotime($p->date));?></td>
								<td>
									<?=($p->status == 1) ? '<span class="label label-success">Published</span>' : '<span class="label label-warning">Draft</span>';?>
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

<?php if ($this->session->flashdata('success')): ?>
	<script>
		Swal.fire({
			type: 'success',
			title: '<?=$this->session->flashdata('success');?>'
		})
	</script>
<?php endif; ?>

	<script>
		$(document).ready(function(){
			$('.btn-delete').on('click', function(e){
				e.preventDefault();
				var id = $(this).attr('id');
				Swal.fire({
					type: 'error',
					title: 'Hapus Pages',
					text: 'Anda akan menghapus halaman terpilih?',
					confirmButtonText: 'Hapus',
					showCancelButton: true
				}).then( (result) => {
					if (result.value) {
						window.location.assign(base_url + 'pages/delete/' + id);
					}
				} )
			})
		})
	</script>