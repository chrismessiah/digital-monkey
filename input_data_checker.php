<?php
	function check_string($string, $mode)
	{
		if ($mode == 1) {
			# Letters
			if (preg_match('/[^A-Za-z]/', $string)) {
				return True;
			}
			return False;
		}
		elseif ($mode == 2) {
			# Letters and numbers
			if ( preg_match('/[^A-Za-z0-9]/', $string) ) {
				return True;
			}
			return False;
		}
		elseif ($mode == 3) {
			if (is_numeric($string)) {
				return True;
			}
			return False;
		}
	}

?>