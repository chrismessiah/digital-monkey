<?php
	function text_format_this($string)
	{
		$output = str_replace("\n", "<br>", $string);
		return $output;
	}
?>