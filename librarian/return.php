<!-- Add return date in table issue_books -->


<?php
include "connection.php";
$id=$_GET["id"];       // of issue_books
$date=date("d/m/yy"); 
mysqli_query($conn,"UPDATE issue_books SET book_return_date='$date' WHERE id='$id' ");

/*$ans="SELECT book_name FROM issue_books WHERE id='$id'";
mysqli_query($conn,"UPDATE add_books SET books_availability=books_availability+1 WHERE books_name='$ans'");
?>*/

$bookS_name="";
$res=mysqli_query($conn,"SELECT * FROM issue_books WHERE id='$id' ");
while($row=mysqli_fetch_array($res))
{
	$bookS_name=$row["book_name"];
}
 mysqli_query($conn,"UPDATE add_books SET books_availability=books_availability+1 WHERE books_name='$bookS_name'");							
?>

<script type="text/javascript">

window.location="return_book.php";

</script>