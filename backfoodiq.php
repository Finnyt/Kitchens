<!DOCTYPE html>
<html>

<?php

  require_once 'setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['iqno']))
  {
    $iqno   = get_post($conn, 'iqno');
    $query  = "DELETE FROM foodiq WHERE iqno='$iqno'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $iqitem     = get_post($conn, 'iqitem');
 	$iqbody    = get_post($conn, 'iqbody'); 		
	
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO foodiq (iqitem, iqbody, filename, filetype, filepath) VALUES" .
	      "('$iqitem', '$iqbody', '$filename', '$filetype', '$filepath')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{	
	 	
		$query    = "INSERT INTO foodiq (iqitem, iqbody) VALUES" .
	      "('$iqitem', '$iqbody')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
		
	 } 
  }

if (isset($_POST['btn2'])){
	$ediqitem      = get_post($conn, 'ediqitem');
 	$ediqbody    = get_post($conn, 'ediqbody'); 		
	$iqno       = get_post($conn, 'iqno');
	
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE foodiq SET iqitem='$ediqitem', iqbody ='$ediqbody', filename='$ed_filename', 
			    filepath='$ed_filepath', filetype='$ed_filetype' WHERE iqno='$iqno'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query);		
 
          }
		else{
            $query  = "UPDATE foodiq SET iqitem='$ediqitem', iqbody ='$ediqbody' WHERE iqno='$iqno'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";
				
		}			  
	}	  

?>


 <form action="backfoodiq.php" method="post" enctype="multipart/form-data"><pre>
 	 	 IQ item<input type="text" name="iqitem">     
           IQ body text<textarea rows="20" cols="65" name="iqbody"> </textarea>   
      
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>
  
<?php
  $query  = "SELECT * FROM foodiq ORDER by iqno";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>	
		IQ item<?php echo $row[1]; ?> 
		IQ body text<br><div class="post"><?php echo $row[2]; ?><br></div>
		
		Image <br><?php echo "<img src='" . $row['filepath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backfoodiq.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="iqno" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backfoodiq.php" method="post" enctype="multipart/form-data">	<pre>	
	  IQ item<input type="text" name="ediqitem" value="<?php echo $row[1]; ?>">
	      IQ body <textarea rows="20" cols="65" name="ediqbody"><?php echo $row[2]; ?></textarea> 
	  <input type="hidden" name="iqno" value="<?php echo $row[0]; ?>"> 
      	      
	 		   <input type="hidden" name="oldfilename" value="<?php echo $row[2]; ?>">	
	 		   <input type="hidden" name="oldfilepath" value="<?php echo $row[3]; ?>">
	 		   <input type="hidden" name="oldfiletype" value="<?php echo $row[4]; ?>">
	 		        
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