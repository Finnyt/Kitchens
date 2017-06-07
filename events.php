<?php 
require_once ('prebody.php');
?>	
	
    <div class="contentwrap">
			<article>
				<a href="events"><h1>- Events - </h1></a>
				
				
				<?php 
				if (isset($_REQUEST['id'])) {// user gets here by clicking on link with id
				//This pulls out the required data to populate the page of the url generated in later loop:
                $id_raw = trim(htmlentities($_REQUEST["id"]));
				$data = events_data_id($conn, $id_raw);
				?>
        			<h2><?php echo $data[0]['eventname']; ?></h2>
        			<img class="eventsimage" src="<?php echo $data[0]['filepath'];?>" style="display: block; margin: 0 auto; max-width: 100%;">
        			<p><?php echo $data[0]['eventdate']; ?></p>
        			<p><?php echo $data[0]['eventsumm']; ?></p>

<div
  class="fb-like" 
  data-share="true"
  style="height: 19px; overflow: hidden;"
</div>
				
						
				<?php }
				else {					
					
						if(isset($_GET["page"])){
						$page = intval($_GET["page"]);
						}	
						else {
						$page = 1;
						}	
							
						$perpage = 3;
						$calc = $perpage * $page;
						$start = $calc - $perpage;
						$result2 = mysqli_query($conn, "select * from events ORDER by eventno DESC limit $start, $perpage");
						$rows = mysqli_num_rows($result2);				
						
				
				//This generates and displays urls for the result pages:
				if($rows){
					$i = 0;
					while($events = mysqli_fetch_assoc($result2)) {?>											
						<a href="events?id=<?php echo $events['eventno'];?>"><h2 style="margin-bottom: 0em;"><?php echo $events['eventname'];?></h2></a>
						<img src="<?php echo $events['filepath'];?>" style="float: right; max-height: 5em; margin-left: 0.5em; margin-top: 1.6em;">
						<p><?php custom_echo($events['eventsumm'], 250);?></p>
					<?php }
				}	

				if(isset($page))
				{
					$result2 = mysqli_query($conn,"select count(*) as Total from events");//no. of records in a table
					$rows = mysqli_num_rows($result2); //no. of rows in the result
			
					if($rows)
					{
					$rs = mysqli_fetch_assoc($result2);
					$total = $rs["Total"]; //last row in the result?
					}
			
					$totalPages = ceil($total / $perpage);

			
				        if($page <=1 ){

					}
					else
					{
					$j = $page - 1;
					echo "<span><a href='?page=$j'>< Prev</a></span>";
					}

					if($page == $totalPages ){

					}
		
					else{
					$j = $page + 1;
					echo "<span><a href='?page=$j'>Next></a></span>";
					}
				}
			}?>
			
		
		
			
			</article>	
			
<?php 
		require_once ('lhs.php');
		require_once ('rhs.php');
		?>
		
    </div> 
	
<?php 
require_once ('innerfooter.php');
?>