
<?= $this->layout->block('searches_law_books') ?>

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
                            success: function (response) {

                                //  alert(response.pagination);

                                $('#pagination_in_section').html(response.pagination);

                                createTable(response.result, response.row);


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

                            sno += 1;
                            output += '<li class="item col-lg-2 col-md-4 col-sm-6 col-xs-6 "></a>';
                            output += '<a target="_blank" href="' + base_url + 'uploads/images/' + file + '"><img src="' + base_url + 'uploads/images/' + mini + '" width="120" height="150"  >';

                            output += book_title;

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






//            function load_book(tt) {
//
//
//                $.ajax({
//                    type: "GET",
//                    url: "<php echo base_url() ?>book/search_via_section/" + tt,
//                    dataType: "json",
//                    success: function (data)
//                    {
//
//
//
//                        var i;
//                        //html += '<tr>';
//                        for (i = 0; i < data.length; i++) {
//                            // alert(data[i].book_title);
//
//
//                            html += ' <p class="card-text"><img src="' + base_url + 'uploads/images/' + data[i].mini + '" width="150" height="100"><br>' + data[i].book_title + '</p>';
//                            // html += '</tr>';
//
//                        }
//
//                        $('.book_grid').html(html);
//                    }
//                });
//
//            }





    });

</script>




<?= $this->layout->block() ?>
