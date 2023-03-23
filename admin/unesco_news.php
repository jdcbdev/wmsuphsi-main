<?php

    //resume session here to fetch session values
    session_start();
    /*
        if user is not login then redirect to login page,
        this is to prevent users from accessing pages that requires
        authentication such as the dashboard
    */
    if (!isset($_SESSION['logged-in'])){
        header('location: ../home.php');
    }
    //if the above code is false then html below will be displayed
    require_once '../classes/basic.database.php';
    require_once '../tools/variables.php';
    $page_title = 'UNESCO News Managament | WMSU - Peace and Human Security Institute';
    $unesco_news = 'active';

    
    

    require_once '../includes/admin-header.php';
?>
<body>
    <?php
        require_once '../includes/admin-topnav.php';
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
                require_once '../includes/admin-sidebar.php';
            ?>

            <div class="gpt-table-container">
            <div class="add-button-container">
                <button class="gpt-add-button">Add New Content</button>
            </div>
            <table class="admin-table">
                <thead>
                <tr class="tr">
                    <th>ID Number</th>
                    <th>Thumbnail</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr">
                    <td>1</td>
                    <td><img src="https://via.placeholder.com/350x200" alt="Thumbnail"></td>
                    <td>Example Title</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>2023-03-23</td>
                </tr>
                <tr class="tr">
                    <td>2</td>
                    <td><img src="https://via.placeholder.com/350x200" alt="Thumbnail"></td>
                    <td>Example Title</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>2023-03-23</td>
                </tr>
                <tr class="tr">
                    <td>3</td>
                    <td><img src="https://via.placeholder.com/350x200" alt="Thumbnail"></td>
                    <td>Example Title</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>2023-03-23</td>
                </tr>
                </tbody>
            </table>
            </div>

        </div>
    </div>

</body>
</html>