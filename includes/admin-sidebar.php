<?php if($_SESSION['role'] == 'super_admin'){ ?>
<nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block background-super-admin sidebar collapse">

<?php } else if($_SESSION['role'] == 'phsi_admin' || ($_SESSION['role'] == 'phsi_content_admin')) { ?>
    <nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block background-color-green sidebar-phsi collapse">
        
<?php } else if ($_SESSION['role'] == 'unesco_admin' || ($_SESSION['role'] == 'unesco_content_admin')) { ?>
    <nav id="sidebarMenu" class="col-md-3 col-lg-3 col-xl-2 d-md-block background-color-maroon sidebar-unesco collapse">
<?php } ?>


    <div class="position-sticky h-100">
        <ul class="nav flex-column">

        
            <li class="nav-item">
                <a href="../admin/admin.php" class="nav-link <?php echo $dashboard; ?>" title="Dashboard">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'unesco_admin'){ ?>
            <li class="nav-item">
                <a href="../user_management" class="nav-link <?php echo $users; ?>" title="User Management">
                    <i class='bx bx-group'></i>
                    <span class="links-name">User Management</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_events.php" class="nav-link <?php echo $phsi_events; ?>" title="PHSI Events">
                    <i class='bx bx-send'></i>
                    <span class="links-name">PHSI Events</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_events.php" class="nav-link <?php echo $unesco_events; ?>" title="UNESCO Events">
                    <i class='bx bx-send'></i>
                    <span class="links-name">UNESCO Events</span>
                </a>
            </li>
            <?php } ?>
            
            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_news.php" class="nav-link <?php echo $phsi_news ?>" title="PHSI News Content">
                    <i class='bx bx-book-reader'></i>
                    <span class="links-name">PHSI News Content</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_news.php" class="nav-link <?php echo $unesco_news ?>" title="UNESCO News Content">
                    <i class='bx bx-book-reader'></i>
                    <span class="links-name">UNESCO News Content</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_carousel.php" class="nav-link <?php echo $phsi_carousel; ?>" title="PHSI Carousel">
                    <i class='bx bxs-right-arrow'></i>
                    <span class="links-name">PHSI Carousel</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_carousel.php" class="nav-link <?php echo $unesco_carousel; ?>" title="UNESCO Carousel">
                     <i class='bx bxs-right-arrow'></i>
                    <span class="links-name">UNESCO Carousel</span>
                </a>
            </li>
            <?php } ?>


            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_administration.php" class="nav-link <?php echo $phsi_admins; ?>" title="PHSI Administration">
                    <i class='bx bx-group' ></i>
                    <span class="links-name">PHSI Administration</span>
                </a>
            </li>
            <?php } ?>


            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_administration.php" class="nav-link <?php echo $unesco_admins; ?>" title="UNESCO Administration">
                    <i class='bx bx-group' ></i>
                    <span class="links-name">UNESCO Administration</span>
                </a>
            </li>
            <?php } ?>



            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_misvis.php" class="nav-link <?php echo $phsi_misvis; ?>" title="PHSI Mission & Vison">
                    <i class='bx bxs-bookmarks'></i>
                    <span class="links-name">PHSI Mission & Vison</span>
                </a>
            </li>
            <?php } ?>


            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_misvis.php" class="nav-link <?php echo $unesco_misvis; ?>" title="UNESCO Mission & Vison">
                    <i class='bx bxs-bookmarks'></i>
                    <span class="links-name">UNESCO Mission & Vison</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'phsi_admin' || $_SESSION['role'] == 'phsi_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/phsi_history.php" class="nav-link <?php echo $phsi_history; ?>" title="PHSI History">
                    <i class='bx bx-book-open'></i>
                    <span class="links-name">PHSI History</span>
                </a>
            </li>
            <?php } ?>

            <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'unesco_admin' || $_SESSION['role'] == 'unesco_content_admin'){ ?>
            <li class="nav-item">
                <a href="../admin/unesco_history.php" class="nav-link <?php echo $unesco_history; ?>" title=">UNESCO History">
                    <i class='bx bx-book-open'></i>
                    <span class="links-name">UNESCO History</span>
                </a>
            </li>
            <?php } ?>
            



            <li class="nav-item">
                <a href="#" class="nav-link <?php echo $settings; ?>" title="Settings">
                    <i class='bx bx-cog'></i>
                    <span class="links-name">Settings</span>
                </a>
            </li>

            <hr class="line">

            <li class="nav-item" id="logout-link" >
                <a class="logout-link nav-link" href="../login/logout.php" title="Logout">
                    <i class='bx bx-log-out'></i>
                    <span class="links-name">Sign out</span>
                </a>
            </li>

        </ul>
    </div>
</nav>

<div id="logout-dialog" class="dialog d-none" title="Logout">
    <p><span>Are you sure you want to logout?</span></p>
</div>

<script>
    $(document).ready(function() {
        $("#logout-dialog").dialog({
            resizable: false,
            draggable: false,
            height: "auto",
            width: 400,
            modal: true,
            autoOpen: false
        });
        $(".logout-link").on('click', function(e) {
            e.preventDefault();
            var theHREF = $(this).attr("href");
            
            $("#logout-dialog").dialog('option', 'buttons', {
                "Yes" : function() {
                    window.location.href = theHREF;
                },
                "No" : function() {
                    $(this).dialog("close");
                }
            });
            $("#logout-dialog").dialog("open");
        });
        });
</script>