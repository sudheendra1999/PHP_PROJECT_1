<?php

$conn = mysqli_connect('localhost', 'samy', 'text1234', 'phone');
if (!$conn) {
    echo 'connection error!' . mysqli_connect_error();
}

//search bar

if (isset($_POST['submit'])) {
    if (!empty($str = $_POST['search'])) {
        $sql = "SELECT * FROM contacts WHERE first_n='$str' OR p1='$str'" or die("not found ");

        $result = mysqli_query($conn, $sql);
        //fetch the resulting row as array
        $contact = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // print_r($contact);

        mysqli_free_result($result);

        //close the coonnection

        mysqli_close($conn);
    } else {

        echo 'enter the name or number';
    };
}



?>

<!DOCTYPE html>
<html lang="en">
<style>
    #king {
        width: 70%;
        padding: 30px 50px;
        margin: 30px 50px 50px 10px;
        background-color: lightslategrey;
    }
</style>
<?php include "header.php" ?>
<!-- php for looping -->
<?php foreach ($contact as $cont) : ?>
    <div class="container-fluid" id="king">
        <div class="alert alert-primary" role="alert">
            <label>Name:</label> <?php echo htmlentities($cont['first_n']); ?>
        </div>
        <div class="alert alert-secondary" role="alert">
            <label>Last Name:</label> <?php echo htmlentities($cont['last_n']); ?>
        </div>
        <div class="alert alert-success" role="alert">
            <label>Occupation:</label> <?php echo htmlentities($cont['ocupation']); ?>
        </div>
        <div class="alert alert-danger" role="alert">
            <label>Phone:</label> <?php echo htmlentities($cont['p1']); ?>
        </div>
        <div class="alert alert-warning" role="alert">
            <label>Phone:</label> <?php echo htmlentities($cont['p2']); ?>
        </div>
        <div class="alert alert-info" role="alert">
            <label>Email:</label> <?php echo htmlentities($cont['email']); ?>
        </div>
        <div class="alert alert-light" role="alert">
            <label>Email:</label> <?php echo htmlentities($cont['sec_email']); ?>
        </div>
        <div class="alert alert-dark" role="alert">
            <label>Address:</label> <?php echo htmlentities($cont['address']); ?>
        </div>

    <?php endforeach; ?>




    </div>











    <?php include "footer.php"; ?>

</html>