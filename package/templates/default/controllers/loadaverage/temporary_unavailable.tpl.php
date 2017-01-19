<!DOCTYPE html>
<html>
<head>
    <title><?php echo LANG_LA_TPL_TITLE; ?> &mdash; <?php $this->sitename(); ?></title>
    <?php echo $this->getCSSTag('templates/default/css/theme-errors.css'); ?>
    <?php echo $this->getCSSTag('templates/default/css/theme-modal.css'); ?>
    <?php echo $this->getCSSTag('templates/default/css/theme-gui.css'); ?>
    <?php echo $this->getCSSTag('templates/default/css/theme-text.css'); ?>
    <?php echo $this->getJSTag('templates/default/js/jquery.js'); ?>
    <?php echo $this->getJSTag('templates/default/js/jquery-modal.js'); ?>
    <?php echo $this->getJSTag('templates/default/js/core.js'); ?>
    <?php echo $this->getJSTag('templates/default/js/modal.js'); ?>
</head>
<body>

    <?php
        $messages = cmsUser::getSessionMessages();
        if ($messages){ ?>
            <div class="sess_messages">
                <?php
                    foreach($messages as $message){
                        echo $message;
                    }
                ?>
            </div>
    <?php } ?>

    <div id="error-maintenance">
        <h1><?php echo LANG_LA_TPL_TITLE; ?></h1>
        <p><?php echo LANG_LA_TPL_HINT; ?></p>
    </div>

    <div id="error-maintenance-footer">
        <span>
            <a class="ajaxlink ajax-modal" href="<?php echo href_to('auth', 'login'); ?>"><?php echo LANG_LOGIN_ADMIN; ?></a>
        </span>
    </div>

</body>