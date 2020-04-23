
<?= $this->layout->block('search') ?>
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-datepicker.css">
   
    
   

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">بحث عن الكتاب حسب الوسم</h3>
            </div>
          
            <div class="box-body">
          
                <div class="row clearfix" id="hide">
          

                    <div class="col-md-6">
                        <label for="book_name" class="control-label">ادخل وسم </label>
                        <div class="form-group">
                            <input type="text" name="tag_name" value="" class="form-control" id="tag" />
                        </div>
                    </div>

                </div>
             
                    
                <table id="result"  class="table-bordered stripe border border-primary table themed-grid-col" style="width: 70%">
                        
                    </table>
                  <table id="result_all_books"  class="table-bordered stripe border border-primary table themed-grid-col " style="width: 35%">
                        
                    </table>
                
           
            


            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success" id="c">
                    <i class="fa fa-check"></i> بحث
                </button>
            </div>
          
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/dist/js/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/bootstrap-tokenfield.min.css">

<script src="<?=base_url()?>assets/dist/js/bootstrap-tokenfield.js"></script>
<script>
      var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        $('#result_all_books').html('');
        
        
        
        var getUrlParameter = function getUrlParameter(sParam) {

            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                    sURLVariables = sPageURL.split('&'),
                    sParameterName,
                    i;


            for (i = 0; i < sURLVariables.length; i++) {

                sParameterName = sURLVariables[i].split('=');


                if (sParameterName[0] === sParam) {

                    return sParameterName[1] === undefined ? true : sParameterName[1];

                }
            }
        };


        var section_id = getUrlParameter('section_id');

        
        
        
        
        
    $('#tag').tokenfield({

    });
     
      
      
      
      

	function load_data(query)
	{
		$.ajax({
			url:"<?php echo base_url(); ?>book/search_book",
			method:"POST",
                        dataType : 'json',
			data:{query:query},
			success:function(data){
          
             //alert(data);
            
          $('#result').html(data);
				
			}
		});
	}
        
        search_via_section(section_id);
        function search_via_section(section_id){
        var htm='';
        $('#result_all_books').html('');
        	$.ajax({
			url:"<?php echo base_url(); ?>book/search_book_via_section",
			method:"POST",
                        dataType : 'json',
			data:{section_id:section_id},
			success:function(data){
                            var k=0;
                            htm='';
                            
      for(k=0;k<data.result.length;k++){
              htm+= '<tr>';
              
                htm+= '<td>عنوان الكتاب</td>';
                 htm+= '<td>';
       htm+= data.result[k].book_title;
      
            htm+= '</td>';
        htm +='<td><a target="_blank" href="' +base_url+ 'uploads/images/' +data.result[k].file+ '">استعراض الكتاب</a> </td>';
        
     
        htm+= '</tr>';
      }
          
            
          $('#result_all_books').append(htm);
				
			}
		});
        
        
        }
        
        
        
        
        
        
        
        
        
        
        
//        function search_all_book_in_sub_section()
//	{
//		$.ajax({
//			url:"<php echo base_url(); ?>book/search_all_book_in_sub_section",
//			//method:"POST",
//                        dataType : 'json',
//			//data:{query:query},
//			success:function(data){
//          alert(data.book_id);
//             //alert(data);
//            
//         
//           //$('#result').append(data.book_id);
//				
//			}
//		});
//	}
        
     
      
        
        
        

	$('#c').click(function(){
  $('#result_all_books').html('');
		var search = $('#tag').val();
             
		if(search !== '')
		{
			load_data(search);
		}
		else
		{
			load_data();
		}
	});
        
    
        
        
//            function show_product(){
//            $.ajax({
//                type  : 'ajax',
//                url   : '< site_url('product/product_data')>',
//                async : true,
//                dataType : 'json',
//                success : function(data){
//                    var html = '';
//                    var i;
//                    for(i=0; i<data.length; i++){
//                        html += '<tr>'+
//                                '<td>'+data[i].product_code+'</td>'+
//                                '<td>'+data[i].product_name+'</td>'+
//                                '<td>'+data[i].product_price+'</td>'+
//                                '<td style="text-align:right;">'+
//                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-product_code="'+data[i].product_code+'" data-product_name="'+data[i].product_name+'" data-price="'+data[i].product_price+'">Edit</a>'+' '+
//                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-product_code="'+data[i].product_code+'">Delete</a>'+
//                                '</td>'+
//                                '</tr>';
//                    }
//                    $('#show_data').html(html);
//                }
// 
//            });
//        }
           
   
   
    });

</script>


<?= $this->layout->block('') ?>