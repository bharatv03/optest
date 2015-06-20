<?php
echo $this->Html->script('optest');
?>
<div class="max-main">
    <?php
    $message = $this->Session->flash();
    if($message != "")
    {
        ?>
        <div class="alert alert-success text-center">
            <?php
            echo $message;
            ?>
        </div>
    <?php }
    
    if(isset($errorMsg))
    {
        ?>
        <div class="alert alert-danger text-center">
            <?php
            echo $errorMsg;
            ?>
        </div>
        <?php
    }
    ?>
    <div>
        <?php
            echo $this->Form->create(array('id'=>'optest_form','url'=>array('controller'=>'users', 'action'=>'login')));
            echo $this->Form->input('',array('label'=>EM_UN,'type'=>'text', 'id'=>'u_er', 'name'=>'u_er'));   //text
            echo $this->Form->input('',array('label'=>PASSWORD,'type'=>'password', 'id'=>'pass', 'name'=>'pass'));   //password
            echo $this->Form->submit(LOGIN_BTN,array('id'=>'submit_login', 'class'=>'btn btn-primary btn-lg', 'name'=>'submit_login'));
            echo $this->Form->end();
        ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel"><?php echo REGISTER_FORM; ?> <span id="for_acc"><?php echo INDIVIDUAL_STUDENT; ?></span></h4>
          </div>
          <div class="modal-body">
            <div id="data-not" style="margin: 0px; padding: 0px" class="alert text-center"></div>
            <?php
            echo $this->Form->create(array('id'=>'signup_form','url'=>array('controller'=>'users', 'action'=>'signup'))); ?>
            
            <div class="btn-group margin-5" data-toggle="buttons">
                <h5 class="d-block-in float top-margin-30">Please select account type:</h5>
                <label class="btn btn-primary active float brp">
                  <input type="radio" name="account_type" value="0" id="option1" class="user_type" autocomplete="off" checked> <?php echo INDIVIDUAL_STUDENT; ?>
                </label>
                <label class="btn btn-primary float brp left-margin-10">
                  <input type="radio" name="account_type" value="1" id="option2" class="user_type" autocomplete="off"> <?php echo INSTITUTE; ?>
                </label>
            </div>
            <label class="float"><?php echo EM_UN; ?></label>
            <?php
            echo $this->Form->input('',array('type'=>'text','label'=>false, 'id'=>'u_e', 'name'=>'u_e'));   //text
            ?>
            <label class="float"><?php echo PASSWORD; ?></label>
            <?php echo $this->Form->input('',array('type'=>'password', 'label'=>false, 'id'=>'password', 'name'=>'password'));   //password ?>
            <label class="float"><?php echo CPASSWORD; ?></label>
            <?php echo $this->Form->input('',array('type'=>'password', 'label'=>false, 'id'=>'cpassword', 'name'=>'cpassword'));   //password ?>
            <div  class="clear-fix"></div>
            <div id="captcha">
            </div>
            <label class="float"><?php echo CAPTCHA; ?></label>
            <?php
            echo $this->Form->input('',array('label'=>false,'type'=>'text', 'name'=>'captcha_box', 'id'=>'captcha_box'));   //day, month, year, hour, minute,
            ?>
            <div class="clear-fix"></div>
            <button type="button" class="btn btn-default" id="refresh_captch"><?php echo CAPTCHA_BTN; ?></button>
            <?php
            echo $this->Form->submit(SIGNUP_BTN,array('id'=>'submit_signup', 'class'=>'btn btn-primary btn-lg', 'name'=>'submit_signup'));
            echo $this->Form->end();
            ?>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    <div>
        <a class="btn btn-default" href="#"><?php echo RESET_BTN; ?></a>
        <a class="btn btn-default" data-toggle="modal" id="join-us" data-target="#myModal"><?php echo JOIN_US; ?></a>
    </div>
</div>