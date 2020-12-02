$(document).ready(function(){
	$(".submit").click(function () {
		var content=$("#content").val();
		var id = <?php echo $id_blog; ?> ;
		alert(content);									
});