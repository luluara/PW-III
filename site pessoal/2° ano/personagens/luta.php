<!-- trocar os personagens, suas imagens e suas forças.
personalizar os empates
aumentar em 2 personagens, total de 8. 
inserir plano de fundo estilizado nos dois arquivos -->
<html>
   <head>
   <meta charset= "UTf-8">
   </head>
   <body>
<style>
	body{background-image:url(fundo.jpg);
	background-size: 100%;
	background-repeat: repeat; }

	#img1{background-image: url(icone2.webp);
	width: 170px;height: 90px;
	position: absolute;
	top: 1%;
	background-size: 100% 100%;}

	#img2 {background-image: url(icone.webp);
	width: 90px;; height: 90px;
	position: absolute;
	top: 92%;
	left: 92%;
	background-size: 100% 100%;}
</style>
<br><br>
<body><!--inline--> 
    <p id="img1"></p>
     </body>

<body><!--inline--> 
    <p id="img2"></p>
     </body>

<center><font size="13" color = "dd358a">BATALHA</font></center>

<br><br><br>



      <form method="POST" action="batalha.php">
		   <table border="0" align="center">
		     <tr>
               <td>
			     <font color = "White"><center>Draculaura</center></font>
			     <img src="draculaura.webp" height="200" width="250"><br>
				 <center><input type="radio" name="Time1" value="draculaura"></center>
			   </td>			
               <td>
			     <font color = "White"><center>Cléo<br></center></font>
				 <img src="cleo.webp" height="200" width="250"><br>
				 <center><input type="radio" name="Time1" value="cleo"></center>
			   </td>			
               <td>
			     <font color = "White"><center>Clawdeen</center></font>
				 <img src="clawdeen.webp" height="200" width="250"></br>
                 <center><input type="radio" name="Time1" value="clawdeen"></center>
			   </td>
			   <td>
			     <font color = "White"><center>Spectra</center></font>
			     <img src="spectra.webp" height="200" width="250"><br>
				 <center><input type="radio" name="Time1" value="spectra"></center>
			   </td>	
			 </tr>
		  </table>
		  
		 <center><font size="13" color = "dd358a">VS</font></center>
		 <table border="0" align="center">
		 
			<tr>    
			  <td>
			    <font color = "White"><center>Frankie</center></font>
			    <img src="frankie.jpg" height="200" width="250">
			    <center><input type="radio" name="time2" value="frankie"><center>
			  </td>	
              <td>
			    <font color = "White"><center>Lagoona<br></center></font>
			    <img src="lagoona.webp" height="200" width="250">
			    <center><input type="radio" name="time2" value="lagoona"><center>
			  </td>
              <td>
			    <font color = "White"><center>Toralei</center></font>
		        <img src="toralei.jpg" height="200" width="250">
			    <center><input type="radio" name="time2" value="toralei"><center>
			  </td>
			  <td>
			     <font color = "White"><center>Abbey</center></font>
			     <img src="abbey.webp" height="200" width="250"><br>
				 <center><input type="radio" name="time2" value="abbey"></center>
			   </td>	
			</tr>
			
         </table>		
         <br>
         <center><input type="submit" value="PLAY"></center>	 
	  </form>
   </body>
</html>

