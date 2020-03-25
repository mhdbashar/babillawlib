
<?= $this->layout->block('update_data_view') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-datepicker.css">




<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">تحرير الكتاب</h3>
            </div>


           <?php echo form_open('book/update/'.$book['book_id']); ?>

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
                                        $main_section=$v->section_name;
                                    } else {
                                        $select = "";
                                    }
                                    ?>


                                <option <?php echo $select ?> value="<?php echo $v->section_name; ?>"><?php echo $v->section_name; ?></option>


                                    <?php
                                }
                                ?>




                            </select>
                        </div>
                    </div>



                </div>
                <label for="section_id" class="control-label">إختر القـــسســم الفرعي </label>
                <select  name="section_sub_name" value="" class="form-control" style="border-bottom: 2px #3c8dbc solid;" id="sel_section"  >



                    <?php
                    foreach ($get_sub_section as $value) {
                        
                         if ($book['section_id'] == $value->section_id) {
                                        $select = "selected";
                                    } else {
                                        $select = "";
                                    }
                                    ?>
                        
                        ?>
                        <option <?php echo $select ?> value="<?php echo $value->section_name; ?>"><?php echo $value->section_name; ?></option>


                        <?php
                    }
                    ?>




                </select>
                <div class="row clearfix" id="hide">
                    <div class="col-md-6">
                        <label for="book_name" class="control-label">  اسم الكتاب</label>
                        <div class="form-group">
                            <input type="text" name="book_name" value="<?php echo $book['book_name']; ?>" class="form-control" id="book_name" />
                        </div>
                    </div> <div class="col-md-6">
                        <label for="author" class="control-label">المؤلف</label>
                        <div class="form-group">
                            <input type="text" name="author" value="<?php echo $book['author']; ?>" class="form-control" id="author" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="year_publication" class="control-label"> سنة النشر</label>
                        <div class="form-group">
                            <input type="text" name="year_publication" value="<?php echo $book['year_publication']; ?>" class="form-control" id="year_publication" />
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
                    </div>                   <div class="col-md-6">
<!--                     <div class="form-group">
                            <label>Picture</label>
                            <input class="form-control" type="file" name="picture" />
                                            
                        </div>-->
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
<script>
    $(document).ready(function () {
var section_name="<?php   echo $main_section;?>";

//        var txt4 = '';
//
//        txt4 += "<div class=}'col-md-6'>";
//        txt4 += "<label for='year' class='control-label'>السنة</label>";
//        txt4 += "<div class='form-group'>";
//        txt4 += "<input type='text' name='year' value='<php echo $book['year']; ?>' class='form-control' id='year' />";
//        txt4 += "</div>";
//        txt4 += "</div>";
//        txt4 += "<div class='col-md-6'>";
//        txt4 += "<label for='volume_number' class='control-label'>رقم المجلد</label>";
//        txt4 += "<div class='form-group'>";
//        txt4 += "<input type='text' name='volume_number' value='<php echo $book['volume_number']; ?>' class='form-control' id='volume_number' />";
//        txt4 += "</div>";
//        txt4 += "</div>";
//        txt4 += "<div class='col-md-6'>";
//        txt4 += "<label for='subject' class='control-label'>الموضوع</label>";
//        txt4 += "<div class='form-group'>";
//        txt4 += "<input type='text' name='subject' value='<php echo $book['subject']; ?>' class='form-control' id='subject' />";
//        txt4 += "</div>";
//        txt4 += "</div>";
//        $("#fm").html(txt4);




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
                txt2 += "<input type='text' name='year' value='<?php echo $book['year']; ?>' class='form-control' id='year' />";
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
                txt2 += "<label for='jurisdiction' class='control-label'>الاختصاص</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='jurisdiction' value='<?php echo $book['jurisdiction']; ?>' class='form-control' id='jurisdiction' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='publisher' class='control-label'>الناشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='publisher' value='<?php echo $book['publisher']; ?>' class='form-control' id='publisher' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication' class='control-label'>تاريخ النشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='date' name='date_publication' value='<?php echo $book['date_publication']; ?>' class='form-control' id='date_publication' />";
                txt2 += "</div>";
                txt2 += "</div>";

                $("#fm").html(txt2);


            } else if (section_name === 'الأنظمة السعودية') {

                $("#fm").empty();

                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='year' class='control-label'>السنة</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='year' value='<?php echo $book['year']; ?>' class='form-control' id='year' />";
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
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='the_main_domain' class='control-label'>المجال الرئيسي</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='the_main_domain' value='<?php echo $book['the_main_domain']; ?>' class='form-control' id='the_main_domain' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='subdomain' class='control-label'>المجال الفرعي</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='subdomain' value='<?php echo $book['subdomain']; ?>' class='form-control' id='subdomain' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='history_system' class='control-label'>تاريخ النظام</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='date' name='history_system' value='<?php echo $book['history_system']; ?>' class='form-control' id='history_system' style='text-align:right'/>";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='accreditation' class='control-label'>الاعتماد</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='accreditation' value='<?php echo $book['accreditation']; ?>' class='form-control' id='accreditation' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication' class='control-label'>تاريخ النشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='date' name='date_publication' value='<?php echo $book['date_publication']; ?>' class='form-control' id='date_publication' style='text-align:right'; />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='adjustments' class='control-label'>التعديلات</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='adjustments' value='<?php echo $book['adjustments']; ?>' class='form-control' id='adjustments' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='accessories' class='control-label'>الملحقات</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='accessories' value='<?php echo $book['accessories']; ?>' class='form-control' id='accessories' />";
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


            } else if (section_name === 'نماذج وعقود') {

                $("#fm").empty();
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='jurisdiction' class='control-label'>الاختصاص</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='jurisdiction' value='<?php echo $book['jurisdiction']; ?>' class='form-control' id='jurisdiction' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication' class='control-label'>تاريخ النشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='date_publication' value='<?php echo $book['date_publication']; ?>' class='form-control' id='date_publication' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='date_publication' class='control-label'>تاريخ النشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='date' name='date_publication' value='<?php echo $book['date_publication']; ?>' class='form-control' id='date_publication' />";
                txt2 += "</div>";
                txt2 += "</div>";
                txt2 += "<div class='col-md-6'>";
                txt2 += "<label for='publisher' class='control-label'>الناشر</label>";
                txt2 += "<div class='form-group'>";
                txt2 += "<input type='text' name='publisher' value='<?php echo $book['publisher']; ?>' class='form-control' id='publisher' />";
                txt2 += "</div>";
                txt2 += "</div>";

                $("#fm").html(txt2);




            } else {

                $("#fm").empty();
            }



      

    });

</script>

<!--<script type="text/javascript">
  $('#tokenfield').tokenfield({
    autocomplete: {
      source: function (request, response) {
          jQuery.get("ajaxpro.php", {
              query: request.term
          }, function (data) {
              data = $.parseJSON(data);
              response(data);
          });
      },
      delay: 100
    },
    showAutocompleteOnFocus: true
  });


</script>-->
<?= $this->layout->block('') ?>