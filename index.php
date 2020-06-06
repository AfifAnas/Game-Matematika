<?php
session_start();
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
if($_GET['mode']=='new'){
    session_unset();
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
    <h1>Game Matematika</h1>
<?php 
if(!isset($_SESSION['email'])){
?>

<form method="POST">
	<div class="form-group">
    	<input class="form-control"  name="name" placeholder="Masukkan Nama" type="text" required>
	</div>
	<div class="form-group">
        <input class="form-control" name="email" placeholder="Masukkan Email" type="email" required><br> <br>
    </div>
    <div class="form-group">
        <input id="start" class="btn btn-info" name="start" type="submit" value="MULAI">
    </div>
</form>

<?php
    } else {
?>

<form method="POST">
    <div class="form-group">
        <p class="teks text-light text-center" >Hallo <?php echo $_SESSION['name'] ?> , selamat datang kembali di permainan ini!!!</p>
        <p class="teks small text-light text-center" >Bukan anda? <a class="primary" href="?mode=new">(klik di sini)</a></p>
    </div>
    <div class="form-group">
    	<input id="start" class="btn btn-info" name="start" type="submit" value="MULAI">
    </div>
</form>

<?php
    }
?>

</body>
</html>
<?php

if(isset($_POST['start'])){
    if(!isset($_SESSION['email'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['email'] = $_POST['email'];
    }
    $_SESSION['lives'] = 5;
    $_SESSION['score'] = 0;
    header('Location: soal.php');
}
?>