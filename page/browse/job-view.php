<?php
if ($job === null && $clinic === null) {
    echo '<h1> Sorry, the requsted job couldnt be found </h1>';
}
?>
<div class="container">
    <div class="JobList">
        <h1><?php echo Utils::escape( $job->getJobTitle()); ?> - <?php echo Utils::escape( $clinic->getClinicName()); ?> </h1>   
        <div class="JobBox">
            <div>                                    
                <h3><span class="label">Start Date:</span><?php echo Utils::escape( $job->getStartDate()); ?></h3>
                <h3><span class="label">End Date:</span><?php echo Utils::escape( $job->getEndDate()); ?></h3>
            </div>
            <div>
                <h3><span class="label">Listed:</span><?php echo Utils::escape( $job->getDateCreated()); ?></h3>       
                <h3><span class="label">Hourly Rate: $</span><?php echo Utils::escape( $job->getHourlyRate()); ?></h3>
            </div>
            <div>
                <h3><span class="label">Location:</span><?php echo Utils::escape( $clinic->getAddress()); ?></h3>
                <h3><span class="label">Reference Number: <?php echo Utils::escape( $job->getId()); ?></span></h3>

            </div>
            <div>
                <h3><span class="label">Description:</span></h3>
                <p><?php echo Utils::escape( $job->getDescription()); ?></p>
            </div>
            <div>
                <h3><span class="label">Contact Name:</span><?php echo Utils::escape( $clinic->getContactName()); ?></h3>
                <h3><span class="label">Email:</span>Someone@example.com</h3>
                <h3><span class="label">Phone Number:</span>80800123456</h3>
            </div>
        </div>
    </div>

    <?php if ($errors) { ?>
        <!--    View for errors - loop through errors array-->
        <div class="errors">
            <p><?php echo $errors; ?></p>
        </div>
    <?php } ?>  