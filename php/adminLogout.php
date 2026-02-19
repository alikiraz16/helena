<?php
session_start();
session_destroy();
header("Location: ../sayfalar/adminGiris.php");
exit();
