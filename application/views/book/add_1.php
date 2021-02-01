
<?= $this->layout->block('book_add_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-datepicker.css">


<link rel="stylesheet" href="<?php echo base_url() ?>assets/treeview/css/bootstrap-treeview.min.css" />
<script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>assets/treeview/js/bootstrap-treeview.min.js"></script>

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
                <h3 class="box-title">إضافة كتاب</h3>
                <span id="u"></span>
            </div>


            <form method="post" action="<?php echo base_url() ?>book/add" enctype="multipart/form-data" id="format" >

            <input type="hidden" name="sub_section" value="" id="sub_section" class="sub_section" />

            <div class="box-body">
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


           







<!--                <php
                echo validation_errors();
                ?> -->
<!--                <input type="hidden" name="sub_section" value="" id="sub_section">-->
                <div class="row clearfix" id="hide">

                    <div class="col-md-6">
                        <label for="dis" class="control-label">  أدخل الوصف</label>
                        <div class="form-group">
                            <textarea style="border:2px solid black" name="dis">  </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="book_title" class="control-label">  عنوان الكتاب</label>
                        <div class="form-group">
                            <input type="text" name="book_title" value="" class="form-control" id="book_title" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="book_name" class="control-label" >الكلمات الدلالية  </label>
                        <div class="form-group">
                            <input type="text" name="tag_name" value="" class="form-control" id="tag"  />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="book_name" class="control-label">تحميل الكتاب</label>
                        <div class="form-group">

                            <input class="form-control" type="file" name="picture" id="picture"   />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="book_name" class="control-label"> أدخل رابط</label>
                        <div class="form-group">

                            <input class="form-control" type="url" name="url" />
                        </div>
                    </div>




                </div>



                <div id="fm">


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
        var change = 'no';
        var main_section_id = '';
        $("select.section").change(function () {

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

                            $("#picture").prop('required',true);
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



            var txt1 = '';
            var txt2 = '';


            if (section_name === 'مجلدات الأحكام') {


                $("#fm").empty();


                txt1 += "<div class='col-md-6'>";
                txt1 += "<label for='year' class='control-label'>السنة</label>";
                txt1 += "<div class='form-group'>";
                
                txt1 += "<input type='number' min='1900' max='2099' step='1' value='2016' name='year' class='form-control'  />";
                txt1 += "</div>";
                txt1 += "</div>";
                txt1 += "<div class='col-md-6'>";
                txt1 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
                txt1 += "<div class='form-group'>";
                txt1 += "<input type='text' name='volume_number' value='' class='form-control' id='volume_number' />";
                txt1 += "</div>";
                txt1 += "</div>";
                txt1 += "<div class='col-md-6'>";
                txt1 += "<label for='subject' class='control-label'>الموضوع</label>";
                txt1 += "<div class='form-group'>";
                txt1 += "<input type='text' name='subject' value='' class='form-control' id='subject' />";
                txt1 += "</div>";
                txt1 += "</div>";

                $("#fm").html(txt1);

            } else if (section_name === 'المدونات القضائية') {

                $("#fm").empty();

                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='year' class='control-label'>السنة</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='number' min='1900' max='2099' step='1' value='2016' name='year' class='form-control' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='volume_number' value='' class='form-control' id='volume_number' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='subject' class='control-label'>الموضوع</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='subject' value='' class='form-control' id='subject' />";
                txt2 += "</div>";
                txt2 += "</div>";
                $("#fm").html(txt2);


            } else if (section_name === 'الكتب القانونية والأبحاث') {

                $("#fm").empty();

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

                $("#fm").html(txt2);


            } else if (section_name === 'الأنظمة الرياضية') {

                $("#fm").empty();






                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='history_system_m' class='control-label'> تاريخ النظام الميلادي</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='history_system_m' value='' class='form-control' id='history_system_m' style='text-align:right'/>";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='history_system_h' class='control-label'> تاريخ النظام الهجري</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='history_system_h' value='' class='form-control' id='history_system_h' style='text-align:right'/>";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='accreditation' class='control-label'>الاعتماد</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='accreditation' value='' class='form-control' id='accreditation' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication_m' class='control-label'> تاريخ النشر الميلادي</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='date_publication_m' value='' class='form-control' id='date_publication_m'  />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<label for='date_publication' class='control-label' >تاريخ النشر بالهجري</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='date_publication_h' value='' class='form-control' id='date_publication_h' style='text-align:right;width:50%'  />";
                txt2 += "</div>";
                txt2 += "</div>";


                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='pass' class='control-label'>النفاذ</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<select  name='pass' value='' class='form-control' id='pass'>";

                txt2 += "<option value='valid'>ساري</option>";
                txt2 += "<option value='notvalid'>غير ساري</option>";
                txt2 += "</select>";
                txt2 += "</div>";
                txt2 += "</div>";
                $("#fm").html(txt2);
                history_system_m();
                history_system_h();
                date_publication_m();
                date_publication_h();


            } else if (section_name === 'نماذج وعقود') {

                $("#fm").empty();




            } else {

                $("#fm").empty();
            }



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
<script src="<?= base_url() ?>assets/dist/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/bootstrap-hijri-datetimepickermin.js"></script>

<script type="text/javascript">


//    $(function () {
//
//        history_system_h();
//
//    });

    function history_system_h() {

        $("#history_system_h").hijriDatePicker({

            hijri: true,
            showSwitcher: false
        });
    }

</script>

<script type="text/javascript">


//    $(function () {
//
//        
//
//    });

    function history_system_m() {

        $("#history_system_m").hijriDatePicker({
            // hijri:true,
            showSwitcher: false
        });
    }

</script>


<script type="text/javascript">


//    $(function () {
//
//        date_publication_m();
//
//    });

    function date_publication_m() {

        $("#date_publication_m").hijriDatePicker({
            // hijri: true,
            showSwitcher: false
        });
    }

</script>

<script type="text/javascript">


//    $(function () {
//
//        date_publication_h();
//
//    });

    function date_publication_h() {


        $("#date_publication_h").hijriDatePicker({
            hijri: true,
            showSwitcher: false
        });
    }

</script>

<script>

    //tinymce.init({selector:'textarea'});
    tinymce.init({
        selector: 'textarea', // change this value according to your HTML
        language: 'ar'
    });


</script>


<link href="<?= base_url() ?>assets/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />




<?= $this->layout->block('') ?>