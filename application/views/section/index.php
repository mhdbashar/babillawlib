
<?= $this->layout->block('section_view') ?>




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> الأقسام</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('section/add'); ?>" class="btn btn-success btn-sm">اضافة قسم</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped" id="mytable">
                    <thead>
                        <tr>
                            <th> القسم</th>
                            <th>اسم القسم</th>
                            <th> اسم الاب</th>
                       
                           <th>الاحداث</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($section as $s) { ?>
                            <tr>
                                <td><?php echo $s->section_id; ?></td>
                                <td><?php echo $s->section_name; ?></td>
                                <td><?php echo $s->a; ?></td>
                            
                              <td>
                                  <a href="<?php echo site_url('section/edit/' . $s->section_id); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> تحرير</a> 
                                    <a href="<?php echo site_url('section/remove/' . $s->section_id); ?>" class="btn btn-danger btn-xs delete"><span class="fa fa-trash"></span> حذف</a>
                              </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>رقم القسم</th>
                            <th>اسم القسم</th>
                            <th>رقم الاب</th>
                   
                            <th>الاحداث</th>
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

<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>



<?= $this->layout->block() ?>