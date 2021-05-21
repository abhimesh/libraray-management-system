<?php
session_start();
if(!isset($_SESSION["username"]))                     // to prevent direct page access without login
{
	?>
 <script type="text/javascript">
	window.location="login.php";
	</script> 
	<?php
}
include "connection.php";
include "header.php";
mysqli_query($conn,"UPDATE messages SET reado='y' WHERE dest_username='$_SESSION[username]'");           // refresh page to see unread msg noti back to 0
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
                                <h2>Notifications</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                <table class="table table-bordered">
				<th> Librarian Name </th>
				<th> Title </th>
				<th> Message </th>
         <?php
		  $res=mysqli_query($conn,"SELECT * FROM messages WHERE dest_username='$_SESSION[username]' ORDER BY id desc");    // descending as latest msg on top
		  $fullname;
		  while($row=mysqli_fetch_array($res))
		  {
			 $res1=mysqli_query($conn,"SELECT * FROM librarian_registration WHERE username='$row[source_username]' ");
			  
			  while($row1=mysqli_fetch_array($res1))
			  {
				  $fullname=$row1["firstname"]." ".$row1["lastname"];
			  }
			  
             echo "<tr>";
			 echo "<td>".$fullname."</td>";
			 echo "<td>".$row["title"]."</td>";
			 echo "<td>".$row["msg"]."</td>";
			 echo "</tr>";
		  }
		  ?>
				</table>    
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


