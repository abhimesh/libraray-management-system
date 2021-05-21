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
include "connection.php";
include "header.php";
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
                                <h2>Students with the Book : <?php echo $_GET['bookname'] ?></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                           
						   <?php
						   
                             $sql="SELECT * FROM issue_books WHERE book_name='$_GET[bookname]' && book_return_date='' ";
                             $res=mysqli_query($conn,$sql);
							 
                             echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th> Student Name </th>";
echo "<th> Enrollment No. </th>";	
echo "<th> Username </th>";
echo "<th> Semester </th>";
echo "<th> Email </th>";	
echo "<th> Contact </th>";	
echo "<th> Issue Date </th>";							 
echo "</tr>";
while($row=mysqli_fetch_array($res))
{
	echo "<tr>"; 
	
	echo "<td>".$row["student_name"]."</td>";  
	echo "<td>".$row["student_enrollment"]."</td>";
    echo "<td>".$row["student_username"]."</td>";	// [] mein woh name hai jo database mein set hai , na ki woh jo tumne name="" mein declare kiya tha
	echo "<td>".$row["student_sem"]."</td>";
	echo "<td>".$row["student_email"]."</td>";
	echo "<td>".$row["student_contact"]."</td>";
	echo "<td>".$row["book_issue_date"]."</td>";
	
	echo "</tr>";
}
echo "</table>";
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


