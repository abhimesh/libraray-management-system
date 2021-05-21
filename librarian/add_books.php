IMPORTANT (Involves adding image to folder concept and Session variable concept)

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
                                <h2>Add Books Information</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/form-data">
							   <table class="table table-bordered">
							    <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Name" name="bname" required="">
									</td>
									</tr>
							      <tr>
								    <td>
									    Image
										 <input type="file" name="f1" required="">
									</td>
									</tr>
								  <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Author" name="bauthor" required=""> 
									</td>
									</tr>
								<tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Publication" name="bpublication" required=""> 
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Purchase Date" name="bpurchase" required=""> 
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Price" name="bprice" required=""> 
									</td>
									</tr>
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Quantity" name="bquantity" required=""> 
									</td>
									</tr>	
                                <tr>
								    <td>
										 <input type="text" class="form-control" placeholder="Availability" name="bavail" required=""> 
									</td>
									</tr>
								<tr>
								    <td>
										 <input type="submit" class="btn btn-default submit" name="submit1" value="Insert Details" style="background-color:rgb(80,80,80); color:white"  > 
									</td>
									</tr>	
									</table>
									</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
	<?php
	if(isset($_POST["submit1"]))
	{
		$tm=md5(time());
		$abc = $_FILES["f1"]["name"];
		$target = "./books_images/".$tm.$abc;               //  destination path of folder books_images/
        $target_dir="books_images/".$tm.$abc;               // variable to be used for storing in table through insert
        
		move_uploaded_file($_FILES["f1"]["tmp_name"],$target);       // moving from source to destination
		
		mysqli_query($conn,"INSERT INTO add_books VALUES('','$_POST[bname]','$target_dir','$_POST[bauthor]','$_POST[bpublication]','$_POST[bpurchase]','$_POST[bprice]','$_POST[bquantity]','$_POST[bavail]','$_SESSION[librarian_user]')");
	
	?>
	<script type="text/javascript">
	alert("Book Successfully Inserted");
	</script>
	<?php
	}
	?>
	
<?php
include "footer.php"
?>


