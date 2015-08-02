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
            jQuery().redirect('changeTab', {'give': currentTabId});
        });
        jQuery('.down-box button').on('click',function(){
            var currentTabId = jQuery(this).html();
            jQuery().redirect('changeQue', {'give': currentTabId});
        });
        jQuery('.view-que span').html(jQuery('.active-tab').html());
        
        /*clear response work*/
        jQuery('#clear-answer').on('click',function(){
            jQuery('input[type=radio]').attr('checked',false); 
        });
        
    });
</script>