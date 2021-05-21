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
                                <h2>Students Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                             <?php
                             $sql="SELECT * FROM student_registration";
                             $res=mysqli_query($conn,$sql);
                             echo "<table class='table table-bordered'>";
echo "<tr>";
echo "<th> FirstName </th>";
echo "<th> LastName </th>";	
echo "<th> Username </th>";	
echo "<th> Email </th>";	
echo "<th> Contact </th>";	
echo "<th> Semester </th>";
echo "<th> EnrollmentNo. </th>";	
echo "<th> Status </th>";
echo "<th> Approve </th>";		
echo "<th> Disapprove </th>";							 
echo "</tr>";
while($row=mysqli_fetch_array($res))
{
	echo "<tr>"; 
	echo "<td>".$row["firstname"]."</td>";                                       // [] mein woh name hai jo database mein set hai , na ki woh jo tumne name="" mein declare kiya tha
	echo "<td>".$row["lastname"]."</td>";
	echo "<td>".$row["username"]."</td>";
	echo "<td>".$row["email"]."</td>";
	echo "<td>".$row["contact"]."</td>";
	echo "<td>".$row["sem"]."</td>";
	echo "<td>".$row["enrollmentno"]."</td>";
	echo "<td>".$row["status"]."</td>";
	echo "<td>" ; ?> <a href="approve.php?id=<?php echo $row["id"]; ?>">Approve</a> <?php echo "</td>" ;           // creating link approved.php?id=2 for eg.
	echo "<td>" ; ?> <a href="disapprove.php?id=<?php echo $row["id"]; ?>">Disapprove</a> <?php echo "</td>" ;
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


