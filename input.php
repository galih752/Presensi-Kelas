<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Input Nilai</title>
</head>
<body>
    <h3 >INPUT NILAI SISWA</h3>
    <form action="" method="POST">
        <table >
            <tr>
                <td>Nama Siswa </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Kelas </td>
                <td><input type="text" name="kelas"></td>
            </tr>
            <tr>
                <td>Nilai </td>
                <td><input type="number" name="nilai"></td>
            </tr>
            <tr>
                <td>Grade </td>
                <td><input type="text" name="grade"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="kirim" value="kirim"></td>
            </tr>
        </table>
    </form>

    <h3 >HASIL DATA NILAI SISWA</h3>
    <table class="table">
        <tr>
            <th style="text-align:center">Nama Siswa</th>
            <th style="text-align:center">Kelas</th>
            <th style="text-align:center">Nilai</th>
            <th style="text-align:center">Grade</th>
        </tr>
        <tr>
            <td style="text-align:center"><?php echo $_POST['nama'] ?></td>
            <td style="text-align:center"><?php echo $_POST['kelas'] ?></td>
            <td style="text-align:center"><?php echo $_POST['nilai'] ?></td>
            <td style="text-align:center"><?php echo $_POST['grade'] ?></td>
        </tr>
    </table>
</body>
<?php
if(isset($_POST['kirim'])){
    $file = fopen("data.txt","a");
    $nama =  trim($_POST['nama']);
    fwrite($file,$nama);
    $kelas =  trim($_POST['kelas']);  
    fwrite($file,$kelas);
    $nilai =  trim($_POST['nilai']);  
    fwrite($file,$nilai);
    $grade =  trim($_POST['grade']);  
    fwrite($file,$grade); 
    fclose($file);  
}
?>
</html>