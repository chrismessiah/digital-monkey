<script src="modules/sweetAlert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="modules/sweetAlert/dist/sweetalert.css">
<script type="text/javascript">
	swal({
		title: "Error!",
		text: "<?=$error_message?>",
		type: "error",
		confirmButtonText: "Next"
	});
</script>