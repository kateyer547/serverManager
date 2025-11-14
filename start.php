<?php
session_start();

//$test = shell_exec("pgrep -f PalServer-Linux 2>&1");

try {
    // Démarrer le serveur en arrière-plan avec exec() pour éviter que PHP attende
    exec("cd /home/srvuser/palworld && ./start.sh > /tmp/palworld.log 2>&1 &");
    sleep(2); // Attendre 2 secondes pour laisser le temps au processus de démarrer
    header("location:index.php");
} catch (Error $e) {
    $_SESSION['message'] = "Erreur lors du démarrage du serveur : " . $e->getMessage();
    header("location:index.php");
}
?>