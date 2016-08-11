<?php 
/** 
  * Copyright: dtbaker 2012
  * Licence: Please check CodeCanyon.net for licence details. 
  * More licence clarification available here:  http://codecanyon.net/wiki/support/legal-terms/licensing-terms/ 
  * Deploy: 8355 2b2c359eb59e7773b80f07b9b4ee60fe
  * Envato: 9c900e67-0d83-4654-a65d-64710ffc8468
  * Package Date: 2016-07-19 00:42:15 
  * IP Address: 192.168.1.161
  */

$data_types = $module->get_data_types();

?>
<h2><?php echo _l('Select Type'); ?></h2>

<?php foreach($data_types as $data_type){
	?>
	
	<a class="uibutton" href="<?php echo $module->link('',array('data_type_id'=>$data_type['data_type_id'],'data_record_id'=>'new','mode'=>'edit'));?>"><?php echo $data_type['data_type_name'];?></a>
	
	<?php
}
?>
