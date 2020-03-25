<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Book Tag Add</h3>
            </div>
            <?php echo form_open('book_tag/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="book_id" class="control-label">Book</label>
						<div class="form-group">
							<select name="book_id" class="form-control">
								<option value="">select book</option>
								<?php 
								foreach($all_book as $book)
								{
									$selected = ($book['book_id'] == $this->input->post('book_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$book['book_id'].'" '.$selected.'>'.$book['book_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tag_id" class="control-label">Tag</label>
						<div class="form-group">
							<select name="tag_id" class="form-control">
								<option value="">select tag</option>
								<?php 
								foreach($all_tag as $tag)
								{
									$selected = ($tag['tag_id'] == $this->input->post('tag_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tag['tag_id'].'" '.$selected.'>'.$tag['tag_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>