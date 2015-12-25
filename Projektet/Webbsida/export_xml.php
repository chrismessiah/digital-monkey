<?php
	header ("Content-Type:text/xml");
	require 'connToMySQL.php';
	require 'text_formatter.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();

	$result = $MySQLObj->conn->query("SELECT count(*) FROM Blog;");
	$count = $result->fetch_row();
	$blogposts_count = $count[0];

	$result = $MySQLObj->conn->query("SELECT count(*) FROM Users;");
	$count = $result->fetch_row();
	$user_count = $count[0];


	$user_result = $MySQLObj->conn->query("SELECT * FROM Users;");
	$blog_result = $MySQLObj->conn->query("SELECT * FROM Blog;");
	//$dict = $result->fetch_assoc();
?>


<website>

	<users>
	<?php
		for ($i=0; $i < $user_count; $i++) { 
			$dict = $user_result->fetch_assoc();
			echo "<user>";
				echo "<id>".$dict["user_id"]."</id>";
				echo "<username>".$dict["username"]."</username>";
				echo "<firstname>".$dict["firstname"]."</firstname>";
				echo "<lastname>".$dict["lastname"]."</lastname>";
				echo "<password>"."PROTECTED"."</password>";
				echo "<picture_path>".$dict["pic_name"]."</picture_path>";
				echo "<user_type>".$dict["user_type"]."</user_type>";
			echo "</user>";
		}
	?>
	</users>
	<blogposts>
		<?php
			for ($i=0; $i < $blogposts_count; $i++) { 
				$dict = $blog_result->fetch_assoc();
				$color_array = explode(", ", $dict["overlay_color"]);
				echo "<blogpost>";
					echo "<id>".$dict["blogpost_id"]."</id>";
					echo "<banner_path>".$dict["image_path"]."</banner_path>";
					echo "<title>".$dict["title"]."</title>";
					echo "<intro>".$dict["intro"]."</intro>";
					echo "<body>".preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', un_text_format_this($dict["body"]))."</body>";
					echo "<datetime>".$dict["datetime"]."</datetime>";
					echo "<bannner_color>";
						echo "<r>".$color_array[0]."</r>";
						echo "<g>".$color_array[1]."</g>";
						echo "<b>".$color_array[2]."</b>";
						echo "<alpha>".$color_array[3]."</alpha>";	
					echo "</bannner_color>";
					echo "<author_id>".$dict["created_by"]."</author_id>";
				echo "</blogpost>";
			}
		?>
	</blogposts>






</website>