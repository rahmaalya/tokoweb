<?php 
    session_start();
    if($_SESSION['status_login'] != true ){
        echo '<script>window.location="login.php"</script>';
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tokoweb</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
	<header>
        <div class="coontainer">
        <h1><a href="dashboard.php">Tokoweb</h1>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profil.php">Profil</a></li>
            <li><a href="data-kategori.php">Data Kategori</a></li>
            <li><a href="data-produk.php">Data Produk</a></li>
            <li><a href="keluar.php">LogOut</a></li>
        </ul>
        </div>
    </header>

    <div class= "section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                <h4>Selamat Datang <?php echo $_SESSION['a_global']->nama_admin ?> di toko Onlie</h4>
            </div>
        </div>
    </div>

    <footer>
        <div class="contaier">
            <small>Copyright &copy; 2023 - Tokoweb. </small>
        </div>
    </footer>
</body>
</html>