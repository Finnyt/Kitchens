<?php 
require_once ('setup.php');
require_once ('function.php');

$metaquery = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);
parse_str($metaquery, $params);
$testid = $params['id'];
				if (isset($testid)) {
			        $id_raw = trim(htmlentities($testid));
					$fdata = news_data_id($conn, $id_raw);
				}



?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Title</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/innerstyle2.css">

	
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Caveat:700'>		
		<link href='https://fonts.googleapis.com/css?family=Kalam:700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,300italic' rel='stylesheet' type='text/css'>

   
<meta property="fb:app_id" content="555839144565826"/>
<meta property="og:site_name" content=""/>
<meta property="og:title" content="<?php echo $fdata[0]['title']; ?>" />
<meta property="og:image" content="http://www.kitchensofindianhistory.com/<?php echo $fdata[0]['filepath'];?>"     />

 </head>

  <body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '555839144565826',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
 
 


    <header>
			<div class="mainheader">
			<img class="logo" src="images/logoinner.png">
			<img class="detail1" src="images/detail1.png">
			</div>
			
			<div class="subheader"></div>
			
	 <div id="menu-wrapper">
			  <nav id="menulogo">
				  <ul class="menulogo">
					<li>
					  <img id="logoflag" src="images/logoflag.png">
					</li>
				  </ul>
			  </nav>
	</div>
	
      <nav id="menu-opener">
			<div id="menu-opener-inner"></div>
	  </nav>
			  <nav id="menu">
				<ul id="menu-inner">
				  <a href="news" class="menu-link">
					<li>News</li>
				  </a>
				  <a href="events" class="menu-link">
					<li>Events</li>
				  </a>
				  <a href="recipes" class="menu-link">
					<li>Recipes</li>
				  </a>
				  <a href="reviews" class="menu-link">	
					<li>Reviews</li>
				  </a>
				  <a href="foodiq" class="menu-link">
					<li>FoodIQ</li>
				  </a>
				  <a href="https://kitchensofhistory.wordpress.com/" class="menu-link">
					<li>Blog</li>
				  </a>
				</ul>
			  </nav>
			  
			  
    </header>