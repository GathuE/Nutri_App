<div class="row mt-3" style="padding:20px;">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" id="col" style="display:block;">
                <div class="card">
                    <div class="card-body">
                        <form id="regForm" class="form" method="post" action="classes/survey_data.php" enctype="multipart/form-data">
                           <p><input type="hidden" name="user_id" value="<?php echo $id?>"></p>
                            <div class="tab">
                                <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <img src="img/three.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <label class="label">Have you tried a meal plan before ?</label><br>
                                                    <select class="form-control" name="mealplan" id="plan" style="width:100%;" oninput="this.className = ''">
                                                            <option type="optgroup"  value="" >Please Choose...</option>
                                                            <option type="optgroup"  value="Yes" >Yes</option>
                                                            <option type="optgroup"  value="No" >No</option>
                                                    </select><br>
                                                <div id="plandetails" style="display:none;">
                                                    <label class="label">Did the Plan work ?</label><br>
                                                        <select class="form-control" name="success" id="success" style="width:100%;">
                                                                <option type="optgroup"  value="" >Please Choose...</option>
                                                                <option type="optgroup"  value="Yes" >Yes</option>
                                                                <option type="optgroup"  value="No" selected>No</option>
                                                        </select><br>
                                                    <label class="label">Why do you think the meal plan did / did not work:</label><br>
                                                    <textarea class="form-control" name="reason" id="reason" style="width:100%; resize: none;"  col="50" row="3" placeholder="Give Short Decription..."></textarea>
                                                </div>
                                            </div>
                                 </div> 
                            </div>
                            <script>
                                document.getElementById("plan").onchange = alterListener;
  
                                function alterListener(){
                                var value = this.value
                                    console.log(value);
                                    if (value == "Yes"){
                                        document.getElementById("plandetails").style.display = "block";
                                        document.getElementById("reason").value = "";
                                    }else if (value == "No"){
                                        document.getElementById("plandetails").style.display = "none";
                                        document.getElementById("reason").value = "Not Applicable";
                                    }
                                }
                            </script>
                            <div class="tab">
                                    <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <img src="img/five.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">

                                                    <label class="label">Do you have any dietary restrictions or allergies?</label> 
                                                    <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                                    <input type="checkbox" id="myCheck" onclick="undisable()" name="lactose" value="Lactose Intolerant">
                                                    <label for="lactose"> I'm Lactose Intolerant. </label><br>
                                                    <input type="checkbox" id="myCheck2" onclick="undisable()" name="gluten" value="Gluten Intolerant">
                                                    <label for="gluten"> I'm Gluten Intolerant.</label><br>
                                                    <input type="checkbox" id="myCheck3" onclick="undisable()" name="vegan" value="Vegan">
                                                    <label for="vegan"> I'm Vegan.</label><br>
                                                    <input type="checkbox" id="myCheck4" onclick="undisable()" name="vegeterian" value="Vegeterian">
                                                    <label for="vegan"> I'm Vegeterian.</label><br>
                                                    <input type="checkbox" id="myCheck5" onclick="disable()" name="noallergy" value="No Allergies" checked="checked">
                                                    <label style="font-weight:bold;"> I have no Dietary Restrictions or Allergies.</label>
                                                    <!-- Script to Multiselect -->
                                                    <script>
                                                            function disable() {
                                                                            document.getElementById("myCheck").checked = false;
                                                                            document.getElementById("myCheck2").checked = false;
                                                                            document.getElementById("myCheck3").checked = false;
                                                                            document.getElementById("myCheck4").checked = false;
                                                                            }
                                                            function undisable() {
                                                                            document.getElementById("myCheck5").checked = false;
                                                                            }
                                                    </script>
                                            </div>
                                    </div>
                                

                            </div>
                            <div class="tab">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <img src="img/six.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                    <label class="label">Select all that is true to you:</label> 
                                                    <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                                    <input type="checkbox" id="myCheck6" onclick="undisablehabit()" name="leftovers" value="I Take Supper LeftOvers for Breakfast.">
                                                    <label> I Take Supper LeftOvers for Breakfast. </label><br>
                                                    <input type="checkbox" id="myCheck7" onclick="undisablehabit()" name="roastedmeat" value="I frequently take Choma(Roasted Meat).">
                                                    <label> I frequently take Choma(Roasted Meat).</label><br>
                                                    <input type="checkbox" id="myCheck8" onclick="undisablehabit()" name="softdrinks" value="I frequently take Soft Drinks.">
                                                    <label> I frequently take Soft Drinks.</label><br>
                                                    <input type="checkbox" id="myCheck9" onclick="undisablehabit()" name="sweets" value="I frequently take Sweets.">
                                                    <label> I frequently take Sweets.</label><br>
                                                    <input type="checkbox" id="myCheck10" onclick="undisablehabit()" name="salt" value="I frequently Add Table Salt to Food.">
                                                    <label> I frequently Add Table Salt to Food.</label><br>
                                                    <input type="checkbox" id="myCheck11" onclick="undisablehabit()" name="latesupper" value="I frequently eat Late Night Suppers.">
                                                    <label> I frequently eat Late Night Suppers. </label><br>
                                                    <input type="checkbox" id="myCheck12" onclick="undisablehabit()" name="skiplunch" value="I skip Lunch Alot.">
                                                    <label>I skip Lunch Alot.</label><br>
                                                    <input type="checkbox" id="myCheck13" onclick="undisablehabit()" name="alcoholic" value="I Take Alcohol Daily.">
                                                    <label> I Take Alcohol Daily.</label><br>
                                                    <input type="checkbox" id="myCheck14" onclick="undisablehabit()" name="ocassional" value="I Take Alcohol Ocassionally.">
                                                    <label> I Take Alcohol Ocassionally.</label><br>
                                                    <input type="checkbox" id="myCheck15" onclick="disablehabit()" name="nohabit" value="No Habit" checked="checked">
                                                    <label style="font-weight:bold;"> None of the Above.</label>
                                                <!-- Script to Multiselect -->
                                                    <script>
                                                            function disablehabit() {
                                                                            document.getElementById("myCheck6").checked = false;
                                                                            document.getElementById("myCheck7").checked = false;
                                                                            document.getElementById("myCheck8").checked = false;
                                                                            document.getElementById("myCheck9").checked = false;
                                                                            document.getElementById("myCheck10").checked = false;
                                                                            document.getElementById("myCheck11").checked = false;
                                                                            document.getElementById("myCheck12").checked = false;
                                                                            document.getElementById("myCheck13").checked = false;
                                                                            document.getElementById("myCheck14").checked = false;
                                                                            }
                                                            function undisablehabit() {
                                                                            document.getElementById("myCheck15").checked = false;
                                                                            }
                                                    </script>
                                            </div>
                                        </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/seven.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label class="label">How much water do you drink per Day? </label><br> 
                                            <select class="form-control" name="waterintake" id="waterintake" style="width:100%;" oninput="this.className = ''">
                                                    <option type="optgroup"  value="" >Please Choose One...</option>
                                                    <option type="optgroup"  value="Just Coffee,Tea and Food Soups" >I just take Coffee, Tea & Food Soups.</option>
                                                    <option type="optgroup"  value="Less than 2 Glasses" >Less than 2 Glasses.</option>
                                                    <option type="optgroup"  value="Between 2 - 4 Glasses" >Between 2 - 4 Glasses.</option>
                                                    <option type="optgroup"  value="Between 5 - 7 Glasses" >Between 5 - 7 Glasses.</option>
                                                    <option type="optgroup"  value="Above 8 Glasses" >Above 8 Glasses.</option>
                                            </select><br>
                                        <label class="label">How many times a Day would you prefer to eat? </label><br>
                                        <small style="font-weight:500;color:red;">*Choose option 3 or 4 if you specified "Diabetic Meal Plan".</small>
                                            <select class="form-control" name="mealscount" id="mealscount" style="width:100%;" oninput="this.className = ''">
                                                    <option type="optgroup"  value="" >Please Choose One...</option>
                                                    <option type="optgroup"  value="Three Times(Breakfast, Lunch, Supper)">Three Times(Breakfast, Lunch, Supper).</option>
                                                    <option type="optgroup"  value="Four Times(Breakfast, Snack, Lunch, Supper)">Four Times(Breakfast, Snack, Lunch, Supper).</option>
                                                    <option type="optgroup"  value="Five Times(Breakfast, Snack, Lunch, Snack, Supper)">Five Times(Breakfast, Snack, Lunch, Snack, Supper).</option>
                                                    <option type="optgroup"  value="Six Times(Breakfast, Snack, Lunch, Snack, Supper, Snack)">Six Times(Breakfast, Snack, Lunch, Snack, Supper, Snack).</option>
                                            </select><br>  
                                    </div>
                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/eight.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <label class="label">Mark your Preferred Uji:</label> 
                                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                                <input type="checkbox" id="myCheck16" onclick="undisableuji()" name="ujiwawimbi" value="Uji wa Wimbi.">
                                                <label> Uji wa Wimbi. </label><br>
                                                <input type="checkbox" id="myCheck17" onclick="undisableuji()" name="ujiwamahindi" value="Uji wa Mahindi.">
                                                <label> Uji wa Mahindi.</label><br>
                                                <input type="checkbox" id="myCheck18" onclick="undisableuji()" name="ujispecial" value="Uji wa Mtama,Mahindi na Wimbi.">
                                                <label> Uji wa Mtama,Mahindi na Wimbi.</label><br>
                                                <input type="checkbox" id="myCheck19" onclick="undisableuji()" name="ujispecial2" value="Uji wa Muhogo,Mtama na Wimbi.">
                                                <label> Uji wa Muhogo,Mtama na Wimbi.</label><br>
                                                <input type="checkbox" id="myCheck20" onclick="undisableuji()" name="ujiwamuhogo" value="Uji wa Muhogo.">
                                                <label> Uji wa Muhogo.</label><br>
                                                <input type="checkbox" id="myCheck21" onclick="undisableuji()" name="ujiwamawele" value="Uji wa Mawele.">
                                                <label> Uji wa Mawele. </label><br>
                                                <input type="checkbox" id="myCheck22" onclick="undisableuji()" name="fbf" value="Uji(Fortified Blended Flour).">
                                                <label> Uji(Fortified Blended Flour).</label><br>
                                                <input type="checkbox" id="myCheck23" onclick="undisableuji()" name="ujiwamchele" value="Uji wa Mchele.">
                                                <label> Uji wa Mchele.</label><br>
                                                <input type="checkbox" id="myCheck24" onclick="undisableuji()" name="ujiwangano" value="Uji wa Ngano.">
                                                <label> Uji wa Ngano.</label><br>
                                                <input type="checkbox" id="myCheck25" onclick="undisableuji()" name="oatporridge" value="Oat Porridge.">
                                                <label> Oat Porridge.</label><br>
                                                <input type="checkbox" id="myCheck26" onclick="undisableuji()" name="oatmeal" value="Oat Meal.">
                                                <label>Oat Meal.</label><br>
                                                <input type="checkbox" id="myCheck27" onclick="undisableuji()" name="ujispecial3" value="Uji wa Wimbi na Mtama.">
                                                <label> Uji wa Wimbi na Mtama.</label><br>
                                                <input type="checkbox" id="myCheck28" onclick="undisableuji()" name="ujispecial4" value="Uji wa Mahindi na Wimbi.">
                                                <label> Uji wa Mahindi na Wimbi.</label><br>
                                                <input type="checkbox" id="myCheck29" onclick="disableuji()" name="nouji" value="No Uji"  checked="checked">
                                                <label style="font-weight:bold;"> I do not take Uji.</label>
                                            <!-- Script to Multiselect -->
                                                <script>
                                                        function disableuji() {
                                                                        document.getElementById("myCheck16").checked = false;
                                                                        document.getElementById("myCheck17").checked = false;
                                                                        document.getElementById("myCheck18").checked = false;
                                                                        document.getElementById("myCheck19").checked = false;
                                                                        document.getElementById("myCheck20").checked = false;
                                                                        document.getElementById("myCheck21").checked = false;
                                                                        document.getElementById("myCheck22").checked = false;
                                                                        document.getElementById("myCheck23").checked = false;
                                                                        document.getElementById("myCheck24").checked = false;
                                                                        document.getElementById("myCheck25").checked = false;
                                                                        document.getElementById("myCheck26").checked = false;
                                                                        document.getElementById("myCheck27").checked = false;
                                                                        document.getElementById("myCheck28").checked = false;
                                                                        }
                                                        function undisableuji() {
                                                                        document.getElementById("myCheck29").checked = false;
                                                                        }
                                                </script>
                                    </div>
                                </div>
                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/nine.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Ugali:</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck30" onclick="undisableugali()" name="wholemaize" value="Ugali(Whole Maize).">
                                <label> Ugali(Whole Maize).</label><br>
                                <input type="checkbox" id="myCheck31" onclick="undisableugali()" name="ugalispecial1" value="Ugali wa Mahindi na Wimbi.">
                                <label> Ugali wa Mahindi na Wimbi. </label><br>
                                <input type="checkbox" id="myCheck32" onclick="undisableugali()" name="ugalispecial2" value="Ugali wa Mahindi, Mtama na Wimbi.">
                                <label> Ugali wa Mahindi, Mtama na Wimbi.</label><br>
                                <input type="checkbox" id="myCheck33" onclick="undisableugali()" name="ugalispecial3" value="Ugali wa Muhogo na Mtama.">
                                <label> Ugali wa Muhogo na Mtama.</label><br>
                                <input type="checkbox" id="myCheck34" onclick="undisableugali()" name="ugalispecial4" value="Ugali(Refined Maize Flour).">
                                <label> Ugali(Refined Maize Flour).</label><br>
                                <input type="checkbox" id="myCheck35" onclick="undisableugali()" name="ugalispecial5" value="Ugali wa Muhogo(Cassava).">
                                <label> Ugali wa Muhogo(Cassava).</label><br>
                                <input type="checkbox" id="myCheck36" onclick="undisableugali()" name="ugalispecial6" value="Ugali wa Mahindi na Mandizi(Vinolo).">
                                <label>Ugali wa Mahindi na Mandizi(Vinolo).</label><br>
                                <input type="checkbox" id="myCheck37" onclick="undisableugali()" name="ugalispecial7" value="Ugali in Sour Milk(Gurdo,Marqa).">
                                <label> Ugali in Sour Milk(Gurdo,Marqa).</label><br>
                                <input type="checkbox" id="myCheck38" onclick="undisableugali()" name="ugalispecial8" value="Ugali wa Mtama, Wimbi na Muhogo.">
                                <label> Ugali wa Mtama, Wimbi na Muhogo.</label><br>
                                <input type="checkbox" id="myCheck39" onclick="undisableugali()" name="ugalispecial9" value="Ugali wa Wimbi.">
                                <label> Ugali wa Wimbi.</label><br>
                                <input type="checkbox" id="myCheck40" onclick="disableugali()" name="nougali" value="No Ugali"  checked="checked">
                                <label style="font-weight:bold;"> I do not take any Ugali.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disableugali() {
                                                        document.getElementById("myCheck30").checked = false;
                                                        document.getElementById("myCheck31").checked = false;
                                                        document.getElementById("myCheck32").checked = false;
                                                        document.getElementById("myCheck33").checked = false;
                                                        document.getElementById("myCheck34").checked = false;
                                                        document.getElementById("myCheck35").checked = false;
                                                        document.getElementById("myCheck36").checked = false;
                                                        document.getElementById("myCheck37").checked = false;
                                                        document.getElementById("myCheck38").checked = false;
                                                        document.getElementById("myCheck39").checked = false;
                                                        }
                                        function undisableugali() {
                                                        document.getElementById("myCheck40").checked = false;
                                                        }
                                </script>

                                    </div>

                                </div>
                               

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/ten.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Wheat Food(s):</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck41" onclick="undisablewheat()" name="mandazi" value="Mandazi ya Kawaida(Ndazi Basic).">
                                <label> Mandazi ya Kawaida(Ndazi Basic). </label><br>
                                <input type="checkbox" id="myCheck42" onclick="undisablewheat()" name="kaimati" value="Kaimati.">
                                <label> Kaimati.</label><br>
                                <input type="checkbox" id="myCheck43" onclick="undisablewheat()" name="scones" value="Drop Scones.">
                                <label> Drop Scones.</label><br>
                                <input type="checkbox" id="myCheck44" onclick="undisablewheat()" name="mahamri" value="Mahamri(Swahili Doughnuts).">
                                <label> Mahamri(Swahili Doughnuts).</label><br>
                                <input type="checkbox" id="myCheck45" onclick="undisablewheat()" name="qita" value="Qita(Pancakes za Mahindi na Ngano).">
                                <label> Qita(Pancakes za Mahindi na Ngano).</label><br>
                                <input type="checkbox" id="myCheck46" onclick="undisablewheat()" name="pizza" value="Pizza.">
                                <label>Pizza.</label><br>
                                <input type="checkbox" id="myCheck47" onclick="undisablewheat()" name="bhature" value="Bhature(Fried Indian Bread).">
                                <label> Bhature(Fried Indian Bread).</label><br>
                                <input type="checkbox" id="myCheck48" onclick="undisablewheat()" name="splitdal" value="Split DAL(Stewed).">
                                <label> Split DAL(Stewed).</label><br>
                                <input type="checkbox" id="myCheck49" onclick="undisablewheat()" name="roti" value="Roti(Indian Chapati).">
                                <label> Roti(Indian Chapati).</label><br>
                                <input type="checkbox" id="myCheck50" onclick="undisablewheat()" name="chapatiwhite" value="Chapati White.">
                                <label> Chapati White.</label><br>
                                <input type="checkbox" id="myCheck51" onclick="undisablewheat()" name="chapatibrown" value="Chapati Brown.">
                                <label> Chapati Brown.</label><br>
                                <input type="checkbox" id="myCheck52" onclick="undisablewheat()" name="pancakes" value="Pancakes.">
                                <label> Pancakes.</label><br>
                                <input type="checkbox" id="myCheck53" onclick="disablewheat()" name="nowheatfoods" value="No Wheat Food(s)."  checked="checked">
                                <label style="font-weight:bold;"> I do not take Wheat Products.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablewheat() {
                                                        document.getElementById("myCheck41").checked = false;
                                                        document.getElementById("myCheck42").checked = false;
                                                        document.getElementById("myCheck43").checked = false;
                                                        document.getElementById("myCheck44").checked = false;
                                                        document.getElementById("myCheck45").checked = false;
                                                        document.getElementById("myCheck46").checked = false;
                                                        document.getElementById("myCheck47").checked = false;
                                                        document.getElementById("myCheck48").checked = false;
                                                        document.getElementById("myCheck49").checked = false;
                                                        document.getElementById("myCheck50").checked = false;
                                                        document.getElementById("myCheck51").checked = false;
                                                        document.getElementById("myCheck52").checked = false;
                                                        
                                                        }
                                        function undisablewheat() {
                                                        document.getElementById("myCheck53").checked = false;
                                                        }
                                </script>

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/eleven.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Wheat Baked Food(s):</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck54" onclick="undisablebaked()" name="whitebread" value="White Bread.">
                                <label> White Bread. </label><br>
                                <input type="checkbox" id="myCheck55" onclick="undisablebaked()" name="brownbread" value="Brown Bread.">
                                <label> Brown Bread.</label><br>
                                <input type="checkbox" id="myCheck56" onclick="undisablebaked()" name="sweetbread" value="Sweet Bread.">
                                <label> Sweet Bread.</label><br>
                                <input type="checkbox" id="myCheck57" onclick="undisablebaked()" name="sweetbiscuits" value="Sweet Biscuits.">
                                <label> Sweet Biscuits.</label><br>
                                <input type="checkbox" id="myCheck58" onclick="undisablebaked()" name="biscuitsavoury" value="Biscuit Savoury.">
                                <label> Biscuit Savoury.</label><br>
                                <input type="checkbox" id="myCheck59" onclick="undisablebaked()" name="weetabix" value="Breakfast Cereals(Wheat Biscuit- Weetabix type).">
                                <label>Breakfast Cereals(Wheat Biscuit- Weetabix type).</label><br>
                                <input type="checkbox" id="myCheck60" onclick="undisablebaked()" name="cornflakes" value="Breakfast Cereals(Corn Flakes).">
                                <label> Breakfast Cereals(Corn Flakes).</label><br>
                                <input type="checkbox" id="myCheck61" onclick="undisablebaked()" name="buns" value="Buns.">
                                <label> Buns.</label><br>
                                <input type="checkbox" id="myCheck62" onclick="undisablebaked()" name="cupcakes" value="Cupcakes.">
                                <label> Cupcakes.</label><br>
                                <input type="checkbox" id="myCheck63" onclick="undisablebaked()" name="fruitcakes" value="Fruit Cakes.">
                                <label> Fruit Cakes.</label><br>
                                <input type="checkbox" id="myCheck64" onclick="undisablebaked()" name="spongecakes" value="Sponge Cakes.">
                                <label> Sponge Cakes.</label><br>
                                <input type="checkbox" id="myCheck65" onclick="undisablebaked()" name="icedcakes" value="Fancy Iced Cakes.">
                                <label> Fancy Iced Cakes.</label><br>
                                <input type="checkbox" id="myCheck66" onclick="undisablebaked()" name="cookies" value="Cookies.">
                                <label> Cookies.</label><br>
                                <input type="checkbox" id="myCheck67" onclick="disablebaked()" name="nobakedfoods" value="No Baked Foods."  checked="checked">
                                <label style="font-weight:bold;"> I do not take Wheat Products.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablebaked() {
                                                        document.getElementById("myCheck54").checked = false;
                                                        document.getElementById("myCheck55").checked = false;
                                                        document.getElementById("myCheck56").checked = false;
                                                        document.getElementById("myCheck57").checked = false;
                                                        document.getElementById("myCheck58").checked = false;
                                                        document.getElementById("myCheck59").checked = false;
                                                        document.getElementById("myCheck60").checked = false;
                                                        document.getElementById("myCheck61").checked = false;
                                                        document.getElementById("myCheck62").checked = false;
                                                        document.getElementById("myCheck63").checked = false;
                                                        document.getElementById("myCheck64").checked = false;
                                                        document.getElementById("myCheck65").checked = false;
                                                        document.getElementById("myCheck66").checked = false;
                                                        }
                                        function undisablebaked() {
                                                        document.getElementById("myCheck67").checked = false;
                                                        }
                                </script>

                                    </div>

                                </div>
                               

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/twelve.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Cooked Rice:</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck68" onclick="undisablerice()" name="pilau" value="Pilau.">
                                <label> Pilau.</label><br>
                                <input type="checkbox" id="myCheck69" onclick="undisablerice()" name="boiledrice" value="Boiled Rice(Wali wa Kuchemshwa).">
                                <label> Boiled Rice(Wali wa Kuchemshwa).</label><br>
                                <input type="checkbox" id="myCheck70" onclick="undisablerice()" name="biryani" value="Biryani Rice.">
                                <label> Biryani Rice.</label><br>
                                <input type="checkbox" id="myCheck71" onclick="undisablerice()" name="friedrice" value="Onion Fried Rice.">
                                <label> Onion Fried Rice.</label><br>
                                <input type="checkbox" id="myCheck72" onclick="undisablerice()" name="ricespecial1" value="Mseto wa Ndengu(Rice with Ndengu).">
                                <label> Mseto wa Ndengu(Rice with Ndengu).</label><br>
                                <input type="checkbox" id="myCheck73" onclick="undisablerice()" name="ricespecial2" value="Rice with Beans(Mseto wa Maharagwe).">
                                <label> Rice with Beans(Mseto wa Maharagwe).</label><br>
                                <input type="checkbox" id="myCheck74" onclick="undisablerice()" name="ricespecial3" value="Parboiled Rice.">
                                <label> Parboiled Rice.</label><br>
                                <input type="checkbox" id="myCheck75" onclick="undisablerice()" name="steamedrice" value="Steamed Rice.">
                                <label> Steamed Rice.</label><br>
                                <input type="checkbox" id="myCheck76" onclick="undisablerice()" name="ricespecial4" value="Mseto wa Viazi(Rice with Potatoes).">
                                <label> Mseto wa Viazi(Rice with Potatoes).</label><br>
                                <input type="checkbox" id="myCheck77" onclick="undisablerice()" name="macaroni" value="Pasta / Macaroni.">
                                <label> Pasta / Macaroni.</label><br>
                                <input type="checkbox" id="myCheck78" onclick="undisablerice()" name="spaghetti" value="Pasta / Spaghetti.">
                                <label> Pasta / Spaghetti.</label><br>
                                <input type="checkbox" id="myCheck79" onclick="disablerice()" name="noricefoods" value="No Rice Foods."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Rice.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablerice() {
                                                        document.getElementById("myCheck68").checked = false;
                                                        document.getElementById("myCheck69").checked = false;
                                                        document.getElementById("myCheck70").checked = false;
                                                        document.getElementById("myCheck71").checked = false;
                                                        document.getElementById("myCheck72").checked = false;
                                                        document.getElementById("myCheck73").checked = false;
                                                        document.getElementById("myCheck74").checked = false;
                                                        document.getElementById("myCheck75").checked = false;
                                                        document.getElementById("myCheck76").checked = false;
                                                        document.getElementById("myCheck77").checked = false;
                                                        document.getElementById("myCheck78").checked = false;
                                                        }
                                        function undisablerice() {
                                                        document.getElementById("myCheck79").checked = false;
                                                        }
                                </script>
                                   

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/thirteen.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Mashed Food(s):</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck80" onclick="undisablemashed()" name="mukimo1" value="Mukimo(Maize, Potatoes & Pumpkin Leaves).">
                                <label> Mukimo(Fresh Maize, Potatoes & Pumpkin Leaves).</label><br>
                                <input type="checkbox" id="myCheck81" onclick="undisablemashed()" name="mukimo2" value="Mukimo(Maize, Beans, Potatoes & Pumpkin Leaves).">
                                <label> Mukimo(Fresh Maize, Beans, Potatoes & Pumpkin Leaves).</label><br>
                                <input type="checkbox" id="myCheck82" onclick="undisablemashed()" name="mukimo3" value="Mukimo wa Njahi.">
                                <label> Mukimo wa Njahi.</label><br>
                                <input type="checkbox" id="myCheck83" onclick="undisablemashed()" name="mukimo4" value="Mukimo(Mashed Potatoes & Bananas).">
                                <label> Mukimo(Mashed Potatoes & Bananas).</label><br>
                                <input type="checkbox" id="myCheck84" onclick="undisablemashed()" name="mashedpotatoes" value="Mashed Potatoes.">
                                <label> Mashed Potatoes.</label><br>
                                <input type="checkbox" id="myCheck85" onclick="undisablemashed()" name="mashedbananas" value="Mashed Bananas.">
                                <label> Mashed Bananas.</label><br>
                                <input type="checkbox" id="myCheck86" onclick="undisablemashed()" name="kimanga" value="Kimanga(Green Bananas & Kidney Beans).">
                                <label> Kimanga(Green Bananas & Kidney Beans).</label><br>
                                <input type="checkbox" id="myCheck87" onclick="undisablemashed()" name="mukimo5" value="Mashed Cassava & Pigeon Peas.">
                                <label> Mashed Cassava & Pigeon Peas.</label><br>
                                <input type="checkbox" id="myCheck88" onclick="undisablemashed()" name="ndoto" value="Ndoto(Red Kidney Beans & Red Sorghum).">
                                <label> Ndoto(Red Kidney Beans & Red Sorghum).</label><br>
                                <input type="checkbox" id="myCheck89" onclick="undisablemashed()" name="nzenga" value="Crushed Maize(Nzenga).">
                                <label> Crushed Maize(Nzenga).</label><br>
                                <input type="checkbox" id="myCheck90" onclick="undisablemashed()" name="kimanga2" value="Kimanga(Mashed Sweet Potatoes & Black Beans).">
                                <label> Kimanga(Mashed Sweet Potatoes & Black Beans).</label><br>
                                <input type="checkbox" id="myCheck91" onclick="undisablemashed()" name="kimito" value="Kimito(Mashed Beans & Potatoes).">
                                <label> Kimito(Mashed Beans & Potatoes).</label><br>
                                <input type="checkbox" id="myCheck92" onclick="undisablemashed()" name="nyenyi" value="Nyenyi(Mashed Pigeon Peas & Green Maize).">
                                <label> Nyenyi(Mashed Pigeon Peas & Green Maize).</label><br>
                                <input type="checkbox" id="myCheck200" onclick="undisablemashed()" name="githeri" value="Githeri(Stewed Maize & Beans).">
                                <label> Githeri(Stewed Maize & Beans).</label><br>
                                <input type="checkbox" id="myCheck201" onclick="undisablemashed()" name="githeri2" value="Githeri(Fresh Stewed Maize & Beans).">
                                <label> Githeri(Fresh Stewed Maize & Beans).</label><br>
                                <input type="checkbox" id="myCheck93" onclick="disablemashed()" name="nomashedfoods" value="No Mashed Foods."  checked="checked">
                                <label style="font-weight:bold;"> I do not take Mashed Foods or Githeri.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablemashed() {
                                                        document.getElementById("myCheck80").checked = false;
                                                        document.getElementById("myCheck81").checked = false;
                                                        document.getElementById("myCheck82").checked = false;
                                                        document.getElementById("myCheck83").checked = false;
                                                        document.getElementById("myCheck84").checked = false;
                                                        document.getElementById("myCheck85").checked = false;
                                                        document.getElementById("myCheck86").checked = false;
                                                        document.getElementById("myCheck87").checked = false;
                                                        document.getElementById("myCheck88").checked = false;
                                                        document.getElementById("myCheck89").checked = false;
                                                        document.getElementById("myCheck90").checked = false;
                                                        document.getElementById("myCheck91").checked = false;
                                                        document.getElementById("myCheck92").checked = false;
                                                        document.getElementById("myCheck200").checked = false;
                                                        document.getElementById("myCheck201").checked = false;
                                                        }
                                        function undisablemashed() {
                                                        document.getElementById("myCheck93").checked = false;
                                                        }
                                </script>

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/fourteen.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Stewed Legumes & Pulses :</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck94" onclick="undisablelegumes()" name="ndengu" value="Mchuzi wa Ndengu (Stewed Green Grams).">
                                <label> Mchuzi wa Ndengu (Stewed Green Grams).</label><br>
                                <input type="checkbox" id="myCheck95" onclick="undisablelegumes()" name="maharagwe" value="Mchuzi wa Maharagwe (Stewed Beans).">
                                <label> Mchuzi wa Maharagwe (Stewed Beans).</label><br>
                                <input type="checkbox" id="myCheck96" onclick="undisablelegumes()" name="kamande" value="Mchuzi wa Kamande (Stewed Lentils).">
                                <label> Mchuzi wa Kamande(Stewed Lentils).</label><br>
                                <input type="checkbox" id="myCheck97" onclick="undisablelegumes()" name="pigeonstew" value="Mchuuzi wa Mbaazi (Stewed Pigeon Peas).">
                                <label> (Mchuuzi wa Mbaazi (Stewed Pigeon Peas).</label><br>
                                <input type="checkbox" id="myCheck98" onclick="undisablelegumes()" name="peasstew" value="Mchuzi wa Minji(Stewed Peas).">
                                <label> Mchuzi wa Minji(Stewed Peas).</label><br>
                                <input type="checkbox" id="myCheck99" onclick="undisablelegumes()" name="chickpeas" value="Chick Peas.">
                                <label> Chick Peas.</label><br>
                                <input type="checkbox" id="myCheck100" onclick="undisablelegumes()" name="blackbeans" value="Mchuzi wa Njahi (Stewed Black Beans).">
                                <label> Mchuzi wa Njahi(Stewed Black Beans).</label><br>
                                <input type="checkbox" id="myCheck101" onclick="disablelegumes()" name="nolegumes" value="No Legumes or Pulses."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Legumes.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablelegumes() {
                                                        document.getElementById("myCheck94").checked = false;
                                                        document.getElementById("myCheck95").checked = false;
                                                        document.getElementById("myCheck96").checked = false;
                                                        document.getElementById("myCheck97").checked = false;
                                                        document.getElementById("myCheck98").checked = false;
                                                        document.getElementById("myCheck99").checked = false;
                                                        document.getElementById("myCheck100").checked = false;
                                                        }
                                        function undisablelegumes() {
                                                        document.getElementById("myCheck101").checked = false;
                                                        }
                                </script>
                                   

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/twentysix.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Fruit(s) :</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck102" onclick="undisablefruits()" name="melon" value="Water Melon(Green with White Stripes).">
                                <label> Water Melon(Green with White Stripes).</label><br>
                                <input type="checkbox" id="myCheck103" onclick="undisablefruits()" name="treetomato" value="Tree Tomato.">
                                <label> Tree Tomato.</label><br>
                                <input type="checkbox" id="myCheck104" onclick="undisablefruits()" name="tangerine" value="Tangerine.">
                                <label> Tangerine.</label><br>
                                <input type="checkbox" id="myCheck105" onclick="undisablefruits()" name="strawberries" value="Strawberries.">
                                <label> Strawberries.</label><br>
                                <input type="checkbox" id="myCheck106" onclick="undisablefruits()" name="plums" value="Plums.">
                                <label> Plums.</label><br>
                                <input type="checkbox" id="myCheck107" onclick="undisablefruits()"  name="pineapple" value="Pineapple.">
                                <label> Pineapple.</label><br>
                                <input type="checkbox" id="myCheck108" onclick="undisablefruits()" name="pear" value="Pear.">
                                <label> Pear.</label><br>
                                <input type="checkbox" id="myCheck109" onclick="undisablefruits()" name="peach" value="Peach.">
                                <label> Peach.</label><br>
                                <input type="checkbox" id="myCheck110" onclick="undisablefruits()" name="passion" value="Passion Fruit.">
                                <label> Passion Fruit.</label><br>
                                <input type="checkbox" id="myCheck111" onclick="undisablefruits()" name="pawpaw" value="Pawpaw.">
                                <label> Pawpaw.</label><br>
                                <input type="checkbox" id="myCheck112" onclick="undisablefruits()" name="orange" value="Orange.">
                                <label> Orange.</label><br>
                                <input type="checkbox" id="myCheck113" onclick="undisablefruits()" name="mulberry" value="Mulberry.">
                                <label> Mulberry.</label><br>
                                <input type="checkbox" id="myCheck114" onclick="undisablefruits()"  name="mango" value="Mango.">
                                <label> Mango.</label><br>
                                <input type="checkbox" id="myCheck115" onclick="undisablefruits()" name="lime" value="Lime.">
                                <label> Lime.</label><br>
                                <input type="checkbox" id="myCheck116" onclick="undisablefruits()" name="lemon" value="Lemon.">
                                <label> Lemon.</label><br>
                                <input type="checkbox" id="myCheck117" onclick="undisablefruits()" name="loquat" value="Loquat.">
                                <label> Loquat.</label><br>
                                <input type="checkbox" id="myCheck118" onclick="undisablefruits()" name="jackfruit" value="Jack Fruit.">
                                <label> Jack Fruit.</label><br>
                                <input type="checkbox" id="myCheck119" onclick="undisablefruits()" name="guava" value="Guava.">
                                <label> Guava.</label><br>
                                <input type="checkbox" id="myCheck120" onclick="undisablefruits()" name="grapes" value="Grapes.">
                                <label> Grapes.</label><br>
                                <input type="checkbox" id="myCheck121" onclick="undisablefruits()"  name="doupalm" value="Doumpalm Fruits.">
                                <label> Doumpalm Fruits.</label><br>
                                <input type="checkbox" id="myCheck122" onclick="undisablefruits()" name="dates" value="Dates.">
                                <label> Dates.</label><br>
                                <input type="checkbox" id="myCheck123" onclick="undisablefruits()" name="custard" value="Custard Apple.">
                                <label> Custard Apple.</label><br>
                                <input type="checkbox" id="myCheck124" onclick="undisablefruits()" name="baobab" value="Baobab Fruit.">
                                <label> Baobab Fruit.</label><br>
                                <input type="checkbox" id="myCheck125" onclick="undisablefruits()" name="banana" value="Ripe Banana.">
                                <label> Ripe Banana.</label><br>
                                <input type="checkbox" id="myCheck126" onclick="undisablefruits()" name="avocado" value="Avocado(Fuerte / Hass).">
                                <label> Avocado(Fuerte / Hass).</label><br>
                                <input type="checkbox" id="myCheck127" onclick="undisablefruits()" name="apple" value="Apple(Red or Green).">
                                <label> Apple.</label><br>
                                <input type="checkbox" id="myCheck128" onclick="undisablefruits()"  name="zambarau" value="Zambarau.">
                                <label> Zambarau.</label><br>
                                <input type="checkbox" id="myCheck129" onclick="undisablefruits()" name="passionjuice" value="Passion Juice(Home Made).">
                                <label> Passion Juice(Home Made).</label><br>
                                <input type="checkbox" id="myCheck130" onclick="disablefruits()" name="nofruits" value="No Fruits."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Fruits.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablefruits() {
                                                        document.getElementById("myCheck102").checked = false;
                                                        document.getElementById("myCheck103").checked = false;
                                                        document.getElementById("myCheck104").checked = false;
                                                        document.getElementById("myCheck105").checked = false;
                                                        document.getElementById("myCheck106").checked = false;
                                                        document.getElementById("myCheck107").checked = false;
                                                        document.getElementById("myCheck108").checked = false;
                                                        document.getElementById("myCheck109").checked = false;
                                                        document.getElementById("myCheck110").checked = false;
                                                        document.getElementById("myCheck111").checked = false;
                                                        document.getElementById("myCheck112").checked = false;
                                                        document.getElementById("myCheck113").checked = false;
                                                        document.getElementById("myCheck114").checked = false;
                                                        document.getElementById("myCheck115").checked = false;
                                                        document.getElementById("myCheck116").checked = false;
                                                        document.getElementById("myCheck117").checked = false;
                                                        document.getElementById("myCheck118").checked = false;
                                                        document.getElementById("myCheck119").checked = false;
                                                        document.getElementById("myCheck120").checked = false;
                                                        document.getElementById("myCheck121").checked = false;
                                                        document.getElementById("myCheck122").checked = false;
                                                        document.getElementById("myCheck123").checked = false;
                                                        document.getElementById("myCheck124").checked = false;
                                                        document.getElementById("myCheck125").checked = false;
                                                        document.getElementById("myCheck126").checked = false;
                                                        document.getElementById("myCheck127").checked = false;
                                                        document.getElementById("myCheck128").checked = false;
                                                        document.getElementById("myCheck129").checked = false;
                                                        }
                                        function undisablefruits() {
                                                        document.getElementById("myCheck130").checked = false;
                                                        }
                                </script>

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/sixteen.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Cooked Vegetable(s):</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck131" onclick="undisablevegetables()" name="sukumawiki" value="Stir Fried Sukuma Wiki.">
                                <label> Stir Fried Sukuma Wiki.</label><br>
                                <input type="checkbox" id="myCheck132" onclick="undisablevegetables()" name="cabbage" value="Stir Fried Cabbage.">
                                <label> Stir Fried Cabbage.</label><br>
                                <input type="checkbox" id="myCheck133" onclick="undisablevegetables()" name="terere" value="Stir Fried Terere.">
                                <label> Stir Fried Terere.</label><br>
                                <input type="checkbox" id="myCheck134" onclick="undisablevegetables()" name="spinach" value="Stir Fried Spinach.">
                                <label> Stir Fried Spinach.</label><br>
                                <input type="checkbox" id="myCheck135" onclick="undisablevegetables()" name="thabai" value="Stinging Nettle(Thabai).">
                                <label> Stinging Nettle(Thabai).</label><br>
                                <input type="checkbox" id="myCheck136" onclick="undisablevegetables()" name="pumpkinleaves" value="Stir Fried Pumpkin Leaves.">
                                <label> Stir Fried Pumpkin Leaves.</label><br>
                                <input type="checkbox" id="myCheck137" onclick="undisablevegetables()" name="cowpeasleaves" value="Stir Fried Cowpea Leaves.">
                                <label> Stir Fried Cowpea Leaves.</label><br>
                                <input type="checkbox" id="myCheck138" onclick="undisablevegetables()" name="vinespinach" value="Stir Fried Vine Spinach.">
                                <label> Stir Fried Vine Spinach.</label><br>
                                <input type="checkbox" id="myCheck139" onclick="undisablevegetables()" name="stewedkunde" value="Stewed Kunde & Murenda.">
                                <label> Stewed Kunde & Murenda.</label><br>
                                <input type="checkbox" id="myCheck140" onclick="undisablevegetables()" name="veges1" value="Stir Fried Terere, Managu & Saget.">
                                <label> Stir Fried Terere, Managu & Saget.</label><br>
                                <input type="checkbox" id="myCheck141" onclick="undisablevegetables()" name="veges2" value="Stir Fried Sweet Potato Leaves(Kijoto).">
                                <label> Stir Fried Sweet Potato Leaves.</label><br>
                                <input type="checkbox" id="myCheck142" onclick="undisablevegetables()" name="broccoli" value="Steamed Broccoli.">
                                <label> Steamed Broccoli.</label><br>
                                <input type="checkbox" id="myCheck143" onclick="undisablevegetables()" name="veges3" value="Sweetened Pumpkin & Coconut Milk(Vimumunya vya Sukari).">
                                <label> Sweetened Pumpkin & Coconut Milk(Vimumunya vya Sukari).</label><br>
                                <input type="checkbox" id="myCheck144" onclick="undisablevegetables()" name="obwoba" value="Stewed Mushroom in Peanut Butter(Obwoba).">
                                <label> Stewed Mushroom in Peanut Butter(Obwoba).</label><br>
                                <input type="checkbox" id="myCheck145" onclick="undisablevegetables()" name="veges4" value="Jute Mallow & Pumpkin Leaves(Mrenda).">
                                <label> Jute Mallow & Pumpkin Leaves(Mrenda).</label><br>
                                <input type="checkbox" id="myCheck146" onclick="undisablevegetables()" name="veges5" value="Pumpkin Mashed & Black Nightshade.">
                                <label> Pumpkin Mashed & Black Nightshade.</label><br>
                                <input type="checkbox" id="myCheck147" onclick="disablevegetables()" name="novegetablefoods" value="No Vegetable Foods." checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Vegetables.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablevegetables() {
                                                        document.getElementById("myCheck131").checked = false;
                                                        document.getElementById("myCheck132").checked = false;
                                                        document.getElementById("myCheck133").checked = false;
                                                        document.getElementById("myCheck134").checked = false;
                                                        document.getElementById("myCheck135").checked = false;
                                                        document.getElementById("myCheck136").checked = false;
                                                        document.getElementById("myCheck137").checked = false;
                                                        document.getElementById("myCheck138").checked = false;
                                                        document.getElementById("myCheck139").checked = false;
                                                        document.getElementById("myCheck140").checked = false;
                                                        document.getElementById("myCheck141").checked = false;
                                                        document.getElementById("myCheck142").checked = false;
                                                        document.getElementById("myCheck143").checked = false;
                                                        document.getElementById("myCheck144").checked = false;
                                                        document.getElementById("myCheck145").checked = false;
                                                        document.getElementById("myCheck146").checked = false;
                                                        }
                                        function undisablevegetables() {
                                                        document.getElementById("myCheck147").checked = false;
                                                        }
                                </script>
                                    

                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/seventeen.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Meat(S) / Poultry / Fish & Their Products:</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck161" onclick="undisablemeats()" name="beef" value="Stir Fried / Boiled / Grilled Beef.">
                                <label> Stir Fried / Boiled / Grilled Beef.</label><br>
                                <input type="checkbox" id="myCheck162" onclick="undisablemeats()" name="goatmeat" value="Stir Fried / Boiled / Grilled Goat Meat.">
                                <label> Stir Fried / Boiled / Grilled Goat Meat.</label><br>
                                <input type="checkbox" id="myCheck163" onclick="undisablemeats()" name="mutton" value="Stir Fried / Boiled / Grilled Mutton.">
                                <label> Stir Fried / Boiled / Grilled Mutton.</label><br>
                                <input type="checkbox" id="myCheck164" onclick="undisablemeats()" name="camelmeat" value="Stir Fried / Boiled / Grilled Camel Meat.">
                                <label> Stir Fried / Boiled / Grilled Camel Meat.</label><br>
                                <input type="checkbox" id="myCheck165" onclick="undisablemeats()" name="fish" value="Stewed Fish.">
                                <label> Stewed Fish.</label><br>
                                <input type="checkbox" id="myCheck166" onclick="undisablemeats()" name="omena" value="Stewed Omena.">
                                <label> Stewed Omena.</label><br>
                                <input type="checkbox" id="myCheck167" onclick="undisablemeats()" name="chicken" value="Stir Fried / Boiled / Grilled Chicken.">
                                <label> Stir Fried / Boiled / Grilled Chicken.</label><br>
                                <input type="checkbox" id="myCheck168" onclick="undisablemeats()" name="mincedmeat" value="Minced Meat.">
                                <label> Minced Meat.</label><br>
                                <input type="checkbox" id="myCheck169" onclick="undisablemeats()" name="guineafowl" value="Stir Fried / Boiled / Grilled Guinea Fowl.">
                                <label> Stir Fried / Boiled / Grilled Guinea Fowl.</label><br>
                                <input type="checkbox" id="myCheck170" onclick="undisablemeats()" name="quail" value="Stir Fried / Boiled / Grilled Quail.">
                                <label> Stir Fried / Boiled / Grilled Quail.</label><br>
                                <input type="checkbox" id="myCheck171" onclick="undisablemeats()" name="eggs" value="Fried / Boiled Egg(s).">
                                <label> Fried / Boiled Egg(s).</label><br>
                                <input type="checkbox" id="myCheck172" onclick="undisablemeats()" name="eggtoast" value="Egg Toast.">
                                <label> Egg Toast.</label><br>
                                <input type="checkbox" id="myCheck173" onclick="undisablemeats()" name="samosa" value="Samosa ya Nyama.">
                                <label> Samosa ya Nyama.</label><br>
                                <input type="checkbox" id="myCheck174" onclick="undisablemeats()" name="sausages" value="Beef / Pork Sausage(s).">
                                <label>Beef / Pork Sausage(s).</label><br>
                                <input type="checkbox" id="myCheck175" onclick="undisablemeats()" name="omelette" value="Omelette.">
                                <label> Omelette.</label><br>
                                <input type="checkbox" id="myCheck176" onclick="undisablemeats()" name="okra" value="Okra Meat Dish.">
                                <label> Okra Meat Dish.</label><br>
                                <input type="checkbox" id="myCheck177" onclick="undisablemeats()" name="pork" value="Stir Fried / Boiled / Grilled Pork.">
                                <label> Stir Fried / Boiled / Grilled Pork.</label><br>
                                <input type="checkbox" id="myCheck178" onclick="undisablemeats()" name="rabbit" value="Stir Fried / Boiled / Grilled Rabbit.">
                                <label> Stir Fried / Boiled / Grilled Rabbit.</label><br>
                                <input type="checkbox" id="myCheck195" onclick="undisablemeats()" name="cheese" value="Cheese.">
                                <label> Cheese.</label><br>
                                <input type="checkbox" id="myCheck196" onclick="undisablemeats()" name="ghee" value="Ghee.">
                                <label> Ghee.</label><br>
                                <input type="checkbox" id="myCheck197" onclick="undisablemeats()" name="honey" value="Honey.">
                                <label> Honey.</label><br>
                                <input type="checkbox" id="myCheck198" onclick="undisablemeats()" name="beefbroth" value="Beef Broth.">
                                <label> Beef Broth.</label><br>

                                <input type="checkbox" id="myCheck179" onclick="disablemeats()" name="nomeatfoods" value="No Meat Foods."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Meat or Meat Products.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablemeats() {
                                                        document.getElementById("myCheck161").checked = false;
                                                        document.getElementById("myCheck162").checked = false;
                                                        document.getElementById("myCheck163").checked = false;
                                                        document.getElementById("myCheck164").checked = false;
                                                        document.getElementById("myCheck165").checked = false;
                                                        document.getElementById("myCheck166").checked = false;
                                                        document.getElementById("myCheck167").checked = false;
                                                        document.getElementById("myCheck168").checked = false;
                                                        document.getElementById("myCheck169").checked = false;
                                                        document.getElementById("myCheck170").checked = false;
                                                        document.getElementById("myCheck171").checked = false;
                                                        document.getElementById("myCheck172").checked = false;
                                                        document.getElementById("myCheck173").checked = false;
                                                        document.getElementById("myCheck174").checked = false;
                                                        document.getElementById("myCheck175").checked = false;
                                                        document.getElementById("myCheck176").checked = false;
                                                        document.getElementById("myCheck177").checked = false;
                                                        document.getElementById("myCheck178").checked = false;
                                                        document.getElementById("myCheck195").checked = false;
                                                        document.getElementById("myCheck196").checked = false;
                                                        document.getElementById("myCheck197").checked = false;
                                                        document.getElementById("myCheck198").checked = false;
                                                        }
                                        function undisablemeats() {
                                                        document.getElementById("myCheck179").checked = false;
                                                        }
                                </script>
                                    

                                    </div>

                                </div>
                                
                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/twentyfive.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Cooked Tuber(s):</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck148" onclick="undisabletubers()" name="yamstew" value="Yam Stew.">
                                <label> Yam Stew.</label><br>
                                <input type="checkbox" id="myCheck149" onclick="undisabletubers()" name="tuber1" value="Stewed Potatoes & Arrowroots.">
                                <label> Stewed Potatoes & Arrowroots.</label><br>
                                <input type="checkbox" id="myCheck150" onclick="undisabletubers()" name="tuber2" value="Arrowroot Stew.">
                                <label> Arrowroot Stew.</label><br>
                                <input type="checkbox" id="myCheck151" onclick="undisabletubers()" name="tuber3" value="Stewed Green Bananas.">
                                <label> Stewed Green Bananas.</label><br>
                                <input type="checkbox" id="myCheck152" onclick="undisabletubers()" name="tuber4" value="Matoke(Stewed Green Bananas & Meat).">
                                <label> Matoke(Stewed Green Bananas & Meat).</label><br>
                                <input type="checkbox" id="myCheck153" onclick="undisabletubers()" name="mushenye" value="Mushenye(Sweet potatoes & Green Maize).">
                                <label> Mushenye(Sweet potatoes & Green Maize).</label><br>
                                <input type="checkbox" id="myCheck154" onclick="undisabletubers()" name="nduma" value="Nduma(Boiled Arrowroots).">
                                <label> Nduma(Boiled Arrowroots).</label><br>
                                <input type="checkbox" id="myCheck155" onclick="undisabletubers()" name="boiledcassava" value="Boiled Cassava.">
                                <label> Boiled Cassava.</label><br>
                                <input type="checkbox" id="myCheck156" onclick="undisabletubers()" name="tuber5" value="Boiled Irish Potato.">
                                <label> Boiled Irish Potato.</label><br>
                                <input type="checkbox" id="myCheck157" onclick="undisabletubers()" name="tuber6" value="Boiled Yam.">
                                <label> Boiled Yam.</label><br>
                                <input type="checkbox" id="myCheck158" onclick="undisabletubers()" name="tuber7" value="Boiled Sweet Potato.">
                                <label> Boiled Sweet Potato.</label><br>
                                <input type="checkbox" id="myCheck159" onclick="undisabletubers()" name="tuber8" value="Sweet Potatoes with Peanut Butter.">
                                <label> Sweet Potatoes with Peanut Butter.</label><br>
                                <input type="checkbox" id="myCheck160" onclick="disabletubers()" name="notuberfoods" value="No Tuber Foods."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of Tubers.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disabletubers() {
                                                        document.getElementById("myCheck148").checked = false;
                                                        document.getElementById("myCheck149").checked = false;
                                                        document.getElementById("myCheck150").checked = false;
                                                        document.getElementById("myCheck151").checked = false;
                                                        document.getElementById("myCheck152").checked = false;
                                                        document.getElementById("myCheck153").checked = false;
                                                        document.getElementById("myCheck154").checked = false;
                                                        document.getElementById("myCheck155").checked = false;
                                                        document.getElementById("myCheck156").checked = false;
                                                        document.getElementById("myCheck157").checked = false;
                                                        document.getElementById("myCheck158").checked = false;
                                                        document.getElementById("myCheck159").checked = false;
                                                        }
                                        function undisabletubers() {
                                                        document.getElementById("myCheck160").checked = false;
                                                        }
                                </script>

                                   

                                    
                                    </div>

                                </div>
                                

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                        <img src="img/eighteen.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                    <label class="label">Mark your Most Preferred Beverages:</label> 
                                <br><small style="font-weight:bold;color:#421966;"> NB: Choose all that are applicable.</small><br>
                                <input type="checkbox" id="myCheck180" onclick="undisablebeverages()" name="chai" value="Chai ya Maziwa.">
                                <label> Chai ya Maziwa.</label><br>
                                <input type="checkbox" id="myCheck181" onclick="undisablebeverages()" name="whitecoffee" value="White Coffee.">
                                <label> White Coffee.</label><br>
                                <input type="checkbox" id="myCheck182" onclick="undisablebeverages()" name="whitechocolate" value="Chocolate with Milk.">
                                <label> Chocolate with Milk.</label><br>
                                <input type="checkbox" id="myCheck183" onclick="undisablebeverages()" name="icecream" value="Ice Cream(Any Flavour).">
                                <label> Ice Cream(Any Flavour).</label><br>
                                <input type="checkbox" id="myCheck184" onclick="undisablebeverages()" name="cowmilk" value="Boiled Cow Milk.">
                                <label> Boiled Cow Milk.</label><br>
                                <input type="checkbox" id="myCheck185" onclick="undisablebeverages()" name="camelmilk" value="Boiled Camel Milk.">
                                <label> Boiled Camel Milk.</label><br>
                                <input type="checkbox" id="myCheck186" onclick="undisablebeverages()" name="maziwamala" value="Maziwa Mala.">
                                <label> Maziwa Mala.</label><br>
                                <input type="checkbox" id="myCheck187" onclick="undisablebeverages()" name="yoghurt" value="Yoghurt(Any Brand, Any Flavour).">
                                <label> Yoghurt(Any Brand, Any Flavour).</label><br>
                                <input type="checkbox" id="myCheck188" onclick="undisablebeverages()" name="sugarcanejuice" value="Sugarcane Juice.">
                                <label> Sugarcane Juice.</label><br>
                                <input type="checkbox" id="myCheck189" onclick="undisablebeverages()" name="water" value="Water.">
                                <label> Water.</label><br>
                                <input type="checkbox" id="myCheck190" onclick="undisablebeverages()" name="wine" value="Wine(White / Red).">
                                <label> Wine(White / Red).</label><br>
                                <input type="checkbox" id="myCheck191" onclick="undisablebeverages()" name="energydrinks" value="Energy Drinks(Any Brand).">
                                <label> Energy Drinks(Any Brand).</label><br>
                                <input type="checkbox" id="myCheck192" onclick="undisablebeverages()" name="beer" value="Beer(Any Brand).">
                                <label> Beer(Any Brand).</label><br>
                                <input type="checkbox" id="myCheck193" onclick="undisablebeverages()" name="fruitjuice" value="Fruit Juice(Any Brand / Fruit).">
                                <label> Fruit Juice(Any Brand / Fruit).</label><br>
                                <input type="checkbox" id="myCheck194" onclick="undisablebeverages()" name="skimmedmilk" value="Skimmed Milk.">
                                <label> Skimmed Milk.</label><br>
                                <input type="checkbox" id="myCheck199" onclick="disablebeverages()" name="nobeverages" value="No Beverages."  checked="checked">
                                <label style="font-weight:bold;"> I do not take any type of beverages.</label>
                            <!-- Script to Multiselect -->
                                <script>
                                        function disablebeverages() {
                                                        document.getElementById("myCheck180").checked = false;
                                                        document.getElementById("myCheck181").checked = false;
                                                        document.getElementById("myCheck182").checked = false;
                                                        document.getElementById("myCheck183").checked = false;
                                                        document.getElementById("myCheck184").checked = false;
                                                        document.getElementById("myCheck185").checked = false;
                                                        document.getElementById("myCheck186").checked = false;
                                                        document.getElementById("myCheck187").checked = false;
                                                        document.getElementById("myCheck188").checked = false;
                                                        document.getElementById("myCheck189").checked = false;
                                                        document.getElementById("myCheck190").checked = false;
                                                        document.getElementById("myCheck191").checked = false;
                                                        document.getElementById("myCheck192").checked = false;
                                                        document.getElementById("myCheck193").checked = false;
                                                        document.getElementById("myCheck194").checked = false;
                                                        }
                                        function undisablebeverages() {
                                                        document.getElementById("myCheck199").checked = false;
                                                        }
                                </script>
                                    
                                    </div>

                                </div>
                               

                            </div>
                            <div class="tab">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="margin-left:auto;margin-right:auto;width:400px;">
                                        <img src="img/twenty.png" style="width:100%;height:100%;border-radius:10px;padding:0px;">
                                    </div>

                                </div>
                                
                            </div>





                            <div style="overflow:auto;">
                                <div style="float:right;margin-top:20px;">
                                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                                    <button type="button" name="submit" id="nextBtn" onclick="nextPrev(1)">Next</button>
                                </div>
                            </div>
                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:40px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                               
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
</div>


        