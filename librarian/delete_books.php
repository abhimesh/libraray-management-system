<?php
include "connection.php";
if(isset($_GET["id"]))                                       // in case someone directly opens this delete_books.php file it will open display books page
{
$id=$_GET["id"];
mysqli_query($conn,"DELETE FROM add_books WHERE id=$id");             // "id" in GET is the one in display_student_info url
?>

<script type="text/javascript">

window.location="display_books.php";

</script>
<?php
}
else
{
	?>
<script type="text/javascript">

window.location="display_books.php";

</script>
<?php
}
?>