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
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
   




          <center>
                    <div id="myDIV">

                     
                                    <a   href="<?php echo base_url() ?>section/case_law?section_id=31" class="btnh" >السوابق القضائية</a>
                        <a href="<?php echo base_url() ?>section/saudi_regulations?section_id=32" class="btnh">الانظمة السعودية</a>
                            <a href="<?php echo base_url() ?>section/models_and_contracts?section_id=33" class="btnh">نماذج وعقود</a>
                        <a  href="<?php echo base_url() ?>section/searches_law_books?section_id=34"class="btnh" >الكتب القانونية والأبحاث</a>
                    

                    </div>    
                </center>
            </div>
        </div>
    </div>
</div>
<?= $this->layout->block('') ?>