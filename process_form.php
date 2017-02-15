<?php 

$dsn = 'mysql:dbname=ehsas;host=127.0.0.1';
$user = 'root';
$password = '';
$data = ['result' => false];

try {
    $dbh = new PDO($dsn, $user, $password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $data['msg'] = 'Connection failed: ' . $e->getMessage();
}

$column_names = "`last_time_donated`,`name`,`address`,`contact`,`alternate_contact`,`blood_group`,`district`,`nearby_hospital`,`how_you_know_us`";

$value_placeholders = ":last_time_donated, :name, :address, :contact, :alternate_contact, :blood_group, :district, :nearby_hospital, :how_you_know_us";

$values = [
	':last_time_donated'=> trim($_POST['lastTimeDonated']),
	':name'				=> trim($_POST['uname']),
	':address'			=> trim($_POST['uaddress']),
	':contact'			=> trim($_POST['uphone']),
	':alternate_contact'=> trim($_POST['alternate_uphone']),
	':blood_group'		=> trim($_POST['ubloodGroup']),
	':district'			=> trim($_POST['udistrict']),
	':nearby_hospital'	=> trim($_POST['unearbyhospital']),
	':how_you_know_us'	=> trim($_POST['uhowuknow'])
];

try{
	$sql = "INSERT INTO donor_list ({$column_names}) VALUES ({$value_placeholders})";
	$sth = $dbh->prepare($sql);
	$res = $sth->execute($values);
	$data['result'] = true;
} catch (PDOException $e) {
    echo 'Error : ' . $e->getMessage();
}

echo json_encode($data);
die;
