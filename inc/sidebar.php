<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>

					<?php
						$query = "SELECT * FROM `tbl_category`";
						$catpost = $db->select($query);
						if($catpost){
							while ($catresult = $catpost->fetch_assoc()){
					?>
						<li><a href="posts.php?category=<?php echo $catresult['name']; ?>"><?php echo $catresult['name']; ?></a></li>
						
						<?php }}else{ ?>
								<li>No Category list</li>
						<?php }	?>					
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest Post</h2>
					<?php
						$query = "select * from tbl_post limit 4";
						$post = $db->select($query);
						if($post){
							while ($result = $post->fetch_assoc()){
					?>
					<div class="popular clear">
						<h3><a href=" post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['id'];?>">
							<img src="admin/<?php echo $result['image'];?>" alt="post image"/></a>
						<?php echo $result['bedroom']; ?> Bedroom<br>
						<?php echo $result['bathroom']; ?> Bathroom<br>
						Location: <?php echo $result['location']; ?><br>
						<!-- <?php echo $fm->textShorten($result['body'], 120); ?> -->
					</div>
					
					<?php } }else{ header("Location: 404.php");}?>
	
			</div>
			
		</div>