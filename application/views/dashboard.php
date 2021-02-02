<?= $this->layout->block('dashboard') ?>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
              <style>

    .btnh {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #3c8dbc;
        cursor: pointer;
        font-size: 13px;
        color: white;
        margin-bottom: 25px;
    }

  
     .btnh:hover {
      background-color: deepskyblue;
        color: white;
    }
</style>


<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_s">
                    <div class="panel-body" style="background-color: white;">
                        <h4 class="no-margin">
                يمكنك البحث داخل اي قسم عن  كتاب عن طريق اي حقل داخل الكتاب.
                        </h4><br>
                        <form  action="<?php echo base_url() ?>book/index_search" method="post">
                     


                            <div class="col-md-12" id="title">
                                <label for="field_label" class="control-label">   أدخل ماتريد البحث عنه هنا  </label>
                                <div class="form-group">
                                    <input type="text" name="query" value="" class="form-control" id="query" required="true" />
                                </div>
                            </div>




                  




                            <input type="submit" class="btn btn-primary">

                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











<!--<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
   




          <center>
                    <div id="myDIV">

                     
                                    <a   href="<php echo base_url() ?>section/case_law?section_id=31" class="btnh" > الأحكام والسوابق القضائية</a>
                        <a href="<php echo base_url() ?>section/saudi_regulations?section_id=32" class="btnh">الانظمة السعودية</a>
                            <a href="<php echo base_url() ?>section/models_and_contracts?section_id=33" class="btnh">نماذج وعقود</a>
                        <a  href="<php echo base_url() ?>section/searches_law_books?section_id=34"class="btnh" >الكتب القانونية والأبحاث</a>
						<a  href="<php echo base_url() ?>section/regulations_legislation?section_id=35"class="btnh" >  الأنظمة والتشريعات والقوانين</a>
                    

                    </div>    
                </center>
            </div>
        </div>
    </div>
</div>-->

<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-datepicker.css">
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">




<div class="row">

    <div class="box box-info" style="margin-top: -74px;">

        <div class="box-body">

            <div class="row clearfix" id="hide">

 
                <?php
                
                $array = get_last_node();

           
   


                    $rr = '';
                    foreach ($result as $r) {
                        if ($r['parent_id'] != 0) {
                            $rr = $r['parent_id'];
                        }
                       
                        ?>



                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>-</h3>
                                    <p>القسم الرئيسي</p>

                                    <h4> <a style="color: #f8fdff;"  href="<?php echo base_url() ?>book/loadRecord/<?php echo $r['section_id']; ?>"> <?php echo $r['section_name']; ?>  </a> </h4>
                                    <div class="icon">
                                        <i class="fa fa-book"></i>
                                    </div>
                                </div>


                            </div>
                        </div><!-- ./col -->
                      

                        <?php
                          
//                        foreach ($array as $value) {
//                          
//                          
//                   
//                        
//                      
//                                $book = get_book($r['section_id']);
//
//                                foreach ($book as $value_v) {
//                                    echo $value_v['book_id'];
//                                    echo '<br>';
//                                }
//                            
//                        }
                    }
                    
                  
                    ?>





                </div>

                <?php
                if ($rr != 0) {
                    ?>


                    <center>  <a class="btn btn-primary" href="javascript:history.go(-1)" title="Return to the previous page">رجوع للخلف</a></center>

                    <?php
                }
            
            ?>

        </div>

    </div>
</div>



<?= $this->layout->block('') ?>