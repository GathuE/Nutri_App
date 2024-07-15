<!-- Show Errors -->
<div id="notificationscard">
        <div class="row" id="alerts">
            <div class="col">
                    <?php if (isset($_REQUEST['e'])) {?>
                    <div class="alert alert-danger">
                        <?php echo $_REQUEST['e']; ?>
                    </div>
                    <?php } ?>
                    <?php if (isset($_REQUEST['s'])) {?>
                    <div class="alert alert-success">
                        <?php echo $_REQUEST['s']; ?>
                    </div>
                    <?php } ?>
            </div>
        </div>
</div>
        