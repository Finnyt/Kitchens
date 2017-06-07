<?php 
require_once ('prebody.php');
?>	
	
    <div class="contentwrap">
			<article>
				<a href="recipes"><h1>- Recipes - </h1></a>				
				
				<?php 
				if (isset($_REQUEST['id'])) {// user gets here by clicking on link with id
                $id_raw = trim(htmlentities($_REQUEST["id"]));
                $data = recipe_data_id($conn, $id_raw);
				?>
        		
        			
        			<h2><?php echo $data[0]['rectitle']; ?></h2>
        			<p><?php echo $data[0]['recsummary']; ?></p>
                                <img class="recipepic" src="<?php echo $data[0]['recpicpath'];?>" style="float: right; max-width: 16em;">
        			<h3>Main Ingredients:</h3>        			
        			<p><?php echo $data[0]['ingredcontent']; ?></p>
        			<h3>Preparation:</h3>
					<h4><?php echo $data[0]['prepsubhead1']; ?></h4>
					<p><?php echo $data[0]['prepcontent1']; ?></p>
					<h4><?php echo $data[0]['prepsubhead2']; ?></h4>
					<p><?php echo $data[0]['prepcontent2']; ?></p>
					<h4><?php echo $data[0]['prepsubhead3']; ?></h4>
					<p><?php echo $data[0]['prepcontent3']; ?></p>
					<h4><?php echo $data[0]['prepsubhead4']; ?></h4>
					<p><?php echo $data[0]['prepcontent4']; ?></p>					
					<h4><?php echo $data[0]['prepsubhead5']; ?></h4>
					<p><?php echo $data[0]['prepcontent5']; ?></p>
					
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
						$result2 = mysqli_query($conn, "select * from recipes limit $start, $perpage");
						$rows = mysqli_num_rows($result2);				
						
				
				//This generates and displays urls for the result pages:
				if($rows){
					$i = 0;	
					
				while($recipe = mysqli_fetch_assoc($result2)) {?>	
				
				<a href="?id=<?php echo $recipe['uniqno'];?>"><h2 style="margin-bottom: -0.5em;"><?php echo $recipe['rectitle'];?></h2></a>
				<img class="recbrief" src="<?php echo $recipe['recpicpath'];?>" style="float: right; max-width: 6.5em; position: relative; top: 0.5em;">
				<p class="subhead"><?php custom_echo($recipe['recsummary'], 250); ?></p>
				
				
			<?php }
				}	

				if(isset($page))
				{
					$result2 = mysqli_query($conn,"select count(*) as Total from recipes");//no. of records in a table
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
					echo "<br><span><a href='?page=$j'><b>< Prev</b></a></span>";
					}

					if($page == $totalPages ){

					}
		
					else{
					$j = $page + 1;
					echo "<span><a href='?page=$j'><b style='float: right;'>Next></b></a></span>";
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