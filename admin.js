$(document).ready(function(){
	$(document).on('click','.dev_author_delete', function(){
		var id = $(this).data('id');
		jQuery.ajax({
	        type : 'POST',
	        data : {'id':id,"delete_author":'yes'},
	        url : "ajax.php",
	        success : function(res){
	            var json = $.parseJSON(res);
	            if(json.status == "success")
	            {
	                window.location.reload();
	            }
	            else
	            {
	                alert(json.error);
	            }
	        }
	    });    
	});
	$(document).on('click','.dev_book_delete', function(){
		var id = $(this).data('id');
		jQuery.ajax({
	        type : 'POST',
	        data : {'id':id,"delete_book":'yes'},
	        url : "ajax.php",
	        success : function(res){
	            var json = $.parseJSON(res);
	            if(json.status == "success")
	            {
	                window.location.reload();
	            }
	            else
	            {
	                alert(json.error);
	            }
	        }
	    });    
	});
	$(document).on('click', '.btn_save_book', function(){
		var author = $('.dev_author').val();
		var title = $('.dev_book_title').val();
		var desc = $('.dev_book_description').val();
		var isbn = $('.dev_book_isbn').val();
		var pages = $('.dev_pages').val();
		var formats = $('.dev_book_format').val();
		jQuery.ajax({
	        type : 'POST',
	        data : {"add_book":'yes',
		        "author":author,
		        "title":title,
		        "desc":desc,
		        "isbn":isbn,
		        "formats":formats,
		        "pages":pages,
    		},
	        url : "ajax.php",
	        success : function(res){
	            var json = $.parseJSON(res);
	            if(json.status == "success")
	            {
	            	alert("Book Added Successfully");
	                window.location.reload();
	            }
	            else
	            {
	                alert(json.error);
	            }
	        }
	    }); 
	});
});