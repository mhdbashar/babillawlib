
<?= $this->layout->block('book_view') ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">البحث حسب القسم</h3>
                <span id="u"></span>
            </div>


            <form method="post" action="<?php echo base_url() ?>book/search_via_section" />
            <input type="hidden" name="sub_section" value="" id="sub_section" class="sub_section" />
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="section_id" class="control-label">إختر القـــســـــم</label>
                        <div class="form-group">



                            <div class="col-md-8" id="treeview_json">

                            </div>


                            <input type="submit" value="بحث">

                            <form>
                        </div> 
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
        $(document).ready(function () {



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
                        //$("#u").text(t);
                        //alert($("#sub_section").val());

                    });



                }
            });











          















        });

    </script>

    <?= $this->layout->block() ?>
