
<?= $this->layout->block('book_view') ?>

<style>

    .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #3c8dbc;
        cursor: pointer;
        font-size: 13px;
        color: white;
        margin-bottom: 25px;
    }

    /* Style the active class, and buttons on mouse-over */
    .active, .btn:hover {
        background-color: #3c8dbc;
        color: white;
    }
</style>


<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <span id="u"></span>
            </div>

            <div class="container">

                <center>
                    <div id="myDIV">

                        <button id="31" data-id="31" href="#" class="btn" >السوابق القضائية</button>
                        <button id="32" href="#" class="btn">الانظمة السعودية</button>
                        <button id="33" href="#" class="btn" >الكتب القانونية والأبحاث</button>
                        <button id="34" href="#" class="btn">نماذج وعقود</button>

                    </div>    
                </center>
            </div>
            <div id="treeview_json">

            </div>
            <!--<table class="table table-bordered table-striped table-condensed" id="mytable">
                <thead>
                    <tr>


                        <th>اسم الكتاب</th>
                        <th>تصفح الكتاب</th>

                    </tr>
                </thead>
                <tbody id="book_list">
             
                </tbody>

                <tfoot>
                    <tr>



                        <th>اسم الكتاب</th>
                        <th>تصفح الكتاب</th>


                    </tr>
                </tfoot>
            </table>
            <div id="book_list1">

            </div> -->


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

        var main_section_id;
        var t = '';
        var html = '';


        $('#myDIV button').click(function (e) {
            e.preventDefault();
            html = '';
            t = '';
            // $('#book_list').html('');
            main_section_id = $(this).attr('id');
            if (main_section_id == 31) {



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
                            for (j = 0; j < r.length; j++) {

                                if (r[j] === data.id) {



                                    t = data.id;

                                }

                            }

                            if (t !== '') {
                                $('.node-selected').empty();
                                load_book(t);

                                //   alert($('.node-selected').data('nodeid')); 

                                // $('.node-selected').text("hhhh");

                            }



                            // $("#sub_section").val(t);


                        });

                    }
                });


                function load_book(tt) {
                    $('.node-selected').html('');

                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url() ?>book/search_via_section/" + tt,
                        dataType: "json",
                        success: function (data)
                        {



                            var i;
                            // html +='<ul class="list-inline">';
                            for (i = 0; i < data.length; i++) {
                                //  alert(data[i].book_title);






                                html += '<li  style="color:black;font-size:12px;padding: 10px;"  class= "list-group-item ">' + data[i].book_title + '</li>';



                                html += '<li   class= " list-group-item  "><button target="_blank"  style="color:black;float:left;margin-top:-25px" type="submit" onclick=location.href="' + base_url + 'uploads/images/' + data[i].file + '"><span class="glyphicon">&#xe025;</span></button></li>';



                            }
                            // html +='</ul>';

                            $(html).appendTo(".node-selected").text();
                            html = '';

                            // $('.node-selected').html(html);

                            //$('#book_list').html(html);
                        }
                    });

                }
            } else if (main_section_id == 32) {

                $('#treeview_json').html('');

                var html1 = '';
                html1 += '<center>';
                html1 += '<div class="form-group" style="margin-top: 40px;margin-bottom: 30px;">';
                html1 += '<label  class="control-label">ادخل  النظام للبحث عنه</label>';
                html1 += '<input type="text" name="search">';
                html1 += '</center>';
                html1 += '</div>';
                $('#treeview_json').html(html1);


function search_book_system_sua(){
    
    
}

            }





        });
        /*     $('#mytable').DataTable({
         "paging": true,
         
         "ordering": true,
         "info": true,
         "autoWidth": false
         }); */
    });

</script>

<script>
// Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>


<?= $this->layout->block() ?>
