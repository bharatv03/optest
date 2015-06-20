<script>
    jQuery(document).ready(function(){
        jQuery('#ready').click(function(){
            if (jQuery('#confirm').prop('checked') == true) {
                jQuery('.error-checkbox').html('');
                jQuery.ajax({
                    type: "post",
                    url: "/optest/optest/checkdata",
                    data: {
                        language_session: jQuery('#select_lang').val() 
                    },
                    success: function(result) {
                        window.location='/optest/optest/optexam';
                    }
                });
            }
            else
            {
                jQuery('.error-checkbox').html('Please select the checkbox');
            }
            });
        });
</script>
<div id="user-exam">
    <div id="user-left-box">
        <div class="select-language">
            <select class="language">
                <option value="0">English</option>
                <option value="1">Hindi</option>
            </select>
        </div>
        
        <?php
        if($next != 1)
        { ?>
            <div id="next-button">
                <a href="/optest/optest/usertest/1" >Next</a>
            </div>
        <?php
        }else
        { ?>
            <div id="prev-button">
                <a href="/optest/optest/usertest" >Previous</a>
            </div>
            <div id="start-paper">
                <select id="select_lang" class="select-language">
                    <option value="0">English</option>
                    <option value="1">Hindi</option>
                </select>
                <input type="checkbox" id="confirm" /><label>Agree terms and conditions</label>
                <label class="error-checkbox"></label>
                <a id="ready" style="cursor: pointer" >I am ready to begin</a>
            </div>
        <?php
        } ?>
        
    </div>
    <div id="user-right-box">
        
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>