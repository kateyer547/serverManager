<?php
session_start();

$test = shell_exec("pgrep -f PalServer-Linux 2>&1");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palworld Server Startup</title>
    <link rel="stylesheet" href="assets/css/styles.css"">
</head>
<body>
<?php
    if (isset($_SESSION['message'])) {
        echo "<div class='message' style='color: #FFFFFF; font-weight: 700; font-size: 50px'>" . htmlspecialchars($_SESSION['message']) . "</div>";
        unset($_SESSION['message']);
    }
    if (trim($test)) {
        echo
        '    
        <div class="state">
            <svg xmlns="http://www.w3.org/2000/svg" class="tickVert" width="31" height="31" viewBox="0 0 31 31" fill="none"><circle cx="15.5" cy="15.5" r="15.5" fill="#00FF49"/></svg>
            <h1 class="etat">Serveur en cours</h1>
        </div>
        <form method="POST" action="shutdown.php" class="forms">
            <button type="submit" class="stopBtn btn">STOP</button>
        </form>
        ';
    } else {
        echo
        '
        <div class="state">
            <svg xmlns="http://www.w3.org/2000/svg" class="tickRouge" width="31" height="31" viewBox="0 0 31 31" fill="none"><circle cx="15.5" cy="15.5" r="15.5" fill="#FF0000"/></svg>
            <h1 class="etat">Serveur arrêté</h1>
        </div>    
        <form method="POST" action="start.php" class="forms">
            <button type="submit" class="startBtn btn">START</button>
        </form>
        ';
    }
?>
<script src="assets/js/randomizer.js"></script>
</body>
</html>

