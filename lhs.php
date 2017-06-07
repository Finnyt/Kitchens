<nav class="lhs">
						<ul>

	<a href="news?id=<?php echo $newsrow[0]['newstrack'];?>"><li>
									<div class="block">
										<img src="images/Gajarhalwa.jpg" class="pic1">
										<h2>Street-food inspired Gaggan wins again</h2>
										<p><?php custom_echo ($newsrow[0]['body'], 70);?></p>	
						</div>
								</li></a>
	<a href="recipes?id=<?php echo $reciperow[0]['uniqno'];?>"><li>
									<div class="block">
										<img src="images/Indianspices.jpg" class="pic1">
										<h2>Heirloom Recipe: Sindhi Biryani</h2>
										<p><?php custom_echo ($reciperow[0]['recsummary'], 70); ?></p>	
						</div>

								</li></a>
	<a href="foodiq?id=<?php echo $foodiqrow[0]['iqno'];?>"><li>
									<div class="block">
										<img src="images/pipli.jpg" class="pic1">
										<h2>Pipli: The Original Pepper</h2>
										<p><?php custom_echo ($foodiqrow[0]['iqbody'], 70); ?></p>	
				                </div

								</li></a>	
	<a href="reviews?id=<?php echo $reviewsrow[1]['reviewtrack'];?>"><li>
									<div class="block">
										<img src="images/booksleeve2.jpg" class="pic1">
										<h2>Kitchen Tales from the North East</h2>
										<p><?php custom_echo ("An introduction to the thrilling culinary traditions of the seven states of North-East India. The recipes call for local ingredients and encourage", 70); ?></p>	
						</div>
								</li></a>
	<a href="about"><li>
									<div class="block">
										<img src="images/spiceroute.jpg" class="pic1">
										<h2>Hindavi: A Journey through History</h2>	
										<p><?php custom_echo ("Hindavi, The Kitchens of History presents a seamless series of events that have influenced our lives through cuisine and rituals we enjoy both in the privacy of our homes", 70); ?></p>

				</div>
								</li></a>	
						</ul>
</nav>