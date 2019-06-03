	<div class="row">
		<div class="col-sm-12">
			<div class="box box-default box-solid">
				<div class="box-header bg-purple with-border">
					Posts
				</div>
				<div class="box-body ">
					<a href="<?=base_url('posts/new');?>" class="btn btn-sm btn-flat btn-success"><i class="fa fa-edit"></i> Add Posts</a>
					<div style="margin-top: 15px;">
					<table class="table dt table-hover table-bordered table-striped">
						<thead>
							<tr>
								<th>Title</th>
								<th>Author</th>
								<th>Categories</th>
								<th>Dates</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($posts as $post): ?>
							<tr>
								<td>
									<h4><?=$post->title;?></h4>
									<div>
									<a href="<?=base_url('posts/edit/'.$post->id_post);?>" class="btn btn-xs btn-flat btn-warning">Edit</a>
									<button type="button" class="btn btn-xs btn-flat btn-danger">Delete</button>
									<a href="#" target="_blank" class="btn btn-xs btn-flat btn-info">View</a>
									</div>
								</td>
								<td>zulfii</td>
								<td>Lorem.</td>
								<td><?=date('d M Y - H:i:s', strtotime($post->date));?></td>
								<td>
									<?=($post->status == 1) ? '<span class="label label-success">Published</span>' : '<span class="label label-warning">Draft</span>';?>
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