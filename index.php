<?php
include ('hood/setup.php');
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Hindavi: The Kitchens of Indian History</title>
    <meta name="viewport" content="width=device-width,initiaprefl-scale=1">
    <link rel="stylesheet" href="css/style.css">
<!--[if IE ]>
  <link rel="stylesheet" href="css/iestyle.css">
<![endif]-->
    <link rel="stylesheet" href="css/fontawesome-stars.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
        <script type="text/javascript" src="js/prefixfree.min.js"></script>
	<script type="text/javascript" src="js/bpen.drawer.js"></script>
        <script type="text/javascript">
			var drawer;
			  window.addEventListener("load", function(){
				drawer = bpen.drawer("mainMenu",
				  {
					Items : [
					  {
						Text : "news",
						Url : "news"
					  },
					  	{
						Text : "events",
						Url : "events"
					  },
					  {
						Text: "recipes",
						Url : "recipes"
					  },
					  {
						Text: "reviews",
						Url : "reviews"
					  },
					  {
						Text: "food iq",
						Url : "foodiq"
					  },
					  {
						Text: "blog",
						Url : "?page=8"
					  }
					],
					Anchor : 'right'
				  }
				);
			  },false);

		</script>
	
		<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Caveat:700'>		
		<link href='https://fonts.googleapis.com/css?family=Kalam:700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400italic,300italic' rel='stylesheet' type='text/css'>


<meta property="fb:app_id" content="555839144565826"/>
<meta property="og:site_name" content=""/>				  
<meta property="og:title" content="Hindavi: The Kitchens of Indian History" />
<meta property="og:image" content="/images/hindavi-beta.jpg"/>
<meta property="og:description" content="Hindavi, The Kitchens of History presents a seamless series of events that have influenced our lives through cuisine and rituals we enjoy both in the privacy of our homes when we entertain and at opulent banquets."/>


    </head>

  <body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=555839144565826";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<?php
session_start(); 
if ( isset( $_GET['s'] ) ) {
  $search_results='';
  $search_term = htmlspecialchars($_GET['s'], ENT_QUOTES);
  $search_results = search($conn, $search_term);  
  }
?>

<form role="search" method="get" class="search-form" action="">
				<label>
				<input type="search" class="search-field" placeholder="Search" value="searchitem" name="s">
				</label>
				<input type="submit" class="search-submit" value="Search">				
</form>

  <?php if (isset($search_results)) : 
		$_SESSION['search_output'] = $search_results; 
		header("Location: searchresults.php"."?s=".$search_term);
		exit;
   endif; 
   ?>


    <header><div id="hdr">
			<img class="logo" src="images/newmain6.png" 
			srcset="images/newmain6.png 1380w,
             images/newmain6.png 800w,	
             images/newmain6.png 600w"			
			/>
		
		<a href="https://www.facebook.com/KitchensOfHistory/?ref=bookmarks"target="_blank">
		<img class="fbicon"  style="width: 40px;" src="images/fbiconlarge.png"
		 srcset="images/fbiconlarge.png 1380w,
				 images/fbiconlarge.png 640w,
				 images/fbiconlarge.png 320w"
		/></a>
	 
	 
		<a id="arr_downpoint" href="index.php#featurespoint">
		<img class="arr_down"  src="images/arrowdown2.svg" 
		srcset="images/arrowdown2.svg 1380w,
				 images/arrowdown2.svg 640w,	
				 images/arrowdown2.svg 320w"/>
                </a>
		
		
		<div id="mainMenu"></div>
</div>
<div id="featurespoint"></div>   
<div id="menu-wrapper">
  <nav id="menu">
    <div class="menu">
      <ul class="menu">
        <li>
          <a href="#"><img class="logoflag" src="images/logoflag.png"></a>
        </li>
      </ul>
    </div>
  </nav>
</div>
    </header>
  

    <div class="mobeheader">
			<div class="mainheader">
			<a href="home"><img class="logo" src="images/logoinner.png"></a>
				<img class="detail1" src="images/detail1.png">
			</div>
			
			<div class="subheader"></div>
			
	 <div id="menu-wrapper">
			  <nav id="menulogo">
				  <ul class="menulogo">
					<li>
					  <a href="#"><img id="logoflag" src="images/logoflag.png"></a>
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
			  
			  
    </div>




 <div class="herowrapper">

   
	<div class="wrapper1">
		  <section class="features">

				<span class="sticker">
					<img class="tab1special" src="images/featurestab.png" alt="main">
					<p class="overview">overview</p>
				</span>

				<div class="main_image">		  
					<a href="news?id=<?php echo $newsrow[0]['newstrack'];?>" class="present"><img src="images/Gajarhalwa.jpg" /></a>
					<div class="desc">
						<div class="block">
							<h2>Indian street-food inspired Gaggan wins again</h2>
 				                 </div>
					</div>
				</div>
				
				
				<div class="image_thumb">
				<ul>
						
                                                <li>
							<a href="images/Gajarhalwa.jpg"></a> <a data-href="news?id=<?php echo $newsrow[0]['newstrack'];?>"></a>
							<div class="block">
                                                        <h2>Indian street-food inspired Gaggan wins again</h2>
                                                        </div>
						</li>
						<li>
							<a href="images/Indianspices.jpg"></a> <a data-href="recipes?id=<?php echo $reciperow[0]['uniqno'];?>"></a>
							<div class="block">
								<h2>Heirloom Recipe: Sindhi Biryani</h2>
																	
							</div>
						</li>
						<li>
							<a href="images/pipli.jpg"></a> <a data-href="foodiq?id=<?php echo $foodiqrow[0]['iqno'];?>"></a>
							<div class="block">
								<h2>Pipli: The Original Pepper</h2><br>
																
					                </div>
						</li>	
						<li>
							<a href="images/booksleeve2.jpg"></a> <a data-href="reviews?id=<?php echo $reviewsrow[1]['reviewtrack'];?>"></a>
							<div class="block">
								<h2>Kitchen Tales from the North East</h2><br>
																
							</div>
						</li>
						<li>
							<a href="images/spiceroute.jpg"></a> <a data-href="about"></a>
							<div class="block">
								<h2>Hindavi: A Journey through History</h2><br>
 					                 </div>
						</li>	
				</ul>	
			</div>	

			</section>	
		   
		    <section class="eventkyf">
						<span class="sticker">
							<img class="tab1" src="images/featurestab.png" alt="main"> 
							<a href="events">events</a>
						</span>	
							<a class="monthevent" style="background-image:url('<?php echo $eventsrow[0]['filepath'];?>')" href="/events?id=<?php echo $eventsrow[0]['eventno'];?>"></a>	
						
						<div class="otherevents">
								<a class="event2" style="background-image:url('<?php echo $eventsrow[1]['filepath'];?>');" href="/events.php?id=<?php echo $eventsrow[1]['eventno'];?>"></a>
									 						
								<a class="event3" style="background-image:url('<?php echo $eventsrow[2]['filepath'];?>');" href="/events.php?id=<?php echo $eventsrow[2]['eventno'];?>"></a>
									 
						</div>  			

			</section>
			
	
		</div>	
	
	<div class="wrapper2">
		<section class="news">
		
					<img class="tab2" src="images/newstab.png" alt="main"> 	
                                        <img class="tab6" src="images/featurestab.png" alt="main" style="display: none;">
					<a href="news">news</a>
				
				<div class="art1">
					<a href="news?id=<?php echo $newsrow[0]['newstrack'];?>"><h4 class="newshead"><?php echo $newsrow[0]['title'];?></h4><div style="height: 0.8em;"></div>
					<img src="<?php echo $newsrow[0]['filepath'];?>" class="pic1"></a>
					<p class="newspara"><?php custom_echo ($newsrow[0]['body'], 735);?></p><br>	                                                                
				</div>
				
					<img class="tab3" src="images/newstab.png" alt="main"> 	
					<a href="news">news</a>
				
				<div class="art2">
					<a href="news?id=<?php echo $newsrow[2]['newstrack'];?>"><h4 class="newshead"><?php echo $newsrow[2]['title'];?></h4><div style="height: 0.8em;"></div>
					<img src="<?php echo $newsrow[2]['filepath'];?>" class="pic2"></a> 
					<p class="newspara"><?php custom_echo ($newsrow[2]['body'], 795);?></p>			
				</div>	
				<div class="art3"><br>	
					<a href="news?id=<?php echo $newsrow[1]['newstrack'];?>"><h4 class="newshead"><h4 class="newshead"><?php echo $newsrow[1]['title'];?></h4><div style="height: 0.8em;"></div>
					<img src="<?php echo $newsrow[1]['filepath'];?>" class="pic3"></a>
					<p class="newspara"><?php custom_echo ($newsrow[1]['body'], 650);?></p> 	
				</div>
		</section>		

		<section class="bookiewook">
		<span class="sticker">
			<img class="tab1" src="images/featurestab.png" alt="main"> 
			<a href="reviews"><p>reviews</p></a>
		</span>
		
				<div class="bookreview bookreview1">					
					<a href="reviews?id=<?php echo $reviewsrow[0]['reviewtrack'];?>">
                                            <img src="<?php echo $reviewsrow[0]['filepath'];?>">
                                           <div class="ex1cover"> 
                                          <select id="example" style="margin-left: -70px;">
					     <option value="1">1</option>
					     <option value="2">2</option>
					     <option value="3">3</option>
					     <option value="4">4</option>
					     <option value="5">5</option>
					</select></div>   
                                         </a>
					<p class="bookpara"><?php echo $reviewsrow[0]['revbody'];?></p>
                                                                                            <br><br style="line-height: 25px;"> 

					<hr>
				</div>	
 				
				<div class="bookreview bookreview2">	
				<a href="reviews?id=<?php echo $reviewsrow[1]['reviewtrack'];?>">
 					<img src="<?php echo $reviewsrow[1]['filepath'];?>"> 
                                        <div class="ex2cover"> 
					    <select id="example2">
					               <option value="1">1</option>
						       <option value="2">2</option>
					               <option value="3">3</option>
					               <option value="4">4</option>
					               <option value="5">5</option>
					   </select>
					</div>                                                                               
                                                                                                     
                                </a>                                                     
					<p class="bookpara"><?php echo $reviewsrow[1]['revbody'];?></p>

			</div>
			</section>	
		
	</div>	
	
	<div class="wrapper3">
		<section class="recipe">	
			<img class="rectab" src="images/recipetab.png" alt="main"> 
			<a href="recipes">heirloom recipes</a>

			
			<div class="ingredprepandpic">
					<div class="procedure">
						<h5 class="procedurehead">INGREDIENTS</h5><br>
						<p class="recipecontent"><?php echo $reciperow[0]['ingredcontent']; ?>
					</div>
					<div class="intro">
						<p class="recipepara"><i><?php echo $reciperow[0]['recsummary']; ?></i></p> 
						<a href="recipes?id=<?php echo $reciperow[0]['uniqno'];?>">
                                                      <img class="recipeimage" src="<?php echo $reciperow[0]['recpicpath']; ?>" alt="comingsoon">
                                                </a>                                                    
					</div>	
			</div>
			
			<div class="mainprep">
						<h5 class="procedurehead">PREPARATION</h5><br>	
						<h5 class="mainprephead"><?php echo $reciperow[0]['prepsubhead1']; ?></h5>
						<p class="prepcontent"><?php echo $reciperow[0]['prepcontent1']; ?><br></p>

						<h5 class="mainprephead"><?php echo $reciperow[0]['prepsubhead2']; ?></h5>
						<p class="prepcontent"><?php echo $reciperow[0]['prepcontent2']; ?></p>

						<h5 class="mainprephead"><?php echo $reciperow[0]['prepsubhead3']; ?></h5>
						<p class="prepcontent" style="-webkit-column-break-inside: avoid;"><?php echo $reciperow[0]['prepcontent3']; ?></p>

						<h5 class="mainprephead"><?php echo $reciperow[0]['prepsubhead4']; ?></h5>
						<p class="prepcontent"><?php echo $reciperow[0]['prepcontent4']; ?></p>

						<h5 class="mainprephead"><?php echo $reciperow[0]['prepsubhead5']; ?></h5>
						<p class="prepcontent"><?php echo $reciperow[0]['prepcontent5']; ?><br> 
</p>
			</div>

	</section>		
	
		<section class="utensil_promospace">
		<span class="sticker">
			<img class="tab1" src="images/featurestab.png" alt="main"> 
			<a href="foodiq"><p>food iq</p></a>
		</span>	
			    <div class="utensil"> 
 					<a href="foodiq?id=<?php echo $foodiqrow[0]['iqno'];?>">
                                             
                                               <img class="bookimage" src="<?php echo $foodiqrow[0]['filepath']; ?>"/>
                                                                               
                                        </a>
					<div class="utensilreview">
						<p><?php custom_echo ($foodiqrow[0]['iqbody'], 295); ?></p>
						<br><br><a href="foodiq?id=<?php echo $foodiqrow[0]['iqno'];?>"><img src="images/foodiqflourish2.svg" style="position: relative; bottom: 0.6em;"></a>
					</div>
					<a href="foodiq?id=<?php echo $foodiqrow[0]['iqno'];?>">
                                           <div class="bookshadow"></div>
					</a>
			     </div>	
				<div class="promospace"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div></div> 
		</section>	

	</div>		

	
	<div class="carwrap wrapper4">
			<div class="carousel carousel1">
				<img src="<?php echo $blogrow[0]['filepath'];?>" alt="car1" width="225" height="300" />
				<div>
					<h3><?php echo $blogrow[0]['title'];?></h3><br><h4><?php echo $blogrow[0]['timespan'];?></h4><br>
					<p><?php echo $blogrow[0]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel2">
				<img src="<?php echo $blogrow[1]['filepath'];?>" alt="car2" width="230" height="300" />
				<div>
					<h3><?php echo $blogrow[1]['title'];?></h3><br><h4>(1508-1556)</h4><br>
					<p><?php echo $blogrow[1]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel3">
				<img src="<?php echo $blogrow[2]['filepath'];?>" alt="car5" width="225" height="295" />
				<div>
					<h3><?php echo $blogrow[2]['title'];?></h3><br><h4>(1556-1605)</h4><br>
					<p><?php echo $blogrow[2]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel4">
				<img src="<?php echo $blogrow[3]['filepath'];?>" alt="car6" width="225" height="285" />
				<div>
					<h3><?php echo $blogrow[3]['title'];?></h3><br><h4>(1605-1627)</h4><br>
					<p><?php echo $blogrow[3]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel5">
				<img src="<?php echo $blogrow[4]['filepath'];?>" alt="car8" width="275" height="255" />
				<div>
					<h3><?php echo $blogrow[4]['title'];?></h3><br><h4>(1628-1658)</h4><br>
					<p><?php echo $blogrow[4]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel6">
				<img src="<?php echo $blogrow[5]['filepath'];?>" alt="car8" width="240" height="330" />
				<div>
					<h3><?php echo $blogrow[5]['title'];?></h3><br><h4>(1615-1659)</h4><br>	
					<p><?php echo $blogrow[5]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>

				<img class="blogtab" src="images/blogtab.png" alt="main"> 
				<a href="https://kitchensofhistory.wordpress.com/">the original blog series</a>
			
		</div>	
	
<div class="carwrap wrapper5">
		   <div class="carousel carousel3">
				<img src="<?php echo $blogrow[2]['filepath'];?>" alt="car5" width="225" height="295" />
				<div>
					<h3><?php echo $blogrow[2]['title'];?></h3><br><h4>(1556-1605)</h4><br>
					<p><?php echo $blogrow[2]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel4">
				<img src="<?php echo $blogrow[3]['filepath'];?>" alt="car6" width="225" height="285" />
				<div>
					<h3><?php echo $blogrow[3]['title'];?></h3><br><h4>(1605-1627)</h4><br>
					<p><?php echo $blogrow[3]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel5">
				<img src="<?php echo $blogrow[4]['filepath'];?>" alt="car8" width="275" height="255" />
				<div>
					<h3><?php echo $blogrow[4]['title'];?></h3><br><h4>(1628-1658)</h4><br>
					<p><?php echo $blogrow[4]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel6">
				<img src="<?php echo $blogrow[5]['filepath'];?>" alt="car8" width="240" height="330" />
				<div>
					<h3><?php echo $blogrow[5]['title'];?></h3><br><h4>(1615-1659)</h4><br>	
					<p><?php echo $blogrow[5]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>

				<img class="blogtab" src="images/blogtab.png" alt="main"> 
				<a href="https://kitchensofhistory.wordpress.com/">the original blog series</a>
			
		</div>	
	
 </div>		

<div class="carwrap wrapper6">
		   <div class="carousel carousel3">
				<img src="<?php echo $blogrow[2]['filepath'];?>" alt="car5" width="225" height="295" />
				<div>
					<h3><?php echo $blogrow[2]['title'];?></h3><br><h4>(1556-1605)</h4><br>
					<p><?php echo $blogrow[2]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel5">
				<img src="<?php echo $blogrow[4]['filepath'];?>" alt="car8" width="275" height="255" />
				<div>
					<h3><?php echo $blogrow[4]['title'];?></h3><br><h4>(1628-1658)</h4><br>
					<p><?php echo $blogrow[4]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>
			<div class="carousel carousel6">
				<img src="<?php echo $blogrow[5]['filepath'];?>" alt="car8" width="240" height="330" />
				<div>
					<h3><?php echo $blogrow[5]['title'];?></h3><br><h4>(1615-1659)</h4><br>	
					<p><?php echo $blogrow[5]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>

				<img class="blogtab" src="images/blogtab.png" alt="main"> 
				<a href="https://kitchensofhistory.wordpress.com/">the original blog series</a>
			
		</div>	
	
 </div>	
<div class="carwrap wrapper7">
		  <div class="carousel carousel3">
				<img src="<?php echo $blogrow[2]['filepath'];?>" alt="car5" width="225" height="295" />
				<div>
					<h3><?php echo $blogrow[2]['title'];?></h3><br><h4>(1556-1605)</h4><br>
					<p><?php echo $blogrow[2]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>

			<div class="carousel carousel6">
				<img src="<?php echo $blogrow[5]['filepath'];?>" alt="car8" width="240" height="330" />
				<div>
					<h3><?php echo $blogrow[5]['title'];?></h3><br><h4>(1615-1659)</h4><br>	
					<p><?php echo $blogrow[5]['descript'];?></p>
					<br><p><a href="https://kitchensofhistory.wordpress.com/"><b>Visit the blog</b></a></p>
				</div>
			</div>

				<img class="blogtab" src="images/blogtab.png" alt="main"> 
				<a href="https://kitchensofhistory.wordpress.com/">the original blog series</a>
			
		</div>	
 </div>	




 
<footer>			

		
		<nav class="footerstuff">
			<ul class="foot-nav">
				<li>
					<a href="home">HOME</a>
				</li>	
				<li>
					<a href="about">ABOUT</a>
				</li>			
				<li>
					<a href="contact">CONTACT</a>
				</li>	
			</ul>
		</nav> 
		

		<p class ="footnote1"><b>&#169;</b> 2016 Hindavi, The Kitchens of Indian History</p>	<br><br> 
<!-- 		<p class ="footnote2">Content on this site is licensed under a <b>Creative Commons Attribution 4.0 License</b>.</p>
 -->


</footer>		



			


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript" src="js/jquery.barrating.min.js"></script>	


<script type="text/javascript">
   $(function() {
      $('#example').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating: 4
      });
   });
</script>



<script type="text/javascript">

   $(function() {
      $('#example2').barrating({
        theme: 'fontawesome-stars',
        readonly: true,
        initialRating: 4
      });
    });    

</script>


<script type="text/javascript">
$(function () {
  document.getElementById('menu-wrapper').style.visibility = 'hidden';
  var fixed = false;
  var topTrigger = $('#menu-wrapper').offset().top;

  $(window).scroll(function () {
    if ($(this).scrollTop() > 10) 
      document.getElementById('arr_downpoint').style.visibility = 'hidden';
    else 
      document.getElementById('arr_downpoint').style.visibility = 'visible';

   if ($(this).scrollTop() > 340){ 
     document.getElementById('menu-wrapper').style.visibility = 'visible';
     document.getElementById('hdr').style.visibility = 'hidden';}   
   else{
     document.getElementById('menu-wrapper').style.visibility = 'hidden';
     document.getElementById('hdr').style.visibility = 'visible';}     
  });
  
  
  $(document).scroll(function() {
    if( $(this).scrollTop() >= topTrigger ) {
      if( !fixed ) {
        fixed = true;
        $('#menu-wrapper').css({'position':'fixed', 'top':'0'});
      }
    } else {
      if( fixed ) {
        fixed = false;
        $('#menu-wrapper').css({'position':'absolute', 'top':''});
      }
    }
  });
});            
</script>







		<script type="text/javascript">
			$(function() {
				$('.carousel').each(function() {
					var $cfs = $(this);
					$cfs.carouFredSel({
						direction: 'up',
						circular: false,
						infinite: false,
						align: false,
						width: 275,
						height: 250,
						items: 1,
						auto: false,
						scroll: {
							queue: 'last'
						}
					});
					$cfs.hover(
						function() {
							$cfs.trigger('next');
						},
						function() {
							$cfs.trigger('prev');
						}
					);
				});

		});
</script>




<script type="text/javascript">
		var intervalId;
		var slidetime = 2500; 
		$(document).ready(function() {	
			// Comment out this line to disable auto-play
			intervalID = setInterval(cycleImage, slidetime);
			$(".main_image .desc").show(); // Show Banner
			$(".main_image .block").animate({ opacity: 0.85 }, 1 ); // Set Opacity
			$(".image_thumb ul li:first").addClass('active');
			
			
			$(".image_thumb ul li").click(function(){ 
		// Set Variables
		var imgAlt = $(this).find('img').attr("alt"); //  Get Alt Tag of Image
		var imgTitle = $(this).find('a').attr("href"); // Get Main Image URL
                var imgLink = $(this).find('a:last').attr("data-href"); // Get Main Image URL
		var imgDesc = $(this).find('.block').html(); 	//  Get HTML of block
		var imgDescHeight = $(".main_image").find('.block').height();	// Calculate height of block	
		
		if ($(this).is(".active")) {  // If it's already active, then...
			return false; // Don't click through
		} else {
			// Animate the Teaser				
			$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
				$(".main_image .block").html(imgDesc).animate({ opacity: 0.85,	marginBottom: "0" }, 250 );
				$(".main_image img").attr({ src: imgTitle , alt: imgAlt});
                                $(".main_image a").attr({ href: imgLink});
			});
		}
		
		$(".image_thumb ul li").removeClass('active'); // Remove class of 'active' on all lists
		$(this).addClass('active');  // add class of 'active' on this list only
		return false;
		
	}) .hover(function(){
		$(this).addClass('hover');
		}, function() {
		$(this).removeClass('hover');
	});
			
	  // Function to autoplay cycling of images
    function cycleImage(){
    var onLastLi = $(".image_thumb ul li:last").hasClass("active");       
    var currentImage = $(".image_thumb ul li.active");
    
    
    if(onLastLi){
      var nextImage = $(".image_thumb ul li:first");
    } else {
      var nextImage = $(".image_thumb ul li.active").next();
    }
    
    $(currentImage).removeClass("active");
    $(nextImage).addClass("active");
    
		// Duplicate code for animation
		var imgAlt = $(nextImage).find('img').attr("alt");
		var imgTitle = $(nextImage).find('a').attr("href");
                var imgLink = $(nextImage).find('a:last').attr("data-href"); // Get Main Image URL
		var imgDesc = $(nextImage).find('.block').html();
		var imgDescHeight = $(".main_image").find('.block').height();
					
		$(".main_image .block").animate({ opacity: 0, marginBottom: -imgDescHeight }, 250 , function() {
      $(".main_image .block").html(imgDesc).animate({ opacity: 0.85,	marginBottom: "0" }, 250 );
      $(".main_image img").attr({ src: imgTitle , alt: imgAlt});
      $(".main_image a").attr({ href: imgLink});
		});
  };

		});
</script>

		</body>
  </html>