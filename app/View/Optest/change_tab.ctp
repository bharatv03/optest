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