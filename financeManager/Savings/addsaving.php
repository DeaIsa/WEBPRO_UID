<?php
include "config.php"; //koneksi ke data base

//data akan disimpan ketika tombol simpan di tekan
if(isset($_POST['btnSimpan'])) {
    $id = $_POST["id"];
    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $amount_saved = $_POST["amount_saved"];
    $target_amount = $_POST["target_amount"];

    //query untuk menyimpan data ke database
    $sqlStatement = "INSERT INTO savings VALUES ('$id', '$user_id', '$name', '$start_date', '$end_date', $amount_saved', '$target_amount')";
    $query = mysqli_query($conn, $sqlStatement);

    if($query){
        $succesMsg = "Penambahan Tabungan dengan nama tabungan" . $name. "berhasil";
        header("location:index.php?succesMsg=$succesMsg");
        exit;
    } else {
        $errMsg = "Penambahan Tabungan dengan nama tabungan" .$name. "GAGAL!" .mysqli_error($conn);
    };

    mysqli_close($conn);
};

//header halaman
include "template/mainheader.php"
?>
<div class="row mt-3 mb-4">
    <div class="col-md-6">
        <h4>Tambah Tabungan</h4>
    </div>
</div>
    <?php 
    if(isset($errMsg)):
            ?>
            <div class="alert alert-danger" role="alert">
                <?=$errMsg; ?>
            </div>
        <?php 
        endif;
         ?>

<form action="autentikasi.php" method="POST">
    <div class="mb-3">
        <label for="id" class="form-label">ID</label>
        <input type="text" class="form-control" id="id" name="id">
    </div>
    <div class="mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input type="text" class="form-control" id="user_id" name="user_id">
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Nama Tabungan</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="start_date" class="form-label">Tanggal Mulai</label>
        <input type="date" class="form-control" id="start_date" name="start_date">
    </div>
    <div class="mb-3">
        <label for="end_date" class="form-label">Tanggal Selesai</label>
        <input type="date" class="form-control" id="end_date" name="end_date">
    </div>
    <div class="mb-3">
        <label for="amount_saved" class="form-label">Jumlah Tabungan</label>
        <input type="number" class="form-control" id="amount_saved" name="amount_saved">
    </div>
     <div class="mb-3">
        <label for="target_amount" class="form-label">Target Tabungan</label>
        <input type="number" class="form-control" id="target_amount" name="target_amount">
    </div>
    <div class="mt-4 row">
        <div class="col-auto">
            <input type="submit" class="btn btn-success" name="btnSimpan" value="Simpan">
            <input type="reset" class="btn btn-danger" value="Ulangi">
        </div>
    </div>
</form>
<?php
include "template/mainfooter.php";