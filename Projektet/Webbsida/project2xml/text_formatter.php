<?php
	function text_format_this($string)
	{
		$output = str_replace("\n", "<br>", $string);
		return $output;
	}

	function un_text_format_this($string)
	{
		$output = str_replace("<br>", "\n", $string);
		return $output;
	}
?>