<?php 
require_once ('innerheader.php');
session_start(); 
?>	
    <div class="contentwrap">
			<article>
				<h1>- Search Results - </h1>
				
				<?php 
			
							if(isset($_SESSION['search_output']) && is_array($_SESSION['search_output'])) 
							{ 
							echo $_SESSION['search_output']['count']. " result(s) found:<br>";
							foreach($_SESSION['search_output']['results'] as $value){ 
							switch($value->source){
								case 'news':?>									
							<a href="news.php?id=<?php echo $value->id;?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $value->title;?></h2></a><br>
							<?php echo $value->date; echo"<br>";
									custom_echo($value->body, 100); echo"<br>";
									break;
								case 'events':?>
							<a href="events.php?id=<?php echo $value->id;?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $value->title;?></h2></a><br>
							<?php echo $value->date; echo"<br>";
									custom_echo($value->body, 100); echo"<br>";							
									break;
								case 'reviews':?>
							<a href="reviews.php?id=<?php echo $value->id;?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $value->title;?></h2></a><br>
							<?php   custom_echo($value->body, 100); echo"<br>";						
									break;	
								case 'recipes':?>
							<a href="recipes.php?id=<?php echo $value->id;?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $value->title;?></h2></a><br>
							<?php    custom_echo($value->body, 100); echo"<br>";				
									break;
								case 'foodiq':?>
							<a href="foodiq.php?id=<?php echo $value->id;?>"><h2 style="font-size: 1.1em; margin-bottom: -0.6em;"><?php echo $value->title;?></h2></a><br>
							<?php    custom_echo($value->body, 100); echo"<br>";				
									break;								}		
							echo"<br>";
									}
							}
							else
							echo "Sorry, no results found. Why not take a stroll around the website. 
							You might find something that interests you. Maybe you just wish to send across
							a mail to the kitchens of Hindavi? Write to us at";	?>
							
					
			</article>	
			
		<?php 
		require_once ('lhs.php');
		require_once ('rhs.php');
		?>
	
    </div> 
	
<?php 
require_once ('innerfooter.php');
?>