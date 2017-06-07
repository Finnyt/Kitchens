<?php
 

    function getCurrentUrl() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
    }
 
 function data($conn, $id)
 {
 	  $query  = "SELECT * FROM pages WHERE id= $id";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;
 } 

    function about_data($conn)
  {  		
	  $query  = "SELECT * FROM about";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;		
  }  
 
     function news_data($conn)
  {  		
	  $query  = "SELECT * FROM news ORDER by newstrack DESC LIMIT 4";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;		
  }  
  

      function news_data_id($conn, $id)
  {
  	
	  $id_secure = mysqli_real_escape_string($conn, $id);  		
	  $query  = "SELECT * FROM news WHERE newstrack = '$id_secure'";
	  $result = $conn->query($query);
	  $rows = [];
	  while ($row = $result->fetch_assoc()) 
	  $rows[] = $row;
         return $rows;			
  }  
  
        function reviews_data($conn)
  {  		
	  $query  = "SELECT * FROM reviews ORDER by reviewtrack DESC LIMIT 2";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  } 
  
          function reviews_data_id($conn, $id)
  {
  	  $id_secure = mysqli_real_escape_string($conn, $id);  	  		
	  $query  = "SELECT * FROM reviews WHERE reviewtrack = '$id_secure'";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;		
  }  
  
   
       function blog_data($conn)
  {  		
	  $query  = "SELECT * FROM blogstrip ORDER by blogtrack ASC";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;				
  }  

       function recipe_data($conn)
  {  		
	  $query  = "SELECT * FROM recipes ORDER by uniqno ASC LIMIT 1";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  }  

       function recipe_data_id($conn, $id)
  {
  	  $id_secure = mysqli_real_escape_string($conn, $id);  	  		
	  $query  = "SELECT * FROM recipes WHERE uniqno = '$id_secure'";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  }  



       function foodiq_data($conn)
  {  		
	  $query  = "SELECT * FROM foodiq ORDER by iqno DESC LIMIT 1";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  }  
  
        function foodiq_data_id($conn, $id)
  {
  	  $id_secure = mysqli_real_escape_string($conn, $id);  	  		
	  $query  = "SELECT * FROM foodiq WHERE iqno = '$id_secure'";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  }  
  
         function events_data($conn)
  {  		
	  $query  = "SELECT * FROM events ORDER by eventno DESC";
	  $result = $conn->query($query);
	$rows = [];
	while ($row = $result->fetch_assoc()) 
	$rows[] = $row;
      return $rows;			
  }  

   function events_data_id($conn, $id)
  {
  	  $id_secure = mysqli_real_escape_string($conn, $id);  	  		
	  $query  = "SELECT * FROM events WHERE eventno = '$id_secure'";
	  $result = $conn->query($query);
	  $rows = [];
	  while ($row = $result->fetch_assoc()) 
	  $rows[] = $row;
         return $rows;	
  }  
  

function search($conn, $search_term) {
		    $sanitized =  $conn->real_escape_string($search_term);
		
		    $query = $conn->query("(SELECT newstrack as id, title, body, date, 'news' AS source FROM news WHERE title LIKE '%{$sanitized}%' OR body LIKE '%{$sanitized}%' OR sources LIKE '%{$sanitized}%' 
		      OR date LIKE '%{$sanitized}%')
			  UNION
			  (SELECT eventno as id, eventname AS title, eventsumm AS body, eventdate AS date, 'events' AS source FROM events WHERE eventname LIKE '%{$sanitized}%' OR eventsumm LIKE '%{$sanitized}%' OR eventdate LIKE '%{$sanitized}%')
			  UNION
			  (SELECT uniqno as id, rectitle AS title, recsummary AS body, '', 'recipes' AS source FROM recipes WHERE rectitle LIKE '%{$sanitized}%' OR recsummary LIKE '%{$sanitized}%')
			  UNION
			  (SELECT reviewtrack as id, bookname AS title, revbody AS body, '', 'reviews' AS source FROM reviews WHERE bookname LIKE '%{$sanitized}%' OR revbody LIKE '%{$sanitized}%' OR revsource LIKE '%{$sanitized}%')
			  UNION
			  (SELECT iqno as id, iqitem AS title, iqbody AS body, '', 'foodiq' AS source FROM foodiq WHERE iqitem LIKE '%{$sanitized}%' OR iqbody LIKE '%{$sanitized}%')");
		
		    if ( ! $query->num_rows ) {
		      return false;
		    }
		    
		 $rows = array(); // ADD THIS
		    while( $row = $query->fetch_object() ) {
		      $rows[] = $row;
		    }
		    
		    $search_results = array(
		      'count' => $query->num_rows,
		      'results' => $rows
		    );
		
		    return $search_results;
  }





	function custom_echo($x, $length)
	{
	  if(mb_strlen($x,"UTF-8")<=$length)
	  {
	    echo $x;
	  }
	  else
	  {
	    $y=mb_substr($x,0,$length, 'UTF-8') . ' ...<br>';
	    echo $y;
	  }
	}

 
 ?>
 