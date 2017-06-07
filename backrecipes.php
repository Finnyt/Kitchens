<!DOCTYPE html>
<html>

<?php

  require_once 'hood/setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['uniqno']))
  {
    $uniqno   = get_post($conn, 'uniqno');
    $query  = "DELETE FROM recipes WHERE uniqno='$uniqno'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $recregion       = get_post($conn, 'recregion');
 	$rectitle    = get_post($conn, 'rectitle'); 		
    $recsummary	 = get_post($conn, 'recsummary');	
	$reccontributor       = get_post($conn, 'reccontributor');
	$ingredcontent = get_post($conn, 'ingredcontent');
	$prepsubhead1  = get_post($conn, 'prepsubhead1');
	$prepcontent1  = get_post($conn, 'prepcontent1');
	$prepsubhead2  = get_post($conn, 'prepsubhead2');
	$prepcontent2  = get_post($conn, 'prepcontent2');
	$prepsubhead3  = get_post($conn, 'prepsubhead3');
	$prepcontent3  = get_post($conn, 'prepcontent3');
	$prepsubhead4  = get_post($conn, 'prepsubhead4');
	$prepcontent4  = get_post($conn, 'prepcontent4');
	$prepsubhead5  = get_post($conn, 'prepsubhead5');
	$prepcontent5  = get_post($conn, 'prepcontent5');	
	
	
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO recipes (recregion, rectitle, recsummary, reccontributor, ingredcontent, 
	    prepsubhead1, prepcontent1, prepsubhead2, prepcontent2, prepsubhead3, prepcontent3, prepsubhead4, prepcontent4,
	    prepsubhead5, prepcontent5, recpicname, recpictype, recpicpath) VALUES" .
	      "('$recregion', '$rectitle', '$recsummary', '$reccontributor', '$ingredcontent', '$prepsubhead1', '$prepcontent1',
	        '$prepsubhead2', '$prepcontent2', '$prepsubhead3', '$prepcontent3', '$prepsubhead4', '$prepcontent4',
	        '$prepsubhead5', '$prepcontent5', '$filename', '$filetype', '$filepath')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{	
	 	
	    $query    = "INSERT INTO recipes (recregion, rectitle, recsummary, reccontributor, ingredcontent, 
	    prepsubhead1, prepcontent1, prepsubhead2, prepcontent2, prepsubhead3, prepcontent3, prepsubhead4, prepcontent4,
	    prepsubhead5, prepcontent5) VALUES" .
	      "('$recregion', '$rectitle', '$recsummary', '$reccontributor', '$ingredcontent', '$prepsubhead1', '$prepcontent1',
	        '$prepsubhead2', '$prepcontent2', '$prepsubhead3', '$prepcontent3', '$prepsubhead4', '$prepcontent4',
	        '$prepsubhead5', '$prepcontent5')";
			
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
		
	 } 
  }

if (isset($_POST['btn2'])){
    $edrecregion       = get_post($conn, 'edrecregion');
 	$edrectitle    = get_post($conn, 'edrectitle'); 		
    $edrecsummary	 = get_post($conn, 'edrecsummary');	
	$edreccontributor       = get_post($conn, 'edreccontributor');
	$edingredcontent = get_post($conn, 'edingredcontent');
	$edprepsubhead1	 = get_post($conn, 'edprepsubhead1');
	$edprepcontent1	 = get_post($conn, 'edprepcontent1');
	$edprepsubhead2	 = get_post($conn, 'edprepsubhead2');
	$edprepcontent2 = get_post($conn, 'edprepcontent2');
	$edprepsubhead3	 = get_post($conn, 'edprepsubhead3');
	$edprepcontent3 = get_post($conn, 'edprepcontent3');
	$edprepsubhead4 = get_post($conn, 'edprepsubhead4');
	$edprepcontent4 = get_post($conn, 'edprepcontent4');
	$edprepsubhead5 = get_post($conn, 'edprepsubhead5');
	$edprepcontent5 = get_post($conn, 'edprepcontent5');	
	$uniqno       = get_post($conn, 'uniqno');
	
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE recipes SET recregion='$edrecregion', rectitle='$edrectitle', recsummary='$edrecsummary', 
			    reccontributor='$edreccontributor', ingredcontent='$edingredcontent', prepsubhead1='$edprepsubhead1', 
			    prepcontent1='$edprepcontent1', prepsubhead2='$edprepsubhead2', prepcontent2='$edprepcontent2', 
			    prepsubhead3='$edprepsubhead3', prepcontent3='$edprepcontent3', prepsubhead4='$edprepsubhead4', 
			    prepcontent4='$edprepcontent4', prepsubhead5='$edprepsubhead5', prepcontent5='$edprepcontent5', 
			    recpicname='$ed_filename', recpicpath='$ed_filepath', recpictype='$ed_filetype' WHERE uniqno='$uniqno'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query);		
 
          }
		else{
            $query  = "UPDATE recipes SET recregion='$edrecregion', rectitle='$edrectitle', recsummary='$edrecsummary', 
			    reccontributor='$edreccontributor', ingredcontent='$edingredcontent', prepsubhead1='$edprepsubhead1', 
			    prepcontent1='$edprepcontent1', prepsubhead2='$edprepsubhead2', prepcontent2='$edprepcontent2', 
			    prepsubhead3='$edprepsubhead3', prepcontent3='$edprepcontent3', prepsubhead4='$edprepsubhead4', 
			    prepcontent4='$edprepcontent4', prepsubhead5='$edprepsubhead5', prepcontent5='$edprepcontent5' 
				WHERE uniqno='$uniqno'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";
				
		}
			  
	}	  


?>

 <form action="backrecipes.php" method="post" enctype="multipart/form-data"><pre>
 	        Region<input type="text" name="recregion">     
               Title<input type="text" name="rectitle">
          Summary <textarea rows="20" cols="65" name="recsummary"> </textarea>
          Contributor <input type="text" name="reccontributor">
           Ingredcontent<textarea rows="20" cols="65" name="ingredcontent"> </textarea>
          Prepsubhead1 <input type="text" name="prepsubhead1">
           Prepcontent1<textarea rows="20" cols="65" name="prepcontent1"> </textarea>               
          Prepsubhead2 <input type="text" name="prepsubhead2">
           Prepcontent2<textarea rows="20" cols="65" name="prepcontent2"> </textarea>
          Prepsubhead3<input type="text" name="prepsubhead3">
           Prepcontent3<<textarea rows="20" cols="65" name="prepcontent3"> </textarea>           
         Prepsubhead4<input type="text" name="prepsubhead4">
           Prepcontent4<textarea rows="20" cols="65" name="prepcontent4"> </textarea>           
          Prepsubhead5<input type="text" name="prepsubhead5">
        Prepcontent5<textarea rows="20" cols="65" name="prepcontent5"> </textarea>                     
                 
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>  

  
<?php
  $query  = "SELECT * FROM recipes ORDER by uniqno";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>
		Recregion <?php echo $row[1]; ?> 
		Rectitle <?php echo $row[2]; ?> 
		Recsummary <br><div class="post"><?php echo $row[3]; ?></div> 	
		Reccontributor <?php echo $row[4]; ?> 			
		Ingredcontent <br><div class="post"><?php echo $row[8]; ?></div> 	
		Prepsubhead1 <?php echo $row[9]; ?> 
		Prepcontent1 <br><div class="post"><?php echo $row[10]; ?></div> 	
		Prepsubhead2 <?php echo $row[11]; ?> 
		Prepcontent2 <br><div class="post"><?php echo $row[12]; ?></div> 			
		Prepsubhead3 <?php echo $row[13]; ?> 
		Prepcontent3 <br><div class="post"><?php echo $row[14]; ?></div> 			
		Prepsubhead4 <?php echo $row[15]; ?> 
		Prepcontent4 <br><div class="post"><?php echo $row[16]; ?></div> 			
		Prepsubhead5 <?php echo $row[17]; ?> 
		Prepcontent5 <br><div class="post"><?php echo $row[18]; ?></div> 			
		
		Image <br><?php echo "<img src='" . $row['recpicpath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backrecipes.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="uniqno" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backrecipes.php" method="post" enctype="multipart/form-data">	<pre>	
	  Region<input type="text" name="edrecregion" value="<?php echo $row[1]; ?>">
	      Title <input type="text" name="edrectitle" value="<?php echo $row[2];?>">
	      Summary <textarea rows="20" cols="65" name="edrecsummary"><?php echo $row[3]; ?></textarea>
	       Contributor <input type="text" name="edreccontributor" value="<?php echo $row[4]; ?>">
           Ingredcontent<textarea rows="20" cols="65" name="edingredcontent"><?php echo $row[8]; ?></textarea>
          Prepsubhead1 <input type="text" name="edprepsubhead1" value="<?php echo $row[9]; ?>">
           Prepcontent1<textarea rows="20" cols="65" name="edprepcontent1"><?php echo $row[10]; ?></textarea>          
          Prepsubhead2 <input type="text" name="edprepsubhead2" value="<?php echo $row[11]; ?>">
           Prepcontent2<textarea rows="20" cols="65" name="edprepcontent2"><?php echo $row[12]; ?></textarea>
          Prepsubhead3<input type="text" name="edprepsubhead3" value="<?php echo $row[13]; ?>">
           Prepcontent3<<textarea rows="20" cols="65" name="edprepcontent3"><?php echo $row[14]; ?></textarea>       
         Prepsubhead4<input type="text" name="edprepsubhead4" value="<?php echo $row[15]; ?>">
           Prepcontent4<textarea rows="20" cols="65" name="edprepcontent4"><?php echo $row[16]; ?></textarea>         
          Prepsubhead5<input type="text" name="edprepsubhead5" value="<?php echo $row[17]; ?>">
        Prepcontent5<textarea rows="20" cols="65" name="edprepcontent5"><?php echo $row[18]; ?></textarea>    
        	  <input type="hidden" name="uniqno" value="<?php echo $row[0]; ?>">    
	  
	       	      
	 		   <input type="hidden" name="oldfilename" value="<?php echo $row[5]; ?>">	
	 		   <input type="hidden" name="oldfilepath" value="<?php echo $row[6]; ?>">
	 		   <input type="hidden" name="oldfiletype" value="<?php echo $row[7]; ?>">
	 		        
	  		   <input type="file" name="image2">
	  		   <input type="hidden" name="edit" value="yes">
	           <input type="submit" name="btn2" value="SUBMIT EDIT">
	
	  	</pre></form>
     </div>
   </div> 
   <?php }
  
    $result->close();
  $conn->close();
  

  function get_post($conn, $var)
  {
    return $conn->real_escape_string($_POST[$var]);
  }
  
  ?>
  </html>