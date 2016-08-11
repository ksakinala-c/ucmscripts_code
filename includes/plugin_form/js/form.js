ucm = ucm || {};

function dtbaker_loading_button(btn){

    var $button = jQuery(btn);
    if($button.data('done-loading') == 'yes')return false;
    $button.data('done-loading','yes');
    // $button.prop('disabled',true);
    var _modifier = $button.is('input') || $button.is('button') ? 'val' : 'text';
    var existing_text = $button[_modifier]();
    var existing_width = $button.outerWidth();
    var loading_text = '⡀⡀⡀⡀⡀⡀⡀⡀⡀⡀⠄⠂⠁⠁⠂⠄';
    var completed = false;

    $button.css('width',existing_width);
    $button.addClass('dtbaker_loading_button_current');

    function delay_anim_text(){

        $button[_modifier](loading_text);

        var anim_index = [0,1,2];

        // animate the text indent
        function moo() {
            if (completed)return;
            var current_text = '';
            // increase each index up to the loading length
            for(var i = 0; i < anim_index.length; i++){
                anim_index[i] = anim_index[i]+1;
                if(anim_index[i] >= loading_text.length)anim_index[i] = 0;
                current_text += loading_text.charAt(anim_index[i]);
            }
            $button[_modifier](current_text);
            setTimeout(function(){ moo();},60);
        }

        moo();
    }
    setTimeout(delay_anim_text,500);

    function button_complete(){
        completed = true;
        $button[_modifier](existing_text);
        $button.removeClass('dtbaker_loading_button_current');
        $button.prop('disabled',false);
        $button.data('done-loading','finished');
    }
    setTimeout(button_complete,4000);

    return {
        done: function(){
            button_complete()
        }
    }

}

ucm.form = {
    settings: {
        dynamic_select_edit_url: ''
    },
    lang: {
        dynamic_select_edit_title: 'Edit Entries',
        cancel: 'Close'
    },
    init: function(){
        $('.submit_button').on( 'click', function(e) {
            var loading_button = dtbaker_loading_button(this);
            if (!loading_button) {
                e.preventDefault();
                return false;
            }
            return true;
        });
    },
    dynamic: function(object_id){

        var $object = $("#"+object_id);

        function set_add_remove_buttons(){
            $object.find('.remove_addit').show();
            $object.find('.add_addit').hide();
            $object.find('.add_addit:last').show();
            $object.find('.dynamic_block:only-child > .remove_addit').hide();
        }

        function selrem(e){
            e.preventDefault();
            var clickety = this;
            $(clickety).parents('.dynamic_block').remove();
            set_add_remove_buttons();
            return false;
        }
        function seladd(e){
            e.preventDefault();
            var clickety = this;
            //var box = $('#'+id+' .dynamic_block:last').clone(true);
            var x=0,old_names=[];
            // these pointless looking loops are because IE doesn't handle
            // cloning the name="" part of dynamic input boxes very well... ?
            $('input',$(clickety).parents('.dynamic_block')).each(function(){
                old_names[x++] = $(this).attr('name');
            });
            $('select',$(clickety).parents('.dynamic_block')).each(function(){
                old_names[x++] = $(this).attr('name');
            });
            var box = $(clickety).parents('.dynamic_block').clone(true); // todo - figure out if we need "true"
            x = 0;
            $('input',box).each(function(){
                if(typeof old_names[x] == 'string'){
                    $(this).attr('name', old_names[x]);
                }
                x++;
            });
            $('select',box).each(function(){
                if(typeof old_names[x] == 'string'){
                    $(this).attr('name', old_names[x]);
                }
                x++;
            });
            $('input,select',box).each(function(){
                $(this).val('');
                if($(this).hasClass('date_field')) {
                    $(this).removeClass('hasDatepicker');
                    $(this).datepicker('destroy');
                    // unique id for this date field/
                    $(this).attr('id', 'input_' + Math.floor(Math.random() * 1000));
                }

            });
            $('.dynamic_clear:input',box).val('');
            $('.dynamic_clear',box).html('');
            //$(clickety).after(box);
            $object.find('.dynamic_block:last').after( box);
            set_add_remove_buttons();
            load_calendars();
            return false;
        }

        $object.on('click','.add_addit',seladd);
        $object.on('click','.remove_addit',selrem);
        set_add_remove_buttons();

        return {

        };
    },

    dynamic_select_box: function(element){
        if($(element).val()=='create_new_item'){
            var current_val = $(element).val();
            if(current_val=='create_new_item')current_val = '';
            var id = $(element).attr('id');
            if(typeof id == 'object')id = $(element).prop('id');
            var name = $(element).attr('name');
            if(typeof name == 'object')name = $(element).prop('name');
            var html = '<input type="text" name="'+name+'" id="'+id+'" value="'+current_val+'">';
            // add a new input box.
            $(element).after('<span id="dynamic_select_box_placeholder"></span>');
            $(element).remove();
            var box = $(html);
            $('#dynamic_select_box_placeholder').after(box).remove();
            box[0].focus();
            box[0].select();
        }else if($(element).val()=='_manage_items') {


            var current_options = $(element).find('option:selected').data('items');
            $(element).find("option:selected").prop("selected", false);
            var buttons = {};
            buttons[ucm.form.lang.cancel] = function(){
                $(this).dialog('close');
            };

            function edit_items(){
                load_select_popup();
                $("#dynamic_select_popup").dialog({
                    autoOpen: false,
                    height: 600,
                    width: 600,
                    modal: true,
                    buttons: buttons,
                    open: function () {
                        $.ajax({
                            type: "POST",
                            url: ucm.form.settings.dynamic_select_edit_url,
                            data: current_options,
                            dataType: "html",
                            success: function (d) {
                                if ($('#dynamic_select_form', d).length < 1) {
                                    alert('Failed to load data. Please report this error.');
                                    //$(this).dialog('close');
                                    return false;
                                }
                                $('#dynamic_select_popup_inner').html(d);
                                $('.edit_dynamic_select_option').click(function(e){

                                    e.preventDefault();

                                    edit_individual_item($(this).data('item'))

                                    return false;

                                });

                            }
                        });
                    }
                }).dialog('open');

            }
            function edit_individual_item(item_data){
                load_select_popup();

                $("#dynamic_select_popup").dialog({
                    autoOpen: false,
                    height: 600,
                    width: 600,
                    modal: true,
                    buttons: buttons,
                    open: function () {
                        $.ajax({
                            type: "POST",
                            url: ucm.form.settings.dynamic_select_edit_url,
                            data: item_data,
                            dataType: "html",
                            success: function (d) {
                                if ($('#dynamic_select_form', d).length < 1) {
                                    alert('Failed to load data. Please report this error.');
                                    //$(this).dialog('close');
                                    return false;
                                }
                                $('#dynamic_select_popup_inner').html(d);


                            }
                        });
                    }
                }).dialog('open');
            }
            function load_select_popup(){
                $('#dynamic_select_popup').remove();
                $('body').append('<div id="dynamic_select_popup" title="' + ucm.form.lang.dynamic_select_edit_title + '"><div id="dynamic_select_popup_inner"></div></div>');
            }

            edit_items();



        }
    }

};

$(function(){
    ucm.form.init();
});
// backwards compat:
function dynamic_select_box(element){
    ucm.form.dynamic_select_box(element);
}
function seladd(){
    console.log('deprecated call to seladd()');
}
function selrem(){
    console.log('deprecated call to selrem()');
}
function set_add_del(object_id){
    console.log('deprecated call to set_add_del() - use ucm.form.dynamic() instead');
    new ucm.form.dynamic(object_id);
}