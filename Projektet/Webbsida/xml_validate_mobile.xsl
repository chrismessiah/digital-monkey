<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

	<xsl:template match="/">
		<html>
			<head></head>
			<body>
				<h1>Mobile view</h1>
				<h2>Users</h2>
				<xsl:apply-templates select="./website/users/user"/>
				<h2>Blogposts</h2>
				<xsl:apply-templates select="./website/blogposts/blogpost"/>
			</body>
		</html>
	</xsl:template>

	<xsl:template match="user">
		<h3>Name:&#160;<xsl:value-of select="firstname"/>&#160;<xsl:value-of select="lastname"/></h3>
		<ul>
			<li>Userid:&#160;<xsl:value-of select="id"/></li>
			<li>Username:&#160;<xsl:value-of select="username"/></li>
			<li>Password:&#160;<xsl:value-of select="password"/></li>
			<li>Picture&#160;path:&#160;<xsl:value-of select="picture_path"/></li>
			<li>Usertype:&#160;<xsl:value-of select="user_type"/></li>
		</ul>
	</xsl:template>

	<xsl:template match="blogpost">
		<h3>Post&#160;title:&#160;<xsl:value-of select="title"/></h3>
		<h4>Intro:&#160;<xsl:value-of select="intro"/></h4>
		<ul>
			<li>Blogpost&#160;id:&#160;<xsl:value-of select="id"/></li>
			<li>Banner&#160;path:&#160;<xsl:value-of select="banner_path"/></li>
			<li>Datestamp:&#160;<xsl:value-of select="datetime"/></li>
			<li>Overlay&#160;colors&#160;-&#160;R:&#160;<xsl:value-of select="banner_color/r"/>&#160;&#160;G:&#160;<xsl:value-of select="banner_color/g"/>&#160;&#160;B:&#160;<xsl:value-of select="banner_color/b"/>&#160;&#160;Alpha:&#160;<xsl:value-of select="banner_color/alpha"/></li>
			<li>Author&#160;id:&#160;<xsl:value-of select="author_id"/></li>
		</ul>
		<h4>Body:</h4>
		<p><xsl:value-of select="body"/></p>
	</xsl:template>




</xsl:stylesheet>