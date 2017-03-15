<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>


Hi <br>
Blood request recieved from <?php echo $name; ?><br>
<br>
<table>
	<thead>
		<tr>
			<th>Column</th>
			<th>Value</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Name</td>
			<td><?php echo $name; ?></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><?php echo $phone; ?></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><?php echo $mobile; ?></td>
		</tr>
		<tr>
			<td>Alternate mobile</td>
			<td><?php echo $alternateMobile; ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $email; ?></td>
		</tr>
		<tr>
			<td>Patient Name</td>
			<td><?php echo $patient_name; ?></td>
		</tr>
		<tr>
			<td>Patient age</td>
			<td><?php echo $patient_age; ?></td>
		</tr>
		<tr>
			<td>Patient gender</td>
			<td><?php echo $patient_gender; ?></td>
		</tr>
		<tr>
			<td>Blood grouop required</td>
			<td><?php echo $blood_group; ?></td>
		</tr>
		<tr>
			<td>Number of units required</td>
			<td><?php echo $number_of_units; ?></td>
		</tr>
		<tr>
			<td>Required before</td>
			<td><?php echo $required_before; ?></td>
		</tr>
		<tr>
			<td>Reason for requirement</td>
			<td><?php echo $reason; ?></td>
		</tr>
		<tr>
			<td>Hospital</td>
			<td><?php echo $hospital_name; ?></td>
		</tr>
		<tr>
			<td>City</td>
			<td><?php echo $city; ?></td>
		</tr>
		<tr>
			<td>State</td>
			<td><?php echo $state; ?></td>
		</tr>
		<tr>
			<td>Country</td>
			<td><?php echo $country; ?></td>
		</tr>
		<tr>
			<td>Lane address</td>
			<td><?php echo $address; ?></td>
		</tr>
		<tr>
			<td>Recieved on</td>
			<td><?php echo $recievedAt; ?></td>
		</tr>
	</tbody>
</table>
		

