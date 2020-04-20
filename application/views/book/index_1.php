
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
   
            main_section_id = $(this).attr('id');
       





        });

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
