<?php if (isset($_SESSION['errorMsg'])) { ?>

<h2 style="color: red; text-align: center;"><?= $_SESSION['errorMsg'] ?></h2>

<a href="admin">Reessayez!</a>
<?php } ?>