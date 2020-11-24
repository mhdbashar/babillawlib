
<?= $this->layout->block('index_search') ?>




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> نتيجة البحث</h3>

            </div>
            <div class="box-body">

                

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th> رابط الكتاب</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $value) { ?>
                                <tr>
                                    <td><?php echo $value['book_id']; ?></td>
                                    <td><?php echo $value['book_title']; ?></td>
                                    <td><?php echo $value['url']; ?></td>


                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th> رابط الكتاب</th>

                            </tr>
                        </tfoot>
                    </table>

               


               




            </div>
        </div>
    </div>
</div>



<script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('#mytable').DataTable({
            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
             responsive: true,
        
       
            
        });

    });
 
</script>

<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>









<?= $this->layout->block('') ?>