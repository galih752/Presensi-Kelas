<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
    <h1>ISI DATA</h1>
    <form action="" method="POST">
    <table>
        <tr>
            <td>Nama siswa</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="kelas"></td>
        </tr>
        <tr>
            <td>Nilai</td>
            <td>:</td>
            <td><input type="number" name="nilai"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><input type="submit" name="ok" value="simpan"></td>
        </tr>
    </table><br><br><br>
    </form>
<table class="table primary">
    <tr>
        <td width="50px">Name</td>
        <td width="50px">Score</td>
    </tr>
    <?php
if(isset($_POST['ok'])){
    if(empty($_POST['nama']) || empty($_POST['nilai'])){
        print "Lengkapi form";
    }else{
        $nama=$_POST['nama'];
        $kelas=$_POST['kelas'];
        $nilai=$_POST['nilai'];
        $buka=fopen("sempel.txt",'a');
        fwrite($buka,"nama : $nama <br> ");
        fwrite($buka,"kelas : $kelas <br> ");
        fwrite($buka," nilai : $nilai <br> ");
        fwrite($buka,"<hr>");
        fclose($buka);
        print "data berhasil disimpan";
    }
}?>
<?php
$file_handle = fopen("sempel.txt", "rb");

while(!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode(':', $line_of_text);
    echo "
    <tr>
    <td     >$parts[0]</td>
    <td>$parts[0]</td>
    </tr>";
}
fclose($file_handle);
?>
</table>
</body>
</html>