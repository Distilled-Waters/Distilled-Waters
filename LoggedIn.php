<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Distilled Waters</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Distilled Waters</h1>
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
        <h2>SETTINGS</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Company</td>
                            <td>:</td>
                            <td><?php echo $user->company; ?></td>
                        </tr>
                        <tr>
                            <td>Location</td>
                            <td>:</td>
                            <td><?php echo $user->location; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2>SOCIALS</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="social-media">
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-facebook fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-invision fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-whatsapp fa-stack-1x fa-inverse"></i>
                    </span>
                    <span class="fa-stack fa-sm">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-snapchat fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
</body>
</html>