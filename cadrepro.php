<html>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
	<head> 
		<title>Projet TV</title>
		<SCRIPT LANGUAGE="JavaScript">
				
				// script alerte
				var posBan=0, ban, delai, msgBan;
<<<<<<< HEAD
				msgBan="inserer un texte sympa ici";
=======
				msgBan="a faire gicler un ane mort";
>>>>>>> photos
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
				<tr>
					
					<td id="pub">
					<br />
					PUB
					<!-- Tableau -->
					<table class="table">
						<tbody>
							<tr>
								<td id="pub2">
<<<<<<< HEAD
								inserer texte ici
=======
								inserer dla merd isi x'D
>>>>>>> photos
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					
					<td rowspan="2" id="activite">
					<br />
					ACTIVITES
					<!-- Tableau -->
					<table class="table">
						<tbody>
							<tr>
								<td id="activite2">
<<<<<<< HEAD
								inserer texte ici
=======
								inserer dla merd isi x'D
>>>>>>> photos
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					 
					
					<td id="meteo">
					<br />
					METEO
					<!-- Tableau -->
					<table class="table">
						<tbody>
							<tr>
								<td id="meteo2">
								<script charset='UTF-8' src='http://www.meteofrance.com/mf3-rpc-portlet/rest/vignettepartenaire/06476/type/VILLE_MONDE/size/PAYSAGE_VIGNETTE' type='text/javascript'></script>
								</td>
							</tr>
						</tbody>
					</table>
					</td>
					
				</tr>
				<tr>
					<!-- Partie absence -->
					<td id="abs">
					<br />
					PROFS ABSENTS
					<!-- Tableau -->
					<table class="table">
						<tbody>
							<tr>
								<!-- première colonne (ces commentaires s'appliquent aussi pour les autres colonnes) -->
								
								<td id="one">
									<!-- Ajout d'un retour à la ligne à la première ligne pour un espace blanc, pour la propreté -->
									
									<?php
									//connection à la base de donnée
									try {
										$dbh = new PDO('mysql:host=10.25.221.203;dbname=tv_db', $user="jeremy", $pass="root");
									} 
									catch (PDOException $e) {
										print "Erreur !: " . $e->getMessage() . "<br/>";
										die();
									}				
									//Récupération de la table prof de la DB et sélection de ceux ci en fonction de la table 
									//absence en faisant correspondre les 2 ID, on finit par commencer à l'ID 0 et prendre les 13 suivants avec le LIMIT
									$reponse = $dbh->query('
												SELECT *
												FROM absence 
												INNER JOIN prof 
												ON absence.prof_id_prof = prof.id_prof 
												LIMIT 0,13
												');
									//Affichage des noms
									while ($donnees = $reponse->fetch())
									{
									?>
										<div>
										<!-- Ajout de 2 espaces pour plus de propreté -->
										&nbsp
										&nbsp
										<!-- Affichage du nom -->
										<?php echo $donnees['nom']; ?>
										<!-- affichage de la première lettre du prénom -->
										<?php
											$prenom = $donnees['prenom'];
											echo $prenom[0];
										?>
										<!-- Ajout d'un point ci dessous pour l'abréviation du prénom -->
										.
										</div>
										<!-- Le code ci-dessous dit que si il y a un commentaire dans la base de donnée,
										nous allons le rechercher-->
										<?php
											if (isset($donnees['travail'])) 
											{
										?>
										<!-- Nous créeons un class en CSS pour mettre en forme le commentaire -->
										<div class="com">
										<!-- Des espaces pour avancer les commentaires et faire plus propres -->
										&nbsp
										&nbsp
										&nbsp
										<!-- On met les éventuels commentaires entre parenthèses et on les écrits -->
										( 
										<?php echo $donnees['travail'];?> )
										</div>
										<!-- Fin de la boucle d'écriture -->
										<?php
										}
										?>
			
									<?php
									}
									$reponse->closeCursor(); // Termine le traitement de la requête
									?>
								</td>
								
								<!-- Deuxième colonne -->
								
								<td id="two">
									<?php
									$reponse = $dbh->query('
												SELECT *
												FROM absence 
												INNER JOIN prof 
												ON absence.prof_id_prof = prof.id_prof 
												LIMIT 13,13
												');
									while ($donnees = $reponse->fetch())
									{
									?>
										<div>
										&nbsp
										&nbsp
										<?php echo $donnees['nom']; ?>
										<?php
											$prenom = $donnees['prenom'];
											echo $prenom[0];
										?>.
										</div>
										<?php
											if (isset($donnees['travail'])) 
											{
										?>
										<div class="com">
										&nbsp
										&nbsp
										&nbsp
										( 
										<?php echo $donnees['travail'];?> )
										</div>
										<?php
										}
										?>
										
										</div>
									<?php
									}
									$reponse->closeCursor(); // Termine le traitement de la requête
									?>
								</td>
								
								<!-- Troisième colonne -->
								
								<td id="three">
									<?php
									$reponse = $dbh->query('
												SELECT *
												FROM absence 
												INNER JOIN prof 
												ON absence.prof_id_prof = prof.id_prof 
												LIMIT 26,13
												');
									while ($donnees = $reponse->fetch())
									{
									?>
										<div>
										&nbsp
										&nbsp
										<?php echo $donnees['nom']; ?>
										<?php
											$prenom = $donnees['prenom'];
											echo $prenom[0];
										?>.
										</div>
										<?php
											if (isset($donnees['travail'])) 
											{
										?>
										<div class="com">
										&nbsp
										&nbsp
										&nbsp
										( 
										<?php
											echo $donnees['travail'];
										?> )
										</div>
										<?php
										}
										?>		
										</font>
										</div>
									<?php
									}
									$reponse->closeCursor(); // Termine le traitement de la requête
									?>
								</td>
							</tr>
						</tbody>
					</table>
					 

<!-- Partie photo -->
					<td id="photo">
					<br />
					PHOTO
					<!-- Tableau -->
					<table class="table">
						<tbody>
							<tr>
								
								<td id="one">
									<!-- Ajout d'un retour à la ligne à la première ligne pour un espace blanc, pour la propreté -->
									<?php
							 
										echo '<img src="image/bebras.jpg" alt="voici donc le texte derreur, si jamais il y a une erreur, le texte ci-avant saffichera dans les plus bref delais" height="208" width="312">'; 
										echo '<img src="http://www.ilovegenerator.com/large/rigole-love-pas-t-nul-132101030483.png" alt="image vraiment simpa">';
										echo '<img src="file://C:/Users/pirale2870/Downloads/Logo 2.png" alt="image vraiment cool">';
									?>
									<?php
									//connection à la base de donnée
									try {
										$dbh = new PDO('mysql:host=10.25.221.203;dbname=tv_db', $user="jeremy", $pass="root");
									} 
									catch (PDOException $e) {
										print "Erreur !: " . $e->getMessage() . "<br/>";
										die();
									}				
									//Récupération de la table photo de la DB et sélection de ceux ci en fonction de la table 
									$reponse = $dbh->query('
												SELECT *
												FROM photo 
												');
									//Affichage des photos
									while ($donnees = $reponse->fetch())
									{
									?>
										<div>
										<!-- Ajout de 2 espaces pour plus de propreté -->
										&nbsp
										&nbsp
										<!-- Affichage du nom de l'image -->
										<?php echo $donnees['nom']; ?>
										<!-- affichage du lien l'image -->
<<<<<<< HEAD
										<?php echo $donnees['lien']; 
											  echo '<img src="lien" alt="image vraiment cool">';
										?>
=======
										<?php echo $donnees['lien']; ?>
>>>>>>> photos
										</div>
										<!-- Le code ci-dessous dit que si il y a une description dans la base de donnée,
										nous allons le rechercher-->
										<?php
											if (isset($donnees['description'])) 
											{
										?>
										<!-- Nous créeons un class en CSS pour mettre en forme le commentaire -->
										<div class="com">
										<!-- Des espaces pour avancer les commentaires et faire plus propres -->
										&nbsp
										&nbsp
										&nbsp
										<!-- On met la description entre parenthèses et on les écrits -->
										( 
										<?php echo $donnees['description'];?> )
										</div>
										<!-- Fin de la boucle d'écriture -->
										<?php
										}
										?>
			
									<?php
									}
									$reponse->closeCursor(); // Termine le traitement de la requête
									?>
									
						
								</td>
							</tr>
						 </tbody>
									</table>
					
					 
					 
					 
					 </td>
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

