
 <?= $this->layout->block('book_edit_view') ?>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Book Edit</h3>
            </div>
			<?php echo form_open('book/edit/'.$book['book_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="section_id" class="control-label">Section</label>
						<div class="form-group">
							<select name="section_id" class="form-control">
								<option value="">select section</option>
								<?php 
								foreach($all_section as $section)
								{
									$selected = ($section['section_id'] == $book['section_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$section['section_id'].'" '.$selected.'>'.$section['section_name'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="book_name" class="control-label">Book Name</label>
						<div class="form-group">
							<input type="text" name="book_name" value="<?php echo ($this->input->post('book_name') ? $this->input->post('book_name') : $book['book_name']); ?>" class="form-control" id="book_name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="jurisdiction" class="control-label">Jurisdiction</label>
						<div class="form-group">
							<input type="text" name="jurisdiction" value="<?php echo ($this->input->post('jurisdiction') ? $this->input->post('jurisdiction') : $book['jurisdiction']); ?>" class="form-control" id="jurisdiction" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="author" class="control-label">Author</label>
						<div class="form-group">
							<input type="text" name="author" value="<?php echo ($this->input->post('author') ? $this->input->post('author') : $book['author']); ?>" class="form-control" id="author" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="publisher" class="control-label">Publisher</label>
						<div class="form-group">
							<input type="text" name="publisher" value="<?php echo ($this->input->post('publisher') ? $this->input->post('publisher') : $book['publisher']); ?>" class="form-control" id="publisher" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="year_publication" class="control-label">Year Publication</label>
						<div class="form-group">
							<input type="text" name="year_publication" value="<?php echo ($this->input->post('year_publication') ? $this->input->post('year_publication') : $book['year_publication']); ?>" class="form-control" id="year_publication" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="subject" class="control-label">Subject</label>
						<div class="form-group">
							<input type="text" name="subject" value="<?php echo ($this->input->post('subject') ? $this->input->post('subject') : $book['subject']); ?>" class="form-control" id="subject" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="volume_number" class="control-label">Volume Number</label>
						<div class="form-group">
							<input type="text" name="volume_number" value="<?php echo ($this->input->post('volume_number') ? $this->input->post('volume_number') : $book['volume_number']); ?>" class="form-control" id="volume_number" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="year" class="control-label">Year</label>
						<div class="form-group">
							<input type="text" name="year" value="<?php echo ($this->input->post('year') ? $this->input->post('year') : $book['year']); ?>" class="form-control" id="year" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="book_title" class="control-label">Book Title</label>
						<div class="form-group">
							<input type="text" name="book_title" value="<?php echo ($this->input->post('book_title') ? $this->input->post('book_title') : $book['book_title']); ?>" class="form-control" id="book_title" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="the_main_domain" class="control-label">The Main Domain</label>
						<div class="form-group">
							<input type="text" name="the_main_domain" value="<?php echo ($this->input->post('the_main_domain') ? $this->input->post('the_main_domain') : $book['the_main_domain']); ?>" class="form-control" id="the_main_domain" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="subdomain" class="control-label">Subdomain</label>
						<div class="form-group">
							<input type="text" name="subdomain" value="<?php echo ($this->input->post('subdomain') ? $this->input->post('subdomain') : $book['subdomain']); ?>" class="form-control" id="subdomain" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="history_system" class="control-label">History System</label>
						<div class="form-group">
							<input type="text" name="history_system" value="<?php echo ($this->input->post('history_system') ? $this->input->post('history_system') : $book['history_system']); ?>" class="form-control" id="history_system" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="accreditation" class="control-label">Accreditation</label>
						<div class="form-group">
							<input type="text" name="accreditation" value="<?php echo ($this->input->post('accreditation') ? $this->input->post('accreditation') : $book['accreditation']); ?>" class="form-control" id="accreditation" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="date_publication" class="control-label">Date Publication</label>
						<div class="form-group">
							<input type="text" name="date_publication" value="<?php echo ($this->input->post('date_publication') ? $this->input->post('date_publication') : $book['date_publication']); ?>" class="form-control" id="date_publication" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="adjustments" class="control-label">Adjustments</label>
						<div class="form-group">
							<input type="text" name="adjustments" value="<?php echo ($this->input->post('adjustments') ? $this->input->post('adjustments') : $book['adjustments']); ?>" class="form-control" id="adjustments" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="accessories" class="control-label">Accessories</label>
						<div class="form-group">
							<input type="text" name="accessories" value="<?php echo ($this->input->post('accessories') ? $this->input->post('accessories') : $book['accessories']); ?>" class="form-control" id="accessories" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="pass" class="control-label">Pass</label>
						<div class="form-group">
							<input type="text" name="pass" value="<?php echo ($this->input->post('pass') ? $this->input->post('pass') : $book['pass']); ?>" class="form-control" id="pass" />
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