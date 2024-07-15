<input type="hidden" name="id" value="<?php echo $id ?>">

<!-- Uses id Above -->
<?php 
        error_reporting(0);
        include 'includes/db_conn.php';
        $userid=$id;
        $sql ="SELECT no from client_messages WHERE ID='$userid' AND status ='0'";
        $query = $conn->prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $users=$query->rowCount();
    ?>

<div id="smscard">
        <a class="dropdown-item" href="messages">Notifications <span style="font-size:11px;font-weight:bold;background-color:red;color:#fff;border-radius:5px;padding:2px;"><?php echo htmlentities($users);?></span> </a>
</div>