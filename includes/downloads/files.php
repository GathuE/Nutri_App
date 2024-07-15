<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col">
                <div class="card" id="card_one">
                    <div class="card-body">
                        <table class="table table-responsive table-bordered table-striped" style="font-size:14px;text-align:center;border-radius:20px;">
                            <thead> 
                                <td>Description:</td>
                                <td>Meal Plan:</td>
                                <td>Detailed Nutrient Analysis:</td>
                                <td>E-Prescription</td>
                            </thead>
                            <tbody>
                                <tr style="font-size:9px;">
                                <form method="post" action="classes/documents_pdf.php">
                                    <input type="hidden" name="user_id" value="<?php echo $id ?>">
                                    <td><button class="btn btn-sm" type="submit" name="description">Download</button></td>
                                    <td><button class="btn btn-sm" type="submit" name="mealplan">Download</button></td>
                                    <td><button class="btn btn-sm" type="submit" name="detailedplan">Download</button></td>
                                    <td><button class="btn btn-sm" type="submit" name="prescription">Download</button></td>
                                </form>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>