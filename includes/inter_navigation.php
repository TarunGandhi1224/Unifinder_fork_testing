<!--HEADER -->
    <header class="site-header" role="banner">
        <!-- NAVEBAR -->
       <div class="navbar-wrapper">
            <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="inter_index.php" class="navbar-brand"><img width="80" height="30" src="assets/img/UniTargetLogo.png" alt="UniFinder"></a>
                        <a href="inter_index.php" class="navbar-brand"><img width="80" height="30" src="assets/img/UniTargetLogo.png" alt="UniFinder"></a>
                    </div><!-- navbar-header -->
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="inter_index.php">Home</a></li>
                            <li><a href="inter_match.php">Match</a></li>
                            <li><a href="inter_financial.php">Ranking System</a></li>
                            <li><a href="inter_contact.php">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="inter_profile.php"><i class="fa fa-fw fa-user"></i>Profile</a>
                                    </li>

                   
<!--
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
-->
                   
                   
                                    <li class="divider"></li>
                                    <li>
                                        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div><!-- container -->
            </div><!--navbar -->
        </div><!-- navbar-wrapper -->

    </header>