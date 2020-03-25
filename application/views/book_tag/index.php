<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Book Tag Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('book_tag/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Book Tag Id</th>
						<th>Book Id</th>
						<th>Tag Id</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($book_tag as $b){ ?>
                    <tr>
						<td><?php echo $b['book_tag_id']; ?></td>
						<td><?php echo $b['book_id']; ?></td>
						<td><?php echo $b['tag_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('book_tag/edit/'.$b['book_tag_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('book_tag/remove/'.$b['book_tag_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
