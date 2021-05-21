// For Approval by librarian 



<?php
include "connection.php";
$id=$_GET["id"];
mysqli_query($conn,"UPDATE student_registration SET status='yes' WHERE id=$id");             // "id" in GET is the one in display_student_info url
?>

<script type="text/javascript">

window.location="display_student_info.php";

</script>

