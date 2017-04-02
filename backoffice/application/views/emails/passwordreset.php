<?php if (!defined('BASEPATH'))    exit('No direct script access allowed'); ?>



Hi <?php $name ?><br>
we have recieved password recovery request from you. Please ignore this mail if this was not initiate from you and if you intend to change your password please <a href="<?php echo $pass_recovery_link; ?>">click here</a>. 
<br>
If above link is not working visit following url in your browser<br>

<?php  echo $pass_recovery_link  ?>
