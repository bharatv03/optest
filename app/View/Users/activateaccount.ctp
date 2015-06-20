<?php
if($activation == 'sucess')
{ ?>
    <div class="alert alert-success text-center">
        Your account has been activated successfully please sign and complete your profile.
    </div>
    <div class="login-url"><a href="<?php echo BASE_URL.$this->webroot.'optest/' ?>">Click here </a>to Log In.</div>
<?php
}
else
{
    ?>
    <div class="alert alert-danger text-center">
        <?php echo $activation; ?>
    </div>
    <?php
}