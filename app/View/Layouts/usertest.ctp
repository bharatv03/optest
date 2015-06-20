<!doctype html>

<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <?php
    //css includes
    echo $this->Html->css('style');
    echo $this->Html->css('bootstrap');
    
    //js includes
    echo $this->Html->script('jquery-1.11.0');
    echo $this->Html->script('jquery.validate.min');
    echo $this->Html->script('jquery.redirect.min');
    echo $this->Html->script('bootstrap.min');
    ?>
     <link rel="icon" href="<?php echo $this->webroot.'img/optest/fav-icon.png'; ?>" type="image/png" sizes="16x16"> 
</head>
<body>
    <div id="wrap">
        <div id="header">
            <h2>Online OPT Examintaion</h2>
        </div>
        <?php
        //include_once('common/tabs.ctp');
        echo $this->fetch('content');
        ?>
        <?php //echo $this->element('sql_dump'); ?>
        <div id="footer">OPT Examintation Version 1.0</div>
    </div>
</body>
</html>
