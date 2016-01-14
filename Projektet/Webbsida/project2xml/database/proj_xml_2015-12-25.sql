# ************************************************************
# Sequel Pro SQL dump
# Version 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Värd: localhost (MySQL 5.6.24)
# Databas: proj_xml
# Genereringstid: 2015-12-25 00:09:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Tabelldump AttendingStudents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `AttendingStudents`;

CREATE TABLE `AttendingStudents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Blog`;

CREATE TABLE `Blog` (
  `blogpost_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(70) NOT NULL DEFAULT 'public/blog/o-WORK-FRIENDS-facebook.jpg',
  `title` varchar(50) NOT NULL DEFAULT '',
  `intro` varchar(200) NOT NULL DEFAULT '',
  `body` text NOT NULL,
  `datetime` datetime NOT NULL,
  `overlay_color` varchar(40) DEFAULT '',
  `created_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`blogpost_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `Users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Blog` WRITE;
/*!40000 ALTER TABLE `Blog` DISABLE KEYS */;

INSERT INTO `Blog` (`blogpost_id`, `image_path`, `title`, `intro`, `body`, `datetime`, `overlay_color`, `created_by`)
VALUES
	(12356,'public/blog/o-WORK-FRIENDS-facebook.jpg','Hello Word!','Ärtan pärtan piff paff puff nu kommer en superknuff!','Lorem ipsum dolor sit amet, no quo pericula argumentum, suscipit prodesset vix ex, quodsi scripta maiorum pro eu. Has disputando interpretaris an, vitae similique his ea. Molestie maiestatis qui ne. Sed at antiopam vituperata, id sed nullam latine, pri ridens mollis sadipscing ex.\n<br><br>\nLabore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.\n<br><br>\nMel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.\n<br><br>\nAd dicta iracundia eloquentiam eam, qui case urbanitas deterruisset ut. Quis everti quo te, te has dicta dissentiunt. Ex numquam tractatos sed. Ut ridens epicurei mea, vis elitr possit causae eu, ut eum timeam fuisset corpora. Alia noster eruditi vis et. Nec suscipit accusamus an. Amet eruditi partiendo ne usu, tamquam diceret ne has.\n<br><br>\nMentitum oportere interesset no sed. Vel ea vide commodo ponderum, vix falli ridens oporteat ut, eu mea dicit saepe utroque. Ei vim civibus salutatus percipitur. Commune percipitur has id, nostrum detraxit percipitur has an. Pri primis scaevola intellegam id, nihil imperdiet in est.','2015-12-22 20:33:22','0, 255, 0, 0.3',34561),
	(1233456,'public/blog/o-WORK-FRIENDS-facebook.jpg','Hello Word!','Ärtan pärtan piff paff puff nu kommer en superknuff!','Lorem ipsum dolor sit amet, no quo pericula argumentum, suscipit prodesset vix ex, quodsi scripta maiorum pro eu. Has disputando interpretaris an, vitae similique his ea. Molestie maiestatis qui ne. Sed at antiopam vituperata, id sed nullam latine, pri ridens mollis sadipscing ex.\r\n\r\n\r\n\r\nLabore admodum quo ea. Prima rationibus sit at, eam iudico veniam eloquentiam cu. Putent cetero electram et eam, mea cu integre aliquando vulputate. Te ius alia soluta patrioque, ad debet paulo vituperata per, nostrud utroque voluptua mei ne.\r\n\r\n\r\n\r\nMel nullam bonorum ad, quo utamur patrioque scribentur an. Vel et facer apeirian interesset, id vis porro vulputate, est nemore persius inciderint ei. Eu graeci dictas vis. In nostro praesent sea, ei quas disputando suscipiantur sea, mei choro dolor dissentiet ad.\r\n\r\n\r\n\r\nAd dicta iracundia eloquentiam eam, qui case urbanitas deterruisset ut. Quis everti quo te, te has dicta dissentiunt. Ex numquam tractatos sed. Ut ridens epicurei mea, vis elitr possit causae eu, ut eum timeam fuisset corpora. Alia noster eruditi vis et. Nec suscipit accusamus an. Amet eruditi partiendo ne usu, tamquam diceret ne has.\r\n\r\n\r\n\r\nMentitum oportere interesset no sed. Vel ea vide commodo ponderum, vix falli ridens oporteat ut, eu mea dicit saepe utroque. Ei vim civibus salutatus percipitur. Commune percipitur has id, nostrum detraxit percipitur has an. Pri primis scaevola intellegam id, nihil imperdiet in est.','2015-12-24 08:12:05','0, 0, 255, 0.3',34561),
	(11923663,'public/blog/dbaec6755e67e7d9c0bfff49c75e451a.png','BAAABOOM COMPADRE','BAAA BAAABOOOM AYAYAYY','BAAA BAAA BAAA\r\nBAAA BAAA BAAA\r\nBOOOOOOM\r\n\r\n\r\nEYEYEYEYYE','2015-12-23 11:50:15','235, 25, 2, 0.3',2345),
	(39004366,'public/blog/330f9e22beaccb4a937deb3a2d7fa2fc.jpg','Essärecension','3D Printing Second Edition','I boken ”3D Printing Second Edition” förklarar författaren Christopher Barnatt, tydligt sitt syfte med boken - att övertyga läsaren att vi befinner oss vid vändpunkten till en ny industriell revolution och menar att vid bokens slut kommer dessutom läsaren ha den ståndpunkten (Barnatt, 2014, p. xii-xiii). Innan dess har författaren skrivit ett förord kring de framsteg 3D printing medfört det senaste året sedan den första upplagan släppts så som den första avfyrbara 3D printade pistolen (a.a., p. xi). Författaren avslutar förordet med att berätta hur personer underskattat teknologier tidigare, så som de som ansåg att television var en trend (a.a., xiii).\r\n\r\nI bokens första kapitel introduceras läsaren till vad 3D printing är (a.a. p. 2-3) med konkreta exempel på tillämpnings- och marknadsområden (a.a., p 5-20). De fyra betydande marknadsområdena menar författaren är Rapid Prototyping, Producing Molds & Tooling, Direct Digital Manufacturing och Personal Fabrication (a.a., p. 5-10). Rapid Prototyping syftar till produktion av iterativa verksamheters prototyper för att erbjuda designers en möjlighet att kommunicera sina idéer i ett fysiskt format (a.a., p. 5-6). Detta menar författaren är det ledande användningsområdet för 3D printing idag. Producing Molds & Tooling sträcker sig till verksamheter som erbjuder skräddarsydd produktion som ett hjälpmedel för verksamheter som behöver skapa speciella verktyg för att producera det kunden efterfrågar (a.a., p. 6-8). Direct Digital Manufacturing riktar sig som slutgiltiga konsumentprodukter eller delar till konsumentprodukter (a.a., p. 8-9). Personal Fabrication är att tillverkningen sker på individ-nivå avskiljt från fabriker och att individen står för produktionen där författaren menar att vi idag bevittnar begynnelsen av detta fenomen (a.a., p 9-10). Författaren förklarar därefter i en gissning att 3D printing kommer troligen högst att nå 50 % i marknadsandel för Rapid Prototyping som bör nå denna nivå år 2025 (a.a., p. 12).\r\n\r\nAnledningen till att efterfrågan kommer planas ut vid 50 % inom detta marknadsområde menar författaren är att det fortfarande kommer finnas fall där traditionella tillverkningsmetoder är lämpligast samt att 3D printing inte är den den enda metoden för snabb produktion i iterativa verksamheter (ibid.). Författaren refererar sedan till en av sina egna tidigare gissningar att antalet 3D printade ting i marknadsområdet Producing Molds & Tooling kommer år 2020 i antal att vara mer än antalet som produceras i Rapid Prototyping med samma metod (ibid.).\r\n\r\nFörfattaren menar att potentialen bakom 3D printing har erkänts på regeringsnivå (a.a., p. 21) med referens till Obamas uttalanden som syftar till en metod att få tillbaka jobbsektorn inom tillverkning vars majoriteten av idag finns i Asien (ibid.). Resterande sidorna av första kapitlet täcker de intervjuer författaren haft med personer från industrin som också påpekar potentialen med teknologin (a.a., p. 23-28).\r\n\r\nI kapitel 2 tar Barnatt upp tekniska detaljer av 3D printing (a.a., p. 29-81) och i kapitlet därefter, kapitel 3, fortsätter författaren med att gå igenom dagens industri för 3D printing (a.a., p. 82-113). I det senare skriver författaren att en nämnd marknadsagentur uppskattar den globala marknaden av 3D printing kommer år 2019 vara värderad till 7,24 miljarder dollar. För att sätta saker i perspektiv menar författaren att marknaden för global produktion av komsumentelektronik år 2013 var värderad till 220 miljarder dollar. Författaren menar därmed att uppskattningen anses passande då marknaden för 3D printing ökat från 1,74 miljarder till 2,20 miljarder till 3,07 miljarder dollar räknat årligen från och med 2011 (a.a., p. 82). Barnatt fortsätter med att nämna att marknaden för 3D printing kan delas in i hårdvarutillverkare, utvecklare av mjukvara och 3D printingsbyråer. (a.a., p. 83, 107).\r\n\r\nI det följande kapitlet, kapitel 4, går författaren i detalj in på Direct Digital Manufacturing både i konkreta tillämpningar och konkreta produkter som finns tillgängliga idag där exempel som återges är en delvis 3D printad bil, 3D printade proteser och kirurgiska modeller (a.a., p. 117, 132, 134).\r\n\r\nKapitel 6, Bioprinting, går författaren in på att 3D printing har potentialen att kunna printa mänskliga organ. Detta är högst experimentellt och är begränsat av dagens 3D printingtekniker. Författaren menar dock att det skulle kunna göra hela USAs organväntelista till en on-demand modell och ge möjligheter till att printa tänder, ben och liknande (a.a., 176, 186).\r\n\r\nI kapitel 7 berättar författaren att det är vinningen i resurser och den ekonomiska besparingen som kommer göra 3D printing vardagligt men nämner att det inte kan jämföras med traditionell produktion. Det som synnerligen kommer göra 3D printing ledande är inte tekniken själv utan snarare våra krav på resurseffektivitet, logistik och återvinning (a.a., 199-200). Till detta ges exempel på företag som dragit nytta av detta, bland annat en Peter Sandler från Airbus menar att 3D printing reducerar materialkravet för produktion med 90 % för en del komponenter till flygplansmotorer (a.a., p. 201).\r\n\r\nBoken avslutas med det sista kapitlet, kapitel 8, där författaren menar att vi redan år 2030 kan förvänta oss se 3D printade hushåll där maten kommer från en printer och klädgarderoben ständigt förnyas efter senaste mode (a.a., 225). Författaren menar att det dock finns nackdelar så som att kosmetiska bioprinting kommer bli vanligt med tekniken då individer kan printa ut nya ansikten. En ytterligare nackdel är att den privata produktionen inte är lika reglerad som den offentliga vilket kommer leda till hälsokonsekvenser i framtiden. ','2015-12-25 12:54:48','44, 155, 76, 0.3',34561),
	(91597493,'public/blog/8f92f59a408ce01dac0bc0b263341e0c.jpg','Analyser kring Barnatts teorier','Med den ovanstående ståndpunkten menar jag att revolutioner är något som utpekas i historiska händelser inte medan eller före händelsen i fråga har inträffat.','Barnatt skriver i sin inledning att boken kommer att övertyga läsaren att 3D printing kommer leda oss in i en ny industriell revolution. Vi är, enligt Barnatt, på vändningspunkten för denna teknologi (a.a., p. xii-xiii). Samtidigt som jag vill hålla med som den blivande ingenjör jag är vill jag påminna läsaren att det är när teknologier utgör en samhällsförändring som vi kan yttra oss kring att vi befinner oss en vändpunkt. Wormbs (2010, p. 141) skriver hur tekniker introduceras ”med buller och bång” men att det viktiga årtalet för tekniken är när den har tillräckligt stor spridning att den påverkar användare, och med de, samhället. Efter att ha läst boken känner jag att författarens mål är felaktigt formulerat då det inte finns något som pekar på att 3D printing kommer få ett genomslag jämförbart med en industriell revolution. Som Ashton (1966, p. 10-12) skriver medförde den industriella revolutionen stora förändringar och påverkade samhället i sociala, ekonomiska och politiska aspekter. I efterhand har det visat sig att jag är inte heller ensam i denna ståndpunkt gällande 3D printnings betydelse som också delas av Ratto och Ree (2012). Det boken har givit mig är insikten av den potential 3D printing har och hur dess mångsidighet är användbar i en rad tillämpningar. Med boken får jag insikten att teknologin börjat sätta avtryck i marknaden men inget kring dess avtryck i dagens samhälle.\r\n\r\nFrån att en teknologi har potential till att den driver en industriell revolution finns det en lång väg att gå och hinder att möta. För att ge läsaren en insikt vill jag dra till minnes ett exempel på en annan teknologi med stor potential ryktades revolutionera den globala ekonomin. Bitcoin är en digital decentraliserad valuta som är immun mot inflation då fler bitcoins inte skapas (Brito, 2013). Valutan är baserad på komplexa algoritmer som gör att man inte kan fabricera eller falsifiera kapital, något som går med dagens valutor, och behöver heller inga avtal med banker för att bli tillgänglig för individen. Det finns en rad fördelar med valutan (Wladimir, n.d.). Men då denna valuta är svårreglerad för statliga underorgan har de öppet kritiserat valutan och i en del länder förklarat valutan olaglig (Hill, 2014). En ytterligare anledning till detta ställningstagande är att decentraliseringen medför anonymitet som gjort att valutan blivit populär bland kriminella (Zetter, 2012). Samma motstånd kan väntas gällande 3D printing då det ger en genväg till att bland annat tillverka avfyrbara vapen utan statligt veto, få tag i nycklar till TSA-lås som annars är statligt reglerade med mera (Daw, 2011; Greenberg, 2015). Att införa restriktioner mot 3D printing kommer därmed att skada den öppna communityn som gynnar många marknadssegment på samma sätt som den skadar Bitcoin. Hur mycket 3D printing kan komma att regleras är svårt att säga. Men bara för att en teknologi har potential betyder det inte att den kommer få genomslag och få möjligheten att revolutionera.\r\n\r\nMed detta är det värt att notera att Barnatt genom hela boken talar utifrån ett teknikdeterministiskt perspektiv, definierat av Nye (2006), att 3D printing kommer förändra samhället vi lever i. Men det Barnatt inte inser är hur samhället dessutom kan komma att påverka tekniken. Detta är dock inte överraskande med tanke på att detta inte är den första gången som Barnatt tar sig an uppdraget att spå framtiden. Faktumet är att han har författat ett antal böcker kring hur framtiden kommer att se ut baserat på en liknande teknologisk adopteringsgrad. Genom att ta sig an en sådan ståndpunkt kan det därför kännas ironiskt att samhällets svar på 3D printing kan komma att vara en begränsning av teknikens samhällsinverkan.\r\n\r\nIdag är det få förändringar av samhällsstrukturer som tekniken har medfört. De sociala strukturer kring 3D printing skiljer sig inte från andra redan etablerade strukturer. Ratto och Ree (2012) menar att 3D printing inte bara är ett nytt verktyg som bidrar till industrialiseringen utan även ett socialt fenomen som inkluderar crowdsorcing, open-sourcing och andra rörelser som redan finns på webben. I denna mening kan 3D printing mera betraktas som en artefakt av ett tekniskt system som Summerton definierar (1998). Hon menar att de tekniska systemen består att ett flertal komponenter som tillsammans utgör en helhet med hög komplexitet. Jag vill därmed påstå att 3D printing är en del av två tekniska system som vi redan har - Internet och maskinell produktion. Detta beskrivs av Ratto och Rae (2012) som en konvergens mellan den digitala och materiella domänen. De menar att 3D printing istället kan betraktas som maskinen som materialiserar virtuell information.\r\n\r\nHur 3D printing kan komma att ha en inverkan på marknaden formas fortfarande. Att betrakta tekniken som en genväg till smidigare produktionsmöjligheter leder till intressanta följder som beskrivs i en artikel från WIRED Magazine skriven av Thompson(2015). I den får vi höra hur hjärnkirurgen Ed Smith som utför komplicerade barnoperationer använder sig av 3D printing för att printa ut en högupplöst version av barnens hjärna. Genom detta får han möjligheten att öva och repetera operationen dagar innan den faktiska operationen kommer att ske. Det är genom detta som Thompson menar att 3D printing möter pappersskrivare i rollen som kognitivt redskap. Thompson driver vidare att vi idag inte betraktar pappersprinters som ersättning tryckpressar och att detsamma gäller för 3D printers mot traditionell tillverkning. I min uppfattning är detta spår inte olikt från den gissning av marknadsanalys som Barnatt antog. I Rapid Prototyping används prototyperna för att iterativt ta fram nya prototyper tills slutprodukten är färdigställd, 3D printing används därmed också som ett kognitivt redskap i detta område. Med detta menar jag att 3D printing når olika marknader genom olika syften. Då 3D printing inte lämpar sig för mass-produktion kan det medföra att den får begränsad spridning i tillverkningsdrivna marknadskretsar medan den kan få ett betonat fäste i andra.\r\nI Barnatts uppskattning av marknadsutvecklingen menar han att år 2025 möjligen 50 procent av alla konceptmodeller och prototyper skapas med 3D printing. Dock är denna gissning inte kompatibel med den givna illustration som procentuellt mäter hur stor andel av marknaden där tekniken kommer adopteras (se fig. 1). Genom att följa den utritade kurvan kan det med enkelhet utläsa att 3D printing bör ha adopteras hos cirka 40 procent av dagens marknad. I en internationell studie från Gartner (2015) som omfattar 330 anställda personer på olika bolag varav 100 anställda redan tillhör bolag som har eller planerar att adoptera 3D printing ges det att snittet av antalet 3D printers per bolag är 5,4. Av de som deltog i studien hade 37 procent av bolagen inom detta marknadsområde enbart en 3D printer inom organisationen medan 18 procent hade tio eller fler (2015). I denna mening verkar det som att Barnatt inte förväntar att 3D printing skulle få en sådan spridning med tanke på illustrationen. Faktumet är att Barnatt baserar mycket av sina gissningar (Barnatt, 2014, p. 14) på bolagsrapporter och marknadsprogonser utan att vara kritisk mot företagsgenererad information och menar att det betryggar honom i sin gissning. Att företagsrapporter är vinklade är troligtvis ingen nyhet för läsaren, Beattie och Jones (2001) skriver i sin avhandling om enkelheten med att manipulera grafer och diagram för egen vinning som är svårupptäckt läsaren. Med detta menar jag inte att Barnatt försökt lura oss genom att manipulera sin illustration utan snarare att det finns en risk att han blivit manipulerad genom att basera mycket av sina gissningar på källor som kommer från en miljö med hög konkurrens och ofta direkt har en egen vinning av uttalanden och prestigefyllda resultat. Sådana uttalanden finns i intervjuerna med personer som är anställda tidigt i boken (Barnatt, 2014, p. 23-27). Att framställa 3D printing att vara mer utbredd än den är lockar både investerare, kunder och potentiella kolleger. Väl passande talas det heller inte om andra teknologier inom olika marknadsområden som har samma nisch, och därmed kan betraktas konkurrerande, trots att Barnatt kort nämner ”... 3D printing is not the only rapid prototyping technology” (a.a., p. 12) men inte utreder hur dessa kan påverka spridning av 3D printing inom marknadsgrenen som råkar vara det område 3D printing har sina större andelar i. Läsaren undanhålls tyvärr denna information.\r\n\r\nFör att sammanfatta mina tankar och knyta an till frågeställningen: 3D printing har potential att transformera våra liv men idag finns det inget som pekar på att det faktiskt kommer att ske med tanke på det begränsade samhällsavtryck teknologin har givit. Det som författaren syftar till att knyta an är en utopi, en värld där organdonation är en tillverkningsprocess och klimatförändringar kan bromsas med effektivare tillverkningsprocesser. En värld, författaren vill få oss att tro, enbart kan nås genom 3D printing. Men naturligtvis finns det alternativa vägar till utopin, jag vill med detta inte påstå att vi inte kommer kunna nå dit utan snarare att inget pekar på att just 3D printing gör det. Detta knyter an till Wormbs (2010) ståndpunkt att mål inte ska sättas utifrån hur de kan nås eller med vilka tekniker. Målet är till exempel inte att använda 3D printing för att skapa mänskliga organ utan snarare att kunna skapa mänskliga organ med valfri teknik oavsett om det är 3D printing eller odlade organ med hjälp av stamcellsteknologi (Leifler, 2013). Som slutord menar jag, likt Wormbs (2010), att samhället driver en teknikutveckling för att lösa samhällsproblem. Målet är att hitta en lösning medan tillvägagångssättet ges som ett förtroendeuppdrag till doktorer, vetenskapsmän eller, till den grupp jag inom kort tillhör, ingenjörer.\r\n','2015-12-25 01:07:04','177, 100, 40, 0.3',34561);

/*!40000 ALTER TABLE `Blog` ENABLE KEYS */;
UNLOCK TABLES;


# Tabelldump Courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Courses`;

CREATE TABLE `Courses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump SubmittedTasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SubmittedTasks`;

CREATE TABLE `SubmittedTasks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Teachers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Teachers`;

CREATE TABLE `Teachers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Tabelldump Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(11) NOT NULL DEFAULT '',
  `firstname` varchar(25) NOT NULL DEFAULT '',
  `lastname` varchar(25) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `pic_name` varchar(50) NOT NULL DEFAULT 'public/profile_pic/example.jpg',
  `about` varchar(300) DEFAULT '',
  `user_type` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`user_id`, `username`, `firstname`, `lastname`, `password`, `pic_name`, `about`, `user_type`)
VALUES
	(2345,'admin','admin','admin','admin','public/profile_pic/example.jpg','',0),
	(34561,'chrabd','Christian','Abdel','123456','public/profile_pic/example.jpg',NULL,1);

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
