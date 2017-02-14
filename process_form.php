



<?php 

$dsn = 'mysql:dbname=ehsas;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

//echo '<pre>'; print_r($_POST); die;


 => 2017-02-14
     => fsgdfgdfg
    [uaddress] => aaaa@ert.lo
    [uphone] => 9999999999
    [alternate_uphone] => 6666666666
    [ubloodGroup] => B Positive
    [udistrict] => Bandipora
    [unearbyhospital] => S.M.S.H Hospital
    [uhowuknow] => fgh fdgh dfgh dfgh






$last_time_donated	= $_POST['lastTimeDonated'];
$name				= $_POST['uname'];
$address			= $_POST
$contact			= $_POST
$alternate_contact	= $_POST
$blood_group		= $_POST
$district			= $_POST
$nearby_hospital	= $_POST
$how_you_know_us	= $_POST
$timestamp			= $_POST



$last_time_donated
$name
$address
$contact
$alternate_contact
$blood_group
$district
$nearby_hospital
$how_you_know_us
$timestamp


$column_names = ['last_time_donated','name','address','contact','alternate_contact','blood_group','district','nearby_hospital','how_you_know_us','timestamp'];

$sql = "INSERT INTO donor_list {$column_names} OUTPUT INSERTED.id VALUES (?)";
$sth = $dbh->prepare($sql);
$sth->bind_param(); 
$sth->execute(array('widgets'));
$temp = $sth->fetch(PDO::FETCH_ASSOC);




/* $stmt = $dbh->prepare("SELECT * FROM donor_list"); 
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
echo '<pre>'; print_r($result); die;  */




 ?>