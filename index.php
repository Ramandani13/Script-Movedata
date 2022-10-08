<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MOVE DATA</h1>
<meta http-equiv="refresh" content="30" />
    <?php
    include "koneksi1.php";
                $ambil = mysqli_query($koneksi1,"SELECT * FROM tb_sp_result ");
                while($tampilall = mysqli_fetch_array($ambil)){
                 $tgl = $tampilall['tgl'];                                              
                 $order_no = $tampilall['order_no'];                                              
                 $model = $tampilall['model'];                                              
                 $lot = $tampilall['lot'];                                              
                 $loc_input = $tampilall['loc_input'];                                              
                 $case_no = $tampilall['case_no'];                                              
                 $casemark = $tampilall['casemark'];                                              
                 $jam = $tampilall['jam'];                                              
                 $pengguna = $tampilall['pengguna'];                                              
                 $case_plan = $tampilall['case_plan'];                                              
                 $act = $tampilall['act'];                                              
                 $progres = $tampilall['progres'];                                              
                 $dami = $tampilall['dami'];                                              
                } 
    ?>
    <?php
    include "koneksi1.php";
                $ambildata2 = mysqli_query($koneksi1,"SELECT (casemark) AS triger1 FROM tb_sp_result ");
                while($tampil2 = mysqli_fetch_array($ambildata2)){
                 $triger1 = $tampil2['triger1'];                                              
                } 
    ?>
<?php
// error_reporting(0);
include "koneksi.php";
$ambildata = mysqli_query($koneksi,"SELECT (hasil_scan) AS triger FROM tb_va_input_exim ");
while($tampil = mysqli_fetch_array($ambildata)){
$triger = $tampil['triger'];                                              
include "koneksi1.php";
if($triger == $triger1){
    // $result = mysqli_query($koneksi1, "UPDATE tb_sp_result SET tgl='$tgl' order_no ='$order_no',model='model',
    // lot='$lot',loc_input='$loc_input',case_no='$case_no',casemark='$casemark',jam='fsfhsfhsfh',pengguna='$pengguna',
    // case_plan='$case_plan',act='$act',progres='$progres',dami='$dami' where casemark='$triger1' "); 
    $sql = "INSERT INTO tb_movedata_sp (tgl,order_no,model,lot,loc_input,case_no,casemark,jam,pengguna,case_plan,act,progres,dami) SELECT tgl,order_no,model,lot,loc_input,case_no,casemark,jam,pengguna,case_plan,act,progres,dami FROM tb_sp_result where casemark = '$triger'"; 
    mysqli_query($koneksi1, $sql);
    $sql1 = mysqli_query( $koneksi1, "DELETE FROM tb_sp_result where casemark = '$triger' ");
}else{
    $sql = "INSERT INTO tb_movedata_sp (tgl,order_no,model,lot,loc_input,case_no,casemark,jam,pengguna,case_plan,act,progres,dami) SELECT tgl,order_no,model,lot,loc_input,case_no,casemark,jam,pengguna,case_plan,act,progres,dami FROM tb_sp_result where casemark = '$triger'"; 
    mysqli_query($koneksi1, $sql);
    $sql1 = mysqli_query( $koneksi1, "DELETE FROM tb_sp_result where casemark = '$triger' ");
}
}
?>
</body>
</html>