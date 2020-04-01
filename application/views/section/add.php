
<?= $this->layout->block('section_add_view') ?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">اضافة قسم</h3>
            </div>
            <?php echo form_open('section/add'); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="section_name" class="control-label">اسم القسم</label>
                        <div class="form-group">
                            <input type="text" name="section_name" value="" class="form-control" id="section_name" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="section_name" class="control-label">اسم القسم الاب</label>
                        <div class="form-group">
                            <select  name="section_name_select" value="" class="form-control" >


                                <option value="">--اختر القسم--</option>
                                <?php
                                foreach ($get_all_section as $value) {
                                    ?>
                                    <option value="<?php echo $value->section_id; ?>"><?php echo $value->section_name; ?></option>


                                    <?php
                                }
                                ?>

                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> حفظ
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<?= $this->layout->block('') ?>
