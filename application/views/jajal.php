<!DOCTYPE html>
<html>
<head>
	<title>Visitor Counter</title>
	<script src="<?= base_url() ?>assets/home/lib/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
				$.ajax({
					type:'post',
					url: '',
					data: {
						get_online_visitor:"online_visitor",
					},
					success:function(response){
						if (response!=""){
							$("#online_visitor_val").html(response);
						}
					}
				});
			}, 10000)
		});
	</script>
</head>
<body>
	

</body>
</html>