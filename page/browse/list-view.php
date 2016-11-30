<h2>Current Jobs</h2>
<?php if ($jobs === null)
    {echo 'There are currently no jobs available, please try again later';} ?>
<?php displayJob($jobs) ?>
    
    <?php if ($errors) { ?>
<!--    View for errors - loop through errors array-->
        <div class="errors">
            <p><?php echo $errors; ?></p>
        </div>
    <?php } ?>  