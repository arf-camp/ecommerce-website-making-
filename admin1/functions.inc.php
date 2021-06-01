<?php
function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}



function redirect($link){
	?>
	<script>
	window.location.href='<?php echo $link?>';
	</script>
	<?php
	die();
}

?>