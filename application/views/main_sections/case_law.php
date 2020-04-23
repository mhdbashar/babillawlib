
<?= $this->layout->block('case_law') ?>
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

      <center>
                    <div id="myDIV">

                     
                                    <a   href="<?php echo base_url() ?>section/case_law?section_id=31" class="btnh" >السوابق القضائية</a>
                        <a href="<?php echo base_url() ?>section/saudi_regulations?section_id=32" class="btnh">الانظمة السعودية</a>
                            <a href="<?php echo base_url() ?>section/models_and_contracts?section_id=33" class="btnh">نماذج وعقود</a>
                        <a  href="<?php echo base_url() ?>section/searches_law_books?section_id=34"class="btnh" >الكتب القانونية والأبحاث</a>
                    

                    </div>    
                </center>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <div id="treeview_json"></div>
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
                        $('.node-selected').empty();
                        load_book(t);

                        //   alert($('.node-selected').data('nodeid')); 

                        // $('.node-selected').text("hhhh");

                    }



                    // $("#sub_section").val(t);
               

//$(html).appendTo("<li>").text();

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



                        html += '<li   class= " list-group-item  "><button target="_blank"  style="color:black;float:left;margin-top:-25px"  onclick=javascript:window.open("' + base_url + 'uploads/images/' + data[i].file + '")><span class="glyphicon">&#xe025;</span></button></li>';



                    }
                    // html +='</ul>';

                    $(html).appendTo(".node-selected").text();
                    html = '';

                    // $('.node-selected').html(html);

                    //$('#book_list').html(html);
                }
            });

        }








    });

</script>




<?= $this->layout->block() ?>
