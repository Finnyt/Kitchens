<!DOCTYPE html>
<html>

<?php

  require_once 'setup.php'; 
  include ('be_newscss.php');
  $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
  
  
if (isset($_POST['delete']) && isset($_POST['isbndel']))
  {
    $isbn   = get_post($conn, 'isbndel');
    $query  = "DELETE FROM news WHERE reviewtrack='$reviewtrack'";
    $result = $conn->query($query);
  	if (!$result) echo "DELETE failed: $query<br>" .
      $conn->error . "<br><br>";
  }
  
  
//var_dump($_FILES['imagine']);
if (isset($_POST['btn'])){
    $bookname       = get_post($conn, 'bookname');
 	$revbody    = get_post($conn, 'revbody'); 		
    $sources	 = get_post($conn, 'sources');	
	$rating       = get_post($conn, 'rating');
	
    if($_FILES['imagine']['error'] != UPLOAD_ERR_NO_FILE){
			$filetmp = $_FILES["imagine"]["tmp_name"];
				$filename = $_FILES["imagine"]["name"];
				$filetype = $_FILES["imagine"]["type"];
				$filepath = "images/".$filename;
				
				move_uploaded_file($filetmp, $filepath);			
	
	    $query    = "INSERT INTO reviews (bookname, revbody, revsource, revrating, filename, filetype, filepath) VALUES" .
	      "('$bookname', '$revbody', '$sources', '$rating', '$filename', '$filetype', '$filepath')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
	 }
	 else{	
	 	
		$query    = "INSERT INTO reviews (bookname, revbody, revsource, revrating) VALUES" .
	      "('$bookname', '$revbody', '$sources', '$rating')";
	    $result   = $conn->query($query);
	
	  	if (!$result) echo "INSERT failed: $query<br>" .
	      $conn->error . "<br><br>";
		
	 } 
  }

if (isset($_POST['btn2'])){
	$edbookname       = get_post($conn, 'edbookname');
 	$edrevbody    = get_post($conn, 'edrevbody'); 		
    $edsources	 = get_post($conn, 'edsources');	
	$edrating       = get_post($conn, 'edrating');
	$reviewtrack       = get_post($conn, 'reviewtrack');
	
	
	    if($_FILES['image2']['error'] != UPLOAD_ERR_NO_FILE){
				$ed_filetmp = $_FILES["image2"]["tmp_name"];
						$ed_filename = $_FILES["image2"]["name"];
						$ed_filetype = $_FILES["image2"]["type"];
						$ed_filepath = "images/".$ed_filename;
						
						move_uploaded_file($ed_filetmp, $ed_filepath);		
			   
			    $query    = "UPDATE reviews SET bookname='$edbookname', revbody ='$edrevbody', revsource='$edsources', revrating='$edrating', filename='$ed_filename', filepath='$ed_filepath', filetype='$ed_filetype' WHERE reviewtrack='$reviewtrack'";
			    $result   = $conn->query($query);
			
				  	if (!$result) echo "EDIT with image failed: $query<br>" .
				      $conn->error . "<br><br>";
	    			  $result   = $conn->query($query);		
 
          }
		else{
            $query  = "UPDATE reviews SET bookname='$edbookname', revbody ='$edrevbody', revsource='$edsources', revrating='$edrating' WHERE reviewtrack='$reviewtrack'";
			
			$result   = $conn->query($query);
					
			if (!$result) echo "EDIT with image failed: $query<br>" . $conn->error . "<br><br>";
				
		}
			  
	}	  


?>
 <form action="backreviews.php" method="post" enctype="multipart/form-data"><pre>
 	  Bookname<input type="text" name="bookname">     
           Revbody<textarea rows="20" cols="65" name="revbody"> </textarea>
          Sources <input type="text" name="sources">
            Rating<input type="text" name="rating">         
      
           <input type="file" name="imagine">
           <input type="submit" name="btn" value="Upload Image & ADD RECORD">           
  </pre></form>
  
<?php
  $query  = "SELECT * FROM reviews ORDER by reviewtrack DESC";
  $result = $conn->query($query);
  if (!$result) die ("Database access failed: " . $conn->error);

  $rows = $result->num_rows;
  
  
  while ($row = $result->fetch_array(MYSQLI_BOTH))
  {
?>
<div class="slab">	
  <div class="present"><pre>	
		Bookname <?php echo $row[1]; ?> 
		Revbody <br><div class="post"><?php echo $row[5]; ?><br></div>
		Sources <?php echo $row[6]; ?> 
		Rating<?php echo $row[7]; ?>  
		
		Image <br><?php echo "<img src='" . $row['filepath'] ." ' height='200' width='200'/>"; ?>
</pre>	
	
				  <form action="backreviews.php" method="post"><pre>
				  <input type="hidden" name="delete" value="yes">
				  <input type="hidden" name="reviewtrack" value="<?php echo $row[0]; ?>">
				  <input type="submit" value="DELETE RECORD"> 
					</pre></form></div>	
					
	<div class="edit">
			
	  <form action="backreviews.php" method="post" enctype="multipart/form-data">	<pre>	
	  Bookname <input type="text" name="edbookname" value="<?php echo $row[1]; ?>">
	      Revbody <textarea rows="20" cols="65" name="edrevbody"><?php echo $row[5]; ?></textarea> 
	   Sources <input type="text" name="edsources" value="<?php echo $row[6]; ?>">
	  <input type="hidden" name="reviewtrack" value="<?php echo $row[0]; ?>"> 
	  Rating <input type="text" name="edrating" value="<?php echo $row[7]; ?>">
      	      
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