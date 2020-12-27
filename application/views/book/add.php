
<?= $this->layout->block('book_add_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/convert_date/css/bootstrap-datetimepicker.css">


<link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>
<!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/calendar-system.css">-->





<!--<link rel="stylesheet" href="<? base_url() ?>assets/tinymce/skin.min.css">-->

<!--<script src="<= base_url() ?>assets/tinymce/modern/theme.js" referrerpolicy="origin"></script>
<script src="<= base_url() ?>assets/tinymce/modern/theme.min.js" referrerpolicy="origin"></script>-->


<script src="<?= base_url() ?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/tinymce/ar.js" referrerpolicy="origin"></script>
<style>
    .collection{
        /*         border:1px solid #3c8dbc;*/
        height: 250px;
        width: 100%; 
        margin-right: 11px;
        width: 98%;

    }




</style>





<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">إضافة كتاب</h3>
                <span id="u"></span>
            </div>


            <form method="post" action="<?php echo base_url() ?>book/add" enctype="multipart/form-data" id="format" name="myForm" >

                <input type="hidden" name="sub_section" value="" id="sub_section" class="sub_section" />

                <input type="hidden" name="total_item" id="total_item" value="1" />

                <input type="hidden" name="total_item_ver" id="total_item_ver" value="1" />

                <input type="hidden" name="total_item_system" id="total_item_system" value="0" />


                <div class="box-body" id="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="section_id" class="control-label">إختر القـــســـــم</label>
                            <div class="form-group">
                                <select  name="section_id"  class="form-control section" style="border-bottom: 2px #3c8dbc solid;" id="sel_section" >
                                    <option value="-1">اختر القسم</option>

                                    <?php
                                    foreach ($get_main_section as $value) {
                                        ?>
                                        <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>


                                        <?php
                                    }
                                    ?>




                                </select>
                            </div>
                        </div>



                    </div>

                    <div style="background-color:#9cd8fb;margin-bottom: 10px; width: 50% ">   إختر القـــسســم الفرعي <?php echo validation_errors(); ?>  </div>


                    <div class="col-md-8" id="treeview_json">

                    </div>

                    <div class="row clearfix" id="hide">


                        <div class="col-md-6" id="title">
                            <label for="book_title" class="control-label">  عنوان الكتاب</label>
                            <div class="form-group">
                                <input type="text" name="book_title" value="" class="form-control" id="book_title" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="tag" class="control-label" >الكلمات الدلالية  </label>
                            <div class="form-group">
                                <input type="text" name="tag_name" value="" class="form-control" id="tag"  />
                            </div>
                        </div>






                        <div class="col-md-6">
                            <label for="picture" class="control-label">تحميل الكتاب</label>
                            <div class="form-group">

                                <input class="form-control m" type="file" name="picture" id="picture"   />
                            </div>
                        </div>

                        <div class='col-md-6 mini'>
                            <label for='mini' class='control-label'>تحميل الصورة</label>
                            <div class='form-group'>
                                <input class='form-control' type='file' name='mini' id='mini'/>
                            </div>
                            <div class='uploadForm'>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="url" class="control-label"> أدخل رابط</label>
                            <div class="form-group">

                                <input class="form-control" type="url" name="url" />
                            </div>
                        </div>




                        <div class='col-md-6'   id='show_country' >
                            <label for='country' class='control-label'> البلد</label>
                            <div class='form-group'>
                                <select  name='country'  class='form-control country' id='country'>
                                    <option value=''>Select Country</option>
                                    <?php
                                    foreach ($country as $row) {
                                        echo "<option value='" . $row->country_id . "'>" . $row->country_name . "</option>";
                                    }
                                    ?>



                                </select>
                            </div>
                        </div>

                        <div id="fm">


                        </div>
                        <div id="new_row">

                        </div>

                        <div id="ver_ver">
                            <div class="col-md-12" >
                                <label for="version" class="control-label">الإصدار</label>
                                <div class="form-group">
                                    <input type='text' name='version[]' value='' class='form-control' id='version' />
                                </div>
                            </div>
                        </div>




                        <div class="col-md-12" >
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" name="add_row_ver" id="add_row_ver" class="btn btn-success btn-s">+</button>
                                </div>
                            </div>
                        </div>




                        <div class="col-md-6" id="mat">
                            <label for='material_number' class='control-label'> رقم  المادة</label>
                            <div class='form-group'>
                                <input type='text' name='material_number[]' value='' class='form-control' id='mat1' />
                            </div>
                        </div>







                        <div class="col-md-6" id="dis" >
                            <label for="dis" class="control-label">  أدخل الوصف</label>
                            <div class="form-group">
                                <textarea  style="border:2px solid black" name="dis[]" id="dis1">  </textarea>
                            </div>
                        </div>

                        <div class="col-md-6" >

                            <div align="right">
                                <button type="button" name="add_row" id="add_row" class="btn btn-success btn-s">+</button>
                            </div>
                        </div><br><br><br><br>




                        <div id="dis_case_law">


                            <div class='col-md-6' id='summary_of_judgment' >
                                <label for='summary_of_judgment' class='ontrol-label'> ملخص الحكم</label>
                                <div class='form-group'>
                                    <textarea  style='border:2px solid black' name='summary_of_judgment' id='summary_of_judgment'>  </textarea>
                                </div>
                            </div>


                            <div class='col-md-6' id='sentencing_text' >
                                <label for='sentencing_text' class='ontrol-label'>نص الحكم</label>
                                <div class='form-group'>
                                    <textarea  style='border:2px solid black' name='sentencing_text' id='sentencing_text'>  </textarea>
                                </div>
                            </div>



                            <div class='col-md-6' id='the_reasons' >
                                <label for='the_reasons' class='ontrol-label'>الأسباب</label>
                                <div class='form-group'>
                                    <textarea  style='border:2px solid black' name='the_reasons' id='the_reasons'>  </textarea>
                                </div>
                            </div>


                            <div class='col-md-6' id='the_legal_bond' >
                                <label for='the_legal_bond' class='ontrol-label'>السند القانوني</label>
                                <div class='form-group'>
                                    <textarea  style='border:2px solid black' name='the_legal_bond' id='the_legal_bond'>  </textarea>
                                </div>
                            </div>


                        </div>	



















                        <div id="fff">
                            <?php
                            $data = custom_fields();
                            foreach ($data as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input1[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="id1[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="bbb">


                            <?php
                            $data1 = custom_fields();
                            foreach ($data1 as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 33) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select1[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="select_id1[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>







                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <br><br>
                        <div id="ccc">


                            <?php
                            $data2 = custom_fields();
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 33) {
                                    $arr = explode(",", $value['options']);
                                    ?>


                                    <?php
                                    for ($i = 0; $i < count($arr); $i++) {
                                        ?>

                                        <div class="col-md-12" >

                                            <div class="form-group">
                                                <input  type="checkbox"  value="<?php echo $arr[$i] ?>" name="checkbox1[]"> <?php echo $arr[$i]; ?>
                                                <input type="hidden" name="checkbox_id1[]"  value="<?php echo $value['id']; ?>" />

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>









                                    <?php
                                }
                            }
                            ?>

                        </div>






                        <div id="ddd">
                            <?php
                            $data3 = custom_fields();
                            foreach ($data3 as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number1[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="number_id1[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>



                        <div id="ggg">
                            <?php
                            $data4 = custom_fields();
                            foreach ($data4 as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea1[]">  </textarea>
                                                <input type="hidden" name="textarea_id1[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>


                        <div id="lll">
                            <?php
                            $data5 = custom_fields();
                            foreach ($data5 as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 33) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>
                                        <div class="form-group">
                                            <input type='text' name='datepicker1[]' value='' class=' hijri-date-input form-control'  >
                                            <input type="hidden" name="datepicker_id1[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    






                        <div id="ffff">
                            <?php
                            $data6 = custom_fields();
                            foreach ($data6 as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 34) {
                                    ?>
                                    <div>
                                        <div class="col-md-12" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input4[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="input_id4[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="bbbb">


                            <?php
                            $data7 = custom_fields();
                            foreach ($data7 as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 34) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-12" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select4[]">;
                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="select_id4[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>







                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div id="cccc">


                            <?php
                            $data8 = custom_fields();
                            foreach ($data8 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 34) {
                                    $arr = explode(",", $value['options']);
                                    ?>

                                    <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                    <?php
                                    for ($i = 0; $i < count($arr); $i++) {
                                        ?>
                                        <div class="col-md-12" >

                                            <div class="form-group">
                                                <input type="checkbox" name="checkbox4[]" value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <input type="hidden" name="checkbox_id4[]"  value="<?php echo $value['id']; ?>" />






                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div id="dddd">
                            <?php
                            $data9 = custom_fields();
                            foreach ($data9 as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 34) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number4[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="number_id4[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>





                        <div id="gggg">
                            <?php
                            $data10 = custom_fields();
                            foreach ($data10 as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 34) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea4[]">  </textarea>
                                                <input type="hidden" name="textarea_id4[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="llll">
                            <?php
                            $data11 = custom_fields();
                            foreach ($data11 as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 34) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>
                                        <div class="form-group">
                                            <input type='text' name='datepicker4[]' value='' class=' hijri-date-input form-control'  >
                                            <input type="hidden" name="datepicker_id4[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>  


                        <div id="fffff">
                            <?php
                            $data20 = custom_fields();
                            foreach ($data20 as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 32) {
                                    ?>
                                    <div>
                                        <div class="col-md-12" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input3[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="input_id3[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="bbbbb">


                            <?php
                            $data21 = custom_fields();
                            foreach ($data21 as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 32) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-12" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select3[]">;
                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="select_id3[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>







                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div id="ccccc">


                            <?php
                            $data22 = custom_fields();
                            foreach ($data22 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 32) {
                                    $arr = explode(",", $value['options']);
                                    ?>

                                    <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                    <?php
                                    for ($i = 0; $i < count($arr); $i++) {
                                        ?>
                                        <div class="col-md-12" >

                                            <div class="form-group">
                                                <input type="checkbox" name="checkbox3[]" value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <input type="hidden" name="checkbox_id3[]"  value="<?php echo $value['id']; ?>" />






                                    <?php
                                }
                            }
                            ?>

                        </div>

                        <div id="ddddd">
                            <?php
                            $data23 = custom_fields();
                            foreach ($data23 as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 32) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number3[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="number_id3[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>



                        <div id="ggggg">
                            <?php
                            $data24 = custom_fields();
                            foreach ($data24 as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 32) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea3[]">  </textarea>
                                                <input type="hidden" name="textarea_id3[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="lllll">
                            <?php
                            $data25 = custom_fields();
                            foreach ($data25 as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 32) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>
                                        <div class="form-group">
                                            <input type='text' name='datepicker3[]' value='' class=' hijri-date-input form-control'  >
                                            <input type="hidden" name="datepicker_id3[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>  

                        <div id="ffffff">
                            <?php
                            $data18 = custom_fields();
                            foreach ($data18 as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 31) {
                                    ?>
                                    <div>
                                        <div class="col-md-12" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input2[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="input_id2[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="bbbbbb">


                            <?php
                            $data19 = custom_fields();
                            foreach ($data19 as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 31) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-12" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select2[]">;
                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="select_id2[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>







                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div id="cccccc">


                            <?php
                            $data20 = custom_fields();
                            foreach ($data20 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 31) {
                                    $arr = explode(",", $value['options']);
                                    ?>

                                    <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                    <?php
                                    for ($i = 0; $i < count($arr); $i++) {
                                        ?>
                                        <div class="col-md-12" >

                                            <div class="form-group">
                                                <input type="checkbox" name="checbox2[]"  value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>









                                    <?php
                                }
                            }
                            ?>

                        </div>
                        <div id="dddddd">
                            <?php
                            $data21 = custom_fields();
                            foreach ($data21 as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 31) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number2[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="number_id2[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="gggggg">
                            <?php
                            $data22 = custom_fields();
                            foreach ($data22 as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 31) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea2[]">  </textarea>
                                                <input type="hidden" name="textarea_id2[]"  value="<?php echo $value['id']; ?>" />
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>

                        <div id="llllll">
                            <?php
                            $data23 = custom_fields();
                            foreach ($data23 as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 31) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>
                                        <div class="form-group">
                                            <input type='text' name='datepicker2[]' value='' class=' hijri-date-input form-control'  >
                                            <input type="hidden" name="datepicker_id2[]"  value="<?php echo $value['id']; ?>" />

                                        </div>
                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>  

                    </div>





                    <div id="fffffff">
                        <?php
                        $data18 = custom_fields();
                        foreach ($data18 as $value) {
                            if ($value['field_type'] == 'input' && $value['section_id'] == 35) {
                                ?>
                                <div>
                                    <div class="col-md-12" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <input type='text' name='input5[]' value='' class='form-control' id='input' />
                                            <input type="hidden" name="input_id5[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div id="bbbbbbb">


                        <?php
                        $data19 = custom_fields();
                        foreach ($data19 as $value) {

                            if ($value['field_type'] == 'select' && $value['section_id'] == 35) {
                                $arr = explode(",", $value['options']);
                                ?>
                                <div class="col-md-12" >
                                    <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                    <div class="form-group">
                                        <select class='form-control' name="select5[]">;
                                            <?php
                                            for ($i = 0; $i < count($arr); $i++) {
                                                ?>

                                                <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                <?php
                                            }
                                            ?>

                                        </select>
                                        <input type="hidden" name="select_id5[]"  value="<?php echo $value['id']; ?>" />
                                    </div>
                                </div>







                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div id="ccccccc">


                        <?php
                        $data20 = custom_fields();
                        foreach ($data20 as $value) {

                            if ($value['field_type'] == 'checkbox' && $value['section_id'] == 35) {
                                $arr = explode(",", $value['options']);
                                ?>

                                <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                <?php
                                for ($i = 0; $i < count($arr); $i++) {
                                    ?>
                                    <div class="col-md-12" >

                                        <div class="form-group">
                                            <input type="checkbox" name="checbox5[]"  value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>









                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div id="ddddddd">
                        <?php
                        $data21 = custom_fields();
                        foreach ($data21 as $value) {
                            if ($value['field_type'] == 'number' && $value['section_id'] == 35) {
                                ?>
                                <div id="custom">
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <input type='number' name='number5[]' value='' class='form-control' id='input' />
                                            <input type="hidden" name="number_id5[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div id="ggggggg">
                        <?php
                        $data22 = custom_fields();
                        foreach ($data22 as $value) {
                            if ($value['field_type'] == 'textarea' && $value['section_id'] == 35) {
                                ?>
                                <div id="custom">
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <textarea  style="border:2px solid black" name="textarea5[]">  </textarea>
                                            <input type="hidden" name="textarea_id5[]"  value="<?php echo $value['id']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                    </div>

                    <div id="lllllll">
                        <?php
                        $data23 = custom_fields();
                        foreach ($data23 as $value) {
                            if ($value['field_type'] == 'datepicker' && $value['section_id'] == 35) {
                                ?>

                                <div class='col-md-6'>
                                    <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>
                                    <div class="form-group">
                                        <input type='text' name='datepicker5[]' value='' class=' hijri-date-input form-control  '  >
                                        <input type="hidden" name="datepicker_id5[]"  value="<?php echo $value['id']; ?>" />
                                    </div>
                                </div>

                                <?php
                            }
                        }
                        ?>
                    </div>  


                    <div id="checkbox_case_law" class='col-md-12'>


                        <div class='col-md-6' id="div_linked">
                            <label for='linked' >مرتبط</label>
                            <div class='form-group'>
                                <input type='checkbox' name='linked' value='linked'  id='linked'   class='get_value'>
                            </div>
                            <div id="tree_linked">



                            </div>
                        </div>

                        <table class="table table-striped table-bordered" id="case_law_table">
                            <thead>
                                <tr id="head">
                                    <th>عنوان النظام</th>


                                    <th>رقم المادة</th>


                                </tr>
                            </thead>
                            <tbody id="case_law">



                            </tbody>
                        </table> 

                    </div>


                   <!--  <input type="hidden" name="material_number_legislation_in_case_value" id="material_number_legislation_in_case_value" value=''>
                    <input type="hidden" name="system_id" id="system_id" value=''> -->

                </div>













        </div>









    </div>







</div>
<div class="box-footer">
    <button type="submit" class="btn btn-success save">
        <i class="fa fa-check"></i> حفظ
    </button>
</div>
</form>

</div>
</div>
</div>

<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">

<script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">

<script>
    $(document).ready(function () {
        var t = 0;
        $(".mini").hide();
        $("#ver_ver").hide();
        $("#pdf_div").hide();
        $("#show_country").hide();
        $("#fff").hide();
        $("#ffff").hide();
        $("#fffff").hide();
        $("#ffffff").hide();
        $("#bbb").hide();
        $("#bbbb").hide();
        $("#bbbbb").hide();
        $("#bbbbbb").hide();
        $("#ccc").hide();
        $("#cccc").hide();
        $("#ccccc").hide();
        $("#cccccc").hide();
        $("#ddd").hide();
        $("#dddd").hide();
        $("#ddddd").hide();
        $("#dddddd").hide();
        $("#ggg").hide();
        $("#gggg").hide();
        $("#ggggg").hide();
        $("#gggggg").hide();
        $("#lll").hide();
        $("#llll").hide();
        $("#lllll").hide();
        $("#llllll").hide();
        $("#div_linked").hide();
        $("#case_law").hide();
        $("#dis_case_law").hide();
        $("#checkbox_case_law").hide();
        $("#case_law_table").hide();
        addTinyMCE();
        var change = 'no';
        var main_section_id = '';
        $("#mat").hide();
        $("#add_row").hide();
        $("#add_row_ver").hide();
        $("select.section").change(function () {
            addTinyMCE();
            $("#title").show();
            $("#mat").hide();
            $("#fff").hide();
            $("#ffff").hide();
            $("#fffff").hide();
            $("#ffffff").hide();
            $("#fffffff").hide();
            $("#bbb").hide();
            $("#bbbb").hide();
            $("#bbbbb").hide();
            $("#bbbbbb").hide();
            $("#bbbbbbb").hide();
            $("#ccc").hide();
            $("#cccc").hide();
            $("#ccccc").hide();
            $("#cccccc").hide();
            $("#cccccc").hide();
            $("#ddd").hide();
            $("#dddd").hide();
            $("#ddddd").hide();
            $("#dddddd").hide();
            $("#ddddddd").hide();
            $("#ggg").hide();
            $("#gggg").hide();
            $("#ggggg").hide();
            $("#gggggg").hide();
            $("#ggggggg").hide();
            $("#lll").hide();
            $("#llll").hide();
            $("#lllll").hide();
            $("#llllll").hide();
            $("#lllllll").hide();
            $("#case_law").hide();
            $("#add_row").hide();
            $("#add_row_ver").hide();
            $(".collection").hide();
            $(".coll").hide();
            $("#show_country").hide();
            $(".uploadForm").html('');
            $("#checkbox_case_law").hide();
            $("#dis_case_law").hide();
            $("#case_law_table").hide();
            $(".mini").hide();
            $("#ver_ver").hide();
            $("#div_linked").hide();
            $("#dynamicInputs").html('');
            addTinyMCE();
            main_section_id = $(this).children("option:selected").val();
            var section_name = $("#sel_section option:selected").html();
            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>section/getItem/" + main_section_id,
                dataType: "json",
                success: function (response)
                {

                    change = 'yes';
                    var i = 0;
                    var j = 0;
                    var r = [];
                    var k = '';
                    for (i = 0; i < response.result.length; i++) {


                        r[i] = response.result[i].section_id;
                    }


                    $('#treeview_json').treeview({data: response});
                    t = 0;
                    $("#sub_section").val(t);
                    $('#treeview_json').on('nodeSelected', function (event, data) {

                        t = 0;
                        $("#sub_section").val(t);
                        for (j = 0; j < r.length; j++) {


                            if (r[j] === data.id) {
                                //  alert(data.id);
                                t = data.id;
                                //  alert(data.id);
                                $("#sub_section").val(t);
                                break;
                            }


                        }





                    });
                    $(".save").click(function () {

                        if (t === 0) {
                            alert("  اختر اخر عقدة في كل قسم رئيسي");
                            $("#format").trigger("reset");
                            //return false;

                        } else {


                            return true;
                        }


                    });
                }
            });
            var txt4 = '';
            txt4 += "<div class=}'col-md-6'>";
            txt4 += "<label for='year' class='control-label' >السنة</label>";
            txt4 += "<div class='form-group'>";
            txt4 += "<input type='number' min='1900' max='2099' step='1' value='2016' name='year' style='width:50%' />";
            txt4 += "</div>";
            txt4 += "</div>";
            txt4 += "<div class='col-md-6'>";
            txt4 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
            txt4 += "<div class='form-group'>";
            txt4 += "<input type='text' name='volume_number' value='' class='form-control' id='volume_number' />";
            txt4 += "</div>";
            txt4 += "</div>";
            txt4 += "<div class='col-md-6'>";
            txt4 += "<label for='subject' class='control-label'>الموضوع</label>";
            txt4 += "<div class='form-group'>";
            txt4 += "<input type='text' name='subject' value='' class='form-control' id='subject' />";
            txt4 += "</div>";
            txt4 += "</div>";
            $("#fm").html(txt4);
            $('#tag').tokenfield({
            });
            var txt2 = '';
            var txt3 = '';
            var txt6 = '';
            var txt5 = '';
            if (section_name === 'الأحكام والسوابق القضائية') {
                addTinyMCE();
                $("#fm").empty();
                $("#title").show();
                $("#bbbbbb").show();
                $("#ffffff").show();
                $("#cccccc").show();
                $("#dddddd").show();
                $("#gggggg").show();
                $("#llllll").show();
                $("#case_law_table").hide();
                addTinyMCE();
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='city' class='control-label'> المدينة</label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<select  name='city'  class='form-control' id='city'>";
                txt6 += "<option value=''>اختر المدينة</option>";
                txt6 += "</select>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='issuer' class='control-label'>جهة الاصدار</label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<select  name='issuer'  class='form-control' id='issuer'>";
                txt6 += "<option value='الجهة الاولى'>الجهة الاولى </option>";
                txt6 += "<option value='الجهة الثانية'> الجهة الثانية</option>";
                txt6 += "</select>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='ruling_year' class='control-label'> سنة الحكم </label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<input type='text' name='ruling_year' value='' class='hijri-date-input  form-control' id='ruling_year' style='text-align:right'/>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='decision' class='control-label'> قرار الاستئناف  </label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<input type='text' name='decision' value='' class='form-control' id='decision' style='text-align:right'/>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='pronounced_judgment' class='control-label'>منطوق الحكم</label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<select  name='pronounced_judgment' value='' class='form-control' id='pronounced_judgment'>";
                txt6 += "<option value='قابل'>قابل</option>";
                txt6 += "<option value='غير قابل'>غير قابل</option>";
                txt6 += "</select>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='court' class='control-label'>المحكمة </label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<select  name='court' value='' class='form-control' id='court'>";
                txt6 += "<option value='محكمة الاستئناف'>محكمة الاستئناف</option>";
                txt6 += "<option value=' محكمة النقض'>محكمة النقض</option>";
                txt6 += "</select>";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='volume_number' class='control-label'> رقم الحكم</label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<input type='number' name='volume_number' value='' class='form-control' id='volume_number' />";
                txt6 += "</div>";
                txt6 += "</div>";
                txt6 += "<div class='col-md-6'>";
                txt6 += "<label for='issue_classification' class='control-label'> تصنيف القضية</label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<select  name='issue_classification' value='' class='form-control' id='issue_classification'>";
                txt6 += "<option value='تصنيف أول'>تصنيف أول</option>";
                txt6 += "<option value=' تصنيف ثاني'> تصنيف ثاني</option>";
                txt6 += "</select>";
                txt6 += "</div>";
                txt6 += "</div>";
                addTinyMCE();
                $("#show_country").show();
                $("#div_linked").show();
                $("#case_law").show();
                $("#dis_case_law").show();
                $("#checkbox_case_law").show();
                $("#fm").html(txt6);
                addTinyMCE();
                initHijrDatePickerDefault();
            } else if (section_name === 'الكتب القانونية والأبحاث') {
                $("#bbbb").show();
                $("#ffff").show();
                $("#cccc").show();
                $("#dddd").show();
                $("#gggg").show();
                $("#llll").show();
                addTinyMCE();
                $("#fm").empty();
                $("#title").show();
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='author' class='control-label'>المؤلف</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='author' value='' class='form-control' id='author' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='publisher' class='control-label'>الناشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='publisher' value='' class='form-control' id='publisher' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='year_publication' class='control-label'>سنة النشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='number' min='1900' max='2099' step='1' value='2016' name='year_publication' class='form-control'/>";
                txt2 += "</div>";
                txt2 += "</div>";
                $(".mini").show();
                $("#fm").html(txt2);
            } else if (section_name === 'الأنظمة والتشريعات والقوانين') {

                $("#bbbbbbb").show();
                $("#fffffff").show();
                $("#ccccccc").show();
                $("#ddddddd").show();
                $("#ggggggg").show();
                $("#lllll1l").show();
                addTinyMCE();
                $("#fm").empty();
                $("#title").show();
                txt5 += "<div class='col-md-6'>";
                txt5 += "<label for='legislative_type' class='control-label'>النوع التشريعي</label>";
                txt5 += "<div class='form-group'>";
                txt5 += "<select  name='legislative_type' value='' class='form-control' id='legislative_type'>";
                txt5 += "<option value='النوع الاول'>النوع الاول</option>";
                txt5 += "<option value='النوع الثاني'>النوع الثاني</option>";
                txt5 += "</select>";
                txt5 += "</div>";
                txt5 += "</div>";
                txt5 += "<div class='col-md-6'>";
                txt5 += "<label for='legislative_status' class='control-label'> حالة التشريع</label>";
                txt5 += "<div class='form-group'>";
                txt5 += "<select  name='legislative_status' value='' class='form-control' id='legislative_status'>";
                txt5 += "<option value='الحالة الاولى'> الحالة الاولى</option>";
                txt5 += "<option value='الحالة الثانية'> الحالة الثانية</option>";
                txt5 += "</select>";
                txt5 += "</div>";
                txt5 += "</div>";
                txt5 += "<div class='col-md-6'>";
                txt5 += "<label for='material_number_legislation' class='control-label'> رقم المادة</label>";
                txt5 += "<div class='form-group'>";
                txt5 += "<input type='number' name='material_number_legislation' value='' class='form-control' id='material_number_legislation' />";
                txt5 += "</div>";
                txt5 += "</div>";
                txt5 += "<div class='col-md-6'>";
                txt5 += "<label for='legislation_number' class='control-label'> رقم التشريع</label>";
                txt5 += "<div class='form-group'>";
                txt5 += "<input type='number' name='legislation_number' value='' class='form-control' id='legislation_number' />";
                txt5 += "</div>";
                txt5 += "</div>";
                $("#show_country").show();
                $("#fm").html(txt5);
            } else if (section_name === 'الأنظمة السعودية') {
                $("#bbbbb").show();
                $("#fffff").show();
                $("#ccccc").show();
                $("#ddddd").show();
                $("#ggggg").show();
                $("#lllll").show();
                $("#mat").show();
                $("#fm").empty();
                addTinyMCE();
                $("#title").hide();
//                $("#mor_textarea").empty();
//                $("#mor_textarea").show();
                $("#add_row").show();
                $("#add_row_ver").show();
                $("#ver_ver").show();
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='history_system_m' class='control-label'> تاريخ النظام </label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='history_system_m' value='' class='form-control hijri-date-input' id='history_system_m' style='text-align:right'/>";
                txt2 += "</div>";
                txt2 += "</div>";
//                txt2 += "<div class='col-md-6'>";
//                txt2 += "<label for='history_system_h' class='control-label'> تاريخ النظام </label>";
//                txt2 += "<div class='form-group'>";
//                txt2 += "<input type='text' name='history_system_h' value='' class='form-control hijri-date-input' id='history_system_h' style='text-align:right'/>";
//                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='accreditation' class='control-label'>الاعتماد</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='accreditation' value='' class='form-control' id='accreditation' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication_m' class='control-label'> تاريخ النشر </label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='date_publication_m' value='' class='form-control hijri-date-input' id='date_publication_m'  />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='pass' class='control-label'>النفاذ</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<select  name='pass' value='' class='form-control' id='pass'>";
                txt2 += "<option value='ساري'>ساري</option>";
                txt2 += "<option value='غير ساري'>غير ساري</option>";
                txt2 += "</select>";
                txt2 += "</div>";
                txt2 += "</div>";
                txt3 += "<div class='col-md-3'>";
                $("#fm").html(txt2);
                $("#material").html(txt3);
                initHijrDatePickerDefault();
            } else if (section_name === 'نماذج وعقود') {

                $("#fm").empty();
                $("#fff").show();
                $("#bbb").show();
                $("#ccc").show();
                $("#ddd").show();
                $("#ggg").show();
                $("#lll").show();
                $("#ffff").hide();
                $("#pdf_div").hide();
                addTinyMCE();
                initHijrDatePickerDefault();
            } else {

                $("#fm").empty();
            }

        });
        var count = 1;
        $(document).on('click', '#add_row', function () {
            addTinyMCE();
            count++;
            $('#total_item').val(count);
            var txt5 = '';
            txt5 += '<div class="collection" id="row_id_' + count + '" >';
            txt5 += '<div class="col-md-6">';
            txt5 += '<label for="material_number" class="control-label"> رقم  المادة</label>';
            txt5 += '<div class="form-group">';
            txt5 += '<input type="text" name="material_number[]" value="" class="form-control"   id="mat' + count + '" />';
            txt5 += '</div>';
            txt5 += '<button type="button" name="remove_row" id="' + count + '" class="btn btn-danger btn-s remove_row">X</button>';
            txt5 += '</div>';
            addTinyMCE();
            txt5 += ' <div class="col-md-6" >';
            txt5 += ' <label for="dis" class="control-label">  أدخل الوصف</label>';
            txt5 += '<div class="form-group">';
            txt5 += '<textarea  style="border:2px solid black" name="dis[]"  id="dis' + count + '">  </textarea>';
            txt5 += '</div>';
            txt5 += '</div>';
            txt5 += '</div>';
            addTinyMCE();
            $('#hide').append(txt5);
            addTinyMCE();
        });
        var count_ver = 1;
        $(document).on('click', '#add_row_ver', function () {

            count_ver++;
            $('#total_item_ver').val(count_ver);
            var txt6 = '';
            txt6 += ' <div class="coll" id="row_id_ver' + count_ver + '"  >';
            txt6 += ' <div class="col-md-12">';
            txt6 += ' <label for="version" class="control-label">الإصدار</label>';
            txt6 += ' <div class="form-group">';
            txt6 += '<input type="text" name="version[]" value="" class="form-control" id="version' + count_ver + '" />';
            txt6 += '<button type="button" name="remove_row_ver" data-id="' + count_ver + '"  class="btn btn-danger btn-s remove_row_ver">X</button>';
            txt6 += '</div>';
            txt6 += '</div>';
            txt6 += '</div>';
            $('#ver_ver').append(txt6);
        });
        $(document).on('click', '.remove_row', function () {
            addTinyMCE();
            var row_id = $(this).attr("id");
            $('#row_id_' + row_id).remove();
            count--;
            $('#total_item').val(count);
            addTinyMCE();
        });
        $(document).on('click', '.remove_row_ver', function () {

            var row_id_ver = $(this).attr("data-id");
            $('#row_id_ver' + row_id_ver).remove();
            count_ver--;
            $('#total_item_ver').val(count_ver);
        });
        function filePreview(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.uploadForm + img').remove();
                    $('.uploadForm').after('<img src="' + e.target.result + '" width="120" height="150"/>');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#mini").change(function () {

            filePreview(this);
        });
//
//        $(".save").click(function () {
//
//            if (change === 'no') {
//                alert("اختر القسم في البداية");
//                $("#format").trigger("reset");
//                window.location.reload();
//            } else {
//
//
//                return true;
//            }
//
//
//        });
        $(".save").click(function () {

            if (t === 0 || t === '') {
                alert("إختر القسم الرئيسي");
                $("#format").trigger("reset");
                //return false;

            } else {


                return true;
            }


        });
    });</script>


<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<!--<script src="<= base_url() ?>assets/dist/js/moment.min.js"></script>-->
<script src="<?= base_url() ?>assets/convert_date/js/momentjs.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-with-locales.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-hijri.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>

<!--<script src="<= base_url() ?>assets/dist/js/bootstrap-hijri-datetimepickermin.js"></script>-->



<script>
    $(document).ready(function () {

        $('.country').change(function () {

            var country_id = $('#country').val();
            if (country_id !== '')
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>book/fetch_city",
                    method: "POST",
                    data: {country_id: country_id},
                    success: function (data)
                    {
                        $('#city').html(data);
                    }
                });
            } else
            {

                $('#city').html('<option value="">Select City</option>');
            }
        });
    });</script>


<script>
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function () {


        var section_id = '';
        var main_section_id = 35;
        //alert(main_section_id);



        var t = '';
        $('#linked').click(function () {
            $("#case_law_table").show();
            $('#tree_linked').show();
            if ($('#linked').is(":checked"))
            {
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url() ?>section/getItem/" + main_section_id,
                    dataType: "json",
                    success: function (response)
                    {

                        var i = 0;
                        var j = 0;
                        var r = [];
                        for (i = 0; i < response.result.length; i++) {


                            r[i] = response.result[i].section_id;
                        }

                        $('#tree_linked').treeview({data: response});
                        $('#tree_linked').on('nodeSelected', function (event, data) {


                            t = '';
                            html = '';
                            for (j = 0; j < r.length; j++) {

                                if (r[j] === data.id) {



                                    t = data.id;
                                }

                            }

                            // alert(t);


                            section_id = t;
                            function loadPagination(pagno, section_id) {


                                $.ajax({
                                    url: "<?php echo base_url() ?>book/book_pagination/" + pagno,
                                    type: 'post',
                                    dataType: 'json',
                                    data: {section_id: section_id},
                                    beforeSend: function () {

                                        $("#loader").show();
                                    },
                                    success: function (response) {

                                        //  alert(response.pagination);

                                        $('#pagination_in_section').html(response.pagination);
                                        createTable(response.result, response.row);
                                    },
                                    complete: function (data) {
                                        // Hide image container
                                        $("#loader").hide();
                                    },
                                    error: function () {
                                        alert("error in loadPagination");
                                    }
                                });
                            }





//  Create table list';


                            function createTable(result) {

                         

                                //   $('#books_in_section').empty();

                                var html = '';
                                var index = '';
                                for (index in result) {






                                    html += '<tr>';
                                    html += '<td>' + result[index].book_title + '</td>';
                                    html += '<td><input type="checkbox" name="material_number_legislation_in_case[]" value="' + result[index].material_number_legislation + '" class="material_number_legislation_in_case">' + result[index].material_number_legislation + '</td>';
                                    html += '<td><input type="hidden" name="system_id[]" value="' + result[index].book_id + '" class="system_id_id"></td>';
                                    html += '</tr>';






                                }




                                $('#case_law').html(html);








                            }
                            var count_c = 0;



                            $(".save").click(function () {
                                $.each($(".material_number_legislation_in_case:checked"), function () {



                                    count_c++;

                                });
                             

                                $('#total_item_system').val(count_c);
                            });






                            loadPagination(0, section_id);
                            $('#pagination_in_section').on('click', 'a', function (e) {
                                e.preventDefault();
                                var pageno = $(this).attr('data-ci-pagination-page');
                                loadPagination(pageno, section_id);
                            });
                        });
                    }



                });
            } else {
                $('#tree_linked').hide();
                $('#case_law_table').hide();
            }


        });
        //alert("gg");
        var book_id = $(this).data('row_id');
        var table_column = $(this).data('column_name');
        var value = $(this).text();
        var description = $(this).data('description');
        var description_value = $(this).text();
        var section_name = "نماذج وعقود";
        $.ajax({
            url: "<?php echo base_url(); ?>book/update/" + book_id,
            method: "POST",
            data: {book_id: book_id, table_column: table_column, value: value, sub_section: section_id, section_name: section_name, description: description, description_value: description_value},
            success: function (data)
            {

                loadPagination(0, section_id);
            }

        });
    });</script>

<script>

    //tinymce.init({selector:'textarea'});

    function addTinyMCE() {
        tinymce.init({
            selector: 'textarea', // change this value according to your HTML
            language: 'ar',
            allow_unsafe_link_target: true,
            convert_fonts_to_spans: false



        });
    }

</script>


<script type="text/javascript">


    $(function () {

        //initHijrDatePicker();

        initHijrDatePickerDefault();
    });
    function initHijrDatePickerDefault() {

        $(".hijri-date-input").hijriDatePicker();
    }


</script>







<!--<link href="<= base_url() ?>assets/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />-->




<?= $this->layout->block('') ?>