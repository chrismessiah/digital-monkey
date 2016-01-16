<script src="modules/sweetAlert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="modules/sweetAlert/dist/sweetalert.css">
<script type="text/javascript">
	swal({
		title: "<?php echo $title; ?>",
		text: "<?php echo $message; ?>",
		type: "<?php echo $type; ?>",
		confirmButtonText: "<?php echo $button_text; ?>"
		timer: 1500,
		showConfirmButton: false
	});
</script>