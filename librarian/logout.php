<?php
session_start();
unset($_SESSION["librarian_user"]);
?>
<script type="text/javascript">
window.location="login.php";
</script>