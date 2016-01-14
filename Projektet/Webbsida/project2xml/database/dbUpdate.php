<?php
	require 'connToMySQL.php';

	$command = "mysql -u{$vals['db_user']} -p{$vals['db_pass']} "
 . "-h {$vals['db_host']} -D {$vals['db_name']} < {$script_path}";

	$output = shell_exec($command . '/proj_xml_2015-12-19.sql');
	echo $output;
?>