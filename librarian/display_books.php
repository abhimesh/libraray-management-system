<?php
session_start();
if(!isset($_SESSION["librarian_user"]))                     // to prevent direct page access without login
{
	?>
	<script type="text/javascript">
	window.location="login.php";
	</script>
	<?php
}
include "header.php";
include "connection.php";
?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Book Details</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
							<form type="text" action="" method="post">                                          <!-- search box for books -->
							<input type="text" name="t1" class="form-control" placeholder="Book name" >
							<input type="submit" name="submit1" class="btn btn-default" value="Search">
							</form>
							
                             <?php
							 
							 if(isset($_POST["submit1"]))
							 {
								 $sql="SELECT * FROM add_books where books_name like('$_POST[t1]%')";           // here case insensitive search. Collate for case sensitive to latin1_general_cs for books_name column
                             $res=mysqli_query($conn,$sql);
                             echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th> Title </th>";
echo "<th> Image </th>";	
echo "<th> Author </th>";	
echo "<th> Publication </th>";	
echo "<th> Purchase Date </th>";	
echo "<th> Price </th>";
echo "<th> Quantity </th>";	
echo "<th> Availaible </th>";
echo "<th> Delete Book </th>";
echo "</tr>";
while($row=mysqli_fetch_array($res))
{
	echo "<tr>";
	echo "<td>".$row["books_name"]."</td>";
	echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" width="100" height="100"> <?php echo "</td>";
	echo "<td>".$row["books_author"]."</td>";
	echo "<td>".$row["books_publication"]."</td>";
	echo "<td>".$row["books_purchase_date"]."</td>";
	echo "<td>".$row["books_price"]."</td>";
	echo "<td>".$row["books_quantity"]."</td>";
	echo "<td>".$row["books_availability"]."</td>";
	echo "<td>";?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a> <?php echo "</td>" ;
	echo "</tr>";
}
echo "</table>";
							 
							 }
							 else
							 {
                             $sql="SELECT * FROM add_books";
                             $res=mysqli_query($conn,$sql);
                             echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th> Title </th>";
echo "<th> Image </th>";	
echo "<th> Author </th>";	
echo "<th> Publication </th>";	
echo "<th> Purchase Date </th>";	
echo "<th> Price </th>";
echo "<th> Quantity </th>";	
echo "<th> Availaible </th>";
echo "<th> Delete Book </th>";
echo "</tr>";
while($row=mysqli_fetch_array($res))
{
	echo "<tr>";
	echo "<td>".$row["books_name"]."</td>";
	echo "<td>"; ?> <img src="<?php echo $row["books_image"]; ?>" width="100" height="100"> <?php echo "</td>";
	echo "<td>".$row["books_author"]."</td>";
	echo "<td>".$row["books_publication"]."</td>";
	echo "<td>".$row["books_purchase_date"]."</td>";
	echo "<td>".$row["books_price"]."</td>";
	echo "<td>".$row["books_quantity"]."</td>";
	echo "<td>".$row["books_availability"]."</td>";
	echo "<td>";?> <a href="delete_books.php?id=<?php echo $row["id"]; ?>" style="color:red">Delete</a> <?php echo "</td>" ;
	
	echo "</tr>";
}
echo "</table>";
							 }
?>
							 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php
include "footer.php"
?>


