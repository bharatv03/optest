<script>
    jQuery(document).ready(function(){
        jQuery('.test-btn').click(function(){
            
            var logPage = '/optest/optest/usertest/0/'+jQuery(this).prop('id');
            window.open(logPage,'MsgWindow', 'status=0');
        });
    });
</script>
<div>
    <h1>Bank Preparation Area</h1>
    <div>
        <h3>Papers</h3>
        <table>
            <tr>
                <th>S. No</th>
                <th>Test Name</th>
                <th>Test Taken</th>
                <th>Test Date</th>
                <th>Your Score</th>
                <th></th>
            </tr>
            <?php
            $i = 1;
            foreach($papers as $value)
            { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $value['PaperSetMaster']['paper_set_name']; ?></td>
                <td><?php
                if(in_array($value['PaperSetMaster']['paper_set_id'], $in_scores))
                {
                    echo 'Yes';
                }
                else
                {
                    echo 'No';
                }
                ?></td>
                <td><?php
                if(in_array($value['PaperSetMaster']['paper_set_id'], $in_scores)){
                    echo $scores[$value['PaperSetMaster']['paper_set_id']]['test_taken'];
                }
                else
                {
                    echo 'Test not taken yet';
                } ?></td>
                <td><?php if(in_array($value['PaperSetMaster']['paper_set_id'], $in_scores)){
                    echo $scores[$value['PaperSetMaster']['paper_set_id']]['score'];
                }
                else
                {
                    echo 'Nil';
                } ?></td>
                <td><?php
                if(in_array($value['PaperSetMaster']['paper_set_id'], $in_scores)){
                    ?>
                    <a class="btn btn-primary btn-lg" id="<?php echo $value['PaperSetMaster']['paper_set_id']; ?>">Check Rank</a>
                    <?php
                }
                else
                { ?>
                    <a class="btn btn-primary btn-lg test-btn" id="<?php echo $value['PaperSetMaster']['paper_set_id']; ?>">Take Test</a>
                    <?php
                } ?></td>
            </tr>
            <?php $i++; } ?>
        </table>
    </div>
</div>