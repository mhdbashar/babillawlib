
<?= $this->layout->block('custom_field_view') ?>




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> الأقسام</h3>
               
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                          <th> رقم الحقل</th>
                            <th> اسم الحقل</th>
                            <th> نمط الحقل</th>
                            <th>   قيمة الحقل</th>
<!--                          <th>   الإجراءات</th>-->

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($get_all_field as $s) { ?>
                            <tr>
                                <td><?php echo $s['id']; ?></td>
                                <td><?php echo $s['field_label']; ?></td>
                                <td><?php echo $s['field_type']; ?></td>
                                <td><?php echo $s['options']; ?></td>
<!--                                <td>
                                    <a href="<?php echo site_url('custom_fields/edit/' . $s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> تحرير</a> 
                                    <a href="<?php echo site_url('custom_fields/remove/' . $s['id']); ?>" class="btn btn-danger btn-xs delete"><span class="fa fa-trash"></span> حذف</a>
                                </td>-->
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>

                        <tr>
                          <th> رقم الحقل</th>
                            <th> اسم الحقل</th>
                            <th> نمط الحقل</th>
                            <th>   قيمة الحقل</th>
<!--   <th>   الإجراءات</th>-->
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

</script>

<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>



<?= $this->layout->block() ?>