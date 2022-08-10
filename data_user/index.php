<?php
// Create database connection using config file
include_once("config.php");
 
// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM dt_users ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>
 
<body> 
    <table id="user_table"width='80%' cellspacing="0">
 
    <tr>
        <th>Nama</th> <th>Jenis Kelamin</th> <th>Tempat Lahir</th> <th>Tanggal Lahir</th> <th>Alamat</th> <th>Nomor Telepon</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        if($user_data['jenis_kelamin'] == 1){
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>Pria</td>";
        echo "<td>".$user_data['lahir_1']."</td>";    
        echo "<td>".$user_data['lahir_2']."</td>";   
        echo "<td>".$user_data['address_1']."</td>"; 
        echo "<td>".$user_data['telp']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]' id='edit'>Edit</a> | <a href='delete.php?id=$user_data[id]' id='delete'>Delete</a></td></tr>";    
        }
        else if($user_data['jenis_kelamin'] == 2){
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>Wanita</td>";
        echo "<td>".$user_data['lahir_1']."</td>";
        echo "<td>".$user_data['lahir_2']."</td>";  
        echo "<td>".$user_data['address_1']."</td>";     
        echo "<td>".$user_data['telp']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]' id='edit'>Edit</a> | <a href='delete.php?id=$user_data[id]' id='delete'>Delete</a></td></tr>";    
        }
        else{
        echo "<tr>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>-</td>";
        echo "<td>".$user_data['lahir_1']."</td>";    
        echo "<td>".$user_data['lahir_2']."</td>";  
        echo "<td>".$user_data['address_1']."</td>"; 
        echo "<td>".$user_data['telp']."</td>";    
        echo "<td><a href='edit.php?id=$user_data[id]' id='edit'>Edit</a> | <a href='delete.php?id=$user_data[id]' id='delete'>Delete</a></td></tr>";    
        }
              
    }
    ?>
    </table>
    <a href="add.php" id="add_new_user"><button >Add new user</button></a>
</body>
</html>