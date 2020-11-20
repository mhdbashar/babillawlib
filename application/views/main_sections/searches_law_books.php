
<?= $this->layout->block('searches_law_books') ?>
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
            <th>عنوان الكتاب</th>
            <th>الرابط</th>
            <th>الوصف</th>
        




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
   <div id="myDIV" style="margin-top: -80px">


        <a   href="<?php echo base_url() ?>section/case_law?section_id=31" class="btnh" >السوابق القضائية</a>
        <a href="<?php echo base_url() ?>section/saudi_regulations?section_id=32" class="btnh">الانظمة السعودية</a>
        <a href="<?php echo base_url() ?>section/models_and_contracts?section_id=33" class="btnh">نماذج وعقود</a>
        <a  href="<?php echo base_url() ?>section/searches_law_books?section_id=34"class="btnh" >الكتب القانونية والأبحاث</a>


    </div>    
</center>
<style>

    div #pagination_in_section a:focus{
        background-color: #46b8da;
    }
</style>


<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <div id="treeview_json"></div>

                <div class="product-grid-area">
                    <ul class="products-grid" style="list-style-type: none;">

                        <div id='loader' style='display: none;'>
                            <img src='<?php echo base_url() ?>assets/dist/img/reload.gif' width='50px' height='50px'>
                        </div>

                        <div id="books_in_section">


                        </div>

                    </ul>
                </div>
                <div class="pagination-area" id="pagination_in_section">

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
        var section_id = '';
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
                        $('#books_in_section').empty();
                        var output = '';
                        for (index in result) {



                            var book_title = result[index].book_title;
                            var file = result[index].file;
                            var mini = result[index].mini;
                            var url = result[index].url;





                            sno += 1;
                            output += '<li class="item col-lg-2 col-md-4 col-sm-6 col-xs-6 "></a>';
                            if (file !== null) {
                                output += '<a target="_blank" href="' + base_url + 'uploads/images/' + file + '"><img src="' + base_url + 'uploads/images/' + mini + '" width="120" height="150"  >';
                            } else {
                                output += '<a target="_blank" href="' + url + '"><img src="' + base_url + 'uploads/images/' + mini + '" width="120" height="150"  >';
                            }



                            output += '<div>' + book_title + '</div>';
                            output += '</li>';
                        }
                        $('#books_in_section').append(output);
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




        $('#search_button').click(function () {
        var query = $('#field_search').val();
          var section_id=34;
           
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
