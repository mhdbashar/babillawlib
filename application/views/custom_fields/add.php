
<?= $this->layout->block('field_add_view') ?>



<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<!-- jQuery -->
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<!-- BootstrapJS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel_s">
                    <div class="panel-body" style="background-color: white;">
                        <h4 class="no-margin">
                            إضافة حقل مخصص
                        </h4><br>
                        <form  action="<?php echo base_url() ?>custom_fields/add_custom_field" method="post">
                            <div class="col-md-12">
                                <label for="section_id" class="control-label"> الحقل يعود إلى </label>
                                <div class="form-group">
                                    <select  name="section_id"  class="form-control section" style="border-bottom: 2px #3c8dbc solid;" required="true">
                                        <option value="">اختر القسم</option>
                                        <?php foreach ($section as $value) {
                                            ?>

                                            <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>

                                            <?php
                                        }
                                        ?>








                                    </select>
                                </div>
                            </div>


                            <div class="col-md-12" id="title">
                                <label for="field_label" class="control-label"> عنوان الحقل  </label>
                                <div class="form-group">
                                    <input type="text" name="field_label" value="" class="form-control" id="field_label" required="true" />
                                </div>
                            </div>





                            <div class="col-md-12">
                                <label for="section_id" class="control-label"> النوع </label>
                                <div class="form-group">
                                    <select id="field_type"  name="field_type"  class="form-control section" style="border-bottom: 2px #3c8dbc solid;"  required="true">

                                        <option value="">اختر نوع الحقل</option>
                                        <option value="input"> Input</option>
                                        <option value="number"> Number</option>
                                        <option value="textarea">  Textarea</option>
                                        <option value="select">  Select</option>
                                        <!--  <option value="multiselect">  Multi select</option>
                                         <option value="checkbox">  Checkbox</option> -->
                                        <option value="datepicker">  Date Picker</option>
                                        <!--  <option value="datetimepicker">  Datetime Picker</option> -->

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12" id="requered">
                                <label for="requerd_field" class="control-label"> حقل مطلوب   </label>
                                <div class="form-group">
                                    <input type="checkbox" name="requerd_field" value="required" id="field_required" required="true" />
                                </div>
                            </div>


                            <div class="col-md-12 fas fa-question-circle fa-2x" style="font-size: 1em;" id="options" data-toggle="tooltip" data-placement="right" title="استخدم فقط مع تحديد ، أنواع خانة الاختيار. قم بملء الحقل بفصل الخيارات عن طريق الفاصلة. مثال. احمر,أزرق,أخضر">
                                <label for="book_title" class="control-label"> </label>
                                <div class="form-group">
                                    <textarea  name="options"  class="form-control" ></textarea>
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



<script type="text/javascript">
    $(function () {
        $("#field_type").change(function () {

            if ($(this).val() == "number") {
                $("#options").hide();


            } else if ($(this).val() == "input") {
                $("#options").hide();
            } else if ($(this).val() == "textarea") {
                $("#options").hide();
            } else if ($(this).val() == "datepicker") {
                $("#options").hide();
            } else if ($(this).val() == "datetime") {
                $("#options").hide();
            } else {
                $("#options").show();
            }
        });
    });


    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

<?= $this->layout->block('') ?>
