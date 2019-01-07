<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>



        <div class="grid_10">
    
            <div class="box round first grid">
                <h2>Add New Post</h2>
             <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $title = mysqli_real_escape_string($db->link, $_POST['title']);
                $location = mysqli_real_escape_string($db->link, $_POST['loc']);
                $category = mysqli_real_escape_string($db->link, $_POST['cat']);
                $bedroom = mysqli_real_escape_string($db->link, $_POST['bed']);
                $bathroom = mysqli_real_escape_string($db->link, $_POST['bath']);
                $body = mysqli_real_escape_string($db->link, $_POST['body']);
                $price = mysqli_real_escape_string($db->link, $_POST['price']);
                $number = mysqli_real_escape_string($db->link, $_POST['number']);
                $author = mysqli_real_escape_string($db->link, $_POST['author']);
                $userid = mysqli_real_escape_string($db->link, $_POST['userid']);

                 $permited  = array('jpg', 'jpeg', 'png', 'gif');
                 $file_name = $_FILES['image']['name'];
                 $file_size = $_FILES['image']['size'];
                 $file_temp = $_FILES['image']['tmp_name'];

                 $div = explode('.', $file_name);
                 $file_ext = strtolower(end($div));
                 $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                 $uploaded_image = "Upload/".$unique_image;

                 // category
                 $query1 = "INSERT INTO tbl_post(cat) VALUES('$category')";
                    $catinsert = $db->insert($query1);
                 //

                 if ($title == "" || $location == "" || $category == "" || $bedroom == "" || $bathroom == "" || $price == "" || $number == "" || $author == "" || $file_name == ""){

                    echo "<span style='color: red;font-size: 18px;'>Field must not be Empty...!!!</span>";
                 }elseif ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!
                             </span>";
                  } elseif (in_array($file_ext, $permited) === false) {
                     echo "<span class='error'>You can upload only:-"
                        .implode(', ', $permited)."</span>";
                 } else{
                      move_uploaded_file($file_temp, $uploaded_image);
                     /* $query = "INSERT INTO tbl_post( title, location, category, bedroom, bathroom, condition, price, image, author, mobile, userid) VALUES( '$title', '$location', '$category', '$bedroom', '$bathroom', '$condition', '$price', '$uploaded_image', '$author', '$number', '$userid')";*/

                     $query = "INSERT INTO `tbl_post` ( `cat`, `location`, `bedroom`, `bathroom`, `price`, `title`, `body`, `image`, `author`, `mobile`, `userid`) VALUES ( '$category', '$location', '$bedroom', '$bathroom', '$price', '$title', '$body', '$uploaded_image', '$author', '$number', '$userid')";
                      //var_dump($query);
                      $inserted_rows = $db->insert($query);
                      if ($inserted_rows) {
                      echo "<span class='success'>Post Inserted Successfully.
                      </span>";
                      }else {
                           echo "<span class='error'>Post Not Inserted !</span>";
                           }
                    } 
                }
             ?>
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Location</label>
                            </td>
                            <td>
                                <select id="select" name="loc">
                                    <option>Select Location</option>
                              <?php
                                $query = "SELECT * FROM tbl_location";
                                $location = $db->select($query);
                                 if ($location){
                                    while ($result = $location->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['name']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>




                        </tr>

                        
                     
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select id="select" name="cat">
                                    <option>Select Category</option>
                              <?php
                                $query = "SELECT * FROM tbl_category";
                                $category = $db->select($query);
                                 if ($category){
                                    while ($result = $category->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['name']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                        </tr>

                        
                         <tr>   <td>
                                <label>Bedroom</label>
                            </td>
                            <td>
                                <select id="select" name="bed">
                                    <option>Select Location</option>
                              <?php
                                $query = "SELECT * FROM tbl_number";
                                $number = $db->select($query);
                                 if ($number){
                                    while ($result = $number->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['number']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                          </tr>

                          
                            <tr>
                            <td>
                                <label>Bathroom</label>
                            </td>
                            <td>
                                <select id="select" name="bath">
                                    <option>Select Bathroom</option>
                              <?php
                                $query = "SELECT * FROM tbl_number";
                                $number = $db->select($query);
                                 if ($number){
                                    while ($result = $number->fetch_assoc()) {
                                         
                              ?>
                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['number']; ?></option>
                              <?php  } } ?>
                                </select>
                            </td>
                          </tr>


                   
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>

                        <tr>
                          <td>
                                <label>Price:</label>
                            </td>
                            
                            <td>
                                <input type="text" name="price" placeholder="Enter your Price..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Condition:</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mobile Number</label>
                            </td>
                            <td>
                                <input type="Number" name="number" placeholder="Enter Mobile Number..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" readonly name="author" value="<?php echo Session::get('username') ?>" class="medium" />
                                <input type="hidden" readonly name="userid" value="<?php echo Session::get('userId') ?>" class="medium" />
                            </td>
                        </tr>
            <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

        <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<?php include 'inc/footer.php' ?>
