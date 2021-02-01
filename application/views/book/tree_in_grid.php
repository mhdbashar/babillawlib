
<?= $this->layout->block('tree_in_grid') ?>
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/bootstrap-datepicker.css">
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">




<div class="row">

    <div class="box box-info">

        <div class="box-body">

            <div class="row clearfix" id="hide">
<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">Search</span>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details" class="form-control" />
				</div>
			</div>
<div id='grid_section'>
                <?php
                $array = get_last_node();





                $rr = '';
                foreach ($result as $r) {
                    if ($r['parent_id'] != 0) {
                        $rr = $r['parent_id'];
                    }

                    ?>



                    <div class="col-lg-3 col-xs-6" >
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>-</h3>
                                <p>القسم الرئيسي</p>

                                <h4> <a style="color: #f8fdff;"  href="<?php echo base_url() ?>book/loadRecord/<?php echo $r['section_id']; ?>"> <?php echo $r['section_name']; ?>  </a> </h4>
                                <div class="icon">
                                    <i class="fa fa-book"></i>
                                </div>
                            </div>


                        </div>
                    </div><!-- ./col -->


                    <?php

                }
                ?>



	


            </div>
			</div>
<div style='margin-top: 10px;' id='pagination'>
		<?= $pagination; ?>
	</div>
            <?php
            if ($rr != 0) {
                ?>


                <center>  <a class="btn btn-primary" href="javascript:history.go(-1)" title="Return to the previous page">رجوع للخلف</a></center>

                <?php
            }
            ?>



                <div id="legislation">
                    
                    
                </div>
         
                
                 <div class="float-child" class="panel-body" style="background-color: white; margin-top: -4px;" id="legislation_system">
    <div class="green"></div>
  </div>
        </div>

    </div>
</div>


<?php


	
	?>
	
	<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
	
	<center>

                    <table style="border: 6px solid #eaeaea;text-align: right;width: 56.06%; height: 204px;">








                        <?php
                        if (isset($result1) && !empty($result1)) {
                            echo '<tr>';
                            echo '<td class="h">';
                            echo "الاعتماد:";
                            echo '</td>';
                            echo '<td>';
                            echo $result1->accreditation;
                            echo '</td>';

                            echo '</tr>';





                            echo '<tr>';
                            echo '<td class="h">';
                            echo "تاريخ النشر :";
                            echo '</td>';
                            echo '<td>';
                            echo $result1->date_publication_m;
                            echo '</td>';
                            echo '</tr>';







                            echo '<td class="h">';
                            echo "تاريخ النظام :";
                            echo '</td>';
                            echo '<td>';
                            echo $result1->history_system_m;
                            echo '</td>';
                            echo '</tr>';




            
                      
                          
                            
                              if (isset($result3) && !empty($result3)) {
                            $c=0;
                                 foreach ($result3 as $value) {
                                     $c++;
                                         echo '<tr>';
                                      echo '<td class="h">';
                            echo "الإصدار";
                            echo '&nbsp'; 
                            echo $c;
                            echo ':';
                            echo '</td>';
                                 
                                       echo '<td>';
                                     echo $value->version;
                            echo '</td>';
echo '</tr>';
                     
                                  
                                 }
                                 }
                                   
                            






                            echo '<tr>';
                            echo '<td class="h">';
                            echo "النفاذ:";
                            echo '</td>';
                            echo '<td>';
                            echo $result1->pass;
                            echo '</td>';
                            echo '</tr>';
                            echo '<tr>';
                            echo '<td class="h">';
                            echo "الرابط:";
                            echo '</td>';
                            echo '<td>';
                            echo $result1->url;
                            echo '</td>';
                            echo '</tr>';
                            ?>



                            <?php
                        }
                        ?>

                    </table>
                </center>
                <br><br><br><br>
                <center>



                    <table>



                        <?php
                        if (isset($result2) && !empty($result2)) {



                            foreach ($result2 as $value) {



                                echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';



                                echo 'رقم المادة :';
                                echo $value->material_number;
                                echo '<br>';
                                echo '</div>';
                                echo '<div style="text-align: right;  color: #4587ae; font-weight: 900;  font-size: 12px;">';
                               
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
				</div></div></div></div>
	
	
	
	
	
	
	<?php
	

?>














<script src="<?= base_url() ?>assets/dist/js/datatables.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/dist/css/bootstrap-tokenfield.min.css">




<script src="<?= base_url() ?>assets/dist/js/bootstrap-tokenfield.js"></script>

	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>
    var base_url = '<?php echo base_url(); ?>';

    $(document).ready(function () {

        var section_id = '<?php echo $current_uri ?>';

      

     
        var html = '';








        function load_book(tt) {


            $.ajax({
                type: "GET",
                url: "<?php echo base_url() ?>book/search_via_section/" + tt,
                dataType: "json",
                beforeSend: function () {

                    $("#loader").show();
                },
                success: function (data)
                {
               //if(data.main_section){
               var main_section;
                        for (i = 0; i < data.length; i++) {
                        main_section =data[i].main_section;
                        }
                        
                        
                   


                    var i;
                    
               if(main_section==31){
                        
                        
                   

                    html += ' <div id="accordion">';
                    

                    for (i = 0; i < data.length; i++) {
                        





                        html += '  <div class="question">عنوان الكتاب</div>';

                        html += '  <div class="answer">' + data[i].book_title + '</div>';

//                        html += '  <div class="question">الاصدار</div>';
//
//                        html += '  <div class="answer">' + data[i].issue_classification + '</div>';






                        html += '  <div class="question"> رابط الكتاب</div>';

                        html += '  <div class="answer">' + data[i].url + '</div>';

//                        html += '  <div class="question">جهةالاصدار</div>';
//
//                        html += '  <div class="answer">' + data[i].issuer + '</div>';






//                        html += '  <div class="question">ملخص الحكم  </div>';
//
//                        html += '  <div class="answer">' + data[i].summary_of_judgment + '</div>';
//
//                        html += '  <div class="question">نص الحكم</div>';
//
//                        html += '  <div class="answer">' + data[i].sentencing_text + '</div>';
//
//
//
//
//
//
//                        html += '  <div class="question">الاسباب   </div>';
//
//                        html += '  <div class="answer">' + data[i].the_reasons + '</div>';
//
//                        html += '  <div class="question">السند القانوني </div>';
//
//                        html += '  <div class="answer">' + data[i].the_legal_bond + '</div>';

                        html += ' --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';

                    }

                    html += '</div>';
                    $('#legislation').html(html);
             

                    $("#accordion").accordion();

                    $(html).appendTo(".node-selected").text();
                   
                    // $('.node-selected').html(html);

                    //$('#book_list').html(html);
               // }
                }
                
                
              
                    
                         $('#legislation_system').html(data);

                    $('.get_book').click(function () {

                        var country = $(this).data("country")
                        load_book_via_country_name(country, tt);



                    });
              
                },
                complete: function (data) {
                    // Hide image container
                    $("#loader").hide();
                },
            });

        }

        load_book(section_id);


        $('#search_button').click(function () {
            var query = $('#field_search').val();
            if (query == '') {
                alert('أدخل كلمة للبحث عنها');
                return false;
            }
         

            $.ajax({

                url: "<?php echo base_url(); ?>Search_section/inline_search",
                method: "POST",
                data: {query: query, section_id: section_id},
                success: function (response)
                {
                    $('#search_result1').html(response);


                }
            });

        });





	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>book/fetch",
			method:"POST",
			data:{query:query,parent_id:section_id},
			success:function(data){
			
				$('#grid_section').html('');
				$('#pagination').html('');
				
				$('#grid_section').html(data);
			}
		})
	}

	$('#search_text').keyup(function(){
		$('#grid_section').html('');
		var search = $(this).val();
		
		if(search != '')
		{
			load_data(search);
		}
		
	});



    });

</script>




<?= $this->layout->block('') ?>