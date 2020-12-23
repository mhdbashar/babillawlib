
<?= $this->layout->block('update_data_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/convert_date/css/bootstrap-datetimepicker.css">


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/calendar-system.css">
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>
<!--<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">

<script src="<= base_url() ?>assets/tinymce/modern/theme.js" referrerpolicy="origin"></script>
<script src="<= base_url() ?>assets/tinymce/modern/theme.min.js" referrerpolicy="origin"></script>-->


<script src="<?= base_url() ?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/tinymce/ar.js" referrerpolicy="origin"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">تحرير الكتاب</h3>
            </div>



            <form method="post" action="<?php echo base_url('book/update/' . $book['book_id']) ?>" enctype="multipart/form-data" name="myForm">
                <input type="hidden" name="sub_section" value="<?php echo $book['section_id']; ?>" id="sub_section" class="sub_section" />
                <input type="hidden" name="total_item" id="total_item" value="0"  />
                <input type="hidden" name="total_item_ver" id="total_item_ver" value="0"  />
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="section_id" class="control-label"> القســــم الرئيسي</label>
                            <div class="form-group">
<!--                                <select  name="section_name" value="" class="form-control" style="border-bottom: 2px #3c8dbc solid;" id="sel_section" disabled=""   >-->



                                <?php
                                foreach ($get_main_section as $v) {

                                    if ($book['main_section'] == $v->section_id) {
                                        $select = "selected";
                                        $main_section = $v->section_name;
                                        $section_id = $v->section_id;
                                    } else {
                                        $select = "";
                                    }
                                    ?>


                                                                        <!--                                        <option <php echo $select ?> value="<php echo $v->section_name; ?>" ><php echo $v->section_name; ?></option>-->


                                    <?php
                                }
                                ?>




                                <!--</select>-->
                                <input type="text" name="section_name" value="<?php if (isset($main_section)) echo $main_section; ?>" class="form-control" id="book_title" readonly="" />

                            </div>
                        </div>



                    </div>
                    <div style="background-color:#9cd8fb;margin-bottom: 10px; width: 50% ">   إختر القـــسســم الفرعي   </div>



                    <div class="col-md-8" id="treeview_json">

                    </div>


                    <div class="row clearfix" id="hide">



                        <div class="col-md-6" id="title">
                            <label for="book_title" class="control-label">  عنوان الكتاب</label>
                            <div class="form-group">
                                <input type="text" name="book_title" value="<?php echo $book['book_title']; ?>" class="form-control" id="book_title" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="tag_name" class="control-label">الكلمات الدلالية </label>
                            <div class="form-group">
                                <input type="text" name="tag_name" value="<?php if (isset($tag_name)) echo $tag_name; ?>" class="form-control" id="tag"  />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <?php
                            if (isset($book['file'])) {
                                ?>
                                <div style="margin-right:5px"><a target="_blank" href="<?php echo base_url() ?>uploads/images/<?php echo $book['file']; ?>">الملف القديم : <span style="font-size: 20px" class="glyphicon">&#xe025;</span></a></div> <br>
                                <div> <input type="checkbox" name="remove_photo" value="<?php echo $book['file']; ?>"/>حذف الملف القديم</div><br>

                                <?php
                            }
                            ?>




                            <label for="picture" class="control-label"> تحميل الكتاب  :</label>
                            <div class="form-group">

                                <input class="form-control m" type="file" name="picture" id="picture" value="<?php echo $book['file']; ?>"   />
                            </div>
                        </div>


                        <div class='col-md-6 mini'>

                            <label for='mini' class='control-label'>تحميل الصورة</label>
                            <div class='form-group'>
                                <input class='form-control' type='file' name='mini' id='mini' value="<?php echo $book['mini']; ?>">
                            </div>

                            <div class='uploadForm'>

                                <?php
                                if (isset($book['mini'])) {
                                    ?>
                                    <img width="120" height="150" src="<?= site_url('uploads/images/') ?><?php echo $book['mini']; ?>"/>


                                    <?php
                                }
                                ?>





                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="book_name" class="control-label"> أدخل رابط</label>
                            <div class="form-group">

                                <input class="form-control" type="url" id="url" name="url" value="<?php echo $book['url']; ?>"  />
                            </div>
                        </div>

                        <?php
                        $result = $this->db->query("select country_name,country_id from country where country_id='" . $book['country'] . "'")->row();
                        ?>



                        <div class='col-md-6'   id='show_country' >
                            <label for='country' class='control-label'> البلد</label>
                            <div class='form-group'>
                                <select  name='country'  class='form-control country' id='country'  required >

                                    <?php
                                    foreach ($country as $row) {
                                        if ($row->country_id == $result->country_id) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>


                                        <option value='<?php echo $row->country_id; ?> '   <?php echo $selected ?> ><?php echo $row->country_name ?></option>;
                                        <?php
                                    }
                                    ?>



                                </select>
                            </div>
                        </div>





                        <div class='col-md-6'  id='status' >
                            <label for='legislative_status' class='control-label'> حالة التشريع</label>
                            <div class='form-group'>
                                <select  name='legislative_status' value='' class='form-control' id='legislative_status'>

                                    <?php
                                    $status = array("الحالة الاولى", "الحالة الثانية",);

// Iterating through the product array
                                    foreach ($status as $item) {

                                        if ($item == $book['legislative_status']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>




                        <div class='col-md-6'  id='type' >
                            <label for='legislative_type' class='control-label'>النوع التشريعي</label>
                            <div class='form-group'>
                                <select  name='legislative_type'  class='form-control' id='legislative_type'>

                                    <?php
                                    $type = array("النوع الاول", "النوع الثاني",);

                                    foreach ($type as $item) {
                                        if ($item == $book['legislative_type']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>






                        <div class='col-md-6'  id='pronounced' >
                            <label for='pronounced_judgment' class='control-label'>منطوق الحكم</label>
                            <div class='form-group'>
                                <select  name='pronounced_judgment' value='' class='form-control' id='pronounced_judgment'>

                                    <?php
                                    $pronounced = array("قابل", "غير قابل",);

                                    foreach ($pronounced as $item) {
                                        if ($item == $book['pronounced_judgment']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>












                        <div class='col-md-6'  id='issuer' >
                            <label for='issuer' class='control-label'>جهة الاصدار</label>
                            <div class='form-group'>
                                <select  name='issuer'  class='form-control' id='issuer'>

                                    <?php
                                    $issuer = array("الجهة الثانية", "الجهة الاولى",);

                                    foreach ($issuer as $item) {
                                        if ($item == $book['issuer']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>






                        <div class='col-md-6'  id='issue' >
                            <label for='issue_classification' class='control-label'> تصنيف القضية</label>
                            <div class='form-group'>
                                <select  name='issue_classification' value='' class='form-control' id='issue_classification'>

                                    <?php
                                    $issue = array("تصنيف ثاني", "تصنيف اول",);

                                    foreach ($issue as $item) {
                                        if ($item == $book['issue_classification']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>



                        <div class='col-md-6'  id='court_court' >
                            <label for='court' class='control-label'>المحكمة </label>
                            <div class='form-group'>
                                <select  name='court' value='' class='form-control' id='court'>

                                    <?php
                                    $court_court = array("محكمة النقض", "محكمة الاستئناف",);

                                    foreach ($court_court as $item) {
                                        if ($item == $book['court']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>









                        <div class='col-md-6'  id='pass_pass' >
                            <label for='pass' class='control-label'>النفاذ</label>
                            <div class='form-group'>
                                <select  name='pass' value='' class='form-control' id='pass'>

                                    <?php
                                    $pass = array("غير ساري", "ساري",);

                                    foreach ($pass as $item) {
                                        if ($item == $book['pass']) {
                                            $selected = 'selected';
                                        } else {

                                            $selected = '';
                                        }
                                        ?>




                                        ?>

                                        <option value='<?php echo $item; ?>'  <?php echo $selected ?>  ><?php echo $item; ?></option>;
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>

                        <!--    loop for checkbox material            -->



                        <div id="fm">


                        </div>
                        <div id="ver_ver">
                            <?php
                            $v = 0;
                            foreach ($book_version as $b) {
                                $v = $v + 1;
                                ?> 

                                <div class="col-md-12" id="ver">
                                    <label for='version' class='control-label'> الاصدار  </label>
                                    <div class='form-group'>
                                        <input type='text' name='version[]' value="<?php echo $b['version']; ?>" class='form-control' id='ver1' />
                                        <input type="hidden" name="version_id[]" value="<?php echo $b['version_id']; ?>">
                                    </div>
                                </div>



                                <?php
                            }
                            ?>
                        </div>
                        <div class="col-md-12" >
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" name="add_row_ver" id="add_row_ver" class="btn btn-success btn-s">+</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="vv" value="<?php echo $v; ?>">

                        <?php
                        $m = 0;
                        foreach ($book_material as $b) {
                            $m = $m + 1;
                            ?> 

                            <div class="col-md-6" id="mat">
                                <label for='material_number' class='control-label'> رقم  المادة</label>
                                <div class='form-group'>
                                    <input type='text' name='material_number[]' value="<?php echo $b['material_number']; ?>" class='form-control' id='mat1' />
                                    <input type="hidden" name="material_id[]" value="<?php echo $b['material_id']; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="dis" class="control-label">  أدخل الوصف</label>
                                <div class="form-group">
                                    <textarea id="tin" style="border:2px solid black" name="dis[]" value="">  <?php echo $b['description']; ?></textarea>
                                </div>
                            </div>


                            <?php
                        }
                        ?>
                        <input type="hidden" name="mmm" value="<?php echo $m; ?>">

                        <!--  <php
                        $f = 0;
                        foreach ($fields as $b) {
                            $f = $f + 1;
                            if ($b['myinputs']) {
                                ?>
                                <div class="col-md-6" id="mat">
                                    <label for='material_number' class='control-label'> <php echo $b['myinputs_label']; ?></label>
                                    <div class='custom-control custom-radio'>
                                        <input type='text' name='myInputs[]' value="<php echo $b['myinputs']; ?>" class='form-control' id='myinputs' />
                                        <input type="hidden" name="field_id[]" value="<php echo $b['field_id']; ?>">
                                    </div>
                                </div>

                                <php
                            }
                            ?> 


                            <php
                            if ($b['myradiobuttons']) {

                                if ($b['myradiobuttons'] !== '') {
                                    $xx = 'checked="true"';
                                }
                                ?>

                                <div class="col-md-12" >
                                    <label for='myradiobuttons_label' class='control-label'><php echo $b['myradiobuttons_label']; ?></label>
                                    <div class='custom-control custom-radio'>
                                        <input type='radio' name='myRadioButtons[]' value="<php echo $b['myradiobuttons']; ?>"  <php echo $xx; ?> />
                                        <input type="hidden" name="field_id[]" value="<php echo $b['field_id']; ?>">
                                    </div>
                                </div>

                                <php
                            }
                            ?>

                            <php
                            if ($b['mycheckboxes']) {

                                if ($b['mycheckboxes'] !== '') {
                                    $xx = 'checked="true"';
                                }
                                ?>

                                <div class="col-md-12">
                                    <label for='material_number' class='control-label'><php echo $b['mycheckboxes_label']; ?> </label>
                                    <div class='custom-control custom-radio'>
                                        <input type='checkbox' name='myCheckBoxes[]' value="<php echo $b['mycheckboxes']; ?>"  <php echo $xx; ?> />
                                        <input type="hidden" name="field_id[]" value="<php echo $b['field_id']; ?>">
                                    </div>
                                </div>
        <php
    }
    ?>



    <php
    if ($b['mytextareas']) {
        ?>
                                <div class="col-md-6" id="mat">
                                    <label for='material_number' class='control-label'> <php echo $b['mytextareas_label']; ?> </label>
                                    <div class='custom-control custom-radio'>
                                        <textarea name='myTextAreas[]'><php echo $b['mytextareas']; ?></textarea>
                                        <input type="hidden" name="field_id[]" value="<php echo $b['field_id']; ?>">
                                    </div>
                                </div>
        <php
    }
}
?> --> 






                       <!--  <input type="hidden" name="mmm" value="<php echo $f; ?>"> -->






                        <!--
                                             Default unchecked 
                        <div class="custom-control custom-radio">
                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked" name="defaultExampleRadios">
                          <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                        </div>
                        
                        -->


                        <div class="col-md-6" >
                            <div class="form-group">
                                <div align="right">
                                    <button type="button" name="add_row" id="add_row" class="btn btn-success btn-s">+</button>
                                </div>
                            </div>
                        </div>







                        <div id="fff">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input1[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="input_id1[]"  value="<?php echo $value['field_id']; ?>" />
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
                            $selected = '';
                            foreach ($fields as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 33) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select1[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {

                                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->row();

                                                    if ($result->value == $arr[$i]) {
                                                        $selected = 'selected';
                                                    } else {

                                                        $selected = '';
                                                    }
                                                    ?>


                                                    <option <?php echo $selected; ?> class='form-control' value="<?php echo $arr[$i] ?>" <?php echo $selected ?> ><?php echo $arr[$i] ?></option>

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
                            $checked = '';
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 33) {
                                    $arr = explode(",", $value['options']);


                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->result_array();
                                    foreach ($result as $v) {



                                        for ($i = 0; $i < count($arr); $i++) {


                                            if ($v['value'] == $arr[$i]) {
                                                $checked = 'checked';
                                                ?>

                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox1[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id1[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>


                                                <?php
                                                break;
                                            } else {

                                                $checked = '';
                                                ?>


                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox1[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id1[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>          

                                                <?php
                                            }
                                            ?>



                                            <?php
                                        }
                                        ?>


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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number1[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 33) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea1[]"> <?php echo $value['value']; ?> </textarea>
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 33) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>

                                        <input type='text' name='datepicker1[]' value='<?php echo $value['value']; ?>' class=' hijri-date-input form-control'  >
                                        <input type="hidden" name="datepicker_id[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    






                        <div id="ffff">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 31) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input2[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="input_id2[]"  value="<?php echo $value['field_id']; ?>" />
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
                            $selected = '';
                            foreach ($fields as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 31) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select2[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {

                                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->row();

                                                    if ($result->value == $arr[$i]) {
                                                        $selected = 'selected';
                                                    } else {

                                                        $selected = '';
                                                    }
                                                    ?>


                                                    <option <?php echo $selected; ?> class='form-control' value="<?php echo $arr[$i] ?>" <?php echo $selected ?> ><?php echo $arr[$i] ?></option>

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

                        <br><br>
                        <div id="cccc">


                            <?php
                            $data2 = custom_fields();
                            $checked = '';
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 31) {
                                    $arr = explode(",", $value['options']);


                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->result_array();
                                    foreach ($result as $v) {



                                        for ($i = 0; $i < count($arr); $i++) {


                                            if ($v['value'] == $arr[$i]) {
                                                $checked = 'checked';
                                                ?>

                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox2[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id2[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>


                                                <?php
                                                break;
                                            } else {

                                                $checked = '';
                                                ?>


                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox2[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id2[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>          

                                                <?php
                                            }
                                            ?>



                                            <?php
                                        }
                                        ?>


                                        <?php
                                    }
                                    ?>









                                    <?php
                                }
                            }
                            ?>

                        </div>






                        <div id="dddd">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 31) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number2[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="number_id2[]"  value="<?php echo $value['id']; ?>" />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 31) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea2[]"> <?php echo $value['value']; ?> </textarea>
                                                <input type="hidden" name="textarea_id2[]"  value="<?php echo $value['id']; ?>" />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 31) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>

                                        <input type='text' name='datepicker2[]' value='<?php echo $value['value']; ?>' class=' hijri-date-input form-control'  >
                                        <input type="hidden" name="datepicker_id2[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    


                        <div id="fffff">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 32) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input3[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="input_id3[]"  value="<?php echo $value['field_id']; ?>" />
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
                            $selected = '';
                            foreach ($fields as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 32) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select3[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {

                                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->row();

                                                    if ($result->value == $arr[$i]) {
                                                        $selected = 'selected';
                                                    } else {

                                                        $selected = '';
                                                    }
                                                    ?>


                                                    <option <?php echo $selected; ?> class='form-control' value="<?php echo $arr[$i] ?>" <?php echo $selected ?> ><?php echo $arr[$i] ?></option>

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

                        <br><br>
                        <div id="ccccc">


                            <?php
                            $data2 = custom_fields();
                            $checked = '';
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 32) {
                                    $arr = explode(",", $value['options']);


                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->result_array();
                                    foreach ($result as $v) {



                                        for ($i = 0; $i < count($arr); $i++) {


                                            if ($v['value'] == $arr[$i]) {
                                                $checked = 'checked';
                                                ?>

                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox3[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id3[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>


                                                <?php
                                                break;
                                            } else {

                                                $checked = '';
                                                ?>


                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox3[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id3[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>          

                                                <?php
                                            }
                                            ?>



                                            <?php
                                        }
                                        ?>


                                        <?php
                                    }
                                    ?>









                                    <?php
                                }
                            }
                            ?>

                        </div>






                        <div id="ddddd">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 32) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number3[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 32) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea3[]"> <?php echo $value['value']; ?> </textarea>
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 32) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>

                                        <input type='text' name='datepicker3[]' value='<?php echo $value['value']; ?>' class=' hijri-date-input form-control'  >
                                        <input type="hidden" name="datepicker_id3[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    






                        <div id="ffffff">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 34) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input4[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="input_id4[]"  value="<?php echo $value['field_id']; ?>" />
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
                            $selected = '';
                            foreach ($fields as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 34) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select4[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {

                                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->row();

                                                    if ($result->value == $arr[$i]) {
                                                        $selected = 'selected';
                                                    } else {

                                                        $selected = '';
                                                    }
                                                    ?>


                                                    <option <?php echo $selected; ?> class='form-control' value="<?php echo $arr[$i] ?>" <?php echo $selected ?> ><?php echo $arr[$i] ?></option>

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

                        <br><br>
                        <div id="cccccc">


                            <?php
                            $data2 = custom_fields();
                            $checked = '';
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 34) {
                                    $arr = explode(",", $value['options']);


                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->result_array();
                                    foreach ($result as $v) {



                                        for ($i = 0; $i < count($arr); $i++) {


                                            if ($v['value'] == $arr[$i]) {
                                                $checked = 'checked';
                                                ?>

                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox4[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id4[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>


                                                <?php
                                                break;
                                            } else {

                                                $checked = '';
                                                ?>


                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox4[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id4[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>          

                                                <?php
                                            }
                                            ?>



                                            <?php
                                        }
                                        ?>


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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 34) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number4[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="number_id4[]"  value="<?php echo $value['id']; ?>" />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 34) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea4[]"> <?php echo $value['value']; ?> </textarea>
                                                <input type="hidden" name="textarea_id4[]"  value="<?php echo $value['id']; ?>" />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 34) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>

                                        <input type='text' name='datepicker4[]' value='<?php echo $value['value']; ?>' class=' hijri-date-input form-control'  >
                                        <input type="hidden" name="datepicker_id4[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    

                        <div id="fffffff">
                            <?php
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'input' && $value['section_id'] == 35) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='text' name='input5[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
                                                <input type="hidden" name="input_id5[]"  value="<?php echo $value['field_id']; ?>" />
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
                            $selected = '';
                            foreach ($fields as $value) {

                                if ($value['field_type'] == 'select' && $value['section_id'] == 35) {
                                    $arr = explode(",", $value['options']);
                                    ?>
                                    <div class="col-md-6" >
                                        <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                        <div class="form-group">
                                            <select class='form-control' name="select5[]">;

                                                <?php
                                                for ($i = 0; $i < count($arr); $i++) {

                                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->row();

                                                    if ($result->value == $arr[$i]) {
                                                        $selected = 'selected';
                                                    } else {

                                                        $selected = '';
                                                    }
                                                    ?>


                                                    <option <?php echo $selected; ?> class='form-control' value="<?php echo $arr[$i] ?>" <?php echo $selected ?> ><?php echo $arr[$i] ?></option>

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

                        <br><br>
                        <div id="ccccccc">


                            <?php
                            $data2 = custom_fields();
                            $checked = '';
                            foreach ($data2 as $value) {

                                if ($value['field_type'] == 'checkbox' && $value['section_id'] == 35) {
                                    $arr = explode(",", $value['options']);


                                    $result = $this->db->query("select value from fields_values where book_id= '" . $book['book_id'] . "' and field_id ='" . $value['id'] . "'  ")->result_array();
                                    foreach ($result as $v) {



                                        for ($i = 0; $i < count($arr); $i++) {


                                            if ($v['value'] == $arr[$i]) {
                                                $checked = 'checked';
                                                ?>

                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox5[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id5[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>


                                                <?php
                                                break;
                                            } else {

                                                $checked = '';
                                                ?>


                                                <div class="col-md-12" >

                                                    <div class="form-group">



                                                        <input    type="checkbox" <?php echo $checked; ?> value="<?php echo $arr[$i] ?>" name="checkbox5[]"> <?php echo $arr[$i]; ?>
                                                        <input type="hidden" name="checkbox_id5[]"  value="<?php echo $value['id']; ?>" />

                                                    </div>
                                                </div>          

                                                <?php
                                            }
                                            ?>



                                            <?php
                                        }
                                        ?>


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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'number' && $value['section_id'] == 35) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <input type='number' name='number5[]' value='<?php echo $value['value']; ?>' class='form-control' id='input' />
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'textarea' && $value['section_id'] == 35) {
                                    ?>
                                    <div id="custom">
                                        <div class="col-md-6" >
                                            <label  class="control-label"><?php echo $value['field_label']; ?></label>
                                            <div class="form-group">
                                                <textarea  style="border:2px solid black" name="textarea5[]"> <?php echo $value['value']; ?> </textarea>
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
                            foreach ($fields as $value) {
                                if ($value['field_type'] == 'datepicker' && $value['section_id'] == 35) {
                                    ?>

                                    <div class='col-md-6'>
                                        <label for='ruling_year' class='control-label'>   <?php echo $value['field_label']; ?> </label>

                                        <input type='text' name='datepicker5[]' value='<?php echo $value['value']; ?>' class=' hijri-date-input form-control'  >
                                        <input type="hidden" name="datepicker_id5[]"  value="<?php echo $value['id']; ?>" />

                                    </div>

                                    <?php
                                }
                            }
                            ?>
                        </div>    










                    </div>





                    <div id="checkbox_case_law" class='col-md-12'>


                        <div class='col-md-6' id="div_linked">
                            <label for='linked' >مرتبط بنظام تشريعي</label>
                            <div class='form-group'>
							<?php
							if(isset($mat['material_number_legislation'])){
								$checkedd='checked';
								
							}
							else{
								$checkedd='';
								
							}
							
							
							?>
							
                                <input type='checkbox' name='linked' value='linked'  id='linked'  <?php echo $checkedd?> class='get_value'>
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


                    <input type="hidden" name="material_number_legislation_in_case_value" id="material_number_legislation_in_case_value" value=''>
                    <input type="hidden" name="system_id" id="system_id" value=''>


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
							var sss= "<?php echo $checkedd ;?>";
						
							</script>

<script>
    $(document).ready(function () {



        var section_name = "<?php if (isset($main_section)) echo $main_section; ?>";
        var section_id = "<?php if (isset($section_id)) echo $section_id; ?>";
        addTinyMCE();
        //$("#mat").hide();
        $("#add_row").hide();
        $(".mini").hide();
        $("#add_row_ver").hide();
        $("#status").hide();
        $("#type").hide();
        $("#pronounced").hide();
        $("#issue").hide();
        $("#issuer").hide();
        $("#court_court").hide();
        $("#pass_pass").hide();
        $("#show_country").hide();







        //        function date_publication_h() {
        //
        //
        //            $("#date_publication_h").hijriDatePicker({
        //                hijri: true,
        //                showSwitcher: false
        //            });
        //        }

        //        function date_publication_m() {
        //
        //            $("#date_publication_m").hijriDatePicker({
        //                format: "DD-MM-YYYY",
        //                hijriFormat: "iYYYY-iMM-iDD",
        //                dayViewHeaderFormat: "MMMM YYYY",
        //                hijriDayViewHeaderFormat: "iMMMM iYYYY",
        //            });
        //        }
        //        function history_system_h() {
        //
        //            $("#history_system_h").hijriDatePicker({
        //
        //                hijri: true,
        //                showSwitcher: false
        //            });
        //        }




        //        function history_system_m() {
        //
        //            $("#history_system_m").hijriDatePicker({
        //                format: "DD-MM-YYYY",
        //                hijriFormat: "iYYYY-iMM-iDD",
        //                dayViewHeaderFormat: "MMMM YYYY",
        //                hijriDayViewHeaderFormat: "iMMMM iYYYY",
        //            });
        //        }



        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>section/getItem/" + section_id,
            dataType: "json",
            success: function (response)
            {
                var i = 0;
                var j = 0;
                var r = [];
                var t = '';
                for (i = 0; i < response.result.length; i++) {


                    r[i] = response.result[i].section_id;

                }
                //  alert(r[0]);





                //initTree(response);

                $('#treeview_json').treeview({data: response});
                t = section_id;
                $('#treeview_json').on('nodeSelected', function (event, data) {
                    t = '';
                    $("#sub_section").val(t);
                    for (j = 0; j < r.length; j++) {

                        if (r[j] === data.id) {
                            //  alert(data.id);
                            t = data.id;
                            $("#sub_section").val(t);
                            break;
                        }

                    }





                    //alert($("#sub_section").val());

                });


                $(".save").click(function () {

                    if (t === '') {
                        alert("اخترالقسم");
                        $("#format").trigger("reset");

                    } else {


                        return true;
                    }


                });



            }
        });



        $('#tag').tokenfield({
        });


        var txt1 = '';
        var txt2 = '';

        var txt5 = '';
        if (section_name === 'الأحكام والسوابق القضائية') {
            var txt6 = '';
            $("#fm").empty();

            $("#mat").hide();
            $("#title").show();




            addTinyMCE();

            txt6 += "<div class='col-md-6'>";
            txt6 += "<label for='city' class='control-label'> المدينة</label>";
            txt6 += "<div class='form-group'>";
            txt6 += "<select  name='city'  class='form-control' id='city'>";


            txt6 += "<option value='<?php echo $city1['city'] ?>'><?php echo $city1['city_name'] ?></option>";



            txt6 += "</select>";
            txt6 += "</div>";
            txt6 += "</div>";

            txt6 += "<div class='col-md-6'>";
            txt6 += "<label for='ruling_year' class='control-label'>  سنة الحكم </label>";
            txt6 += "<div class='form-group'>";
            txt6 += "<input type='text' name='ruling_year' value='<?php echo $book['ruling_year'] ?>' class='form-control hijri-date-input' id='ruling_year' style='text-align:right'/>";
            txt6 += "</div>";
            txt6 += "</div>";







            txt6 += "<div class='col-md-6'>";
            txt6 += "<label for='volume_number' class='control-label'> رقم الحكم</label>";
            txt6 += "<div class='form-group'>";
            txt6 += "<input type='text' name='volume_number' value='<?php echo $book['volume_number'] ?>' class='form-control' id='volume_number' />";
            txt6 += "</div>";
            txt6 += "</div>";


            addTinyMCE();


            txt6 += " <div class='col-md-6' id='summary_of_judgment' >";
            txt6 += "  <label for='summary_of_judgment' class='ontrol-label'> ملخص الحكم</label>";
            txt6 += "  <div class='form-group'>";
            txt6 += "<textarea  style='border:2px solid black' name='summary_of_judgment' id='summary_of_judgment'><?php echo $book['summary_of_judgment'] ?></textarea>";
            txt6 += "</div>";
            txt6 += " </div>";



            txt6 += " <div class='col-md-6' id='sentencing_text' >";
            txt6 += "  <label for='sentencing_text' class='ontrol-label'>نص الحكم</label>";
            txt6 += "  <div class='form-group'>";
            txt6 += "<textarea  style='border:2px solid black' name='sentencing_text' id='sentencing_text'><?php echo $book['sentencing_text'] ?>  </textarea>";
            txt6 += "</div>";
            txt6 += " </div>";



            txt6 += " <div class='col-md-6' id='the_reasons' >";
            txt6 += "  <label for='the_reasons' class='ontrol-label'>الأسباب</label>";
            txt6 += "  <div class='form-group'>";
            txt6 += "<textarea  style='border:2px solid black' name='the_reasons' id='the_reasons'> <?php echo $book['the_reasons'] ?> </textarea>";
            txt6 += "</div>";
            txt6 += " </div>";


            txt6 += " <div class='col-md-6' id='the_legal_bond' >";
            txt6 += "  <label for='the_legal_bond' class='ontrol-label'>السند القانوني</label>";
            txt6 += "  <div class='form-group'>";
            txt6 += "<textarea  style='border:2px solid black' name='the_legal_bond' id='the_legal_bond'> <?php echo $book['the_legal_bond'] ?>  </textarea>";
            txt6 += "</div>";
            txt6 += " </div>";

            $("#show_country").show();

            $("#pronounced").show();
            $("#issue").show();
            $("#issuer").show();
            $("#court_court").show();





            txt6 += "<div class='col-md-6'>";
            txt6 += "<label for='decision' class='control-label'> قرار الاستئناف  </label>";
            txt6 += "<div class='form-group'>";
            txt6 += "<input type='text' name='decision' value='<?php echo $book['decision'] ?> ' class='form-control' id='decision' style='text-align:right'/>";
            txt6 += "</div>";
            txt6 += "</div>";





            $("#fm").html(txt6);
            addTinyMCE();

        } else if (section_name === 'الكتب القانونية والأبحاث') {

            $("#fm").empty();

            $("#mat").hide();
            $(".mini").show();


            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='jurisdiction' class='control-label'>المؤلف</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='author' value='<?php echo $book['author']; ?>'' class='form-control' id='author' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='publisher' class='control-label'>الناشر</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='publisher' value='<?php echo $book['publisher']; ?>'' class='form-control' id='publisher' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='year_publication' class='control-label'>سنة النشر</label>";
            txt2 += "<div class='form-group'>";

            txt2 += "<input type='number' min='1900' max='2099' step='1' value='<?php echo $book['year_publication']; ?>'' name='year_publication'class='form-control' />";
            txt2 += "</div>";
            txt2 += "</div>";







            $("#fm").html(txt2);


        } else if (section_name === 'الأنظمة السعودية') {

            $("#fm").empty();

            $("#title").hide();
            $("#add_row").show();
            $("#add_row_ver").show();
            $("#pass_pass").show();
            initHijrDatePickerDefault();



            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='history_system_m' class='control-label'> تاريخ النظام </label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='history_system_m' value='<?php echo $book['history_system_m']; ?>' class='form-control hijri-date-input'  style='text-align:right' />";
            txt2 += "</div>";
            txt2 += "</div>";
            //            txt2 += "<div class='col-md-6'>";
            //            txt2 += "<label for='history_system' class='control-label'> تاريخ النظام الهجري</label>";
            //            txt2 += "<div class='form-group'>";
            //            txt2 += "<input type='text' name='history_system_h' value='<php echo $book['history_system_h']; ?>' class='form-control' id='history_system_h' style='text-align:right'/>";
            //            txt2 += "</div>";
            //            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='accreditation' class='control-label'>الاعتماد</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='accreditation' value='<?php echo $book['accreditation']; ?>' class='form-control' id='accreditation' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='date_publication_m' class='control-label'> تاريخ النشر </label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='date_publication_m' value='<?php echo $book['date_publication_m']; ?>' class='form-control hijri-date-input'    />";
            txt2 += "</div>";
            txt2 += "</div>";


//                    txt2 += "<div class='col-md-6'>";
//                    txt2 += "<label for='date_publication' class='control-label' > المقدمة </label>";
//                    txt2 += "<div class='form-group'>";
//                    txt2 += "<input type='text' name='interview' value='<php echo $book['interview']; ?>' class='form-control ' id='' style='text-align:right;  />";
//                    txt2 += "</div>";
//                    txt2 += "</div>";



            $("#fm").html(txt2);


            initHijrDatePickerDefault();


            addTinyMCE();


        } else if (section_name === 'الأنظمة والتشريعات والقوانين') {

            $("#bbbbbbb").show();
            $("#fffffff").show();
            $("#ccccccc").show();
            $("#ddddddd").show();
            $("#ggggggg").show();
            $("#lllll1l").show();
            $("#status").show();
            $("#type").show();
            addTinyMCE();
            $("#fm").empty();
            $("#title").show();
            $("#mat").hide();











            txt5 += "<div class='col-md-6'>";
            txt5 += "<label for='material_number_legislation' class='control-label'> رقم المادة</label>";
            txt5 += "<div class='form-group'>";
            txt5 += "<input type='number' name='material_number_legislation' value='<?php echo $book['material_number_legislation']; ?>' class='form-control' id='material_number_legislation' />";
            txt5 += "</div>";
            txt5 += "</div>";





            txt5 += "<div class='col-md-6'>";
            txt5 += "<label for='legislation_number' class='control-label'> رقم التشريع</label>";
            txt5 += "<div class='form-group'>";
            txt5 += "<input type='number' name='legislation_number' value='<?php echo $book['legislation_number']; ?>' class='form-control' id='legislation_number' />";
            txt5 += "</div>";
            txt5 += "</div>";




            $("#show_country").show();

            $("#fm").html(txt5);


        } else if (section_name === 'نماذج وعقود') {

            $("#fm").empty();


            $("#mat").hide();




        } else {

            $("#fm").empty();
        }






        var base_url = '<?php echo base_url(); ?>';
        $(document).ready(function () {



            var section_id = '';

            var main_section_id = 35;
            //alert(main_section_id);



            var t = '';

           if(sss){
			   
			   
		 
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
                                function createTable(result, sno) {
                                    sno = Number(sno);
                                    //   $('#books_in_section').empty();

                                    var html = '';



										var checked='';
                                    var index = '';
                                    for (index in result) {
						
                                        html += '<tr>';

                                        html += '<td>' + result[index].book_title + '</td>';
									if((result[index].material_number_legislation) == <?php echo $mat['material_number_legislation']; ?>){
											 checked='checked';
											
											
										}
										else{
											
											checked='';
										}
										
										
                                        html += '<td><input type="checkbox" name="material_number_legislation_in_case" value="' + result[index].material_number_legislation + '" id="material_number_legislation_in_case"  '+checked+'>' + result[index].material_number_legislation + '</td>';
                                        html += '<td><input type="hidden" name="system_id" value="' + result[index].book_id + '" id="system_id_id"></td>';

									


                                        html += '</tr>';

                                    }

                                    $('#case_law').html(html);
                                    $('#material_number_legislation_in_case').click(function () {



                                        if ($('#linked').prop("checked") == true) {

                                            var material_number_legislation_in_case = $('#material_number_legislation_in_case').val();

                                            $('#material_number_legislation_in_case_value').val(material_number_legislation_in_case);

                                            var system_id = $('#system_id_id').val();
                                            $('#system_id').val(system_id);


                                        }


                                    });





                                }




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
                }


         



        });




        var count = 0;

        $(document).on('click', '#add_row', function () {

            count++;
            $('#total_item').val(count);
            var txt5 = '';
            txt5 += '<div class="collection" id="row_id_' + count + '" >';

            txt5 += '<div class="col-md-6">';
            txt5 += '<label for="material_number" class="control-label"> رقم  المادة</label>';
            txt5 += '<div class="form-group">';
            txt5 += '<input type="text" name="material_number1[]" value="" class="form-control"   id="mat' + count + '" />';
            txt5 += '</div>';
            txt5 += '<button type="button" name="remove_row" id="' + count + '" class="btn btn-danger btn-s remove_row">X</button>';
            txt5 += '</div>';


            txt5 += ' <div class="col-md-6" >';
            txt5 += ' <label for="dis" class="control-label">  أدخل الوصف</label>';
            txt5 += '<div class="form-group">';
            txt5 += '<textarea  style="border:2px solid black" name="dis1[]"  id="dis' + count + '">  </textarea>';
            txt5 += '</div>';
            txt5 += '</div>';

            txt5 += '</div>';



            $('#hide').append(txt5);

            addTinyMCE();

        });




        var count_ver = 0;

        $(document).on('click', '#add_row_ver', function () {

            count_ver++;
            $('#total_item_ver').val(count_ver);
            var txt6 = '';

            txt6 += ' <div class="coll" id="row_id_ver' + count_ver + '"  >';
            txt6 += ' <div class="col-md-12">';


            txt6 += ' <label for="version" class="control-label">الإصدار</label>';
            txt6 += ' <div class="form-group">';
            txt6 += '<input type="text" name="version1[]" value="" class="form-control" id="version' + count_ver + '" />';
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
                    $('.uploadForm').empty();
                    $('.uploadForm + img').remove();
                    $('.uploadForm').after('<img src="' + e.target.result + '" width="120" height="150"/>');
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#mini").change(function () {

            filePreview(this);
        });






    });

</script>






<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<!--<script src="<= base_url() ?>assets/dist/js/moment.min.js"></script>-->
<script src="<?= base_url() ?>assets/convert_date/js/momentjs.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-with-locales.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-hijri.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>





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
            language: 'ar'



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

<!--<link href="<? base_url() ?>assets/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />-->






<?= $this->layout->block('') ?>