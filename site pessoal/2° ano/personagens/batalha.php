<html>
<body>
<style>
	body{background-image:url(fundo.jpg);
	background-size: 100%;
	background-repeat: repeat; }
	
	#img1{background-image: url(icone2.webp);
	width: 150px;height: 70px;
	position: absolute;
	top: 1%;
	background-size: 100% 100%;}

	#img2 {background-image: url(icone.webp);
	width: 70px;; height: 70px;
	position: absolute;
	top: 92%;
	left: 95%;
	background-size: 100% 100%;}

</style>

<body style="background-color: antiquewhite;"><!--inline--> 
    <p id="img1"></p>
     </body>

<body style="background-color: antiquewhite;"><!--inline--> 
    <p id="img2"></p>
     </body>

<center><font size="13" color = "dd358a">LUTA</font></center>
<br><br><br>

</html>
<?php
   if(isset($_POST["Time1"])) $time1 = $_POST["Time1"];
   else $time1 = "Indefinido";
   
   if(isset($_POST["time2"])) $time2 = $_POST["time2"];
   else $time2 = "Indefinido";

   
   if($time1 == "draculaura"){
      echo "<font color = White><center>draculaura</center></font>;
	        <center><img src=draculaura.webp height=200 width=250></center>";
	  $p1 = 5000;
   }
     else if($time1 == "cleo"){
        echo "<font color = White><center>cleo</center>
	          <center><img src=cleo.webp height=200 width=250></center></font>";
	    $p1 = 4500;
			
     }
     else if($time1 == "clawdeen"){
        echo "<font color = White><center>clawdeen</center>
	          <center><img src=clawdeen.webp height=200 width=250></center></font>";
	    $p1 = 4000;	
     }

	 else if($time1 == "spectra"){
        echo "<font color = White><center>spectra</center>
	          <center><img src=spectra.webp height=200 width=250></center></font>";
	    $p1 = 4000;	
     }
   
   echo "<br><center><font size=13 color = dd358a> VS </font></center><br>";
   
   if($time2 == "frankie"){
      echo "<font color = White><center>frankie</center></font>
	        <center> <img src=frankie.jpg height=200 width=250></center>";
	  $p2 = 4000;
   }
   else if($time2 == "lagoona"){
      echo "<font color = White><center>lagoona</center></font>
	        <center><img src=lagoona.webp height=200 width=250></center>";
	  $p2=5000;
   }
   else if($time2 == "toralei"){
      echo "<font color = White><center>toralei</center></font>
	        <center><img src=toralei.jpg height=200 width=250></center>";
      $p2=4500;
   }

   else if($time2 == "abbey"){
	echo "<font color = White><center>abbey</center></font>
		  <center><img src=abbey.webp height=200 width=250></center>";
	$p2=4500;
 }
   echo"<br><br>";
   echo "<center><font color = dd358a><h1>━━━━━━━⟡━━━━━━━</h1> </font></center>"; 
       
   if($p1 > $p2){
      if($time1 == "cleo"){
         echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
		       <font color = White><center><b>cleo</b></center></font>;
	           <center><img src=cleo.webp height=200 width=250></center>";
      }
	  else if($time1 == "draculaura"){
         echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
		       <font color = White><center><b>draculaura</b></center></font>
	           <center><img src=draculaura.webp height=200 width=250></center>";
      }
	  else if($time1 == "clawdeen"){
        echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
		      <font color = White><center><b>clawdeen</b></center></font>
	          <center><img src=clawdeen.webp height=200 width=250></center>";
      }

	  else if($time1 == "spectra"){
        echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
		      <font color = White><center><b>spectra</b></center></font>
	          <center><img src=spectra.webp height=200 width=250></center>";
      }
		
   }
   else if($p2 > $p1){
      if($time2 == "frankie"){
         echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
		      <font color = White><center><b>frankie</b></center></font>
	          <center> <img src=frankie.jpg height=200 width=250></center>";
      }
      else if($time2 == "lagoona"){
          echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
	            <font color = White><center><b>lagoona</b></center></font>
	            <center><img src=lagoona.webp height=200 width=250></center>";
      }
      else if($time2 == "toralei"){
          echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
	            <font color = White><center><b>toralei</b></center></font>
	            <center><img src=toralei.jpg height=200 width=250></center>";
      }

	  else if($time2 == "abbey"){
		echo "<font size=25 color = dd358a><center>Vencedor:</center></font>
			  <font color = White><center><b>abbey</b></center></font>
			  <center><img src=abbey.webp height=200 width=250></center>";
	}
   }
   else if($p1 == $p2){
      
	 
	  if($time1 == "draculaura"){
	     echo "<table align = center>
		           <tr>
					     <center><font size = 13 color = dd358a><b>EMPATE</b></font></center>
				   </tr>
		       </table>";
	  }
	  else if($time1 == "cleo"){
	     echo "<table align = center>
		           <tr>
					     <center><font size = 13 color = dd358a><b>EMPATE</b></font></center>
				   </tr>
		       </table>";
	  }
	  if($time1 == "clawdeen"){
	     echo "<table align = center>
		           <tr>
					     <center><font size = 13 color = dd358a><b>EMPATE</b></font></center>
				   </tr>
		       </table>";
	  }

	  if($time1 == "spectra"){
		echo "<table align = center>
				  <tr>
						<center><font size = 13 color = dd358a><b>EMPATE</b></font></center>
				  </tr>
			  </table>";
	 }
   }
      
?>