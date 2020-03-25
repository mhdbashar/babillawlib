
<?= $this->layout->block('search_via_section') ?>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Book Listing</h3>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped table-condensed" id="mytable">
                    <thead>
                        <tr>
                            <th>رقم الكتاب</th>
                        
                            <th>اسم الكتاب</th>
                            <th>تصفح الكتاب</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($book as $b) { ?>
                            <tr>
                                <td><?php echo $b['book_id']; ?></td>
                            
                                <td><?php echo $b['book_name']; ?></td>
                                    <td> <a href="<?php echo base_url('uploads/images/')?><?php echo $b['file']; ?>">تصفح الكتاب</a></td>

                                <td>
                                    <a  href="<?php echo site_url('book/edit/' . $b['book_id']); ?>" class="btn btn-info btn-xs "><span class="fa fa-pencil"></span> تحرير</a> 
                                    <a href="<?php echo site_url('book/remove/' . $b['book_id']); ?>" class="btn btn-danger btn-xs delete"><span class="fa fa-trash"></span> حذف</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                                <th>رقم الكتاب</th>
                        
                            <th>اسم الكتاب</th>
                            <th>تصفح الكتاب</th>


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
            "autoWidth": false
        });














    });
      $(document).on('click', '.delete', function(){

      if(confirm(" هل متاكد من الحذف"))
      {
//        window.location.href="invoice.php?delete=1&id="+id;
return true;
      }
      else
      {
        return false;
      }
    });

</script>

<?= $this->layout->block() ?>
