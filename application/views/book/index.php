
 <?= $this->layout->block('book_view') ?>
	


<form method="post" action="<?php echo base_url()?>book/search_via_section" />
       <label for="section_id" class="control-label">إختر القـــسســم الفرعي </label>
                            <select  name="section_id" value="" class="form-control" style="border-bottom: 2px #3c8dbc solid;" id="sel_section" >


                               
                                <?php
                                foreach ($get_sub_section as $value) {
                                    ?>
                                    <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>


                                    <?php
                                }
                                ?>




                            </select>
      <br> <br> <br> 
       <input type="submit" value="بحث">

       <form>
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

<?= $this->layout->block() ?>
