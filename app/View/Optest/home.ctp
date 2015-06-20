<div class="user-head">
    Welcome,<br />
    <?php
    if( $user['first_name'] == "")
    {
        echo $user['email'];
    }
    else
    {
        echo $user['first_name'].' '.$user['last_name'];
    }
    ?>
</div>
<div>
    <?php
    $userArray = array('modified', 'created', 'payment_status', 'activation_link', 'status', 'ref_by', 'user_type', 'affiliate', 'password', 'sub_domain', 'id');
    $profileTotal = sizeof($user) - sizeof($userArray);
    $complete = 0;
    foreach($user as $key=>$val)
    {
        
        if($val != "" && $val != NULL && !in_array($key, $userArray))
        {
            $complete++;
        }
    }
    $profileCompletePercent = floor( ( (int)$complete / (int)$profileTotal ) * 100);
    if($profileCompletePercent > 120)
    {
        $profileCompletePercent = 120;
    }
    if($profileCompletePercent < 0)
    {
        $profileCompletePercent = 0;
    }
    ?>
    <div id="profile-percent-bar" style="width: 100px; border: solid; border-width:1px; display: inline-block; border-color:#00AEB7">
        <div id="profile-compelete-bar" style="width: <?php echo $profileCompletePercent ?>px; display: inline-block; background-color:#FF9900 ; text-align: center">
            <span style="margin: 100%; color: #FF9900"></span>
        </div>
    </div>
    <span style="color: #FF9900"><?php echo $profileCompletePercent.'%'; ?></span>
</div>