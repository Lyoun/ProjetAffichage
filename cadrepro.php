<html>
	
	<head> 
		<title>Projet TV - Quentin</title>
		<SCRIPT LANGUAGE="JavaScript">
				
			
				var posBan=0, ban, delai, msgBan;
				msgBan="IND Bertrix ton futur s'y construit !!!";
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
				
			
		</SCRIPT>
		
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>
	</head> 
	
	<body onLoad=" banniere();" onUnload="clearTimeout(ban)" bgcolor="#FFFFFF">

		<table class="table">
		  <tbody>
				<tr bgcolor="blue">
					<td id="pub">
					1
					</td> 
					<td rowspan="2" id="activite">2</td> 
					<td id="meteo" >
						<!--<iframe scrolling="no" width="100%" height ="100%" frameborder="0"  marginwidth="0" marginheight="0" src="http://www.meteo.be/services/widget/.?postcode=6880&nbDay=2&type=11&lang=fr&bgImageId=0&bgColor=transparent&scrolChoice=0&colorTempMax=d31d1d&colorTempMin=1795e8"></iframe>
						-->
						<iframe scrolling="no" width="100%" height ="100%" frameborder="0" marginwidth="0" marginheight="100" src="http://www.meteo.be/services/widget/.?postcode=6880&nbDay=2&type=4&lang=fr&bgImageId=0&bgColor=transparent&scrolChoice=0&colorTempMax=e5102d&colorTempMin=0067fa"></iframe>
					</td>	
				</tr>
				
				<tr>
				
				 <td id="abs">
					PROFS ABSENTS:
					<!-- Tableau -->
					<table  id="tableabs">
						<tbody>
							<tr>
								<!-- première colonne (ces commentaires s'appliquent aussi pour les autres colonnes) -->
								
								<td id="one">
									<!-- Ajout d'un retour à la ligne à la première ligne pour un espace blanc, pour la propreté -->
									
									<?php
									//connection à la base de donnée
									try {
										$dbh = new PDO('mysql:host=10.25.221.203;dbname=tv_db', $user="quentin", $pass="root");
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
					 </td> 
					 
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

