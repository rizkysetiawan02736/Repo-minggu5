<html>
<head>
<style>
.error {color: #FF0000;}

table {
    padding:5px;
    margin :10px;
    width:75%;
    border :1px solid blue;
}
input[type=text], select,[type=number] {
    width: 70%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
body {
    font-size :25px;
    font-family :arial;
    margin-left :15%;
}
input[type=submit] {
    width: 20%;
    margin-left:50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 40px;
}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nimErr = $tgsErr = $utseErr =$uaseErr = "";
$nim = $tgs = $uts = $uas = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["nim"])) {
    $nimErr = "Nim is required";
  } else {
    $nim = test_input($_POST["nim"]);
  }
  $ps = substr ($nim, 2, 2); 
    switch($ps) { 
        case '11' : $jurusan = "Teknik Informatika"; 
        break;
        case '12' : $jurusan = "Sistem Informasi"; 
        break;
        case '14' : $jurusan = "Desain Komunikasi Visual"; 
        break;
        case '15' : $jurusan = "Ilmu Komunikasi"; 
        break;
        case '16' : $jurusan = "Film dan Televisi"; 
        break;
        case '17' : $jurusan = "Animasi"; 
        break; 
        case '22' : $jurusan = "D3-Teknik Informatika"; 
        break;
        case '24' : $jurusan = "Broadcasting"; 
        break; 
         
        default : $jurusan = "Salah jurusan"; 
        } 
  if (empty($_POST["tgs"])) {
    $tgsErr = "Nilai Tugas is required";
  } else {
    $tgs = test_input($_POST["tgs"]);
  }
  $tgs  = 0.4*$tgs;
  
  if (empty($_POST["uts"])) {
    $utsErr = "Nilai UTS is required";
  } else {
    $uts = test_input($_POST["uts"]);
  } 
  $uts  = 0.3*$uts;

  if (empty($_POST["uas"])) {
    $tgsErr = "Nilai UAS is required";
  } else {
    $tgs = test_input($_POST["uas"]);
  }
  
    $uas  = 0.3*$uas;
    $akhir = $tgs+$uts+$uas;

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form information FIK UDINUS</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<table>
        <tr>
            <td>Nim: <td><input type="text" name="nim">
            <span class="error">*Dont use character <?php echo $nimErr;?></span>
        </tr>
        <tr>
            <td>Nilai Tugas: <td><input type="number" name="tgs" min="0" max="100">
            <span class="error">* <?php echo $tgsErr;?></span>
        </tr>
        <tr>
            <td>Nilai UTS: <td><input type="number" name="uts" min="0" max="100">
            <span class="error"><?php echo $utsErr;?></span>
        </tr>
        <tr>
            <td>Nilai UAS: <td><input type="number" name="uas" min="0" max="100">
            <span class="error"><?php echo $uasErr;?></span>
        </tr>
        <tr>
       <td>Catatan Khusus</td>
       <td>
            <input type="checkbox" name="check_box1[]" value="
            Kehadiran >=70%">Kehadiran >=70%<br>
            <input type="checkbox" name="check_box2[]" value="
            Interaktif di kelas">Interaktif di kelas<br>
            <input type="checkbox" name="check_box3[]" value="Tidak
            Terlambat mengumpulkan tugas">Tidak
            Terlambat mengumpulkan tugas<br>
        </td>
        </tr>
        <tr><td></td>
        <td>   
            <input type="submit" name="submit" value="Submit">
        </td>
        </tr>  
</form>

<?php
echo "<table bgcolor=aqua=100% border=1>";
echo "<tr>";
echo "<td>NIM</td>";
echo "<td>Program Studi</td>";
echo "<td>Nilai Akhir</td>";
echo "<td>Status</td>";
echo "<td>Catatan Khusus</td>";
echo "</tr>";

echo "<tr>";
echo "<td>$nim</td>";
echo "<td>$jurusan</td>";


if ($akhir >=84)    {
    echo "<td><b>A</b></td>";
}else if ($akhir >=70)    {
    echo "<td><b>B</b></td>";
}else if ($akhir >=60)    {
    echo "<td><b>C</b></td>";
}else if ($akhir >=50)    {
    echo "<td><b>D</b></td>";
}else if ($akhir <=50)    {
    echo "<td><b>E</b></td>";
}
if ($akhir >=60)    {
    echo "<td>Anda LULUS</td>";
}else{
    echo "<td>Anda GAGAL</td>";
}
if(!empty($_POST['check_box1'])){
    foreach($_POST['check_box1'] as $selected){
        echo "<td>".$selected."<br>";
    }
}
if(!empty($_POST['check_box2'])){
    foreach($_POST['check_box2'] as $selected){
        echo $selected."<br>";
    }
}if(!empty($_POST['check_box3'])){
    foreach($_POST['check_box3'] as $selected){
        echo $selected."<br></td>";
    }
}
?>

</body>
</html>