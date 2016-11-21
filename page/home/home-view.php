<div class="jumbotron">
    <h1>Your locum recruitment specialists</h1> 
    <a>Sign Up</a>
    <?php 
    if (isset($_SESSION['email'])){
    echo '<h2> hello ' .$_SESSION['email']. ' you are currently logged in as ' . $_SESSION['role'] . ' </h2>';  
    }?>
</div>
<div class="container">
</div>