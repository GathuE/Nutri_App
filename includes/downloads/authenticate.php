<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <h6 style="text-align:center;color:#421966;;"> Please Provide your Authentication Key to Download your Diet plan(s) </h6>
                        <form method="post" action="classes/auth_download.php">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id ?>">
                                <input type="text" name="authkey" id="authkey" class="form-control" style="text-align:center;outline:#085314;" placeholder="Enter Authentication Key..">
                            </div>
                            
                            <input type="submit" name="submit" value="Submit" class="btn-success btn-block" style="background-color:#421966;;outline:none;margin-left:auto;margin-right:auto;">
                        </form>
                    </div>
                </div>
            </div>
</div>