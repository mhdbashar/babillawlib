
<?= $this->layout->block('saudi_regulations') ?>
<style>

    .btnh {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #3c8dbc;
        cursor: pointer;
        font-size: 13px;
        color: white;
        margin-bottom: 25px;
    }
    .btnh:hover {
        background-color: deepskyblue;
        color: white;
    }
    td{
       padding: 10px; 
        
    }
   

</style>




<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div>
                    <div class="panel-body" style="background-color: white;">
          
                        <form>
                     


                            <div class="col-md-12" id="title">
                                <label for="field_label" class="control-label">   أدخل ماتريد البحث عنه هنا  </label>
                                <div class="form-group">
                                    <input type="text" name="query" value="" class="form-control" id="field_search" required="true" />
                                </div>
                            </div>




                  




                            <input id="search_button" type="button" class="btn btn-primary" value="بحث">

                        </form>
<table class="table table-bordered table-sm" >
    <thead>
        <tr>
            <th>التسلسل</th>
               <th> الرابط </th>
              <th> النفاذ </th>
             <th>الوصف</th>
          
           
            <th>تاريخ النظام</th>
               
                   <th>تاريخ النشر</th>
                  <th>الاعتماد</th>
 




        </tr>
    </thead>
    <tbody id="search_result">

    </tbody>
</table>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>






<center>
   <div id="myDIV">


        <a   href="<?php echo base_url() ?>section/case_law?section_id=31" class="btnh" >السوابق القضائية</a>
        <a href="<?php echo base_url() ?>section/saudi_regulations?section_id=32" class="btnh">الانظمة السعودية</a>
        <a href="<?php echo base_url() ?>section/models_and_contracts?section_id=33" class="btnh">نماذج وعقود</a>
        <a  href="<?php echo base_url() ?>section/searches_law_books?section_id=34"class="btnh" >الكتب القانونية والأبحاث</a>


    </div>    
</center>

<style>

    tr {
        border-bottom: 1px dashed #ddd;
    }
    .h{
      font-weight: bold;  
        
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <div>
                 <div class="col-md-4" id="treeview_json"></div>
                    <form method="post" action="<?php echo base_url() ?>book/book_search_via_section">

                        <center>

   

<!--                            <select  id="select_system" name="section_id" class="form-control  system" style="border-bottom: 2px #3c8dbc solid;width:50%;height: 42px;">;
                                <option value="">اختر النظام</option>
                                <php
                                foreach ($result1 as $value) {
                                    ?>
                                    <option value="<php echo $value->section_id ?>"><php echo $value->section_name ?></option>

                                    <php
                                }
                                ?>
                            </select>  -->

                            <input type="hidden" name="section_id" id="section_id" value="">

                            <div class="box-footer" style="text-align: right;">
                                <button type="submit" class="btn btn-success save">
                                    <i class="fa fa-check"></i> بحث
                                </button>
                            </div>
                        </center>
                    </form>
                </div>
                <center>

                    <table style="border: 6px solid #eaeaea;text-align: right;width: 56.06%; height: 204px;">








                        <?php
                        if (isset($result) && !empty($result)) {
                            echo '<tr>';
                            echo '<td class="h">';
                            echo "الاعتماد:";
                            echo '</td>';
                            echo '<td>';
                            echo $result->accreditation;
                            echo '</td>';

                            echo '</tr>';





                            echo '<tr>';
                            echo '<td class="h">';
                            echo "تاريخ النشر :";
                            echo '</td>';
                            echo '<td>';
                            echo $result->date_publication_m;
                            echo '</td>';
                            echo '</tr>';







                            echo '<td class="h">';
                            echo "تاريخ النظام :";
                            echo '</td>';
                            echo '<td>';
                            echo $result->history_system_m;
                            echo '</td>';
                            echo '</tr>';




            
                      
                          
                            
                              if (isset($result3) && !empty($result3)) {
                            $c=0;
                                 foreach ($result3 as $value) {
                                     $c++;
                                         echo '<tr>';
                                      echo '<td class="h">';
                            echo "الإصدار";
                            echo '&nbsp'; 
                            echo $c;
                            echo ':';
                            echo '</td>';
                                 
                                       echo '<td>';
                                     echo $value->version;
                            echo '</td>';
echo '</tr>';
                     
                                  
                                 }
                                 }
                                   
                            






                            echo '<tr>';
                            echo '<td class="h">';
                            echo "النفاذ:";
                            echo '</td>';
                            echo '<td>';
                            echo $result->pass;
                            echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="h">';
                            echo "الرابط:";
                            echo '</td>';
                            echo '<td>';
                            echo $result->url;
                            echo '</td>';
                            echo '</tr>';
                            ?>



                            <?php
                        }
                        ?>

                    </table>
                </center>
                <br><br><br><br>
                <center>



                    <table>



                        <?php
                        if (isset($result2) && !empty($result2)) {



                            foreach ($result2 as $value) {



                                echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';



                                echo 'رقم المادة :';
                                echo $value->material_number;
                                echo '<br>';
                                echo '</div>';
                                echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';
                               
                                echo '</div>';




                                echo htmlspecialchars_decode(stripslashes($value->description));
                                echo '<br>';
                                ?>



                                <?php
                            }
                        }
                        ?>

                    </table>
                </center>






            </div>


        </div>



    </div> 
</div> 


<script src="<?= base_url() ?>assets/dist/js/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">




<script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>



<script>
    var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function () {


        var getUrlParameter = function getUrlParameter(sParam) {

            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;


            for (i = 0; i < sURLVariables.length; i++) {

                sParameterName = sURLVariables[i].split('=');


                if (sParameterName[0] === sParam) {

                    return sParameterName[1] === undefined ? true : sParameterName[1];

                }
            }
        };


        var main_section_id = getUrlParameter('section_id');

        //alert(main_section_id);



        var t = '';
        var html = '';






        $.ajax({
            type: "GET",
            url: "<?php echo base_url() ?>section/getItem/" + 32,
            dataType: "json",
            success: function (response)
            {

                var i = 0;
                var j = 0;
                var r = [];


                for (i = 0; i < response.result.length; i++) {


                    r[i] = response.result[i].section_id;

                }

                $('#treeview_json').treeview({data: response});

                $('#treeview_json').on('nodeSelected', function (event, data) {

                    t = 0;
                    for (j = 0; j < r.length; j++) {

                        if (r[j] === data.id) {



                            t = data.id;

                        }

                    }


                    if (t !== 0) {



                        $("#section_id").val(t);
                 
                  
                


                    }








                });

            }
        });



        $('#search_button').click(function () {
            
        var query = $('#field_search').val();
          var section_id=32;
           
            $.ajax({

                url: "<?php echo base_url(); ?>Search_section/inline_search",
                method: "POST",
                data: {query: query, section_id: section_id},
                success: function (response)
                {
               
                 //alert(response);
                    $('#search_result').html(response);


                },
                        error: function (jqXHR, textStatus, errorThrown) {
                        alert("error");
                    }
                
            });




        });




    });

</script>





<?= $this->layout->block() ?>
