<?php
//conecting to the server
$conn = mysqli_connect('localhost', 'samy', 'text1234', 'phone');

//check the status of connectivity

if (!$conn) {
    echo 'connection error!' . mysqli_connect_error();
}

//write query for all contacts
$sql = "SELECT id,first_n,ocupation,p1,email FROM contacts ORDER BY id";
//make query and get result
$result = mysqli_query($conn, $sql);
//fetch the resulting row as array
$contacts = mysqli_fetch_all($result, MYSQLI_ASSOC);

//ERASE THE RESULTT
mysqli_free_result($result);

//close the coonnection

mysqli_close($conn);

if (isset($_POST['submit'])) {
    include "search.php";
}

?>





<!DOCTYPE html>
<html lang="en">

<?php include "header.php" ?>


<h4 class="text-warning center">Contacts</h4>
<div class="container">
    <div class="row">
        <?php foreach ($contacts as $contact) :   ?>
            <div class="col-md-3 col-sm-6">
                <div class="card z-depth-0" id="card">
                    <!-- <img src="img/download.jpg" class="pizza"> -->
                    <div class="card-content center">

                        <h6><?php echo htmlspecialchars($contact['first_n']); ?></h6>
                        <ul>
                            <div class="alert alert-danger" role="alert">
                                <list><label>Phone:</label></list>
                                <list><?php echo htmlspecialchars($contact['p1']); ?></list>
                            </div>
                            <div class="alert alert-warning" role="alert">
                                <list><?php echo htmlspecialchars($contact['email']); ?></list>
                            </div>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a class="brand-text" href="details.php?id=<?php echo $contact['id'] ?>">more info</a>
                    </div>
                </div>

            </div>

        <?php endforeach; ?>
    </div>
</div>





<?php include "footer.php" ?>

</html>