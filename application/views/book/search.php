
<?= $this->layout->block('search') ?>
<link rel="stylesheet" href="<?=base_url()?>assets/dist/css/bootstrap-datepicker.css">
   
    
   

<div class="row">
    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Book Add</h3>
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
                <div id="result"></div>
            


            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-success" id="c">
                    <i class="fa fa-check"></i> بحث
                </button>
            </div>
          
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/dist/css/bootstrap-tokenfield.min.css">

<script src="<?=base_url()?>assets/dist/js/bootstrap-tokenfield.js"></script>
<script>
      var base_url = '<?php echo base_url(); ?>';
    $(document).ready(function () {
        
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
              var html='';
             var i;
              for(i=0; i<data.length; i++){
                   
                      html += '<tr>'+      
                              '<td>اسم الكتاب</td>'+
                                 
                               '<td>'+data[i].book_name+'</td>'+
                                '<td> اسم القسم</td>'+
                                 
                               '<td>'+data[i].section_name+'</td>'+
                              
                               '<td><a href="' + base_url + 'uploads/images/' + data[i].file + '">استعراض الكتاب</a> </td>'+
                             
                                    
                                 '</tr>';
                             
                   
                   
                   
                 
               
        }
          $('#result').html(html);
				
			}
		});
	}

	$('#c').click(function(){
 
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