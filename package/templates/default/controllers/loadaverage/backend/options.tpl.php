<?php
    $this->addJS('templates/default/js/jquery-ui.js');
    $this->addCSS('templates/default/css/jquery-ui.css');

    $this->addBreadcrumb(LANG_OPTIONS);

    $this->addToolButton(array(
        'class' => 'save',
        'title' => LANG_SAVE,
        'href'  => "javascript:icms.forms.submit()"
    ));

    if(file_exists(cmsConfig::get('cache_path').'is_temporary_unavailable_email_me')){
        $this->addToolButton(array(
            'class' => 'refresh',
            'title' => LANG_LA_CLEAR_SEND_EMAIL,
            'href'  => $this->href_to('clear_send_email')
        ));
    }

    $this->renderForm($form, $options, array(
        'action' => '',
        'method' => 'post'
    ), $errors);
?>
<script>
    $(function() {
        $('.auto_copy').on('click', function (){
            $(this).parents('.input-prefix-suffix').find('input').val($(this).data('path'));
            return false;
        });
        $(document).tooltip({
            items: '.tooltip',
            show: { duration: 0 },
            hide: { duration: 0 },
            position: {
                my: "center",
                at: "top-20"
            }
        });
        $('#action input').each(function (){
            $(this).on('click', function (){
                if($(this).is(':checked')){
                    v = $(this).val();
                    if(v == 1){
                        $('#f_email').show();
                    }
                } else {
                    v = $(this).val();
                    if(v == 1){
                        $('#f_email').hide();
                    }
                }
            }).triggerHandler('click');
        });
    });
</script>