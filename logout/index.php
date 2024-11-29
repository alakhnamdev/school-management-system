<?php
session_start();
?>
<script>
    alert("Logged Out successfully");
    window.open("../index.php","_self");
</script>
<?php
session_unset();
session_destroy();
?>