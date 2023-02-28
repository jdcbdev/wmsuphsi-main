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
    $user_management = 'active';
    require_once '../includes/admin-header.php';
    require_once '../includes/sidebar.php';
    require_once '../includes/topnav.php';
?>

<div>
                        <table id="user-table" class="display cell-border" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th><span class=""></span> NAME </th>
                                    <th><span class=""></span> USER TYPE</th>
                                    <th><span class=""></span> CONTACT</th>
                                    <th><span class=""></span> FULL ADDRESS</th>
                                    <th><span class=""></span> SEX</th>
                                    <th><span class=""></span> USERNAME</th>
                                    <th><span class=""></span> PASSWORD</th>
                                    <th><span class=""></span> STATUS</th>
                                    <th><span class=""></span> ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/pic-1.png)"></div>
                                            <div class="client-info">
                                                <h4>Arjay Lumibot Malaga</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>Guiwan, Zamboanga City</small>
                                    <td><small>Male</small></td>
                                    <td><small>arjay</small></td>  
                                    <td><small>arjay</small></td>                        
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/user-icon.png)"></div>
                                            <div class="client-info">
                                                <h4>Jericho Bello Sagdi</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>San Roque, Zamboanga City</small>
                                    <td><small>Male</small></td>           
                                    <td><small>jer</small></td>  
                                    <td><small>jer</small></td>                        
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/jaaf.jpg)"></div>
                                            <div class="client-info">
                                                <h4>Hadzramar Iblang Jaafar</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>Arena Blanco, Zamboanga City</small>
                                    <td><small>Male</small></td>     
                                    <td><small>hadz</small></td>  
                                    <td><small>hadz</small></td>                              
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/MIRA.jpg)"></div>
                                            <div class="client-info">
                                                <h4>Kaitlyn June Quimbo Mira</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>Pasonance, Zamboanga City</small>
                                    <td><small>Female</small></td>    
                                    <td><small>june</small></td>  
                                    <td><small>june</small></td>                               
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>

                                
                                <tr>
                                    <td>5</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/user-icon.png)"></div>
                                            <div class="client-info">
                                                <h4>Angelica Deoric</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>St. Nino, Zamboanga City</small>
                                    <td><small>Female</small></td>   
                                    <td><small>angel</small></td>  
                                    <td><small>angel</small></td>                                
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>6</td>
                                    <td>
                                        <div class="client">
                                           <div class="client-img bg-img" style="background-image: url(../images/student-profile/user-icon.png)"></div>
                                            <div class="client-info">
                                                <h4>Bennett Gelacio Cha</h4>
                                                <small>xt202001283@wmsu.edu.ph</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small> WMSU Student / WMSU UNESCO Club</small></td>
                                    <td><small>09123456789</small>
                                    <td><small>Zone 1, Zamboanga City</small>
                                    <td><small>Male</small></td>     
                                    <td><small>ben</small></td>  
                                    <td><small>ben</small></td>                              
                                    <td><small>Active</small></td>
                                    <td>
                                        <div class="actions">
                                            <span class="las la-ellipsis-v"></span>
                                            <span class="las la-eye"></span>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div> 
            
            </div>  


<?php
    require_once '../includes/admin-footer.php';
?>