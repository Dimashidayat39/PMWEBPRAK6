<?php


require_once './db_koneksi.php';

//tangkap data form yang di kirim 
$kode = $_POST['kode']; //1
$nama = $_POST['nama']; //2
$tmp_lahir = $_POST['tmp_lahir']; //3
$tgl_lahir = $_POST['tgl_lahir']; //4
$gender = $_POST['gender']; //5
$kelurahan_id = $_POST['kelurahan']; //6
$email = $_POST['email']; //7
$alamat = $_POST['alamat']; //8
 
//simpan data ke dalam array \
$data = [$kode, $nama, $tmp_lahir, $tgl_lahir, $gender, $kelurahan_id, $email, $alamat,];
 
//check nilai proses
switch ($_POST['proses']) {
    case 'simpan' : 
        //membuat sql
        $insertPasienSQL = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, kelurahan_id, email, alamat) VALUES 
        (?,?,?,?,?,?,?,?)";
        //mendefinisikan prepare statement 
        $stmt = $dbh->prepare($insertPasienSQL);
        //eksekusi statement 
        $stmt->execute($data);
        break;
        case 'ubah':
            // logic mengubah data 
            break;
            case 'Hapus':
                break;
            //logic menghapus data     
            default:
            header('location ./data_pasien.php');     
}

//redirect data pasien
header('location: ./data_pasien.php');
?>