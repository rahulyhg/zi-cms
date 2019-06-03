<div class="row">
	<form action="<?=base_url('pages/editpages/'.$pages->id_pages);?>" method="post">
	<div class="col-sm-9">
		<div class="form-group">
			<label for="Title">Title :</label>
			<input type="text" name="title" class="form-control" id="Title" value="<?=$pages->title;?>" placeholder="Enter Title Here">
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-flat bg-orange" data-toggle="modal" data-target="#addMedia">Add Media</button>
			<p class="text-danger">*kurang add media</p>
		</div>
		<div class="form-group">
			<textarea name="content" id="editor-post"><?=$pages->content;?></textarea>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="box box-default">
			<div class="box-header with-border"><h4 class="box-title"><label for="Slug">Slug</label></h4></div>
			<div class="box-body">
				<div class="form-group">
					<input type="text" name="slug" id="Slug" class="form-control" value="<?=$pages->slug;?>" placeholder="enter-slug-here">
				</div>
			</div>
		</div>
		<div class="box box-default">
			<div class="box-header with-border"><h4 class="box-title"><label for="Status">Status</label></h4></div>
			<div class="box-body">
				<div class="form-group">
					<select name="status" id="Status" class="form-control" required>
						<?php if ($pages->status == 1) {
							echo '<option value="1" selected>Publish</option>';
							echo '<option value="0">Draft</option>';
						}else{
							echo '<option value="1">Publish</option>';
							echo '<option value="0" selected>Draft</option>';
						} ?>
					</select>
				</div>
				<button type="submit" class="btn btn-flat btn-success">Save</button>
			</div>
		</div>
	</div>
	</form>
</div>
<!-- Modal Add Media -->
<div class="modal fade" id="addMedia">
	<div class="modal-dialog modal-media">
		<div class="modal-content">
			<div class="modal-header">
				<button class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Media</h4>
			</div>
			<div class="modal-body">
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
					  <li class="active"><a href="#upload" data-toggle="tab" aria-expanded="true"><i class="fa fa-upload"></i> Upload</a></li>
					  <li class=""><a href="#media" data-toggle="tab" aria-expanded="false">Media</a></li>
					</ul>
					<div class="tab-content">
					  <div class="tab-pane active" id="upload">
					    <b>How to use:</b>

					    <p>Exactly like the original bootstrap tabs except you should use
					      the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
					    A wonderful serenity has taken possession of my entire soul,
					    like these sweet mornings of spring which I enjoy with my whole heart.
					    I am alone, and feel the charm of existence in this spot,
					    which was created for the bliss of souls like mine. I am so happy,
					    my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
					    that I neglect my talents. I should be incapable of drawing a single stroke
					    at the present moment; and yet I feel that I never was a greater artist than now.
					    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vitae quis voluptas adipisci. Mollitia suscipit obcaecati error facilis quam accusamus fuga, maxime possimus iure aut, molestiae sit commodi, excepturi aspernatur rem.
					  </div>
					  <!-- /.tab-pane -->
					  <div class="tab-pane" id="media">
					    The European languages are members of the same family. Their separate existence is a myth.
					    For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
					    in their grammar, their pronunciation and their most common words. Everyone realizes why a
					    new common language would be desirable: one could refuse to pay expensive translators. To
					    achieve this, it would be necessary to have uniform grammar, pronunciation and more common
					    words. If several languages coalesce, the grammar of the resulting language is more simple
					    and regular than that of the individual languages.
					  </div>
					  <!-- /.tab-pane -->
					</div>
				<!-- /.tab-content -->
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
    	CKEDITOR.replace('editor-post')
	})
</script>