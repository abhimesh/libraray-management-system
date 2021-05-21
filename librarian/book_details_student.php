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
                                <h2></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
                                <?php
								
								$c=0;
								$res=mysqli_query($conn,"SELECT * FROM add_books ");
								echo "<table class='table table-bordered'>";
								echo "<tr>";
								
								while($row=mysqli_fetch_array($res))
								{
									$c=$c+1;                                   // to check number of displays in arow
									echo "<td>";
									?>
									<img src="<?php echo $row["books_image"]; ?>" height="100" width="100"> <?php             // .. to get out of present student folder and then librarian as image is in librarian folder
									echo "<br><br>";
									echo "<b>".$row["books_name"]."</b>";
									echo "<br>";
									echo "<b>"."Total Books: ".$row["books_quantity"]."</b>";
									echo "<br>";
									echo "<b>"."Available: ".$row["books_availability"]."</b>";
									echo "<br>";
									echo "<b>"."Students with the book: "."</b>";?><a href="students_with_book.php?bookname=<?php echo $row["books_name"] ?>" style="color:red">Check</a>
									<?php echo "</td>" ;
									
								
									
									if($c==3)
									{
										
										echo "</tr>";
										echo "<tr>";
										$c=0;
									
								    }
									
								}
								echo "</tr>";
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


