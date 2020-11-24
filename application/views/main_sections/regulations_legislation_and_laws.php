
<?= $this->layout->block('regulations_legislation_and_laws') ?>
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
 
    .r{
       background-color: red;
   
    color: yellow;
    width: 50px;
    padding: 2px;
    margin: 51px;
    padding-right: 10px;
    padding-left: 13px;
    }

</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">




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









                            <input  id="search_button" type="button" class="btn btn-primary" value="بحث">

                        </form>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>التسلسل</th>
                                    <th>عنوان الكتاب</th>
                                    <th>الرابط</th>
                                    <th>الوصف</th>
                                    <th>البلد</th>
                                    <th>سنة الحكم</th>
                                    <th>رقم المجلد</th>
                                    <th>تصنيف الحكم</th>
                                    <th>ملخص الحكم</th>
                                    <th>نص الحكم</th>
                                    <th> </th>
                                    <th>السند النظامي</th>
                                    <th> الاسباب</th>
                                    <th> الحكم</th>




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
        <a  href="<?php echo base_url() ?>section/regulations_legislation?section_id=35"class="btnh" >  الأنظمة والتشريعات والقوانين</a>


    </div>    
</center>
 <div id="treeview_json"></div>
<div id="wrapper">
    <div class="content">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div>
                    
<!--                    <div class="panel-body" style="background-color: white; margin-top: -4px;">
                        <h5 class="w3-bar-item">انواع التشريعات حسب البلد</h5>
                        <ol class="check-box-list">
                            <php
                            foreach ($legislation as $value) {
                                ?>

                            <li class="c" style=" margin-bottom: 28px;"><a href="#" ><php
                                       
                                        echo $value['country_name'];
                                        echo '<span class="r">';
                                        echo $value['allcount'];
                                        ?></span></a>
                                </li>


                                <php
                            }
                            ?>
                        </ol>
                    </div>-->


<div class="panel-body" style="background-color: white; margin-top: -4px;" id="legislation">
<!--                        <h5 class="w3-bar-item">انواع التشريعات حسب البلد</h5>-->
<!--                        <ol class="check-box-list">
                          

                            <li class="c" style=" margin-bottom: 28px;">
                        
                                
                                
                                </li>


                          
                        </ol>-->
                    </div>
                </div>
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

                $('#treeview_json').treeview({data: response});

                $('#treeview_json').on('nodeSelected', function (event, data) {

                    t = 0;
                    for (j = 0; j < r.length; j++) {

                        if (r[j] === data.id) {



                            t = data.id;

                        }

                    }


                    if (t !== 0) {
                   
                        load_book(t);


                    }



   

                });

            }
        });


        function load_book(tt) {
            $('.node-selected').html('');

            $.ajax({
                type: "POST",
                url: "<?php echo base_url() ?>section/regulations_legislation_and_laws/",
                data:{section_id:tt},
                dataType: "json",
                beforeSend: function () {

                    $("#loader").show();
                },
                success: function (data)
                {
                      $('#legislation').html(data);

                
                },
                complete: function (data) {
                    // Hide image container
                    $("#loader").hide();
                },
            });

        }




        $('#search_button').click(function () {
            var query = $('#field_search').val();
            if (query == '') {
                alert('أدخل كلمة للبحث عنها');
                return false;
            }
            var section_id = 31;

            $.ajax({
                url: "<?php echo base_url(); ?>Search_section/inline_search",
                method: "POST",
                data: {query: query, section_id: section_id},
                success: function (response)
                {
                    $('#search_result').html(response);


                }
            });




        });




    });

</script>




<?= $this->layout->block() ?>
