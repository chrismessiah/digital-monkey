<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns="http://www.w3.org/1999/xhtml">

<!-- Space: &#160; -->

	<xsl:template match="footer">
		<div id="foot_div">
			<div id="text_wrapper">
				<p class='foot_p'><xsl:value-of select="intro"/></p>
				<ul>
					<li class='foot_p'><xsl:value-of select="list/bullet1"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet2"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet3"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet4"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet5"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet6"/></li>
					<li class='foot_p'><xsl:value-of select="list/bullet7"/></li>
				</ul>
				<p class='foot_p'><xsl:value-of select="outro"/></p>
			</div>

			<div id="images_block">
				<div class="person_block">
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="creators/creator1/linkedin"/>
						</xsl:attribute>
						<div id="foot_chris"></div>
					</a>
					<p class="person_text">
						<xsl:value-of select="creators/creator1/name"/>
						
						<a>
							<xsl:attribute name="href">
								mailto:<xsl:value-of select="creators/creator1/mail"/>
							</xsl:attribute>
							<xsl:value-of select="creators/creator1/mail"/>
						</a>
					</p>
				</div>
				
				<div class="person_block">
					<a>
						<xsl:attribute name="href">
							<xsl:value-of select="creators/creator2/linkedin"/>
						</xsl:attribute>
						<div id="foot_adde"></div>
					</a>
					<p class="person_text">
						<xsl:value-of select="creators/creator2/name"/>
						
						<a>
							<xsl:attribute name="href">
								mailto:<xsl:value-of select="creators/creator2/mail"/>
							</xsl:attribute>
							<xsl:value-of select="creators/creator2/mail"/>
						</a>
					</p>
				</div>
			</div>

			<div id="tobecentered"><p id="map-descr"><xsl:value-of select="contact"/></p></div>

			<div id="map"></div>
			<style>
				#map {
					border: 3px solid gray;
					height: 300px;
					width: 300px;
					border-radius: 100%;
					overflow:hidden;
					margin: auto;
					margin-top: 100px;
					position: relative;
					bottom: 50px;
					-moz-border-radius: 999px;
					-webkit-border-radius: 999px;
					-o-border-radius: 999px;
				}
				#map-descr {
					font-family: Helvetica;
					color: #FFFFFF;
					line-height: 29px;
					margin: 0px;
					font-size: 42px;
				}
				#tobecentered {
					width: 23%;
					margin: auto;
					margin-top: 50px;
				}
			</style>
		</div>

		<style>
			ul {
		    list-style: none;
		    padding:0;
		    margin:0;
			}
			li { 
			    padding-left: 2em; 
			    text-indent: -.7em;
			}
			li:before {
			    content: "• ";
			    color: white; /* or whatever color you prefer */
			}
			.foot_p, .person_text {
				font-family: Helvetica;
				color: #FFFFFF;
				line-height: 29px;
				margin: 0px;
			}
			.foot_p {
				font-size: 20px;
			}
			.person_text {
				font-size: 20px;
				text-align: center;
			}
			a {
				text-decoration: none;
				color: #FFFFFF
			}
			.person_block {
				display: inline-block;
			}
			#text_wrapper {
				margin: auto;
		    	width: 60%;
		    	padding: 20px;
			}
			#foot_div {
				background: #353535;
			}
			#images_block {
				width: 50%;
		    	margin: 0 auto;
		    	padding-bottom: 50px;
			}

			#foot_chris, #foot_adde {
				display: inline-block;
				margin-top: 10px;
				width: 246px;
				height: 246px;
				position: relative;
				left: 5%;
				border-radius: 100px;
				background-size: 246px 246px;
				overflow:hidden;
				margin: 20px;
				
			}
			
			#foot_chris {background-image: url(<xsl:value-of select="creators/creator1/picPath"/>);}
			#foot_adde {background-image: url(<xsl:value-of select="creators/creator2/picPath"/>);}
		</style>
	</xsl:template>

</xsl:stylesheet>