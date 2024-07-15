<?php 
        
        error_reporting(0);
        $userid = $_SESSION['ID'];
        include 'includes/db_conn.php';
        $sql = "SELECT * from client_replies WHERE ID='$userid' AND status ='1' ORDER BY no DESC";
        $query = $conn-> prepare($sql);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
        foreach($results as $result)
        {	
?>
<div class="card" id="client_replies">
    <p style="font-size:14px;font-weight:bold;color:#421966;"> <?php echo htmlentities($result->message);?></p>
        <small style="float:right;font-size:10px;font-weight:600px;">Sent on :&nbsp;<?php echo htmlentities($result->date);?>&nbsp;&nbsp;<?php echo htmlentities($result->time);?></small>
    
</div>

<?php $cnt=$cnt+1;}
}
?>