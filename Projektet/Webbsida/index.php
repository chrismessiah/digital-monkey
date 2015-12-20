<?php
	require 'header.php';
	require 'connToMySQL.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();

	# Count no of blogposts
	$result = $MySQLObj->selectFromDB("count(*)", "Blog");
	$count = $result->fetch_row()[0];

	# Get each blogpost
	$result = $MySQLObj->selectFromDB("*", "Blog");

	for ($i=0; $i < $count; $i++) { 
		# code...
	
		$dict = $result->fetch_assoc();

		$dict["blogpost_id"];
		$dict["image_path"];
		$dict["title"];
		$dict["intro"];
		$dict["overlay_color"];
		$css_blog_id = 'blog_article_'.$dict["blogpost_id"];
		$css_blog_title = 'blog_article_'.$dict["blogpost_id"]."_title";
		$css_blog_intro = 'blog_article_'.$dict["blogpost_id"]."_intro";

?>

		<div id="<?=$css_blog_id?>">
			<div> <!-- color overlay -->
				<p id="<?=$css_blog_title?>"><?=$dict["title"]?></p>
				<p id="<?=$css_blog_intro?>"><?=$dict["intro"]?></p>
			</div>
		</div>

		<style>
			<?="#".$css_blog_id?> {
				height: 400px;
				background-image: url(<?=$dict['image_path']?>);
				background-size: 100% 400px;
				background-repeat: no-repeat;
			}
			<?="#".$css_blog_id?> > div {
				background-color: rgba(<?=$dict["overlay_color"]?>);
				height: 200px;
				position: relative;
				top: 200px;
			}
			<?="#".$css_blog_id?> > div > p {
				position: relative;
				left: 40px;
				top: 30px;
				font-family: Helvetica;
				color: #FFFFFF;
				padding-bottom: 20px;
			}
			<?="#".$css_blog_title?> {
				font-size: 40px;
			}
			<?="#".$css_blog_intro?> {
				font-size: 22px;
			}

		</style>

<?php
	}
?>



<?php
	require 'footer.php';
?>
<style>
	#foot_div {
		position: relative;
		bottom: 20px;
	}
</style>