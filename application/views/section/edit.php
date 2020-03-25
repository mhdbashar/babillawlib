
  <?= $this->layout->block('section_edit_view') ?>


<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Section Edit</h3>
            </div>
			<?php echo form_open('section/edit/'.$section['section_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="section_name" class="control-label">Section Name</label>
						<div class="form-group">
							<input type="text" name="section_name" value="<?php echo ($this->input->post('section_name') ? $this->input->post('section_name') : $section['section_name']); ?>" class="form-control" id="section_name" />
						</div>
					</div>
                                           <div class="col-md-6">
                        <label for="section_name" class="control-label">اسم القسم الاب</label>
                        <div class="form-group">
                            <select  name="section_name_select" value="" class="form-control" >
                                
                                
                                     <option value="">--اختر القسم--</option>
                                    <?php
                                    foreach ($get_all_section as $value) {
                                        ?>
                                        <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>


                                        <?php
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
 <?= $this->layout->block('') ?>