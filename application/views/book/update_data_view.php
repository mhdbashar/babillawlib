
<?= $this->layout->block('update_data_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-datepicker.css">


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
                <input type="hidden" name="sub_section" value="<?php echo $book['section_id']; ?>" id="sub_section" class="sub_section" required=""/>
                <div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <label for="section_id" class="control-label">إختر القـــســـــم</label>
                            <div class="form-group">
                                <select  name="section_name" value="" class="form-control" style="border-bottom: 2px #3c8dbc solid;" id="sel_section"   >



                                    <?php
                                    foreach ($get_main_section as $v) {

                                        if ($book['main_section'] == $v->section_id) {
                                            $select = "selected";
                                            $main_section = $v->section_name;
                                        } else {
                                            $select = "";
                                        }
                                        ?>


                                        <option <?php echo $select ?> value="<?php echo $v->section_name; ?>" ><?php echo $v->section_name; ?></option>


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


                        <div class="col-md-6">
                            <label for="dis" class="control-label">  أدخل الوصف</label>
                            <div class="form-group">
                                <textarea id="tin" style="border:2px solid black" name="dis" value="<?php echo $book['dis']; ?>">  <?php echo $book['dis']; ?></textarea>
                            </div>
                        </div>






                        <div class="col-md-6">
                            <label for="book_title" class="control-label">  عنوان الكتاب</label>
                            <div class="form-group">
                                <input type="text" name="book_title" value="<?php echo $book['book_title']; ?>" class="form-control" id="book_title" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="tag_name" class="control-label">ادخل وسم </label>
                            <div class="form-group">
                                <input type="text" name="tag_name" value="<?php echo $tag_name; ?>" class="form-control" id="tag"  />
                            </div>
                        </div>

                        <!--                        <div class="col-md-6">
                                                    <label for="book_name" class="control-label">تحميل الكتاب</label>
                                                    <div class="form-group">
                        
                                                        <input class="form-control" type="file" name="picture" required data-errormessage-value-missing="Please input something"  />
                                                    </div>
                                                     </div>-->

                        <div class="col-md-6">
                            <label for="book_name" class="control-label"> أدخل رابط</label>
                            <div class="form-group">

                                <input class="form-control" type="url" name="url" value="<?php echo $book['url']; ?>" required data-errormessage-value-missing="Please input something"  />
                            </div>
                        </div>

                    </div>






















                    <div id="fm">


                    </div>


                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-check"></i> حفظ
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">

<script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>

<link rel="stylesheet" href="<?= base_url() ?>assets/tinymce/skin.min.css">
<script>
    $(document).ready(function () {
        var section_name = "<?php echo $main_section; ?>";




  function date_publication_h() {


            $("#date_publication_h").hijriDatePicker({
                 hijri:true,
                showSwitcher: false
            });
        }

 function date_publication_m() {

            $("#date_publication_m").hijriDatePicker({
                  format: "DD-MM-YYYY",
                hijriFormat:"iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
            });
        }
        function history_system_h() {

            $("#history_system_h").hijriDatePicker({

                hijri: true,
                showSwitcher: false
            });
        }

      

       
        function history_system_m() {

            $("#history_system_m").hijriDatePicker({
                 format: "DD-MM-YYYY",
                hijriFormat:"iYYYY-iMM-iDD",
                dayViewHeaderFormat: "MMMM YYYY",
                hijriDayViewHeaderFormat: "iMMMM iYYYY",
            });
        }











        var treeData = '';


        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>section/getItem",
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

                $('#treeview_json').on('nodeSelected', function (event, data) {

                    for (j = 0; j < r.length; j++) {

                        if (r[j] === data.id) {
                            //  alert(data.id);
                            t = data.id;

                        }

                    }



                    // alert(t);
                    $("#sub_section").val(t);
                    //alert($("#sub_section").val());

                });



            }
        });



        $('#tag').tokenfield({

        });


        var txt1 = '';
        var txt2 = '';


        if (section_name === 'مجلدات الأحكام') {
            $("#fm").empty();


            txt1 += "<div class='col-md-6'>";
            txt1 += "<label for='year' class='control-label'>السنة</label>";
            txt1 += "<div class='form-group'>";
            txt1 += "<input type='text' name='year' value='<?php echo $book['year']; ?>' class='form-control' id='year' />";
            txt1 += "</div>";
            txt1 += "</div>";
            txt1 += "<div class='col-md-6'>";
            txt1 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
            txt1 += "<div class='form-group'>";
            txt1 += "<input type='text' name='volume_number' value='<?php echo $book['volume_number']; ?>' class='form-control' id='volume_number' />";
            txt1 += "</div>";
            txt1 += "</div>";
            txt1 += "<div class='col-md-6'>";
            txt1 += "<label for='subject' class='control-label'>الموضوع</label>";
            txt1 += "<div class='form-group'>";
            txt1 += "<input type='text' name='subject' value='<?php echo $book['subject']; ?>' class='form-control' id='subject' />";
            txt1 += "</div>";
            txt1 += "</div>";



            $("#fm").html(txt1);

        } else if (section_name === 'المدونات القضائية') {

            $("#fm").empty();



            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='year' class='control-label'>السنة</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='number' min='1900' max='2099' step='1' value='<?php echo $book['year']; ?>' name='year'  />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='volume_number' value='<?php echo $book['volume_number']; ?>' class='form-control' id='volume_number' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='subject' class='control-label'>الموضوع</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='subject' value='<?php echo $book['subject']; ?>' class='form-control' id='subject' />";
            txt2 += "</div>";
            txt2 += "</div>";

            $("#fm").html(txt2);


        } else if (section_name === 'الكتب القانونية والأبحاث') {

            $("#fm").empty();





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

            txt2 += "<input type='number' min='1900' max='2099' step='1' value='<?php echo $book['year_publication']; ?>'' name='year_publication'/>";
            txt2 += "</div>";
            txt2 += "</div>";













            $("#fm").html(txt2);


        } else if (section_name === 'الأنظمة السعودية') {

            $("#fm").empty();






            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='history_system_m' class='control-label'> تاريخ النظام الميلادي</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='history_system_m' value='<?php echo $book['history_system_m']; ?>' class='form-control' id='history_system_m' style='text-align:right' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='history_system' class='control-label'> تاريخ النظام الهجري</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='history_system_h' value='<?php echo $book['history_system_h']; ?>' class='form-control' id='history_system_h' style='text-align:right'/>";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='accreditation' class='control-label'>الاعتماد</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='accreditation' value='<?php echo $book['accreditation']; ?>' class='form-control' id='accreditation' />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<div class='col-md-6'>";
            txt2 += "<label for='date_publication_m' class='control-label'> تاريخ النشر الميلادي</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='date_publication_m' value='<?php echo $book['date_publication_m']; ?>' class='form-control' id='date_publication_m' style='width:50%'  />";
            txt2 += "</div>";
            txt2 += "</div>";
            txt2 += "<label for='date_publication' class='control-label' >تاريخ النشر بالهجري</label>";
            txt2 += "<div class='form-group'>";
            txt2 += "<input type='text' name='date_publication_h' value='<?php echo $book['date_publication_h']; ?>' class='form-control' id='date_publication_h'  style='text-align:right;width:50%'/>";
            txt2 += "</div>";
            txt2 += "</div>";


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
            
            
             date_publication_h();
              history_system_h();
                date_publication_m();
                
            history_system_m();
               
             
               
           


        } else if (section_name === 'نماذج وعقود') {

            $("#fm").empty();







        } else {

            $("#fm").empty();
        }





    });

</script>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/moment.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/bootstrap-hijri-datetimepickermin.js"></script>









<script>

    //tinymce.init({selector:'textarea'});
    tinymce.init({
        selector: 'textarea', // change this value according to your HTML
        language: 'ar'
        
    });


</script>


<link href="<?= base_url() ?>assets/dist/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />






<?= $this->layout->block('') ?>