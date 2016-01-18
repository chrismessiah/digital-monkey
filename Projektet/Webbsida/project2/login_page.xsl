<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!-- Space: &#160; -->

	<xsl:import href="header.xsl"/>
	<xsl:import href="footer.xsl"/>

	<xsl:template match="/">
		<html>
			<head>
				<link href="modules/sweetAlert/dist/sweetalert.css" rel="stylesheet" type="text/css" />
			</head>
			<body>
				<xsl:apply-imports/>
				<xsl:apply-templates select="./website/header"/>
				<xsl:apply-templates select="./website/login_area"/>
				<xsl:apply-templates select="./website/footer"/>
				<xsl:apply-templates select="./website/error"/>
			</body>
		</html>
	</xsl:template>

	<xsl:template match="login_area">
		<xsl:value-of select="list/bullet3"/>
		<div id="login-bg">
			<div id="login_wrapper">
				<form method="post" action="login.php"> <!-- collects user input -->
					<div id="input_boxes">

						<input type="text" name="field1">
							<xsl:attribute name="placeholder">
								<xsl:value-of select="placeholders/username"/>
							</xsl:attribute>
						</input>

						<input type="password" name="field2">
							<xsl:attribute name="placeholder">
								<xsl:value-of select="placeholders/password"/>
							</xsl:attribute>
						</input>
						
						<a id="login_pass_forgot">
							<xsl:attribute name="href">
								<xsl:value-of select="links/forgot_password"/>
							</xsl:attribute>
							<xsl:value-of select="placeholders/forgot"/>
						</a>

						<div>
							<input type="submit">
								<xsl:attribute name="value">
									<xsl:value-of select="placeholders/login"/>
								</xsl:attribute>
							</input>
						</div>

					</div>

				</form>
			</div>

		</div>


		<style>
			#input_boxes {
				width: 60%;
				margin: auto;
			}

			#input_boxes > input {
				margin: 10px; 
			}
			#input_boxes > div {
				width: 50%;
				margin: auto; 
			}

			#login_wrapper {
				position: relative;
				margin: auto;
			    width: 32%;
			    top: 420px;
			}
			#login_pass_forgot {
				color: #FFFFFF;
				font-family: Helvetica;
				position: relative;
				left: 110px;
				font-size: 12px;
				margin: 0px;
			}
			input[type="submit"]:hover {
				cursor: pointer; 
				cursor: hand;
			}
			#login-bg {
				background-image: url("<xsl:value-of select="banner_path"/>");
				height: 750px;
				background-size: 100%;
				background-repeat: no-repeat;
			}
			input[type="text"], input[type="password"] {
				background: #FFFFFF;
				border: 1px solid #979797;
				border-radius: 40px;
				font-size: 16px;
				font-family: Helvetica;
				margin: 0;
		    	outline: 0;
		    	padding: 12px;
		    	color:#525259; /* Textcolor */
			}

			input[type="submit"] {
				text-align: center;
				color: #FFFFFF;
				background-color: #525259;
				border-radius: 40px;
				border: 1px solid #979797;
				font-size: 17px;
				padding: 12px;
				padding-left: 30px;
				padding-right: 30px;
				position: relative;
				top: 40px;
				
			}
			a {
				text-decoration: none;
			}

			/* Hides placeholder */
			input[type="text"]:focus::-webkit-input-placeholder, input[type="password"]:focus::-webkit-input-placeholder { 
				color:transparent; 
			}
		</style>
	</xsl:template>

	<xsl:template match="error">
		<script src="modules/sweetAlert/dist/sweetalert.min.js"/>
		<script type="text/javascript">
			swal({
				title: "<xsl:value-of select="title"/>",
				text: "<xsl:value-of select="message"/>",
				type: "<xsl:value-of select="type"/>",
				confirmButtonText: "<xsl:value-of select="button_text"/>",
				timer: 1500,
				showConfirmButton: false
			});
		</script>
	</xsl:template>


</xsl:stylesheet>