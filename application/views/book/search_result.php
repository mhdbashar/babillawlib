
<?= $this->layout->block('search_result') ?>
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-datepicker.css">
   
    
   

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Book Add</h3>
            </div>
              <div class="box-body">
          
                <div class="row clearfix" id="hide">
            
            <?php
                foreach ($result as $r) {
?>
            
           
             
               
                
                       <div class="col-md-6">
                        <label for="book_name" class="control-label">اسم  القسم</label>
                        <label for="book_name" class="control-label"> <?php  echo $r->section_name; ?></label>
                    </div>
             <div class="col-md-6">
                        <label for="book_name" class="control-label"> </label>
                         <label for="book_name" class="control-label"> اسم الكتاب<?php  echo $r->book_name; ?></label>
                         <label for="book_name" class="control-label"> <a target="_blank" href="<?php echo base_url('uploads/images/')?><?php  echo $r->file; ?>">تصفح الكتاب</a></label>
                        
                    </div>
       
                
                <?php
            }
            
            ?>
        
            
            
                  </div>
            


            </div>
   
        </div>
    </div>
</div>



<?= $this->layout->block('') ?>