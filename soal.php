<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$num1 = rand(0,20);
$num2 = rand(0,20);
if($_SESSION['lives'] <= 0){
    echo $_SESSION['lives']; 
    header("Location: gameover.php");
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
    <form action="" method="POST">
        Hallo <?php echo $_SESSION['name']; ?>, tetap semangat ya… you can do the best!! <br>
        Lives : <?php echo $_SESSION['lives']; ?> | Score : <?php echo $_SESSION['score']; ?><br>

        Berapakah <?php echo $num1; ?> + <?php echo $num2; ?> =</label>
        <input type="hidden" name="num1" value="<?php echo $num1; ?>">
        <input type="hidden" name="num2" value="<?php echo $num2; ?>">

        <input name="isi" placeholder="Masukkan Jawaban" type="number" required>
        <button name="jawab" type="submit" value="jawab">Jawab</button>
    </form>
</body>
</html>

<?php 
if($_POST['jawab']){
    if($_POST['isi'] == $_POST['num1']+$_POST['num2']){
        $_SESSION['score'] += 10;
        header("Location: cek.php?result=success");
    } else {
        $_SESSION['lives'] -= 1;
        $_SESSION['score'] -= 2;
        if($_SESSION['lives'] > 0){
            header("Location: cek.php?result=failed");
        }
    }
}
?>