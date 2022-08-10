<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
    $id= $_POST['id'];
    $nama = $_POST['nama'];
    
    $jenisKelamin=$_POST['jenis_kelamin'];
    $tempatLahir=$_POST['lahir_1'];
    $tanggalLahir=$_POST['lahir_2'];
    $telp=$_POST['telp'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE dt_users SET nama='$nama',jenis_kelamin='$jenisKelamin',lahir_1='$tempatLahir', lahir_2='$tanggalLahir', telp='$telp' WHERE id=$id");
    
    /* // Redirect to homepage to display updated user in list// */
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM dt_users WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
    $nama = $user_data['nama'];
    $jenisKelamin = $user_data['jenis_kelamin'];
    $tempatLahir = $user_data['lahir_1'];
    $tanggalLahir = $user_data['lahir_2'];
    $alamat = $user_data['address_1'];
    $telp= $user_data['telp'];
}
?>
<html>
<head>	
    <title>Edit User Data</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form id="edit_form" name="update_user" method="post" action="edit.php">
     
            
                <p>Nama</p>
                <input type="text" name="nama" value=<?php echo $nama;?>>
            
                <p>Jenis Kelamin</p>
                <input type="text" name="jenis_kelamin" value=<?php echo $jenisKelamin;?>>
            
                <p>Tempat Lahir</p>
                <input type="text" name="lahir_1" value=<?php echo $tempatLahir;?>>

                <p>Tanggal Lahir</p>
                <input type="date" name="lahir_2" value=<?php echo $tanggalLahir;?>>

                <p>Alamat</p>
                <input type="text" name="address_1" value=<?php echo $alamat;?>>
           
                <p>Nomor Telepon</p>
                <input type="text" name="telp" value=<?php echo $telp;?>>
           
                <p><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></p>
                <button type="submit" name="update" value="Update">Update</button>
        
    </form>
</body>
</html>