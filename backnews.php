<!DOCTYPE html>
<html>

<?php

  require_once 'hood/setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['isbndel']))
  {
    $isbn   = get_post($conn, 'isbndel');
    $query  = "DELETE FROM news WHERE newstrack='$isbn'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $title       = get_post($conn, 'title');
    $addate      = get_post($conn, 'date'); 	
	$addate      = date('Y-m-d', strtotime($addate));
 	$addpost     = get_post($conn, 'addpost'); 		
    $sources	 = get_post($conn, 'sources');	
	
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO news (title, date, body, sources, filename, filepath, filetype) VALUES" .
	      "('$title', '$addate', '$addpost', '$sources', '$filename', '$filepath', '$filetype')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{	
	 	
		$query    = "INSERT INTO news (title, date, body, sources) VALUES" .
	      "('$title', '$addate', '$addpost', '$sources')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
		
	 } 
  }




if (isset($_POST['btn2'])){
    $ed_title       = get_post($conn, 'edtitle');
    $ed_addate      = get_post($conn, 'edaddate'); 	
	$ed_addate      = date('Y-m-d', strtotime($ed_addate));
 	$ed_addpost     = get_post($conn, 'edaddpost'); 		
    $ed_sources	 = get_post($conn, 'edsources');	
	$newstrack	 = get_post($conn, 'ednewstrack');
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE news SET title='$ed_title', date ='$ed_addate', body='$ed_addpost', sources='$ed_sources', filename='$ed_filename', filepath='$ed_filepath', filetype='$ed_filetype' WHERE newstrack='$newstrack'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query);		
 
          }
		else{
            $query  = "UPDATE news SET title='$ed_title', date ='$ed_addate', body='$ed_addpost', sources='$ed_sources' WHERE newstrack='$newstrack'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";
				
		}
			  
	}	  


?>
 <form action="backnews.php" method="post" enctype="multipart/form-data"><pre>
     Title <input type="text" name="title">
      Date <input type="text" name="date">
      Post <textarea rows="20" cols="65" name="addpost"> </textarea>
   Sources <input type="text" name="sources">         
      
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>
  
<?php
  $query  = "SELECT * FROM news ORDER by date DESC";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>		
   		Title <?php echo $row[1]; ?> 
		Date <?php echo $row[2]; ?>  
		Sources<?php echo $row[4]; ?><br><div class="post">
		Post <br><?php echo $row[3]; ?><br></div>
		Image <br><?php echo "<img src='" . $row['filepath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backnews.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="isbndel" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backnews.php" method="post" enctype="multipart/form-data">	<pre>	
	  Title <input type="text" name="edtitle" value="<?php echo $row[1]; ?>">
	      Date <input type="text" name="edaddate" value="<?php echo $row[2]; ?>">
	   Sources <input type="text" name="edsources" value="<?php echo $row[4]; ?>">
	  Trackno. <input type="text" name="ednewstrack" value="<?php echo $row[0]; ?>"readonly>
	      Post <textarea rows="20" cols="65" name="edaddpost"><?php echo $row[3]; ?></textarea>  	      
	      
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