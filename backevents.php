<!DOCTYPE html>
<html>

<?php

  require_once 'hood/setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['eventno']))
  {
    $eventno   = get_post($conn, 'eventno');
    $query  = "DELETE FROM events WHERE eventno='$eventno'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $eventname       = get_post($conn, 'eventname');
    $eventdate      = get_post($conn, 'eventdate'); 	
 	$eventsumm     = get_post($conn, 'eventsumm'); 			
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO events (eventname, eventdate,eventsumm, filename, filepath, filetype) VALUES" .
	      "('$eventname', '$eventdate', '$eventsumm', '$filename', '$filepath', '$filetype')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{	
	 	
		$query    = "INSERT INTO events (eventname, eventdate, eventsumm) VALUES" .
	      "('$eventname', '$eventdate', '$eventsum')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
		
	 } 
  }


if (isset($_POST['btn2'])){
    $edeventname       = get_post($conn, 'edeventname');
    $edeventdate     = get_post($conn, 'edeventdate'); 	
 	$edeventsumm   = get_post($conn, 'edeventsumm'); 		
	$eventno	 = get_post($conn, 'eventno');
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE events SET eventname='$edeventname', eventdate ='$edeventdate', eventsumm='$edeventsumm', filename='$ed_filename', filepath='$ed_filepath', filetype='$ed_filetype' WHERE eventno='$eventno'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query);		
 
          }
		else{
            $query  = "UPDATE events SET eventname='$edeventname', eventdate='$edeventdate', eventsumm='$edeventsumm' WHERE eventno='$eventno'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";
				
		}
			  
	}	  


?>
 <form action="backevents.php" method="post" enctype="multipart/form-data"><pre>
    Eventname <input type="text" name="eventname">
      Date <input type="text" name="eventdate">
      Summary <textarea rows="20" cols="65" name="eventsumm"> </textarea>
            
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>
  
<?php
  $query  = "SELECT * FROM events ORDER by eventno";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>		
   		Eventname <?php echo $row[1]; ?> 
		Date <?php echo $row[2]; ?><div class="post">
		Summary <br><?php echo $row[3]; ?><br></div>
		Image <br><?php echo "<img src='" . $row['filepath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backevents.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="eventno" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backevents.php" method="post" enctype="multipart/form-data">	<pre>	
	  Eventname <input type="text" name="edeventname" value="<?php echo $row[1]; ?>">
	      Event Date <input type="text" name="edeventdate" value="<?php echo $row[2]; ?>">
	  Eventno.<input type="text" name="eventno" value="<?php echo $row[0]; ?>"readonly>
	      Summary<textarea rows="20" cols="65" name="edeventsumm"><?php echo $row[3]; ?></textarea>  	      
	      
	 		   <input type="hidden" name="oldfilename" value="<?php echo $row[4]; ?>">	
	 		   <input type="hidden" name="oldfilepath" value="<?php echo $row[5]; ?>">
	 		   <input type="hidden" name="oldfiletype" value="<?php echo $row[6]; ?>">
	 		        
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