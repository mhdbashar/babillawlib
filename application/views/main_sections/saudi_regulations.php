
<?= $this->layout->block('saudi_regulations') ?>


<style>

    tr {
        border-bottom: 1px dashed #ddd;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <div>

                    <form method="post" action="<?php echo base_url() ?>book/book_search_via_section">
                        <center>



                            <select  id="select_system" name="section_id" class="form-control  system" style="border-bottom: 2px #3c8dbc solid;width:50%;height: 42px;">;
                                <option value="">اختر النظام</option>
                                <?php
                                foreach ($result1 as $value) {
                                    ?>
                                    <option value="<?php echo $value->section_id ?>"><?php echo $value->section_name ?></option>

                                    <?php
                                }
                                ?>
                            </select>  



                            <div class="box-footer">
                                <button type="submit" class="btn btn-success save">
                                    <i class="fa fa-check"></i> بحث
                                </button>
                            </div>
                        </center>
                    </form>
                </div>
                <center>

                    <table style="border: 6px solid #eaeaea;text-align: right;width: 56.06%; height: 204px;">








                        <?php
                        if (isset($result) && !empty($result)) {
                            echo '<tr>';
                                echo '<td>';
                            echo "الاعتماد";
                            echo '</td>';
                            echo '<td>';
                            echo $result->accreditation;
                            echo '</td>';

                            echo '</tr>';
                            
                            echo '<tr>';
                                  echo '<td>';
                            echo "تاريخ النشر ";
                            echo '</td>';
                            echo '<td>';
                            echo $result->date_publication_m;
                            echo '</td>';
                            echo '</tr>';
                            
                            
                   
                            
                            
                            
                            
                                  echo '<td>';
                             echo "تاريخ النظام ";
                            echo '</td>';
                            echo '<td>';
                            echo $result->history_system_m;
                            echo '</td>';
                            echo '</tr>';
                            
                            
                            
                           
                            
                            
                            
                            
                            echo '<tr>';
                                      echo '<td>';
                             echo "النفاذ";
                            echo '</td>';
                            echo '<td>';
                            echo $result->pass;
                            echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                               echo '<td>';
                            echo "الرابط";
                            echo '</td>';
                            echo '<td>';
                            echo $result->url;
                            echo '</td>';
                            echo '</tr>';
                       
                            ?>



                            <?php
                        }
                        ?>

                    </table>
                </center>
                <center>

              

                    <table style="border-radius: 5px;">



                        <?php
                        if (isset($result2) && !empty($result2)) {



                            foreach ($result2 as $value) {



                                echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';
  
   
  
                                echo 'رقم المادة :';
                                echo $value->material_number;
                                echo '</div>';
                              echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';
                                echo '<br>';
                                echo 'الوصف';
                                         echo '</div>';


                               
                                
                              echo htmlspecialchars_decode(stripslashes($value->description));
                             echo '<br>';
                                ?>



                                <?php
                            }
                        }
                        ?>

                    </table>
                </center>






            </div>


        </div>



    </div> 
</div> 


<script src="<?= base_url() ?>assets/dist/js/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">




<script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>




</script>




<?= $this->layout->block() ?>
