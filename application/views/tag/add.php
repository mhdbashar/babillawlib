
 <?= $this->layout->block('tag_add_view') ?>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tag Add</h3>
            </div>
            <?php echo form_open('tag/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="tag_name" class="control-label">Tag Name</label>
						<div class="form-group">
							<input type="text" name="tag_name" value="<?php echo $this->input->post('tag_name'); ?>" class="form-control" id="tag_name" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> حفظ
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>
 <?= $this->layout->block('') ?>
