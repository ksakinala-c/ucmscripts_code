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


$search = isset($_REQUEST['search']) ? $_REQUEST['search'] : array();
$customers = module_customer::get_customers($search);


$pagination = process_pagination($customers);

?>

<h2>
    <?php if(module_customer::can_i('create','Customers')){ ?>
	<span class="button">
		<?php echo create_link("Create New Customer","add",module_customer::link_open('new')); ?>
	</span>
    <?php
    }
    ?>
	<span class="title">
		<?php echo _l('Customers'); ?>
	</span>
</h2>


<form action="" method="post">

<table class="search_bar" width="100%">
	<tr>
		<th><?php _e('Filter By:'); ?></th>
		<td width="140">
			<?php _e('Names, Phone or Email:');?>
		</td>
		<td>
			<input type="text" style="width: 240px;" name="search[generic]" class="" value="<?php echo isset($search['generic'])?htmlspecialchars($search['generic']):''; ?>">
		</td>
		<td width="60">
            <?php _e('Address:');?>
		</td>
		<td>
			<input type="text" style="width: 180px;" name="search[address]" class="" value="<?php echo isset($search['address'])?htmlspecialchars($search['address']):''; ?>">
		</td>
        <?php if(class_exists('module_group',false) && module_customer::can_i('view','Customer Groups')){ ?>
        <td width="60">
            <?php _e('Group:');?>
        </td>
        <td>
            <?php echo print_select_box(module_group::get_groups('customer'),'search[group_id]',isset($search['group_id'])?$search['group_id']:false,'',true,'name'); ?>
        </td>
        <?php } ?>
		<td align="right" rowspan="2">
			<?php echo create_link("Reset","reset",module_customer::link_open(false)); ?>
			<?php echo create_link("Search","submit"); ?>
		</td>
	</tr>
</table>

<?php echo $pagination['summary'];?>
<table width="100%" border="0" cellspacing="0" cellpadding="2" class="tableclass tableclass_rows">
	<thead>
	<tr class="title">
		<th id="customer_name"><?php echo _l('Customer Name'); ?></th>
		<th><?php echo _l('Phone Number'); ?></th>
		<th id="primary_contact_email"><?php echo _l('Email Address'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php
	$c=0;
	foreach($pagination['rows'] as $customer){ ?>
        <tr class="<?php echo ($c++%2)?"odd":"even"; ?>">
            <td class="row_action">
	            <?php echo module_customer::link_open($customer['customer_id'],true); ?>
            </td>
            <td>
				<?php
				if($customer['primary_user_id']){
					module_user::print_contact_summary($customer['primary_user_id'],'html',array('phone|mobile'));
				}else{
					echo '';
				}
				?>
            </td>
            <td>
				<?php
				if($customer['primary_user_id']){
					module_user::print_contact_summary($customer['primary_user_id'],'html',array('email'));
				}else{
					echo '';
				}
				?>
            </td>
        </tr>
	<?php } ?>
  </tbody>
</table>
<?php echo $pagination['links'];?>
</form>