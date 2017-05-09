<html>
	
	<head> 
		<title>Projet TV - Quentin</title>
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
				
			
		</SCRIPT>
		<link rel="stylesheet" type="text/css" media="screen" href="css/style.css"/>
	</head> 
	
	<body onLoad=" banniere();" onUnload="clearTimeout(ban)" bgcolor="#FFFFFF">

		<table class="table">
		  <tbody>
				<tr bgcolor="blue">
					<td id="pub">
					</td> 
					<td rowspan="2" id="activite">2</td> 
					<td id="meteo">
					<iframe scrolling="no" width="100%" height ="100%" frameborder="0" marginwidth="0" marginheight="0" src="http://www.meteo.be/services/widget/.?postcode=6880&nbDay=2&type=11&lang=fr&bgImageId=0&bgColor=transparent&scrolChoice=0&colorTempMax=d31d1d&colorTempMin=1795e8"></iframe>
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

