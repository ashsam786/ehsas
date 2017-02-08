



<?php 

$dsn = 'mysql:dbname=ehsas;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


is
last_time_donated
name
address
contact
alternate_contact
blood_group
district
nearby_hospital
how_you_know_us
timestamp


foreach( $dbh->query("SELECT * FROM donor_list") as $i => $row){ 
        print_r($i); 
} 

die;

$sql = "INSERT INTO donor_list () OUTPUT INSERTED.id VALUES (?)";
$sth = $dbh->prepare($sql);
$sth->execute(array('widgets'));
$temp = $sth->fetch(PDO::FETCH_ASSOC);



echo '<pre>'; print_r($_POST); die;
 ?>