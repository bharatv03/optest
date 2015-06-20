<?php
$action = $this->action;
?>
 <?php
if($this->Session->check('userLog'))
{ ?>
<div class="menu-bar">
    <a <?php if($action != 'home'){ ?> href="<?php echo BASE_URL.$this->webroot.'optest/home'; ?>" <?php } ?>><div <?php if($action == 'home') { echo 'class="active-menu"'; }else { echo 'class="top-menu"'; }?> >
        Home
    </div></a>
    <a <?php if($action != 'bpa'){ ?> href="<?php echo BASE_URL.$this->webroot.'optest/bpa'; ?>" <?php } ?>><div <?php if($action == 'bpa') { echo 'class="active-menu"'; }else { echo 'class="top-menu"'; }?> >
        Bank Preparation Area
    </div></a>
    <a <?php if($action != 'rank'){ ?> href="<?php echo BASE_URL.$this->webroot.'optest/rank'; ?>" <?php } ?>><div <?php if($action == 'rank') { echo 'class="active-menu"'; }else { echo 'class="top-menu"'; }?> >
        Your Ranking
    </div></a>
    <a href=""><div class="top-menu">
        Leave Message
    </div></a>
    <?php
                if($this->Session->check('userLog'))
                {
                    ?>
                    <a href="<?php echo BASE_URL.$this->webroot.'users/logout'; ?>"><div class="top-menu">
                        Log Out
                    </div></a>
                    <?php
                }
            ?>
    <div class="clear-fix"></div>
</div>
<?php
                }
            ?>