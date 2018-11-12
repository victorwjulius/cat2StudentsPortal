<?php
session_start();

include 'header.php';
?>

<div class="main row">
    <div class="main-left col-sm-8">
        <div class="text-books r"><a href="#">text books</a></div>
        <div class="lecture-notes r"><a href="#">lecture notes</a></div>
        <div class="references bg-primary r"><a href="#">references</a></div>
    </div>
    <div class="main-right col-sm-4">
        <div class="up-small bg-warning">
            <p style="align-self: start; padding-left: 5px">You are logged in as <?php echo $_SESSION["susername"];?><br>
                <a href="home.php">Log-Out</a></p>
            <a href="#" style="padding-left: 5px">assignments</a>
        </div>
        <div class="down-big bg-warning"><a href="#">tutorials</a></div>
    </div>
</div>

<?php
include 'footer.php';
?>
</body>
</html>
