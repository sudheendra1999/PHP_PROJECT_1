<?php

$conn = mysqli_connect('localhost', 'samy', 'text1234', 'phone');

if (!$conn) {
    echo 'connection error!' . mysqli_connect_error();
}

//takeing details from data base by id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    //make sql
    $sql = "SELECT * FROM contacts WHERE id=$id";
    //get the query result
    $result = mysqli_query($conn, $sql);
    //fetch the result in array format
    $contact = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
}

if (isset($_POST['delete'])) {

    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
    $sql = "DELETE FROM contacts where id=$id_to_delete";
    if (mysqli_query($conn, $sql)) {
        //success
        header('Location:index.php');
    } else {
        //failure
        echo 'query error:' . mysqli_error($conn);
    }
}
if (isset($_POST['submit'])) {
    require "search.php";
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; ?>

<div class="container center text-warning">
    <?php if ($contact) : ?>
        <h4><?php echo htmlspecialchars($contact['first_n']) . ' ' . htmlspecialchars($contact['last_n']); ?><h4>

                <p>Phone :<?php echo htmlspecialchars($contact['p1']); ?></p>
                <p>Phone :<?php echo htmlspecialchars($contact['p2']); ?></p>
                <p><?php echo htmlspecialchars($contact['email']); ?></p>
                <p><?php echo htmlspecialchars($contact['sec_email']); ?></p>
                <h5>Occupation:<?php echo htmlspecialchars($contact['ocupation']) ?></h5>
                <h5>Address</h5>

                <p><?php echo htmlspecialchars($contact['address']); ?></p>
                <!--delete form-->
                <form action="details.php" method="POST">
                    <input type="hidden" name="id_to_delete" value="<?php echo $contact['id']; ?>">
                    <input type="submit" name="delete" value="delete" class="btn brand z-depth-0">
                </form>

            <?php else : ?>
                <h5><?php echo 'no such contact exists</br>'; ?></h5>
            <?php endif; ?>
</div>







<?php include 'footer.php' ?>

</html>