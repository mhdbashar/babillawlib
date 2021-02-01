
<?= $this->layout->block('datelias_search') ?>
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
                <h3 class="box-title">بحث تفصيلي عن الكتاب</h3>
                <span id="u"></span>
            </div>


            <form method="post" action="<?php echo base_url() ?>book/search_datelias" enctype="multipart/form-data" id="format" name="myForm" >

                <input type="hidden" name="sub_section" value="" id="sub_section" class="sub_section" />

                <input type="hidden" name="total_item" id="total_item" value="1" />

                <input type="hidden" name="total_item_ver" id="total_item_ver" value="1" />

                <div class="box-body" id="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="section_id" class="control-label">إختر القـــســـــم</label>
                            <div class="form-group">
                                <select  name="section_id"  class="form-control section" style="border-bottom: 2px #3c8dbc solid;" id="sel_section" >
                                    <option value="">اختر القسم</option>

                                    <?php
                                    foreach ($get_main_section as $value) {
                                        ?>
                                        <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>


                                        <?php
                                    }
                                    ?>




                                </select>

                                <input type="hidden" name="section_id" value="" id="section_search">


                            </div>
                        </div>



                    </div>

                    


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

                                        <input type='text' name='datepicker1[]' value='' class=' hijri-date-input'  >
                                        <input type="hidden" name="datepicker_id1[]"  value="<?php echo $value['id']; ?>" />

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
                                                <input type='text' name='input2[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />
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
                                            <select class='form-control' name="select2[]">;
                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />
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
                                                <input type="checkbox" name="checkbox2[]" value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>


                                    <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />






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
                                                <input type='number' name='input2[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />
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
                                                <textarea  style="border:2px solid black" name="textarea2[]">  </textarea>
                                                <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />
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

                                        <input type='text' name='datepicker2[]' value='' class=' hijri-date-input'  >
                                        <input type="hidden" name="id2[]"  value="<?php echo $value['id']; ?>" />

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

                                        <input type='text' name='datepicker3[]' value='' class=' hijri-date-input'  >
                                        <input type="hidden" name="datepicker_id3[]"  value="<?php echo $value['id']; ?>" />

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
                                                <input type='text' name='input4[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="id4[]"  value="<?php echo $value['id']; ?>" />
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
                                            <select class='form-control' name="select4[]">;
                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {
                                                    ?>

                                                    <option class='form-control' value="<?php echo $arr[$i] ?>"><?php echo $arr[$i] ?></option>

                                                    <?php
                                                }
                                                ?>

                                            </select>
                                            <input type="hidden" name="id4[]"  value="<?php echo $value['id']; ?>" />
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
                                                <input type="checkbox" name="checbox4[]"  value="<?php echo $arr[$i] ?>"> <?php echo $arr[$i]; ?>

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
                                                <input type='number' name='input4[]' value='' class='form-control' id='input' />
                                                <input type="hidden" name="id4[]"  value="<?php echo $value['id']; ?>" />
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
                                                <textarea  style="border:2px solid black" name="textarea4[]">  </textarea>
                                                <input type="hidden" name="id4[]"  value="<?php echo $value['id']; ?>" />
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

                                        <input type='text' name='datepicker4[]' value='' class=' hijri-date-input'  >
                                        <input type="hidden" name="id4[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>  

                    </div>












                </div>
                <div class="col-md-6" >






                    <!--                    
                                        <div class="col-md-12">
                                            <label for="field" class="control-label"> الحقول المخصصة</label>
                                            <div class="form-group">
                                                <select name='inputSelect' class='form-control'>
                    
                                                    <option value ="text">حقل نصي</option>
                                                    <option value ="radio">زر اختيار خيار واحد</option>
                                                    <option value ="checkbox">زر اختيار خيارات متعددة</option>
                                                    <option value ="textarea">حقل نصي متعدد</option>
                                                </select>
                    
                                                <input type="button" value="اضف الحقول المخصصة" onClick="addAllInputs('dynamicInputs', document.myForm.inputSelect.value);"><br />
                    
                                            </div>
                                        </div>-->


                    <!--                    <div class="col-md-12">
                    
                                            <div class="form-group">
                                                <div  id="dynamicInputs">
                    
                    
                                                </div>
                    
                    
                                            </div>
                                        </div>-->



                </div>







        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-success save" id="search">
                <i class="fa fa-check"></i> بحث
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
            $("#add_row").hide();
            $("#add_row_ver").hide();
            $(".collection").hide();
            $(".coll").hide();
            $("#show_country").hide();
            $(".uploadForm").html('');

            $(".mini").hide();

            $("#ver_ver").hide();
            $("#dynamicInputs").html('');
            addTinyMCE();

            main_section_id = $(this).children("option:selected").val();
            var section_name = $("#sel_section option:selected").html();


    var value = $('#sel_section :selected').val();
          
            $('#section_search').val(value);



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
                txt6 += "<label for='ruling_year' class='control-label'>  سنة الحكم </label>";
                txt6 += "<div class='form-group'>";
                txt6 += "<input type='text' name='ruling_year' value='' class='form-control hijri-date-input' id='ruling_year' style='text-align:right'/>";
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


                txt6 += " <div class='col-md-6' id='summary_of_judgment' >";
                txt6 += "  <label for='summary_of_judgment' class='ontrol-label'> ملخص الحكم</label>";
                txt6 += "  <div class='form-group'>";
                txt6 += "<textarea  style='border:2px solid black' name='summary_of_judgment' id='summary_of_judgment'>  </textarea>";
                txt6 += "</div>";
                txt6 += " </div>";



                txt6 += " <div class='col-md-6' id='sentencing_text' >";
                txt6 += "  <label for='sentencing_text' class='ontrol-label'>نص الحكم</label>";
                txt6 += "  <div class='form-group'>";
                txt6 += "<textarea  style='border:2px solid black' name='sentencing_text' id='sentencing_text'>  </textarea>";
                txt6 += "</div>";
                txt6 += " </div>";



                txt6 += " <div class='col-md-6' id='the_reasons' >";
                txt6 += "  <label for='the_reasons' class='ontrol-label'>الأسباب</label>";
                txt6 += "  <div class='form-group'>";
                txt6 += "<textarea  style='border:2px solid black' name='the_reasons' id='the_reasons'>  </textarea>";
                txt6 += "</div>";
                txt6 += " </div>";


                txt6 += " <div class='col-md-6' id='the_legal_bond' >";
                txt6 += "  <label for='the_legal_bond' class='ontrol-label'>السند القانوني</label>";
                txt6 += "  <div class='form-group'>";
                txt6 += "<textarea  style='border:2px solid black' name='the_legal_bond' id='the_legal_bond'>  </textarea>";
                txt6 += "</div>";
                txt6 += " </div>";


                $("#show_country").show();







                $("#fm").html(txt6);

                addTinyMCE();

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


            } else if (section_name === 'الأنظمة الرياضية') {
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
//                history_system_m();
//                history_system_h();
//                date_publication_m();
//                date_publication_h();
                // addTinyMCE();

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


            }    
			
			
			else if (section_name === 'الأنظمة والتشريعات والقوانين') {

                $("#bbbbbbb").show();
                $("#fffffff").show();
                $("#ccccccc").show();
                $("#ddddddd").show();
                $("#ggggggg").show();
                $("#lllll1l").show();
                addTinyMCE();
                $("#fm").empty();
                $("#title").show();
                txt9 += "<div class='col-md-6'>";
                txt9 += "<label for='legislative_type' class='control-label'>النوع التشريعي</label>";
                txt9 += "<div class='form-group'>";
                txt9 += "<select  name='legislative_type' value='' class='form-control' id='legislative_type'>";

                txt9 += "<option value='النوع الاول'>النوع الاول</option>";
                txt9 += "<option value='النوع الثاني'>النوع الثاني</option>";
                txt9 += "</select>";
                txt9 += "</div>";
                txt9 += "</div>";

                txt9 += "<div class='col-md-6'>";
                txt9 += "<label for='legislative_status' class='control-label'> حالة التشريع</label>";
                txt9 += "<div class='form-group'>";
                txt9 += "<select  name='legislative_status' value='' class='form-control' id='legislative_status'>";

                txt9 += "<option value='الحالة الاولى'> الحالة الاولى</option>";
                txt9 += "<option value='الحالة الثانية'> الحالة الثانية</option>";
                txt9 += "</select>";
                txt9 += "</div>";
                txt9 += "</div>";
                
                
                
                    txt9 += "<div class='col-md-6'>";
                txt9 += "<label for='material_number_legislation' class='control-label'> رقم المادة</label>";
                txt9 += "<div class='form-group'>";
                txt9 += "<input type='number' name='material_number_legislation' value='' class='form-control' id='material_number_legislation' />";
                txt9 += "</div>";
                txt9 += "</div>";
                
                 txt9 += "<div class='col-md-6'>";
                txt9 += "<label for='legislation_number' class='control-label'> رقم التشريع</label>";
                txt9 += "<div class='form-group'>";
                txt9 += "<input type='number' name='legislation_number' value='' class='form-control' id='legislation_number' />";
                txt9 += "</div>";
                txt9 += "</div>";
                
                
                

                $("#show_country").show();

                $("#fm").html(txt9);


            }
			
			
			
			else {

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















    });

</script>


<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<!--<script src="<= base_url() ?>assets/dist/js/moment.min.js"></script>-->
<script src="<?= base_url() ?>assets/convert_date/js/momentjs.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-with-locales.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-hijri.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>

<!--<script src="<= base_url() ?>assets/dist/js/bootstrap-hijri-datetimepickermin.js"></script>-->

<script>

 $(document).ready(function () {
     
      $("#search").click(function () {
   var sel_section = $('#sel_section :selected').val();
   
   $("#section_search").val(sel_section);
   
 

    });
     });
</script>

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

    });
</script>





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