<?php

//connect to database
$conn = mysqli_connect('localhost', 'samy', 'text1234', 'phone');
/*echo var_dump( $conn);*/
//check database connection
if (!$conn) {
    echo 'Connection error!' . mysqli_connect_error();
}

//variables for error!
$errors = ['first_n' => '', 'last_n' => '', 'ocupation' => '', 'address' => '', 'p1' => '', 'p2' => '', 'email' => '', 'sec_email' => ''];
$first_n = $last_n = $ocupation = $address = $p1 = $p2 = $email = $sec_email = '';

if (isset($_POST['submit'])) {

    //check for first_name

    if (empty($_POST['first_n'])) {
        $errors['first_n'] = 'A Name is required</br>';
    } else {
        $first_n = $_POST['first_n'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $first_n)) {
            $errors['first_n'] = 'Please Enter a valid Name</br>';
        }
    }
    //check for second name

    if (empty($_POST['last_n'])) {
        $errors['last_n'] = 'A Last Name is required</br>';
    } else {
        $last_n = $_POST['last_n'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $last_n)) {
            $errors['last_n'] = 'Please Enter a valid Name</br>';
        }
    }
    //check for occupation

    if (empty($_POST['ocupation'])) {
        $errors['ocupation'] = 'Occupation is required</br>';
    } else {
        $ocupation = $_POST['ocupation'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $ocupation)) {
            $errors['ocupation'] = 'Please Enter properly</br>';
        }
    }

    //check for address
    if (empty($_POST['address'])) {
        $errors['address'] = 'Address is required field';
    } else {
        $address = $_POST['address'];
    }

    //phone number check

    if (empty($_POST['p1'])) {
        $errors['p1'] = 'Phone number is required</br>';
    } else {
        $p1 = $_POST['p1'];
        if (!filter_var($p1, FILTER_SANITIZE_NUMBER_INT)) {
            $errors['p1'] = 'Please Enter valid Phone number</br>';
        }
    }
    if (empty($_POST['p2'])) {
        $errors['p2'] = 'Phone number is required</br>';
    } else {
        $p2 = $_POST['p2'];
        if (!filter_var($p2, FILTER_SANITIZE_NUMBER_INT)) {
            $errors['p2'] = 'Please Enter valid Phone number</br>';
        }
    }
    //check for email

    if (empty($_POST['email'])) {
        $errors['email'] = 'An email is required</br>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'email must be a valid email</br>';
        }
    }
    if (empty($_POST['sec_email'])) {
        $errors['sec_email'] = 'An email is required</br>';
    } else {
        $sec_email = $_POST['sec_email'];
        if (!filter_var($sec_email, FILTER_VALIDATE_EMAIL)) {
            $errors['sec_email'] = 'email must be a valid email</br>';
        }
    }


    if (array_filter($errors)) {
        //echo 'form as errors! </br>';
    } else { //echo 'form is valid</br>';
        $first_n = mysqli_real_escape_string($conn, $_POST['first_n']);
        $last_n = mysqli_real_escape_string($conn, $_POST['last_n']);
        $ocupation = mysqli_real_escape_string($conn, $_POST['ocupation']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $p1 = mysqli_real_escape_string($conn, $_POST['p1']);
        $p2 = mysqli_real_escape_string($conn, $_POST['p2']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $sec_email = mysqli_real_escape_string($conn, $_POST['sec_email']);

        //create SQL
        $sql = "INSERT INTO contacts(first_n,last_n,ocupation,address,p1,p2,email,sec_email) VALUES('$first_n','$last_n','$ocupation','$address','$p1','$p2','$email','$sec_email')";
        //save to db and check
        if (mysqli_query($conn, $sql)) {
            //success
            header('Location:index.php');
        } else {
            //error
            echo 'query error!' . mysqli_error($conn);
        }
    }
} //end of the check POST





?>














<!-- html -->
<!DOCTYPE html>
<html>
<style>
    form {
        max-width: 730px;
        margin: 20px auto;
        padding: 20px;
    }
</style>
<!-- headder -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Telephone directory</title>
</head>




<body class="#1565c0 blue darken-3">
    <nav class="#b0bec5 blue-grey lighten-3 z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Telephone Directory</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <!--  -->
                <li>
                    <a href="add.php" class="btn brand z-depth-0">Add a Contact</a>
                </li>
            </ul>
        </div>
    </nav>



    <!--headder-->

    <section class="container grey-text">

        <h4 class="text-warning">Add a New Contact</h4>
        <form class="white text-lg" action="add.php" method="POST">
            <label>Your First Name:</label>
            <input type="text" name="first_n" value="<?php echo htmlspecialchars($first_n); ?>">
            <div class="red-text"><?php echo $errors['first_n']; ?> </div>

            <label>Your Last Name:</label>
            <input type="text" name="last_n" value="<?php echo htmlspecialchars($last_n); ?>">
            <div class="red-text"> <?php echo $errors['last_n']; ?> </div>

            <label>Occupation:</label>
            <input type="text" name="ocupation" value="<?php echo htmlspecialchars($ocupation); ?>">
            <div class="red-text"> <?php echo $errors['ocupation']; ?> </div>

            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
            <div class="red-text"> <?php echo $errors['address']; ?> </div>

            <label>Phone number 1:</label>
            <input type="tel" name="p1" value="<?php echo htmlspecialchars($p1); ?>">
            <div class="red-text"> <?php echo $errors['p1']; ?> </div>

            <label>Phone number 2</label>
            <input type="tel" name="p2" value="<?php echo htmlspecialchars($p2); ?>">
            <div class="red-text"> <?php echo $errors['p2']; ?> </div>

            <label>email id :</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"> <?php echo $errors['email']; ?> </div>

            <label>second email id :</label>
            <input type="text" name="sec_email" value="<?php echo htmlspecialchars($sec_email); ?>">
            <div class="red-text"> <?php echo $errors['sec_email']; ?> </div>



            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
            </div>


        </form>
    </section>



    <?php include "footer.php" ?>

</html>