<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inbox | Distilled Waters</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Your Codespace</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <?php include("navbar.php"); ?>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <?php echo '<img src="'.$user->avatar_url.'" alt="" width="100" height="100">'; ?>

            <div class="name">
                <?php echo $user->login; ?>
            </div>
            <div class="job">
                <?php echo $user->bio; ?>
            </div>
        </div>

        <div class="sidenav-url">
            <?php include("sidenav.php"); ?>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>INBOX</h2>
        <div class="card">
            <div class="card-body">
              <p>Every user can see this message, its a test.</p>
              <br>
              <p
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>