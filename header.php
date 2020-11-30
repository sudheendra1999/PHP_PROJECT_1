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
                <li>
                    <form class="form-inline my-2 my-lg-0" method="POST">
                        <input class="form-control mr-sm-2" type="text" name="search" placeholder="Phone number or Name" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
                    </form>
                </li>
                <li>
                    <a href="add.php" class="btn brand z-depth-0">Add a Contact</a>
                </li>
            </ul>
        </div>
    </nav>