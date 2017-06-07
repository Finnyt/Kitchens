<!DOCTYPE html>
<html>

<?php

  require_once 'setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['blogtrack']))
  {
    $blogtrack   = get_post($conn, 'blogtrack');
    $query  = "DELETE FROM blogstrip WHERE blogtrack='$blogtrack'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $title       = get_post($conn, 'title');
    $addate      = get_post($conn, 'timespan'); 	
 	$addpost     = get_post($conn, 'addpost'); 	
	
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO blogstrip (title, timespan, descript, filename, filepath, filetype) VALUES" .
	      "('$title', '$addate', '$addpost', '$filename', '$filepath', '$filetype')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{		 	
		$query    = "INSERT INTO blogstrip (title, timespan, descript) VALUES" .
	      "('$title', '$addate', '$addpost')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";		
	 } 
  }




if (isset($_POST['btn2'])){
    $ed_title       = get_post($conn, 'edtitle');
    $ed_addate      = get_post($conn, 'edtimespan'); 	
 	$ed_addpost     = get_post($conn, 'edaddpost'); 		
	$blogtrack	 = get_post($conn, 'edblogtrack');
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE blogstrip SET title='$ed_title', timespan ='$ed_addate', descript='$ed_addpost' filename='$ed_filename', filepath='$ed_filepath', filetype='$ed_filetype' WHERE blogtrack='$blogtrack'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query); 
          }
		
		else{
            $query  = "UPDATE blogstrip SET title='$ed_title', timespan ='$ed_addate', descript='$ed_addpost' WHERE blogtrack='$blogtrack'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";				
		}
			  
	}	  


?>
 <form action="backblog.php" method="post" enctype="multipart/form-data"><pre>
     Title <input type="text" name="title">
  Timespan <input type="text" name="timespan">
      Post <textarea rows="20" cols="65" name="addpost"> </textarea>
     
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>
  
<?php
  $query  = "SELECT * FROM blogstrip ORDER by blogtrack DESC";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>		
   		Title <?php echo $row[1]; ?> 
		Timespan <?php echo $row[2]; ?><div class="post">  
		Post <br><?php echo $row[3]; ?><br></div>
		Image <br><?php echo "<img src='" . $row['filepath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backblog.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="blogtrack" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backblog.php" method="post" enctype="multipart/form-data">	<pre>	
	  Title <input type="text" name="edtitle" value="<?php echo $row[1]; ?>">
   Timespan <input type="text" name="edtimespan" value="<?php echo $row[2]; ?>">
	   Post <textarea rows="20" cols="65" name="edaddpost"><?php echo $row[3]; ?></textarea>    
	  Trackno. <input type="text" name="edblogtrack" value="<?php echo $row[0]; ?>"readonly>
	      
	      
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