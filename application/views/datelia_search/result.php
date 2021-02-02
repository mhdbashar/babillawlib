
<?= $this->layout->block('result') ?>




<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"> نتيجة البحث</h3>

            </div>
            <div class="box-body">

                <?php
                if ($section_name == 'نماذج وعقود') {
                    ?>

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
                                    <td><?php echo $value->book_id; ?></td>
                                    <td><?php echo $value->book_title; ?></td>
                                    <td><?php echo $value->url; ?></td>


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

                    <?php
                }
                ?>


                <?php
                if ($section_name == 'الأحكام والسوابق القضائية') {
                    ?>

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th> رابط الكتاب</th>
                                <th> البلد</th>
                                <th> المدينة</th>   
                                <th>سنة الحكم </th>
                                <th>منطوق الحكم </th>   
                                <th>رقم المجلد </th>
                                <th> تصنيف القضية</th>   
                                <th> ملخ الحكم</th>
                                <th>نص الحكم </th> 
                                <th> الاسباب</th>
                                <th>السند القانوني </th>   
                                <th> قرار الاستئناف</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $value) { ?>
                                <tr>
                                    <td><?php echo $value->book_id; ?></td>
                                    <td><?php echo $value->book_title; ?></td>
                                    <td><?php echo $value->url; ?></td>
                                    <td><?php echo $value->country; ?></td>
                                    <td><?php echo $value->city; ?></td>
                                    <td><?php echo $value->ruling_year; ?></td>
                                    <td><?php echo $value->pronounced_judgment; ?></td>
                                    <td><?php echo $value->volume_number; ?></td>
                                    <td><?php echo $value->issue_classification; ?></td>
                                    <td><?php echo $value->summary_of_judgment; ?></td>
                                    <td><?php echo $value->sentencing_text; ?></td>
                                    <td><?php echo $value->the_reasons; ?></td>
                                    <td><?php echo $value->the_legal_bond; ?></td>
                                    <td><?php echo $value->appeal_decision; ?></td>



                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th> رابط الكتاب</th>
                                <th> البلد</th>
                                <th> المدينة</th>   
                                <th>سنة الحكم </th>
                                <th>منطوق الحكم </th>   
                                <th>رقم المجلد </th>
                                <th> تصنيف القضية</th>   
                                <th> ملخ الحكم</th>
                                <th>نص الحكم </th> 
                                <th> الاسباب</th>
                                <th>السند القانوني </th>   
                                <th> قرار الاستئناف</th>

                            </tr>
                        </tfoot>
                    </table>

                    <?php
                }
                ?>



                <?php
                if ($section_name == 'الكتب القانونية والأبحاث') {
                    ?>

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th> عنوان الكتاب </th>
                                <th> رابط الكتاب </th>
                                <th> المؤلف </th>
                                <th>  الناشر</th>
                                <th> سنة النشر </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $value) { ?>
                                <tr>
                                    <td><?php echo $value->book_id; ?></td>

                                    <td><?php echo $value->book_title; ?></td>
                                    <td><?php echo $value->url; ?></td>
                                    <td><?php echo $value->author; ?></td>
                                    <td><?php echo $value->publisher; ?></td>
                                    <td><?php echo $value->year_publication; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th> عنوان الكتاب </th>
                                <th> رابط الكتاب </th>
                                <th> المؤلف </th>
                                <th>  الناشر</th>
                                <th> سنة النشر </th>


                            </tr>
                        </tfoot>
                    </table>

                    <?php
                }
                ?>


                <?php
                if ($section_name == 'الأنظمة السعودية') {
                    ?>

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th> الرابط</th>
                                <th>  تاريخ النظام</th>
                                <th>  الاعتماد</th>
                                <th>  تاريخ النشر</th>
                                <th>   الاجتياز</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $value) { ?>
                                <tr>
                                    <td><?php echo $value->book_id; ?></td>
                                    <td><?php echo $value->url; ?></td>
                                    <td><?php echo $value->history_system_m; ?></td>
                                    <td><?php echo $value->accreditation; ?></td>
                                    <td><?php echo $value->date_publication_m; ?></td>
                                    <td><?php echo $value->pass; ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th> الرابط</th>
                                <th>  تاريخ النظام</th>
                                <th>  الاعتماد</th>
                                <th>  تاريخ النشر</th>
                                <th>   الاجتياز</th>

                            </tr>
                        </tfoot>
                    </table>

                    <?php
                }
                ?>


                <?php
                if ($section_name == 'الأنظمة والتشريعات والقوانين') {
                    ?>

                    <table class="table table-bordered table-striped" id="mytable">
                        <thead>
                            <tr>
                                <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th>  الرابط</th>
                                <th>  البلد</th>
                                <th>  المدينة</th>
                                <th>  نوع التشريع</th>
                                <th>  حالة التشريع</th>
                                <th>  رقم مادة التشريع</th>
                                <th>  رقم التشريع</th>
                               

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $value) { ?>
                                <tr>
                                    <td><?php echo $value->book_id; ?></td>
                                    <td><?php echo $value->book_title; ?></td>
                                    <td><?php echo $value->url; ?></td>
                                    <td><?php echo $value->country; ?></td>
                                    <td><?php echo $value->city; ?></td>
                                    <td><?php echo $value->legislative_type; ?></td>
                                    <td><?php echo $value->legislative_status; ?></td>
                                    <td><?php echo $value->material_number_legislation; ?></td>
                                    <td><?php echo $value->legislation_number; ?></td>
                                    


                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                 <th> رقم الكتاب</th>
                                <th>  عنوان الكتاب</th>
                                <th>  الرابط</th>
                                <th>  البلد</th>
                                <th>  المدينة</th>
                                <th>  نوع التشريع</th>
                                <th>  حالة التشريع</th>
                                <th>  رقم مادة التشريع</th>
                                <th>  رقم التشريع</th>

                            </tr>
                        </tfoot>
                    </table>

                    <?php
                }
                ?>




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
    $(document).on('click', '.delete', function () {

        if (confirm(" هل متاكد من الحذف"))
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









<?= $this->layout->block('') ?>