<script>
    jQuery(document).ready(function(){
        
        timeLimit = jQuery('.timer').prop('id');
        timeLimit = timeLimit.split(':');
        timeHours = timeLimit[0];
        if (timeLimit[1] == 0) {
            timeHours = timeLimit[0]-1 ;
        }
        timeSeconds = timeLimit[2];
        timeMinute  = ((timeLimit[1]*10)-1);
        if (timeMinute < 0) {
            timeMinute = 59;
        }
        jQuery('.timer').html(timeLimit[0]+':'+timeMinute+':'+timeSeconds);
        secondBefore = 0;
        minuteBefore = 0;
        setInterval(function(){
            if ( (timeSeconds > 0 && timeMinute > -1 && timeHours> -1) && (timeSeconds + timeMinute + timeHours != 0) ) {
                timeSeconds = timeSeconds - 1;
                if (timeMinute<10 && parseInt(minuteBefore) != parseInt(timeMinute) ) {
                    timeMinute = '0'+timeMinute;
                    minuteBefore = timeMinute;
                }
                if (timeSeconds<10 && parseInt(timeSeconds) != parseInt(secondBefore)) {
                    timeSeconds = '0'+timeSeconds;
                    secondBefore = timeSeconds;
                }
                jQuery('.timer').html(timeHours+':'+timeMinute+':'+timeSeconds);
            }else if( (timeSeconds == 0 && timeMinute > -1 && timeHours > -1) && (timeSeconds + timeMinute + timeHours != 0))
            {
                timeSeconds = 59;
                timeMinute = timeMinute-1;
                if (timeMinute == -1) {
                    timeMinute = 59;
                    timeHours = timeHours -1;
                    if (timeHours == -1) {
                        timeSeconds = -2
                        jQuery('.timer').html('examover');
                    }
                }
                if (timeMinute<10 && parseInt(minuteBefore) != parseInt(timeMinute) ) {
                    timeMinute = '0'+timeMinute;
                    minuteBefore = timeMinute;
                }
                if (timeSeconds<10 && parseInt(timeSeconds) != parseInt(secondBefore)) {
                    timeSeconds = '0'+timeSeconds;
                    secondBefore = timeSeconds;
                }
                jQuery('.timer').html(timeHours+':'+timeMinute+':'+timeSeconds);
            }
            else if ((timeSeconds + timeMinute + timeHours == 0)) {
                        timeSeconds = -2;
                        jQuery('.timer').html('examover');
                        stop();
            }
            /*update timer*/
            jQuery.ajax({
                    type: "post",
                    url: "/optest/users/updatetimer",
                    data: {
                        ht: timeHours,
                        mt: timeMinute,
                        st: timeSeconds
                    },
                    success: function(result) {
                        //console.clear();
                    }
                });
            /*end ajax*/
            if (timeHours == 0 && timeMinute == 4) {
                jQuery('.timer').addClass('time-small');
            }
        },1000);
        
        jQuery('.section-tab').on('click',function(){
            var currentTabId = jQuery(this).attr('id');
            /*update timer*/
            //jQuery.ajax({
            //        type: "post",
            //        url: "/optest/optest/changeTab",
            //        data: {
            //            give: currentTabId
            //        },
            //        success: function(result) {
            //            jQuery('.exam-area').html('');
            //            jQuery('.exam-area').html(result);
            //            //console.clear();
            //        }
            //    });
            $().redirect('changeTab', {'give': currentTabId});
        });
        jQuery('.down-box button').on('click',function(){
            var currentTabId = jQuery(this).html();
            $().redirect('changeQue', {'give': currentTabId});
        });
        jQuery('.view-que span').html(jQuery('.active-tab').html());
    });
</script>
<div class="exam-area">
<div class="left-exam">
<div class="section-tabs">
    <?php
    foreach($section_tab as $valueTab)
    {
        ?>
        <div class="<?php if(isset($currentQue[$valueTab['SectionMaster']['id']])){ echo 'active-tab'; } ?> section-tab" id="<?php echo base64_encode($valueTab['SectionMaster']['id']); ?>"><?php echo $valueTab['SectionMaster']['section_name']; ?></div>
        <?php
    } ?>
    <div class="clear-fix"></div>
</div>

<?php
foreach($currentQue as $forKey=>$valueQue)
{
    if($language == 0)
    {
    ?>
    
    <div id="<?php echo 'for-'.$forKey.'-q-'.$valueQue['queNo']; ?>">
        <label>Question no : <?php echo $valueQue['queNo']; ?></label>
    </div>
        <div id="q-<?php echo $valueQue[0]['final_id']; ?>" class="<?php echo $valueQue[0]['question_for']; ?> english"><?php echo $valueQue[0]['e_sub_question']; ?></div>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['e_a']; ?>"><label><?php echo $valueQue[0]['e_a']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['e_b']; ?>"><label><?php echo $valueQue[0]['e_b']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['e_c']; ?>"><label><?php echo $valueQue[0]['e_c']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['e_d']; ?>"><label><?php echo $valueQue[0]['e_d']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['e_e']; ?>"><label><?php echo $valueQue[0]['e_e']; ?></label>
        <br />
        <button>Mark for Review & Next</button>
        <button>Clear Response</button>
        <button>Save & Next</button>
    <?php // echo $this->element('sql_dump'); ?>
    <?php
    }
    else
    {
        ?>
        <div id="<?php echo 'for-'.$forKey.'-q-'.$valueQue['queNo']; ?>">
            <label>Question no : <?php echo $valueQue['queNo']; ?></label>
        </div>
        <div id="q-<?php echo $valueQue[0]['final_id']; ?>" class="<?php echo $valueQue[0]['question_for']; ?> hindi"><?php echo $valueQue[0]['h_sub_question']; ?></div>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['h_a']; ?>"><label><?php echo $valueQue[0]['h_a']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['h_b']; ?>"><label><?php echo $valueQue[0]['h_b']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['h_c']; ?>"><label><?php echo $valueQue[0]['h_c']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['h_d']; ?>"><label><?php echo $valueQue[0]['h_d']; ?></label>
        <input type="radio" name="<?php echo $valueQue[0]['final_id']; ?>" value="<?php echo $valueQue[0]['h_e']; ?>"><label><?php echo $valueQue[0]['h_e']; ?></label>
        <br />
        <button>Mark for Review & Next</button>
        <button>Clear Response</button>
        <button>Save & Next</button>
        <?php
    }
} ?>
</div>
<div class="right-exam">
    <div class="up-box">
        <div class="float-left">
            <span>Your Profile pic</span>
        </div>
        <div class="float-left time-box">
            <div> Time Left</div>
            <div id="<?php echo $time_limit[0].':'.$time_limit[1].':'.$time_limit[2]; ?>" class="timer">
            </div>
        </div>
        <div class="clear-fix"></div>
    </div>
    <div class="down-box">
        <div class="view-que">
            Your are viewing <span></span> section.
        </div>
        <?php
        foreach($this->Session->read('paperData')[$this->Session->read('currentTab')] as $keyPage=> $queVal)
        {
            ?>
            <button><?php echo ($keyPage + 1); ?></button> 
            <?php
        }
        ?>
    </div>
</div>
<div class="clear-fix"></div>
</div>