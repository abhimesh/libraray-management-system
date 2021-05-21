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
                                <h2>Issue Books</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                              <form name="form1" action="" method="post">
							  <table>
							     <tr>
								    <td>
									    <select name="enr" class="form-control selectpicker">                  <!-- enr mein selected enrollmnent number stored hai -->
										    
											<?php
											 										       
												$res=mysqli_query($conn,"select enrollmentno from student_registration");
												while($row=mysqli_fetch_array($res))
												{
												echo "<option>";
												echo $row["enrollmentno"];
										        echo "</option>";
												}
												
											?>
											</select>
							        </td>
									
								    <td>
                                     <input type="submit" name="submit1" class="form-control btn btn-default" value="Select" style="margin-top: 5px;" >
                                    </td>									 
								</tr>
                            </table>
							
						<?php
                           if(isset($_POST["submit1"]))
						   {
							   $res=mysqli_query($conn,"select * from student_registration where enrollmentno ='$_POST[enr]'");
							   while($row=mysqli_fetch_array($res))
							   {
								   $firstname = $row["firstname"];
								   $lastname= $row["lastname"];
								   $username= $row["username"];
								   $email= $row["email"];
								   $contact= $row["contact"];
								   $sem= $row["sem"];
								   $enroll=$row["enrollmentno"];
								   $_SESSION["enrollment"]=$enroll;             // bcz these 2 variables are disabled hence cannot be inserted using $_POST[enroll] later on
								   $_SESSION["busername"]=$username;
							   }
                             ?>
                                <table class="table table-bordered">
							    <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Enrollment" name="enrollmentno" value="<?php echo $enroll; ?>" disabled>
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Student Name" name="student_name" value="<?php echo $firstname.' '.$lastname; ?>" required="">
									</td>
									</tr>
								<tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Semester" name="sem" value="<?php echo $sem; ?>"required="">
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Contact No." name="contact" value="<?php echo $contact; ?>" required="">
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required="">
									</td>
									</tr>
								<tr>	 
									 <td>
									    <select name="bookname" class="form-control selectpicker">
										    
											<?php
											 										       
												$res=mysqli_query($conn,"select books_name from add_books");
												while($row=mysqli_fetch_array($res))
												{
												echo "<option>";
												echo $row["books_name"];
										        echo "</option>";
												}
												
											?>
											</select>
							        </td>
									
								</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Book Issue Date" name="issuedate" value="<?php echo date("d/m/yy"); ?>" required="">
									</td>
									</tr>
								<tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Student Username" name="username" value="<?php echo $username; ?>" disabled>
									</td>
									</tr>	
								<tr>
								    <td>
										 <input type="submit" class="form-control btn btn-default" value="Update" name="submit2" style="background-color:rgb(80,80,80); color:white">
									</td>
									</tr>	
									
                         </table> 
<?php
						   }
?>						   
 </form>
                             	<?php
                             if(isset($_POST["submit2"]))
							 {
								 $qty=0;
								 $res=mysqli_query($conn,"SELECT * FROM add_books WHERE books_name='$_POST[bookname]'");
								 while($row=mysqli_fetch_array($res))
								 {
									 $qty=$row["books_availability"];
								 }
								 if($qty==0)
								 {
									 ?>
									 <div class="alert alert-danger col-lg-6 col-lg-push-3">
                                       <strong style="color:white">Book is out of stock </strong> 
                                     </div>
									 <?php
								 }
								
							 else 
							 {
                            	mysqli_query($conn,"INSERT INTO issue_books VALUES('','$_SESSION[enrollment]','$_POST[student_name]','$_POST[sem]','$_POST[contact]','$_POST[email]','$_POST[bookname]','$_POST[issuedate]','','$_SESSION[busername]')");					
                                mysqli_query($conn,"UPDATE add_books SET books_availability=books_availability-1 WHERE books_name='$_POST[bookname]'");							
							?>
     <script type="text/javascript">
	 
	alert("Book Issued Successfully");
	</script>
	<?php
	}
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


