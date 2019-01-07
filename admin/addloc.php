<?php include 'inc/header.php' ?>
<?php include 'inc/sidebar.php' ?>

<?php
    if(!Session::get('userRole') === '0' || !Session::get('userRole') === '1' ){
        echo "<script>window.location = 'index.php';</script>";
    }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
        <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $name = $_POST['name'];
                $name = mysqli_real_escape_string($db->link, $name);
               // echo "<span style='color: red;font-size: 18px;'>No Result Found...!!!</span>";
                if (empty($name)){
                    echo "<span style='color: red;font-size: 18px;'>Your Field is Empty...!!!</span>";
                } else {
                    $query = "INSERT INTO tbl_location(name) VALUES('$name')";
                    $catinsert = $db->insert($query);

                    if ($catinsert){
                        echo "<span style='color: green;font-size: 18px;'>Location inserted Successfully...</span>";
                    } else {
                        echo "<span style='color: red;font-size: 18px;'>Location not inserted...!!!</span>";
                    }
                }

            }
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Add Chittagong Location:</label>
                            </td>
                            <td style="">
                                <input type="text" name="name" placeholder="Enter Chittagong Location..." class="medium" />
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
    
<?php include 'inc/footer.php' ?>