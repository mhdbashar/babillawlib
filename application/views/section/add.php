
<?= $this->layout->block('section_add_view') ?>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">اضافة قسم</h3>
            </div>
            <?php echo form_open('section/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="section_name" class="control-label">اسم القسم</label>
                        <div class="form-group">
                            <input type="text" name="section_name" value="" class="form-control" id="section_name" required />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="section_name" class="control-label">اسم القسم الاب</label>
                        <div class="form-group">
 <input type="hidden" name="parent_section_id" value="" id="parent_section_id" class="sub_section" />
                            <div class="col-md-8" id="treeview_json">

                            </div>
                        </div>
                    </div>




                    <!--                    <div class="col-md-6">
                                            <label for="section_name" class="control-label">اسم القسم الاب</label>
                                            <div class="form-group">
                                                <select  name="section_name_select" value="" class="form-control" >
                    
                    
                                                    <option value="">--اختر القسم--</option>
                                                    <php
                                                    foreach ($get_all_section as $value) {
                                                        ?>
                                                        <option value="<php echo $value->section_id; ?>"><php echo $value->section_name; ?></option>
                    
                    
                                                        <php
                                                    }
                                                    ?>
                    
                                                </select>
                                            </div>
                                        </div>-->

                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success save">
                    <i class="fa fa-check"></i> حفظ
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>

<script>
     $(document).ready(function () {
      var validate='';
            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>section/getItem/",
                dataType: "json",

                success: function (response)
                {

                    $('#treeview_json').treeview({data: response});

                    $('#treeview_json').on('nodeSelected', function (event, data) {
                      
                        $("#parent_section_id").val(data.id);
                      
                        validate=data.id;
                
                    });

                }
            });
            //     alert(main_section);

    $(".save").click(function () {

            if (validate === '') {
                alert("اختر القسم");
                return false;
        
            } else {


                return true;
            }


        });

    });
</script>
<?= $this->layout->block('') ?>
