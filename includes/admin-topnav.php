<!-- Header -->
<header class="navbar navbar-expand-md navbar-dark sticky-top background-color-green-visible shadow-sm py-0">

        <div class="container-fluid p-0 pe-3 pe-md-0">

        <?php if($_SESSION['role'] == 'super_admin'){ ?>
            <a class="navbar-brand col-md-3 col-lg-3 col-xl-2 me-0 px-3 py-3 background-super-admin" href="../home/">

        <?php } else if($_SESSION['role'] == 'phsi_admin' || ($_SESSION['role'] == 'phsi_content_admin')) { ?>
            <a class="navbar-brand col-md-3 col-lg-3 col-xl-2 me-0 px-3 py-3 background-color-green" href="../home/">
        <?php } else if($_SESSION['role'] == 'unesco_admin' || ($_SESSION['role'] == 'unesco_content_admin')) { ?>
            <a class="navbar-brand col-md-3 col-lg-3 col-xl-2 me-0 px-3 py-3 background-color-maroon" href="../home/">
        <?php } ?>

            
        <?php if($_SESSION['role'] == 'super_admin') { ?>
        <!--<img class="logo-icon" src="../images/logos/phsi.png" alt="">-->
        <span class="ms-2 logo-name">Super Admin</span>
        
        <?php  } else if($_SESSION['role'] == 'phsi_admin') { ?>
        <!--<img class="logo-icon" src="../images/logos/new-unesco.png" alt="">-->
        <span class="ms-2 logo-name">PHSI Admin</span>
        <?php  } else if($_SESSION['role'] == 'unesco_admin') { ?>
        <!--<img class="logo-icon" src="../images/logos/new-unesco.png" alt="">-->
        <span class="ms-2 logo-name">UNESCO Admin</span>
        <?php } ?>

        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse"></div>
        <div class="dropdown text-end me-3 d-none d-md-block">
            <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../uploads/<?php echo $_SESSION['profile_picture']; ?>" alt="mdo" width="32" height="32" class="rounded-circle">
            </a>
            <ul class="dropdown-menu text-small dropdown-user">
                <li><a class="dropdown-item" href="../admin/admin_profile.php">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="../login/logout.php">Sign out</a></li>
            </ul>
        </div>
    </div>
</header>

