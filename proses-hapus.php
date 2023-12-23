<?php
    include 'db.php';

    if(isset($_GET['idk'])) {
        $delete = mysqli_query($conn, "DELETE FROM tbkategori WHERE id_categori= '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }
?>