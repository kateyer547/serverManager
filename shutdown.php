<?php
session_start();

$test = shell_exec("pgrep -f PalServer-Linux 2>&1");

if (trim($test)) {
    shell_exec("pkill -f PalServer-Linux 2>&1");
    sleep(1); // Attendre que le processus se termine
    $_SESSION['message'] = "Serveur arrêté avec succès !";
} else {
    // Le serveur n'est pas en cours
    $_SESSION['message'] = "Le serveur n'est pas en cours d'exécution.";
}

header("location:menu.php");
exit();
?>
