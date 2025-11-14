<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .forms{
            width: 25%;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
    </style>
    <title></title>
</head>
<body>
<?php
if (isset($_SESSION['message'])) {
    echo "<div class='message'>" . htmlspecialchars($_SESSION['message']) . "</div>";
    unset($_SESSION['message']);
}
?>
<form method="POST" action="start.php" class="forms">
    <label>Démarrer le serveur</label>
    <button type="submit" class="start-btn">Démarrer</button>
</form>
<form method="POST" action="shutdown.php" class="forms">
    <label>Arrêter le serveur</label>
    <button type="submit" class="stop-btn">Arrêter</button>
</form>
</body>
</html>

