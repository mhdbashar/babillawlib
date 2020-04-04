
<?= $this->layout->block('section_edit_view') ?>

<link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">تحرير القسم</h3>
            </div>


            <form method="post" action="<?php echo base_url('section/edit/' . $section['section_id']) ?>" id="form">
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="section_name" class="control-label">اسم القسم</label>
                            <div class="form-group">
                                <input type="text" name="section_name" value="<?php echo ($this->input->post('section_name') ? $this->input->post('section_name') : $section['section_name']); ?>" class="form-control" id="section_name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="section_name" class="control-label">اسم القسم الاب</label>
                            <div class="form-group">
                                <input type="hidden" name="parent_section_id" value="<?php echo ($this->input->post('parent_id') ? $this->input->post('parent_id') : $section['parent_id']); ?>" id="parent_section_id">





                                <div class="col-md-8" id="treeview_json">

                                </div>

                            </div>
                        </div>


                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success save">
                        <i class="fa fa-check"></i> Save
                    </button>
                </div>				
                <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<script>
    var rr = "<?php echo $section['section_id']; ?>";

    var validate = '';
    $.ajax({
        type: "GET",
        url: "<?php echo base_url() ?>section/getItem/",
        dataType: "json",

        success: function (response)
        {

            $('#treeview_json').treeview({data: response});

            $('#treeview_json').on('nodeSelected', function (event, data) {

                $("#parent_section_id").val(data.id);

                validate = data.id;


                $(".save").click(function () {

                    if (validate === rr) {
                        alert("هذا القسم نفسم القسم المحرر");
                        $('#form').trigger("reset");
                      
                        return false;

                    } else {


                        return true;
                    }


                });







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






</script>


<?= $this->layout->block('') ?>