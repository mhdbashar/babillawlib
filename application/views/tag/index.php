

 <?= $this->layout->block('tag_view') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">عرض الوسوم</h3>
          
            </div>
            
            <div class="box-body">
                <table class="table table-bordered table-striped" id="mytable">
				<thead>
                    <tr>
						<th>رقم الوسم</th>
						<th>اسم الوسم</th>
						<th>الاحداث</th>
                    </tr>
					</thead>
					<tbody>
                    <?php foreach($tag as $t){ ?>
                    <tr>
						<td><?php echo $t['tag_id']; ?></td>
						<td><?php echo $t['tag_name']; ?></td>
						<td>
                            <a href="<?php echo site_url('tag/edit/'.$t['tag_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> عرض</a> 
                            
                        </td>
                    </tr>
                    <?php } ?>
					</tbody>
					<tfoot>
					   <tr>
						<th>رقم الوسم</th>
						<th>اسم الوسم</th>
						<th>الاحداث</th>
                    </tr>
					
					</tfoot>
                </table>
                                
            </div>
        </div>
    </div>
</div>


<script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
 <script src="<?=base_url()?>assets/dist/js/datatables.min.js"></script>
 <script type="text/javascript"> 
        $(document).ready(function() { 
		
		
			     $('#mytable').DataTable({
          "paging": true,
        
         
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
			
			
			
			
			
			
        }); 
    </script>
 <?= $this->layout->block('') ?>