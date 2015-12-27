<?

$lang = array();
if (!isset($_SESSION["lang"])) {
	$_SESSION["lang"] = "en";
}

if ($_SESSION["lang"] == "swe") {
	# Language: Swedish

	# header
	$lang['xml_export'] = "Exportera till XML";
	$lang['log_in'] = "Logga in";
	$lang['control_panel'] = "Kontrollpanel";
	$lang['log_out'] = "Logga ut";

	# footer
	$lang["footer_text"] = "<p class='foot_p'>Denna hemsida är gjord i samband med kursen XML för publicering på Kungliga Tekniska Högskolan i Stockholm. Detta är resultatet av kursens slutprojekt där var student har följande lärandeändamål:</p>
							<ul>
								<li class='foot_p'>Utveckla XML-baserade interaktiva webbinformationssystem som använder W3Cs principer för Device Independence</li>
								<li class='foot_p'>Analysera och modellera innehålls-, navigations- och interaktionsmodellen för ett informationssystem och implementera detta i XML-termer och databastermer</li>
								<li class='foot_p'>Praktiskt använda relationsdatabaser för webbprogrammering</li>
								<li class='foot_p'>Redogöra för och tillämpa XML-begreppen valid, well formed, xslt-transformationer, dtd samt några exempel på XML-baserade vokabulärer inom medieteknik</li>
								<li class='foot_p'>Redogöra för skillnader mellan att modellera information i en relationsdatabas och att modellera information i en XML-struktur</li>
								<li class='foot_p'>Formulera, planera och genomföra en större egendefinierad webbprogrammeringsuppgift</li>
								<li class='foot_p'>Finna lösningar på programmeringsproblem på Internet</li>
							</ul>
							<p class='foot_p'>Vi som varit utvecklat sidan är</p>";
	
	# control_panel.php						
	$lang["menu"] = "Meny";
	$lang["menu_new_blogpost"] = "Skapa blogginlägg";
	$lang["menu_new_c_user"] = "Skapa användare";
	$lang["menu_new_e_user"] = "Redigera användare";

	# control_panel.php?choice=blogpost
	$lang["blogpost_title"] = "Titel (högst 50 tecken)";
	$lang["blogpost_intro"] = "Ingress (högst 200 tecken)";
	$lang["blogpost_body"] = "Brödtext";
	$lang["blogpost_image"] = "Bild";
	$lang["blogpost_banner"] = "Färgöverdrag";
	$lang["blogpost_banner_descr"] = "Var god mata in värden från 0 till 255 för varje färg.";
	$lang["blogpost_banner_r"] = "Röd:";
	$lang["blogpost_banner_g"] = "Grön";
	$lang["blogpost_banner_b"] = "Blå";

		# control_panel.php?choice=add_user
	$lang["user_create_title"] = "Skapa ny användare";
	$lang["user_create_current"] = "Nuvarande användare";
	$lang["user_create_name"] = "Namn: ";
	$lang["user_create_username"] = "Användarnamn: ";
	$lang["user_create_super"] = "Superanvändare: Ja";
	$lang["user_create_id"] = "Användarid: ";
	$lang["user_create_select"] = "Välj: ";

	$lang["user_username_descr"] = "Måste vara unik!";
	$lang["user_create_pwd"] = "Lösenord";
	$lang["user_create_su"] = "Superanvändarrättigheter";


	$lang["user_username_placeholder"] = "Ge ett användarnamn!";
	$lang["user_firstname_placeholder"] = "Ge ett förnamn!";
	$lang["user_lastname_placeholder"] = "Ge ett efternamn!";
	$lang["user_password_placeholder"] = "Kom på ett lösenord!";

	$lang["button_edit"] = "Redigera";
	$lang["button_delete"] = "Radera";
	$lang["user_edit_title"] = "Redigera användare";

	# control_panel.php?choice=edit_user
	$lang["user_edit_title"] = "Redigare användare";
} else {
	# Language: English

	# header
	$lang['xml_export'] = "Export to XML";	
	$lang['log_in'] = "Log in";
	$lang['control_panel'] = "Control panel";
	$lang['log_out'] = "Log out";

	# footer
	$lang["footer_text"] = "<p class='foot_p'>This website has been developed in connection with the course XML for Publishing at KTH Royal Institute of Technology. This is the result of the final project where each student has to provide evidence of achievement in the following areas:</p>
							<ul>
								<li class='foot_p'>Develop XML based interactive web systems using W3C's principles for Device Independence.</li>
								<li class='foot_p'>Analyze and model the content-, navigation- and interaction models for an information system, and implement this in XML and database terms.</li>
								<li class='foot_p'>Use relational databases for web programming</li>
								<li class='foot_p'>Account for and apply the XML concepts valid, well formed, xslt-transformations, dtd and some examples of XML bases vocabularies used in media technology.</li>
								<li class='foot_p'>Account for differences between modeling information in a relational database and modeling information in an XML structure.</li>
								<li class='foot_p'>Formulate, plan and implement an information system development</li>
								<li class='foot_p'>Find solutions to programming problems on the internet</li>
							</ul>
							<p class='foot_p'>We who made this site are:</p>";

	# control_panel.php
	$lang["menu"] = "Menu";
	$lang["menu_new_blogpost"] = "Make new blogpost";
	$lang["menu_new_c_user"] = "Create user";
	$lang["menu_new_e_user"] = "Edit user";

	# control_panel.php?choice=blogpost
	$lang["blogpost_title"] = "Title (tops 50 characters)";
	$lang["blogpost_intro"] = "Introduction (tops 200 characters)";
	$lang["blogpost_body"] = "Body";
	$lang["blogpost_image"] = "Image";
	$lang["blogpost_banner"] = "Color banner";
	$lang["blogpost_banner_descr"] = "Please enter values from 0 to 255 for each color";
	$lang["blogpost_banner_r"] = "Red:";
	$lang["blogpost_banner_g"] = "Green:";
	$lang["blogpost_banner_b"] = "Blue:";

	# control_panel.php?choice=add_user
	$lang["user_create_title"] = "Create new user";
	$lang["user_create_current"] = "Current users";
	$lang["user_create_name"] = "Name";
	$lang["user_create_firstname"] = "Firstname";
	$lang["user_create_lastname"] = "Lastname";
	$lang["user_create_username"] = "Username";
	$lang["user_create_super"] = "Superuser: Yes";
	$lang["user_create_id"] = "Userid";
	$lang["user_create_select"] = "Select";
	$lang["user_username_descr"] = "Has to be unique!";
	$lang["user_create_pwd"] = "Password";
	$lang["user_create_su"] = "Superuser privilages";


	$lang["user_username_placeholder"] = "What will you call him/her?";
	$lang["user_firstname_placeholder"] = "What is his/her name?";
	$lang["user_lastname_placeholder"] = "Make is his/her family name?";
	$lang["user_password_placeholder"] = "Give him/her a password!";


	# control_panel.php?choice=edit_user
	$lang["user_edit_title"] = "Edit user";
	$lang["button_edit"] = "Edit";
	$lang["button_delete"] = "Delete";

}

?>