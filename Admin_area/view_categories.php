<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered mt-5">
    <thead >
        <tr class="text-center">
            <th>Sr.no</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class=" text-dark">
        <?php
        $select_cat="Select * from `categories`";
        $result=mysqli_query($con, $select_cat);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];  
            $number++;
       
         ?>

        <tr class="text-center">
            <td><?php echo $number; ?> </td>
            <td><?php echo $category_title  ; ?> </td>
            <td><a href='index.php?edit_category=<?php echo $category_id?>'
            class='text-dark'><i class='fas fa-edit'></i></a></i>
        </a></td>
        <td><a href='index.php?delete_category=<?php echo $category_id?>'
        class='text-dark'><i class='fas fa-trash'></i>
        </a></td>
        

        </tr>
        <?php


         }?>
    </tbody>
</table>