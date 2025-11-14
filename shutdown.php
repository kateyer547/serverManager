<?php
session_start();

//$test = shell_exec("pgrep -f PalServer-Linux 2>&1");

try {
    shell_exec("pkill -f PalServer-Linux 2>&1");
    sleep(1); // Attendre que le processus se termine
    header("location:index.php");
} catch (Error $e) {
    $_SESSION['message'] = "Erreur lors de l'arrêt du serveur : " . $e->getMessage();
    header("location:index.php");
}

?>
