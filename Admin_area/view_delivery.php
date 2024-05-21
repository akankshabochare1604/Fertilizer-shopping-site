<h3 class="text-center text-success">All Delivery Partners</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Delivery Partner name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody >
        <?php
        $select_cat="select * from `delivery`";
        $result=mysqli_query($con, $select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $delivery_id=$row['delivery_id'];
            $delivery_title=$row['delivery_title'];  
            $number++;
       
         ?>

        <tr class="text-center text-dark">
            <td><?php echo $number; ?> </td>
            <td><?php echo $delivery_title ; ?> </td>
            <td><a href='index.php?edit_delivery=<?php echo $delivery_id?> '
            class='text-dark'><i class='fas fa-edit'></i>
        </a></td>
        <td><a href='index.php?delete_delivery=<?php echo $delivery_id?>'
        class='text-dark'><i class='fas fa-trash'></i>
        </a></td>
        

        </tr>
        <?php


         }?>
    </tbody>
</table>
