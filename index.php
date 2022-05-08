<?php

require 'db_conn.php';

?>

<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset = "UTF-8">
    <meta name="viewport" content = "width=device-width , initial-scale =1.0">
    <meta http-equiv = "X-UA-Compatible"content = "ie=edge">
    <title>To-Do List</title>
    <link rel ="stylesheet" href = "css/style.css">
</head>
<body>
<div class="main-section">
        <div class="add-section" >
            <from action="add.php" method="POST" aria-autocomplete="" >
                <input type ="text" name ="title" placeholder="This field is required"/>
                <button type = "submit">Add &nbsp;<span>&#43;</span>
             </button>
            </from>
        </div>
        <?php
            $todo = $conn  ->query("SELECT * FROM todos ORDER BY id DESC") ;
        ?>
        <div class ="show-todo-section">
         
            <?php if ($todo-> num_rows <= 0){ ?> 
                <div class="todo-item">
                    <div class = "empty">
                        <img src = "img/f.png" width ="100%"/>
                        <img src ="img/Ellipsis.gif" width ="80px"/>
                    </div>
                </div> 
                <?php  } ?> 
                <?php if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    
                    while($row = mysqli_fetch_assoc($result)) {?>
                    <div class = "todo-item" >
                        
                        <span id="<?php echo $row["id"];?>"
                                class="remove-to-do">x</span>
                        <?php if ($row["checked"]){?>
                            <input type="checkbox"
                                class ="check-box"
                                cheked />
                            <h2 class ="checked"><?php echo $row["title"] ?> </h2>
                        <?php }else {?>
                            <input type="checkbox"
                                    class="check-box"/>
                            <h2><?php echo $row["title"]?></h2>
                            <?php } ?>
                        <br>
                        <small><?php echo "Time: ". $row["data_time"]. "<br> ";?></small>
                    </div>
                    <?php }} ?>
        </div>
    </div>
</body>
</html>



