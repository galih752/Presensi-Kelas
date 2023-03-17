<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="bootstrap.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

if(isset($_POST['submit'])){
    $file=fopen('nilai/nilai.txt', 'a');
    $nama=$_POST['nama'];
    $nama[0]=strtoupper($nama[0]);
    $kelas=$_POST['kelas'];
    $keterangan=$_POST['keterangan'];
   
    $data=$nama.'-'.$kelas.'-'.$keterangan.'|';

    fwrite($file, $data);

    fclose($file);
}

$rows=[];
$file=fopen('nilai/nilai.txt', 'r');
if(filesize('nilai/nilai.txt')>0){
    $data=fread($file, filesize('nilai/nilai.txt'));

    $data=explode('|', $data);
    for($i=0; $i<count($data)-1; $i++){
        $data[$i]=explode('-', $data[$i]);
    }
    unset($data[count($data)-1]);

    $rows=$data;
   
    fclose($file);
}

function ascending($rows){
    $temp='';
    for($i=0; $i<count($rows)-1; $i++){
        for($j=0; $j<count($rows)-1; $j++){
            if($rows[$j][0]>$rows[$j+1][0]){
                $temp=$rows[$j];
                $rows[$j]=$rows[$j+1];
                $rows[$j+1]=$temp;
            }
        }
    }
    return $rows;
}

function descending($rows){
    $temp='';
    for($i=0; $i<count($rows)-1; $i++){
        for($j=0; $j<count($rows)-1; $j++){
            if($rows[$j][0]<$rows[$j+1][0]){
                $temp=$rows[$j];
                $rows[$j]=$rows[$j+1];
                $rows[$j+1]=$temp;
            }
        }
    }
    return $rows;
}

if(isset($_POST['asc'])){
    $rows=ascending($rows);
}
if(isset($_POST['desc'])){
    $rows=descending($rows);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Siswa</title>
    <!-- <link href="bootstrap.css" rel="stylesheet"> -->
</head>
<body>
    <div class="container my-3">
        <h1 class="text-center mb-5">Program Kehadiran Anggota Pramuka</h1>
        <form action="" method="post" class="w-50 mx-auto border p-4">
        <!-- <div class="mb-3 mx-auto">
                <label for="nama" class="label-form mb-2">Nama</label>
                <select class="form-select" aria-label="Default select example" id="nama">
                    <option selected></option>
                    <option value="1">Alda Pujama</option>
                    <option value="2">Aliyani Azahri</option>
                    <option value="3"></option>
                </select>
            </div> -->
            <div class="mb-3 mx-auto">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama">
            </div>
            <div class="mb-3 mx-auto">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" id="kelas">
            </div>
            <!-- <div class="mb-3 mx-auto">
                <label for="niali" class="form-label">Nilai</label>
                <input type="text" class="form-control" id="nilai">
            </div> -->
            <div class="mb-3 mx-auto">
                <label for="" class="form-label">Kehadiran</label>
                <div class="mb-3 mx-auto form-check">
                    <label for="hadir" class="form-check-label">Hadir</label>
                    <input type="radio" name="keterangan" class="form-check-input" id="hadir" value="Hadir">
                </div>
                <div class="mb-3 mx-auto form-check">
                    <label for="sakit" class="form-check-label">Sakit</label>
                    <input type="radio" name="keterangan" class="form-check-input" id="sakit" value="Sakit">
                </div>
                <div class="mb-3 mx-auto form-check">
                    <label for="tanpa-keterangan" class="form-check-label">Tanpa keterangan</label>
                    <input type="radio" name="keterangan" class="form-check-input" id="tanpa-keterangan" value="Tanpa Keterangan">
                </div>
            </div>
            <button class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
        <form action="" method="post" class="w-50 mx-auto mt-3">
            <button type="submit" class="btn btn-primary" name="asc">Ascending</button>
            <button type="submit" class="btn btn-primary" name="desc">Descending</button>
        </form>
        <table class="table w-50 mx-auto">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kelas</th>
                    <!-- <th>Nilai</th> -->
                    <th class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                <?php foreach($rows as $row): ?>
                    <tr>
                        <td class="text-center"><?= $i; ?></td>
                        <td class="text-center"><?= $row[0] ?></td>
                        <td class="text-center"><?= $row[1] ?></td>
                        <!-- <td>nilai</td> -->
                        <td class="text-center"><?= $row[2] ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>