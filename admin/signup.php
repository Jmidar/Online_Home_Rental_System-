<?php include 'inc/header.php';?>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$fname = $fm->validation($_POST['fname']);
			$uname = $fm->validation($_POST['uname']);
			$email = $fm->validation($_POST['email']);
			$body = $fm->validation($_POST['body']);


			 $fname = mysqli_real_escape_string($db->link, $fname);
			 $uname = mysqli_real_escape_string($db->link, $uname);
			 $email = mysqli_real_escape_string($db->link, $email);
			 $body = mysqli_real_escape_string($db->link, $body);

			 	 $permited  = array('jpg', 'jpeg', 'png', 'gif');
                 $file_name = $_FILES['image']['name'];
                 $file_size = $_FILES['image']['size'];
                 $file_temp = $_FILES['image']['tmp_name'];

                 $div = explode('.', $file_name);
                 $file_ext = strtolower(end($div));
                 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                 $uploaded_image = "admin/Upload/".$unique_image;
			 $error = "";
			 if ($file_name == ""){
			 		echo "<span style='color: red;font-size: 18px;'>Field must not be Empty...!!!</span>";
			 }elseif(empty($fname)){
			 		$error = "Full name must not be empty...!!!";
			 }elseif (empty($uname)){
			 		$error = "Last name must not be empty...!!!";			 	
			 }elseif (empty($email)){
			 		$error = "Email must not be empty...!!!";
			 }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			 		$error = "Invalid Email address...!!!";
			 }elseif ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!
                             </span>";
             } elseif (in_array($file_ext, $permited) === false) {
                     echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
             }else{
			 		//$msg = "Successfully compled";
             	move_uploaded_file($file_temp, $uploaded_image);
             	//$role = 0;
			 	$query = "INSERT INTO tbl_tbl_user(`image`, fname, uname, email, body, role) VALUES('$uploaded_image', '$fname', '$uname', '$email', '$body', '0')";
			 	//var_dump($query);
			 	$inserted_row = $db->INSERT($query);

			 		if ($inserted_row){
			 			$msg = "Registation compled...";
			 			//echo "<span style='color: green'>Data inserted...</span>";
			 		}else {
			 			$error = "Registation not compled...";
			 			//echo "<span style='color: red'>Data not inserted...</span>";
			 		}

			 }
		}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Registation</h2>
			<?php
				if (isset($error)) {
					echo "<span style='color: red'>$error</span>";
				}
				if (isset($msg)) {
					echo "<span style='color: green'>$msg</span>";
				}

			?>


			<form action="" method="post">
				<table>
					<tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
				<tr>
					<td>Full Name:</td>
					<td>
					<input type="text" name="fname" placeholder="Enter Your Full Name" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td>
					<input type="text" name="uname" placeholder="Enter Your username" required="1"/>
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="text" name="email" placeholder="Enter Email Address" required="1"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="SignUp"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

</div>

<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>