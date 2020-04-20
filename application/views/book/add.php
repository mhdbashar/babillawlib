
<?= $this->layout->block('book_add_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/convert_date/css/bootstrap-datetimepicker.css">


<link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>

<!--<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/calendar-system.css">-->





<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">

<script src="<?= base_url() ?>assets/tinymce/modern/theme.js" referrerpolicy="origin"></script>
<script src="<?= base_url() ?>assets/tinymce/modern/theme.min.js" referrerpolicy="origin"></script>


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


            <form method="post" action="<?php echo base_url() ?>book/add" enctype="multipart/form-data" id="format"  >

                <input type="hidden" name="sub_section" value="" id="sub_section" class="sub_section" />
                <input type="hidden" name="total_item" id="total_item" value="1" />
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
                        <div class="col-md-6" id="pdf_div">
                            <label for='pdf' class='control-label'>   عرض ك ملف الكتروني</label>
                            <div class='form-group'>
                                <input type="checkbox" name="pdf">
                            </div>
                        </div>

                        <div id="fm">


                        </div>
                        <div id="new_row">

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











                    </div>

                    <div class="col-md-6" >
                        <div class="form-group">
                            <div align="right">
                                <button type="button" name="add_row" id="add_row" class="btn btn-success btn-s">+</button>
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

        $(".mini").hide();

        $("#pdf_div").hide();


        addTinyMCE();
        var change = 'no';
        var main_section_id = '';
        $("#mat").hide();
        $("#add_row").hide();

        $("select.section").change(function () {
            addTinyMCE();
            $("#title").show();
            $("#mat").hide();

            $("#add_row").hide();
            $(".collection").hide();

            $(".uploadForm").html('');

  $(".mini").hide();
          

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
                    var t = '';
                    var k = '';
                    for (i = 0; i < response.result.length; i++) {


                        r[i] = response.result[i].section_id;

                    }


                    $('#treeview_json').treeview({data: response});

                    $('#treeview_json').on('nodeSelected', function (event, data) {

                        t = '';
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

                        if (t === '') {
                            alert("اخترالقسم");
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


            if (section_name === 'السوابق القضائية') {

                $("#fm").empty();

               
                $("#title").show();

//                txt2 += "<div class='col-md-6'>";
//                txt2 += "<label for='year' class='control-label'>السنة</label>";
//                txt2 += "<div class='form-group'>";
//                txt2 += "<input type='number' min='1900' max='2099' step='1' value='2016' name='year' class='form-control' />";
//                txt2 += "</div>";
//                txt2 += "</div>";
//                txt2 += "<div class='col-md-6'>";
//                txt2 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
//                txt2 += "<div class='form-group'>";
//                txt2 += "<input type='text' name='volume_number' value='' class='form-control' id='volume_number' />";
//                txt2 += "</div>";
//                txt2 += "</div>";
//                txt2 += "<div class='col-md-6'>";
//                txt2 += "<label for='subject' class='control-label'>الموضوع</label>";
//                txt2 += "<div class='form-group'>";
//                txt2 += "<input type='text' name='subject' value='' class='form-control' id='subject' />";
//                txt2 += "</div>";
//                txt2 += "</div>";
//                $("#fm").html(txt2);


            } else if (section_name === 'الكتب القانونية والأبحاث') {

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


            } else if (section_name === 'الأنظمة السعودية') {
                $("#mat").show();
                $("#fm").empty();
               
                $("#title").hide();
//                $("#mor_textarea").empty();
//                $("#mor_textarea").show();
                $("#add_row").show();


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
                txt2 += "<label for='date_publication' class='control-label' >  </label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='' value='' class='form-control ' id='' style='text-align:right;  />";
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

              
                $("#pdf_div").hide();



            } else {

                $("#fm").empty();
            }

        });
        var count = 1;

        $(document).on('click', '#add_row', function () {

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


            txt5 += ' <div class="col-md-6" >';
            txt5 += ' <label for="dis" class="control-label">  أدخل الوصف</label>';
            txt5 += '<div class="form-group">';
            txt5 += '<textarea  style="border:2px solid black" name="dis[]"  id="dis' + count + '">  </textarea>';
            txt5 += '</div>';
            txt5 += '</div>';

            txt5 += '</div>';



            $('#hide').append(txt5);

            addTinyMCE();

        });




        $(document).on('click', '.remove_row', function () {

            var row_id = $(this).attr("id");

            $('#row_id_' + row_id).remove();
            count--;
            $('#total_item').val(count);
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



        $(".save").click(function () {

            if (change === 'no') {
                alert("اختر القسم في البداية");
                $("#format").trigger("reset");
                window.location.reload();
            } else {


                return true;
            }


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

<script type="text/javascript">


//    $(function () {
//
//        history_system_h();
//
//    });

//    function history_system_h() {
//
//        $("#history_system_h").hijriDatePicker({
//
//            hijri: true,
//            showSwitcher: false
//        });
//    }

</script>

<script type="text/javascript">


//    $(function () {
//
//        
//
//    });

//    function history_system_m() {
//
//        $("#history_system_m").hijriDatePicker({
//            // hijri:true,
//            showSwitcher: false
//        });
//    }

</script>


<script type="text/javascript">


//    $(function () {
//
//        date_publication_m();
//
//    });

//    function date_publication_m() {
//
//        $("#date_publication_m").hijriDatePicker({
//            // hijri: true,
//            showSwitcher: false
//        });
//    }

</script>

<script type="text/javascript">


//    $(function () {
//
//        date_publication_h();
//
//    });

//    function date_publication_h() {
//
//
//        $("#date_publication_h").hijriDatePicker({
//            hijri: true,
//            showSwitcher: false
//        });
//    }

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
<!--<link href="<= base_url() ?>assets/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />-->




<?= $this->layout->block('') ?>