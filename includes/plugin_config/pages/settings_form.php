<form action="" method="post">

	<input type="hidden" name="_config_settings_hook" value="save_config">

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
    module_form::prevent_exit(array(
        'valid_exits' => array(
            // selectors for the valid ways to exit this form.
            '.submit_button',
        ))
    );

    module_form::print_form_auth();

    $fieldset_data = array(
        'elements' => array(),
    );

    if(isset($settings['settings']) && is_array($settings['settings'])){
        if(isset($settings['title'])){
            $fieldset_data['heading'] = array(
                'title' => $settings['title'],
                'type' => 'h3',
            );
        }else if(isset($settings['heading'])){
            $fieldset_data['heading'] = $settings['heading'];
        }
        $settings = $settings['settings'];
    }

    foreach($settings as $setting){
	    if(isset($setting['key']))$setting['name'] = 'config['.$setting['key'].']';
	    if($setting['type'] == 'html' && isset($setting['html']) && empty($setting['value'])){
		    $setting['value'] = $setting['html'];
	    }else{
		    $setting['value'] = module_config::c($setting['key'],isset($setting['default']) ? $setting['default'] : false);
	    }
	    $fieldset_data['elements'][] = array(
		    'title' => $setting['description'],
		    'field' => $setting,
	    );
    }

    echo module_form::generate_fieldset($fieldset_data);
    unset($fieldset_data);


    $form_actions = array(
        'class' => 'action_bar action_bar_center action_bar_single',
        'elements' => array(
            array(
                'type' => 'save_button',
                'name' => 'save',
                'value' => _l('Save settings'),
            ),
        ),
    );
    echo module_form::generate_form_actions($form_actions);




?>

</form>