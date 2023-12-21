<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true ){
        echo '<script>window.location="login.php"</script>';
    }

    $query= mysqli_query($conn, "SELECT * FROM tbadmin WHERE id_admin = '" .$_SESSION['id']. "'");
    $d= mysqli_fetch_object($query);
    
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
            <h3>Profil</h3>
            <div class="box">
                <form action="" method= "POST">
                    <input type="text" name="nama" placeholder= "Nama lengkap" class="input-control" value= "<?php $d->nama_admin?>"required>
                    <input type="text" name="user" placeholder= "Username" class="input-control" value= "<?php $d->username?> "required>
                    <input type="text" name="hp" placeholder= "No Hp" class="input-control" value= "<?php $d->telepon_admin?>" required>
                    <input type="email" name="email" placeholder= "Email" class="input-control" value= "<?php $d->email_admin?>" required>
                    <input type="text" name="alamat" placeholder= "Alamat" class="input-control"value= "<?php $d->alamat_admin?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn">
                </forrm>
                <?php
                    if(isset($_POST['submit'])) {
                        $nama   =ucwords($_POST['nama']);
                        $user   =$_POST['user'];
                        $hp     =$_POST['hp'];
                        $email  =$_POST['email'];
                        $alamat =$_POST['alamat'];

                        $update= mysqli_query($conn, "UPDATE tbadmin SET
                                         nama_admin = '".$nama."',
                                          username = '".$user."',
                                          telepon_admin = '".$hp."',
                                          email_admin = '".$email."',
                                          alamat_admin = '".$alamat."'
                                          WHERE id_admin = '".$d->id_admin."'");
                        if($update) {
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                    }
                ?>
            </div>

            <h3>Ubah Password</h3>
            <div class="box">
                <form action="" method= "POST">
                    <input type="password" name="pass1" placeholder= "Password Baru" class="input-control" required>
                    <input type="password" name="pass2" placeholder= "konfirmasi password baru" class="input-control" required>
                    <input type="submit" name="Ubah_password" value="Ubah password" class="btn">
                </forrm>
                <?php
                    if(isset($_POST['ubah_password'])) {
                        
                        $pas1   =$_POST['pass1'];
                        $pass2     =$_POST['pass2'];

                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Baru Salah")</script>';
                        }else{
                            $u_pass= mysqli_query($conn, "UPDATE tbadmin SET
                             password = '".MD5($pass1)."'
                             WHERE id_admin = '".$d->id_admin."'");  

                        if($u_pass){
                            echo '<script>alert("Ubah Data Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                        }
                       

                      
                    }
                ?>
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