<html>
<head>
    <title>Add Users</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
 
<body>
    <a href="index.php">Go to Home</a>
    <br/><br/>
 
    <form id="add_form" action="add.php" method="post" name="form1">

 
                <p>Nama</p>
                <input type="text" name="nama">

                <p>Jenis Kelamin</p>
                <input type="text" name="jenis_kelamin">

                <p>Tempat Lahir</p>
                <input type="text" name="lahir_1">

                <p>Tanggal Lahir</p>
                <input type="date" name="lahir_2">

                <p>Alamat</p>
                <input type="text" name="address_1">

                <p>Nomor Telepon</p>
                <input type="text" name="telp">
                <button type="submit" name="Submit" value="Add">Add</button>


    </form>
    
    <?php
 
    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jenis_kelamin'];
        $tempatLahir = $_POST['lahir_1'];
        $tanggalLahir = $_POST['lahir_2'];
        $alamat = $_POST['address_1'];
        $telp= $_POST['telp'];
        
        // include database connection file
        include_once("config.php");
                
        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO dt_users(nama,jenis_kelamin,lahir_1,lahir_2,address_1,telp) VALUES('$nama', '$jenisKelamin', '$tempatLahir', '$tanggalLahir', '$alamat', '$telp')");
        
        // Show message when user added
        echo "User added successfully. <a href='index.php'>View Users</a>";
    }
    ?>
</body>
</html>