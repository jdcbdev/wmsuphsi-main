<input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>PHSI</h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../images/student-profile/user-icon.png)"></div>
                <h4><?php echo $_SESSION['fullname']; ?></h4>
                <small><?php echo $_SESSION['user_role']; ?></small>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="dashboard.php" class="<?php echo $dashboard; ?>" title="Dashboard">
                            <span class="uil uil-estate"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="content_management.php" class="<?php echo $content_management; ?>" title="Content Management">
                            <span class="uil uil-clipboard-notes"></span>
                            <small>Content Management</small>
                        </a>
                    </li>
                    <li>
                       <a href="event_management.php" class="<?php echo $event_management; ?>" title="Event Management">
                            <span class="uil uil-podium"></span>
                            <small>Event Management</small>
                        </a>
                    </li>
                    <li>
                       <a href="#" class="<?php echo $organizations; ?>" title="Organizations">
                            <span class="uil uil-favorite"></span>
                            <small>Organizations</small>
                        </a>
                    </li>
                    <li>
                       <a href="user_management.php" class="<?php echo $user_management; ?>" title="User Management">
                            <span class="uil uil-users-alt"></span>
                            <small>User Management</small>
                        </a>
                    </li>
                    <li>
                       <a href="feedback_management.php" class="<?php echo $feedback_management; ?>" title="Feedbacks Management">
                            <span class="uil uil-feedback"></span>
                            <small>Feedback Management</small>
                        </a>
                    </li>
                    <li>
                       <a href="settings.php" class="<?php echo $settings; ?>"  title="Settings">
                            <span class="uil uil-setting"></span>
                            <small>Settings</small>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>