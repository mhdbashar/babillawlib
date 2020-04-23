
<?= $this->layout->block('update_data_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/convert_date/css/bootstrap-datetimepicker.css">


<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/calendar-system.css">

<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">

<script src="<?= base_url() ?>assets/tinymce/modern/theme.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/tinymce/modern/theme.min.js" referrerpolicy="origin"></script>


<script src="<?= base_url() ?>assets/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/tinymce/ar.js" referrerpolicy="origin"></script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">تحرير الكتاب</h3>
            </div>



            <form method="post" action="<?php echo base_url('book/update/' . $book['book_id']) ?>">
                <input type="hidden" name="sub_section" value="<?php echo $book['section_id']; ?>" id="sub_section" class="sub_section" />
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
                                <input type="text" name="section_name" value="<?php echo $main_section; ?>" class="form-control" id="book_title" readonly="" />
                                
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
                                <input type="text" name="tag_name" value="<?php echo $tag_name; ?>" class="form-control" id="tag"  />
                            </div>
                        </div>

                       

                        <div class="col-md-6">
                            <label for="book_name" class="control-label"> أدخل رابط</label>
                            <div class="form-group">

                                <input class="form-control" type="url" name="url" value="<?php echo $book['url']; ?>"  />
                            </div>
                        </div>
                        
                           <div class="col-md-6">
                            <label for="interview" class="control-label"> المقدمة</label>
                            <div class="form-group">

                                <input class="form-control" type="text" name="interview" value="<?php echo $book['interview']; ?>"  />
                            </div>
                        </div>
   <div id="fm">


                    </div>
                        
                        
                        
                        <?php
                        
                        
                         $m = 0;
                    foreach($book_material as $b)
                    {
                      $m = $m + 1;
                    ?> 
                     <div class="col-md-6">
                            <label for="dis" class="control-label">  أدخل الوصف</label>
                            <div class="form-group">
                                <textarea id="tin" style="border:2px solid black" name="dis[]" value="<?php echo $b['description']; ?>">  <?php echo $b['description']; ?></textarea>
                            </div>
                        </div>
                         <div class="col-md-6" id="mat">
                            <label for='material_number' class='control-label'> رقم  المادة</label>
                            <div class='form-group'>
                                <input type='text' name='material_number[]' value="<?php echo $b['material_number']; ?>" class='form-control' id='mat1' />
                                 <input type="hidden" name="material_id[]" value="<?php echo $b['material_id']; ?>">
                            </div>
                        </div>
                       
                    <?php
                    }
                    ?>
                         <input type="hidden" name="mmm" value="<?php echo $m; ?>">
                  
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
        var section_name = "<?php echo $main_section; ?>";
        var section_id = "<?php echo $section_id; ?>";
 addTinyMCE();


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


 if (section_name === 'السوابق القضائية') {

            $("#fm").empty();

$("#mat").hide();

          

            $("#fm").html(txt2);


        } else if (section_name === 'الكتب القانونية والأبحاث') {

            $("#fm").empty();

$("#mat").hide();



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
//              txt2 += "<div class='col-md-6'>";
//            txt2 += "<label for='date_publication' class='control-label' >تاريخ النشر بالهجري</label>";
//            txt2 += "<div class='form-group'>";
//            txt2 += "<input type='text' name='date_publication_h' value='<php echo $book['date_publication_h']; ?>' class='form-control' id='date_publication_h' />";
//            txt2 += "</div>";
//            txt2 += "</div>";


            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='pass' class='control-label'>النفاذ</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<select  name='pass' value='<?php echo $book['pass']; ?>' class='form-control' id='pass'>";

            txt2 += "<option value='valid'>ساري</option>";
            txt2 += "<option value='notvalid'>غير ساري</option>";
            txt2 += "</select>";
            txt2 += "</div>";
            txt2 += "</div>";
            $("#fm").html(txt2);


             initHijrDatePickerDefault();





        } else if (section_name === 'نماذج وعقود') {

            $("#fm").empty();


$("#mat").hide();




        } else {

            $("#fm").empty();
        }





    });

</script>






<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<!--<script src="<= base_url() ?>assets/dist/js/moment.min.js"></script>-->
<script src="<?= base_url() ?>assets/convert_date/js/momentjs.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-with-locales.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/moment-hijri.js"></script>
<script src="<?= base_url() ?>assets/convert_date/js/bootstrap-hijri-datetimepicker.js"></script>








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