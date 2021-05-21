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
                                <h2>Send Message to Student</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               
							   <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
							  <table class="table table-bordered">
							     <tr>
								    <td>
									    <select name="dst_username" class="form-control" >                  <!-- enr mein selected enrollmnent number stored hai -->
										    
											<?php
											 										       
												$res=mysqli_query($conn,"select * from student_registration");
												while($row=mysqli_fetch_array($res))
												{
													
												?><option value="<?php echo $row["username"] ?>">
												<?php echo $row["username"]."(".$row["enrollmentno"].")"; ?>
										        </option><?php 
												}
												
											?>
											</select>
							        </td>
								</tr>
								
								<tr>
								<td>
                                     <input type="text" name="title" class="form-control" placeholder="Enter title">
                                 </td>
								</tr>
								
								<tr>
								<td>
								Message<br><br>
                                <textarea name="msg" class="form-control" >
							    </textarea>
                                 </td>
								</tr>
								
								<tr>
								<td>
                                     <input type="submit" name="submit1" class="form-control btn btn-default" value="Send Message" style="background-color:rgb(80,80,80); color:white">
                                 </td>
								</tr>
								
								    
                            </table>
						</form>

						<?php
						if(isset($_POST["submit1"]))
						{
							mysqli_query($conn,"INSERT INTO messages VALUES('','$_SESSION[librarian_user]','$_POST[dst_username]','$_POST[title]','$_POST[msg]','n')");
						?>
						<script type="text/javascript">
						 alert("Message sent successfully");
						</script>
						<?php
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


