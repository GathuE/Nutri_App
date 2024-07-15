<div class="row mt-3" style="padding:20px;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card" id="payments_card">
                        <div class="card-body">
                           <form method="post" action="classes/record_payment">
                                    <div class="form-group">
                                            <input type="hidden" name="user_id" value="<?php echo $id ?>">
                                    </div>
                                    <div class="form-group">
                                        <table class="table table-bordered table-striped" style="font-size:10px;border-radius:10px;">
                                            <tr>
                                                <td style="text-align:right;">
                                                    <h6 style="color:#421966;font-weight:bold;font-size:12px;">This plan :</h6>
                                                </td>
                                                <td style="text-align:left;">
                                                    <input type="text" class="form-control" name="goal" id="goal" value="<?php echo $goal ?>" style="font-size:10px;border:0px;text-align:center;color:#138ea4;font-weight:bold;" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right;">
                                                    <h6 style="color:#421966;font-weight:bold;font-size:12px;"> Costs : </h6>
                                                </td>
                                                <td style="text-align:left;">
                                                    <input class="form-control" type="text" name="plancost" id="plancost" style="font-size:10px;border:0px;text-align:center;color:#138ea4;font-weight:bold;" readonly>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="form-group">
                                            <span id="info" style="display:none;"> </span>
                                            <button type="button" id="showdetails" onclick="showinfo();" style="float:right;">More Details..</button>
                                            <button type="button" id="hidedetails" onclick="hideinfo();" style="float:right;display:none;">Less Details..</button>
                                    </div>
                                    <br>
                                    <br>
                                    <h5>Proceed to Make Payment</h5>
                                    <hr>
                                    <div class="form-group">
                                        <label style="color:#421966;">Phone Number:<span style="font-weight:bold;color:red;font-size:10px;">*(Enter Number making Payment)</span></label>
                                        <input class="form-control" type="text" name="phone" id="phone">
                                    </div>
                                   
                                    <button type="submit" name="payplan" style="float:right;">Proceed to Pay</button>
                           </form>
                           <form method="post" action="classes/change_goal">
                                <div class="form-group">
                                    <input type="hidden" name="user_id" value="<?php echo $id ?>">
                               </div>
                               <button type="submit" name="changeplan" style="float:left;">Change Plan</button>
                           </form>
                        </div>
                    </div>
                </div>
</div>


        