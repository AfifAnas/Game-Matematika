<?php
session_start();
if($_GET['result'] == 'success'){
    $result = "Hallo ".$_SESSION['name']." Selamat jawaban Anda benar…";
} else if($_GET['result'] == 'failed'){
    $result = "Hallo ".$_SESSION['name']." Sayang jawaban Anda salah… tetap semangat ya !!!";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Matematika</title>
</head>
<body>
    <?php echo $result; ?>
    Lives : <?php echo $_SESSION['lives']; ?> | Score : <?php echo $_SESSION['score']; ?>
    
    <a href="soal.php">Soal Selanjutnya</a>
</body>
</html>