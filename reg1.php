<?php
include("reg.php");
?>
	
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
	<input type="text" name="name">
	<br>
	<span class="error"><?= $nanme_error ?></span>
	<br>
	<input type="submit" name="submit">
</form>
