<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <h5 style="text-align:center;color:#421966;"> Please Enter your MPESA Transaction Code to Proceed. </h6>
                        <form method="post" action="classes/auth_transaction.php">
                            <div class="form-group">
                                <input type="hidden" value="<?php echo $id ?>">
                                <input type="text" name="authkey" id="authkey" class="form-control" style="text-align:center;outline:#421966;" placeholder="Enter Transaction Code..">
                            </div>
                            
                            <input type="submit" name="submit" value="Submit" class="btn-success btn-block" style="background-color:#421966;outline:none;margin-left:auto;margin-right:auto;">
                        </form>
                    </div>
                </div>
            </div>
</div>