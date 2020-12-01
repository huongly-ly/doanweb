<?php  
	
	include("common/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>laptop mới </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="upload/1.jpg">
	
  	<meta name="keyword" content="laptopmoi,Dell,MSI,">
	<script src="js/css3-mediaqueries.js"></script>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/imagehover.css">
	<link rel="stylesheet" type="text/css" href="css/myweb.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<script src="js/jquery-3.2.0.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
	<script src="sliderengine/amazingslider.js"></script>

	<script src="sliderengine/initslider-1.js"></script>
	
	<script>
		$("#cancel_edit").click(function(){
        window.open('','_parent',''); 
        window.close(); 
    });
	</script>
	<script>
		$('.carousel').carousel({
  interval: false
});
	</script>
	<script type="text/javascript">
		$(document).ready(function($) {
			var temHeight= 0;
			$(".thumbnail").each(function() {
				var current= $(this).height();
				if (parseInt(temHeight)< parseInt(current)) {
					temHeight= current;
				}
			});

			$(".thumbnail").css({height:temHeight});
			//alert(temHeight);
		});
	</script>
	
	<script>
		$('.dropdown').hover(function(){ 
  $('.dropdown-toggle', this).trigger('click'); 
});
	</script>

</head>
<body>
<?php 
	//include file dùng chung
	include("modules/header.php");
	include("modules/menu.php");

	//lất tham số từ url
	//kiểm tra xem có tồn tại tham số url hay không
	if(isset($_GET["view"])){
		//gán tham số lấy dc cho biến $view
		$view= $_GET["view"];
		include("modules/".$view.".php");
	}else{
		include("modules/slideshow.php");
		include("modules/listproduct.php");
		include("modules/adv.php");
	
		
	}
	
	include("modules/partner.php");
	include("modules/footer.php");
?>
<div class="modal fade" tabindex="-1" id="modalCart" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thông báo</h4>
      </div>
      <div class="modal-body">
        <p><h3>Bạn đã mua được hàng</h3></p>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- </div> -->
<script>
	function addCart(id){
		$.post("index.php?view=addcart&id="+id, function(data){
        	$('#modalCart').modal();
    	});
    	window.location.href = 'index.php?view=cartlist';
	}

	function updateCart(id){
		// alert(id);

		sl = $("#sl_"+id).val();
		if(sl<0){alert("Sản phẩm được mua không thể là số âm");}else{
			sl=$("#sl_"+id).val();
			$.post("index.php?view=updatecart&id="+id+"&sl="+sl, function(data){
			location.reload();
    	});}
		
	}

	function deleteCart(id){
		$.post("index.php?view=deletecart&id="+id, function(data){
			location.reload();
    	});
	}

</script>
</body>
</htm