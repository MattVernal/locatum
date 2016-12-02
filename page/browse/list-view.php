<?php if ($jobs === null) {
    echo 'There are currently no jobs available, please try again later';
}
?>
<?php if ($errors) { ?>
    <!--    View for errors - loop through errors array-->
    <div class="errors">
        <p><?php echo $errors; ?></p>
    </div>
    <?php } ?>  
    
<div class="container">
    <?php if (!isset($_SESSION['email'])) : ?>
        <h1>You must be logged in to see this section</h1>
    <?php elseif (empty($jobs)): ?>
        <h1>No jobs found.</h1>
<?php else: ?>

        <div class="JobList">
            <h1>Current Jobs</h1>
                    <?php foreach ($jobs as $job): ?>
                <h2><a <?php echo "href= ../web/index-controller.php?module=browse&page=job&id=" . $job['Id_job'] . ">" ?>
        <?php echo $job['jobTitle'] . '</a>'; ?></a></h3>   
                    <div class="JobBox">
                        <div>

                        </div>
                        <div>                                    
                            <h3><span class="label">Start Date:</span> <?php echo $job['startDate'];?></h3>
                            <h3><span class="label">End Date:</span> <?php echo $job['endDate'];?></h3>
                        </div>
                        <div>
                            <h3><span class="label">Listed:</span> <?php echo $job['dateCreated'];?></h3>       
                            <h3><span class="label">Hourly Rate: $</span> <?php echo $job['hourlyRate'];?></h3>
                        </div>
                    </div>                    
        <?php endforeach; ?>
        </div>
<?php endif; ?>
</div>