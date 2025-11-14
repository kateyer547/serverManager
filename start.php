<?php
session_start();

$test = shell_exec("pgrep -f PalServer-Linux 2>&1");

if (trim($test)) {
    $_SESSION['message'] = "Le serveur est déjà démarré !";
    header("location:menu.php");
    exit();
} else {
    // Démarrer le serveur en arrière-plan avec exec() pour éviter que PHP attende
    exec("cd /home/srvuser/palworld && ./start.sh > /tmp/palworld.log 2>&1 &");
    sleep(2); // Attendre 2 secondes pour laisser le temps au processus de démarrer
    $_SESSION['message'] = "Serveur en cours de démarrage...";
    header("location:menu.php");
    exit();
}
?>