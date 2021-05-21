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
                                <h2>Book Return</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                  <form name="form1" action="" method="post">
							  <table class="table table-bordered">
							     <tr>
								    <td>
									    <select name="enr" class="form-control">                  <!-- enr mein selected enrollmnent number stored hai -->
										    
											<?php
											 										       
												$res=mysqli_query($conn,"select student_enrollment from issue_books where book_return_date='' ");
												while($row=mysqli_fetch_array($res))
												{
												echo "<option>";
												echo $row["student_enrollment"];
										        echo "</option>";
												}
												
											?>
											</select>
							        </td>
									
								    <td>
                                     <input type="submit" name="submit1" class="form-control" value="Search" style="background-color:rgb(80,80,80); color:white" >
                                    </td>									 
								</tr>
                            </table> 
							
				</form>
				        <?php
                           if(isset($_POST["submit1"]))
						   {
							   $res=mysqli_query($conn,"select * from issue_books where student_enrollment ='$_POST[enr]'");
							   
							   echo "<table class='table table-bordered'>";
							   echo "<tr>";
				               echo "<th> Student Enrollment </th>";
				               echo "<th> Student Name </th>";
							   echo "<th> Semester </th>";
				               echo "<th> Email </th>";
							   echo "<th> Contact </th>";
							   echo "<th> Book Name </th>";
                               echo "<th> Issue Date </th>";
							   echo "<th> Return </th>";
							   echo "</tr>";  
							   while($row=mysqli_fetch_array($res))
							   {
								   echo "<tr>";
								   echo "<td>".$row["student_enrollment"]."</td>";
								   echo "<td>".$row["student_name"]."</td>";
								   echo "<td>".$row["student_sem"]."</td>";
								   echo "<td>".$row["student_email"]."</td>";
								   echo "<td>".$row["student_contact"]."</td>";
								   echo "<td>".$row["book_name"]."</td>";
								   echo "<td>".$row["book_issue_date"]."</td>";
								   echo "<td>" ;?><a href="return.php?id=<?php echo $row["id"] ?>" style="color:red">Return</a><?php echo "</td>" ;
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


