<div class="row g-2 mb-2 ">
    <div id="MyButtons" class="d-flex mb-md-2 mb-lg-0 col-12 col-md-auto"></div>
    <div class="form-group col-12 col-sm-auto flex-sm-grow-1 flex-lg-grow-0 ms-lg-auto">
        <select name="student_type" id="student_type" class="form-select me-md-2">
        <option value="">All Type</option>
            <option value="Alumni">Alumni</option>
            <option value="Employee">Employee</option>
            <option value="Student">Student</option>
            <option value="Outside WMSU">Outside WMSU</option>
        </select>
    </div>

    <div class="input-group search-keyword col-12 flex-lg-grow-1">
        <input type="text" name="keyword" id="keyword" placeholder="Search Name or Email" class="form-control">
        <button class="btn btn-outline-secondary background-color-green" type="button"><i class="fas fa-search white"></i></button>
    </div>
</div>

<table class="table table-hover col-12" id="table-pending" style="width: 100%;">
    <thead>
        <tr>
            <th scope="col">Action</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Sex</th>
            <th scope="col">Contact #</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
    <?php
            require_once '../classes/user.class.php';
            $user = new Users();
            //We will now fetch all the records in the array using loop
            //use as a counter, not required but suggested for the table
            $i = 1;
            //loop for each record found in the array
            foreach ($user->pending() as $value){ 
                //start of loop
                $profile_picture = $value['profile_picture'];   
                $member_type = $value['member_type'];
        ?>

        <tr>
            <td>
                <div class="action-button">
                    <a title="Edit" href="edit.php?id=<?php echo $value['id'] ?>" class="me-2 green"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a title="Delete" href="delete.php?id=<?php echo $value['id'] ?>" class="green"><i class="fa-solid fa-trash-can"></i></a>
                </div>
            </td>
            <td>
                <div class="client">
                    <div class="client-img bg-img"  style="background-image:  url('../uploads/<?php echo $profile_picture; ?>')"></div>
                    <div class="client-info">
                        <h4><?php echo $value['firstname'].' '.$value['middlename'].' '.$value['lastname'].' '.$value['suffix'] ?></h4>
                        </div>
                    </div>
                </td>
            <td><?php echo $value['email'] ?></td>
            <td><span class="<?php echo "type-".''.$member_type; ?>"><?php echo $value['member_type'] ?></span></td>
            <td><?php echo $value['sex'] ?></td>
            <td><?php echo $value['contact_number'] ?></td>
            <td><?php echo $value['barangay'].', '.$value['city']?></td>
        </tr>
        
        <?php $i++;
        //end of loop 
        } 
        ?> 

    </tbody>
</table>



