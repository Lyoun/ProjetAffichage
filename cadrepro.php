<html>
	
	<head> 
		<title>Projet TV</title>
		<SCRIPT LANGUAGE="JavaScript">
				
				// script alerte
				var posBan=0, ban, delai, msgBan;
				msgBan="IND BERTRIX TON FUTUR S'Y CONSTRUIT !!!";
				function banniere() {
				  delai = 200;
				  if (posBan >= msgBan.length)
					posBan = 0;
				  else if (posBan == 0) {
					msgBan = '        ' + msgBan;
					while (msgBan.length < 300)
					  msgBan += '        ' + msgBan;
				  }
				  document.formBan.Fbanniere.value = msgBan.substring(posBan,posBan+msgBan.length);
				  posBan++;
				  ban = setTimeout("banniere(delai)",delai);
				}
			    //
				
				//script meteo
				function test() {
				conte = document.getElementById("cont_26c4ec352c497050c4c5c215e33b28b2");
                        if (conte) {
                            conte.style.cssText = "width: 404px; color: #868686; background-color:#FFFFFF; border:1px solid #D6D6D6; margin: 0 auto; font-family: Roboto;";
                            elem = document.createElement("iframe");
                            elem.style.cssText = "width:404px; color:#868686; height:172px;";
                            elem.id = "26c4ec352c497050c4c5c215e33b28b2";
                            elem.src = "https://www.tameteo.com/getwid/26c4ec352c497050c4c5c215e33b28b2";
                            elem.frameBorder = 0;
                            elem.allowTransparency = true;
                            elem.scrolling = "no";
                            elem.name = "flipe";
                            conte.appendChild(elem);
                        }
				}
				//
			
		</SCRIPT>
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>
	</head> 
	
	<body onLoad=" banniere();" onUnload="clearTimeout(ban)" bgcolor="#FFFFFF">

		<table class="table">
		  <tbody>
				<tr bgcolor="blue">
					<td id="pub">
					<?php
				
					$user="yoann";
					$pass="root";
					try {
						$dbh = new PDO('mysql:host=10.25.221.203;dbname=tv_db', $user, $pass);
						foreach($dbh->query('SELECT nom, prenom from prof') as $row) {
						
						// ici faire une boucle qui parcours $row afin d'afficher proprement les noms et prénoms des profs
							print_r($row[0]);
							echo "&nbsp;";
							print_r($row[1][0]);
							echo "<br />";
						}
						$dbh = null;
					} catch (PDOException $e) {
						print "Erreur !: " . $e->getMessage() . "<br/>";
						die();
					}
					?>
					</td> 
					<td rowspan="2" id="activite">2</td> 
					<td id="meteo">
						<div id="cont_26c4ec352c497050c4c5c215e33b28b2">
							<script type="text/javascript" >
							test();
							</script>
						</div>
					</td>	
				</tr>
				
				<tr>
					 <td id="abs">4</td> 
					 
					 <td id="photo">5</td>
				</tr>
				
				<tr id="alerte">
					<td colspan="3">
						<form name="formBan">
							<input type="text" name="Fbanniere" size="300%" >
						</form>
					</td>
				</tr>
		  </tbody>
		</table>
		
	</body>
	
</html>

