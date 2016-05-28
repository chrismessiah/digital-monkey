<?php
	require './../components/header.php';
	require './../functions/connToMySQL.php';
	$MySQLObj = new MySQL_Handler();
	$MySQLObj->mysql_connect();

	# Count no. of blogposts
	$result = $MySQLObj->conn->query("SELECT count(*) FROM Blog;");
	$count = $result->fetch_row();
	$count = $count[0];

	# Get each blogpost
	$result = $MySQLObj->conn->query("SELECT * FROM Blog ORDER BY datetime DESC;");

	for ($i=0; $i < $count; $i++) { 

		$dict = $result->fetch_assoc();

		// $dict["blogpost_id"];
		// $dict["image_path"];
		// $dict["title"];
		// $dict["intro"];
		// $dict["overlay_color"];
		
		$css_blog_id = 'blog_article_'.$dict["blogpost_id"];
		$css_blog_title = 'blog_article_'.$dict["blogpost_id"]."_title";
		$css_blog_intro = 'blog_article_'.$dict["blogpost_id"]."_intro";

?>
		<a href="articles.php?article=<?php echo $dict["blogpost_id"]; ?>">
		<div id="<?php echo $css_blog_id; ?>">
			<div> <!-- color overlay -->
				<p id="<?php echo $css_blog_title; ?>"><?php echo $dict["title"]; ?></p>
				<p id="<?php echo $css_blog_intro; ?>"><?php echo $dict["intro"]; ?></p>
			</div>
		</div>
		</a>

		<style>
			<?php echo "#".$css_blog_id ?> {
				height: 400px;
				background-image: url(<?php echo $dict['image_path']; ?>);
				background-size: 100% 400px;
				background-repeat: no-repeat;
			}
			<?php echo "#".$css_blog_id ?> > div {
				background-color: rgba(<?php echo $dict["overlay_color"]; ?>);
				height: 200px;
				position: relative;
				top: 200px;
			}
			<?php echo "#".$css_blog_id ?> > div > p {
				position: relative;
				left: 40px;
				top: 30px;
				font-family: Helvetica;
				color: #FFFFFF;
				padding-bottom: 20px;
			}
			<?php echo "#".$css_blog_title ?> {
				font-size: 40px;
			}
			<?php echo "#".$css_blog_intro ?> {
				font-size: 22px;
			}
			a {
				text-decoration: none;
			}
		</style>

<?php
	}
?>



<?php
	require './../components/footer.php';
?>
<style>
	#foot_div {
		position: relative;
		bottom: 20px;
	}
</style>


<?php
	require './../functions/error.php';
?>
