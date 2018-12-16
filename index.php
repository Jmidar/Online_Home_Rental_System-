<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>	

	<div class="contentsection contemplete clear">

				<div class="maincontent clear">	
		
				<tr>
                            <td>
                                <label>Select your Location:</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Location</option>
                              <?php
                                $query = "SELECT * FROM tbl_Location";
                                $location = $db->select($query);
                                 if ($location){
                                    while ($result = $location->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['name']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                        </tr>
            
            

                        <tr style="margin-right: 100px;">
                        	<td>  </td>
                            <td>
                                <label>. 	 Select Range Price:</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Range</option>
                              <?php
                                $query = "SELECT * FROM tbl_price";
                                $category = $db->select($query);
                                 if ($category){
                                    while ($result = $category->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['amount']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                        </tr>
               
  </div>

  <div class="sidebar clear">
  	<h2 style="text-align: center;">Find Your Home</h2>
  </div>

		
		<div class="maincontent clear">

			<!--pagination -->
			<?php
				$per_page = 4;
				if(isset($_GET["page"])){
					$page = $_GET["page"];
				}else{
					$page = 1;
				}
				$start_form = ($page-1) * $per_page;

			?>


			<?php
				$query = "select * from tbl_post order by id desc limit $start_form, $per_page";
				$post = $db->select($query);
				//var_dump($query);

				if ($post) {
					while ($result = $post->fetch_assoc()) {

					

			?>
			<div class="samepost clear">
				<h2><a href=" post.php?id=<?php echo $result['id'];?>"><?php echo $result['title'];?></a></h2>
				<h4><?php echo $fm->formatDate($result['date']); ?>,  By <a href = "#"><?php echo $result['author'];?></a></h4>

				<a href = "#"><img src="admin/<?php echo $result['image']; ?>" alt="post image"/></a>

				<?php echo $fm->textShorten($result['body']); ?>
				<div class="readmore clear">

					<a href = "post.php?id=<?php echo $result['id']; ?>">Read More</a><br>
				</div>
		</div>
		<?PHP } ?>
		<?php 
		$query = "select * from tbl_post";
		$result = $db->select($query);
		$total_rows = mysqli_num_rows($result);
		$total_pages = ceil($total_rows/$per_page);
	    
	    echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
		for ($i=1; $i <= $total_pages; $i++){

			echo "<a href='index.php?page=".$i."'>".$i."</a>";
		};

		echo "<a href='index.php?page=$total_pages'>".'Last Page'."</a></span>"?>

		 <?php
		 	} else {
		 		header("Location:404.php");
		 	}
		 ?>

		</div>

<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/footer.php'; ?>