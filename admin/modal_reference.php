 <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
    <div class="row">
        <div class="col">
            <span class="close">&times;</span>
        </div>
    </div>
        <?php	
                $id=$_GET['plan'];
                $ret="select * from users 
                join eer_data on eer_data.clientref=users.ID  
                join goal_guide on goal_guide.client_ID=users.ID
                join bmi_data on bmi_data.user_ID=users.ID
                join feeding_habits on feeding_habits.client_id=users.ID
                join allergies on allergies.clientid=users.ID
                where ID=:id";
                $query= $conn -> prepare($ret);
                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                {
                
        ?> 
        <!-- Client Meta Data -->
        <!-- BIO DATA -->
            <div class="row" style="padding:0 10px 0 10px;">
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                    <label style="font-size:10px;">
                    Name :
                    <?php echo htmlentities($result->username);?><br>
                    Gender :
                    <?php echo htmlentities($result->gender);?><br>
                    Pregnant :
                    <?php echo htmlentities($result->pregnant);?><br>
                    Lactating :
                    <?php echo htmlentities($result->lactating);?><br>
                    Age :
                    <?php echo htmlentities($result->age);?> yrs<br>
                    P.A.L :
                    <?php echo htmlentities($result->pal);?><br>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;" >
                    <label style="font-size:10px;">
                    Goal :
                    <?php echo htmlentities($result->goal);?><br>
                    Target Weight :
                    <?php echo htmlentities($result->targetweight);?> kgs<br>
                    Current Weight :
                    <?php echo htmlentities($result->weight);?> kgs <br>
                    Height :
                    <?php echo htmlentities($result->height);?> cms <br>
                </div>
            </div>
            
        <!-- LIFESTYLE DATA -->
                <!-- FEEDING HABITS -->
           <div class="row" style="padding:0 10px 0 10px;">
                   <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                            <!-- ALLERGIES --> 
                        <label style="font-size:10px;">
                        Allergies :
                        <?php echo htmlentities($result->lactose);?>
                        <?php echo htmlentities($result->gluten);?>
                        <?php echo htmlentities($result->vegan);?>
                        <?php echo htmlentities($result->vegeterian);?>
                        <?php echo htmlentities($result->no_allergy);?><br>
                            <!-- MEALS COUNT --> 
                        Meals / Day :
                        <?php echo htmlentities($result->mealscount);?> 
                   </div>
                   <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                            <!-- HABITS --> 
                        <label style="font-size:10px;">
                        Habits :
                        <?php echo htmlentities($result->chips);?>
                        <?php echo htmlentities($result->roastedmeat);?>
                        <?php echo htmlentities($result->softdrinks);?>
                        <?php echo htmlentities($result->sweets);?>
                        <?php echo htmlentities($result->salt);?>
                        <?php echo htmlentities($result->latesupper);?>
                        <?php echo htmlentities($result->skiplunch);?>
                        <?php echo htmlentities($result->alcoholic);?>
                        <?php echo htmlentities($result->ocassional_alcoholic);?>
                        <?php echo htmlentities($result->no_habit);?><br>
                    </div> 
           </div>
        
        <?php }} else{
                echo ' No Data Available !!';
                } 
        ?>

        <?php	
                $id=$_GET['plan'];
                $ret="select * from users 
                join uji_preference on uji_preference.id_client=users.ID
                join ugali_preference on ugali_preference.user_id=users.ID
                join wheatfoods_preference on wheatfoods_preference.client_code=users.ID
                join bakedfoods_preference on bakedfoods_preference.clientcode=users.ID
                where ID=:id";
                $query= $conn -> prepare($ret);
                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                {
                
        ?> 
        <!-- FOOD PREFERENCES -->
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- UJI PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Uji Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->ujiwimbi);?>
                            <?php echo htmlentities($result->ujimahindi);?>
                            <?php echo htmlentities($result->ujispecial);?>
                            <?php echo htmlentities($result->ujispecial2);?>
                            <?php echo htmlentities($result->ujimuhogo);?>
                            <?php echo htmlentities($result->ujimawele);?>
                            <?php echo htmlentities($result->fbf);?>
                            <?php echo htmlentities($result->ujimchele);?>
                            <?php echo htmlentities($result->ujingano);?>
                            <?php echo htmlentities($result->oatporridge);?>
                            <?php echo htmlentities($result->oatmeal);?>
                            <?php echo htmlentities($result->ujispecial3);?>
                            <?php echo htmlentities($result->ujispecial4);?>
                            <?php echo htmlentities($result->no_uji);?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- UGALI PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Ugali Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->wholemaize);?>
                            <?php echo htmlentities($result->ugalispecial1);?>
                            <?php echo htmlentities($result->ugalispecial2);?>
                            <?php echo htmlentities($result->ugalispecial3);?>
                            <?php echo htmlentities($result->ugalispecial4);?>
                            <?php echo htmlentities($result->ugalispecial5);?>
                            <?php echo htmlentities($result->ugalispecial6);?>
                            <?php echo htmlentities($result->ugalispecial7);?>
                            <?php echo htmlentities($result->ugalispecial8);?>
                            <?php echo htmlentities($result->ugalispecial9);?>
                            <?php echo htmlentities($result->no_ugali);?>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- WHEATFOODS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Wheatfoods Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->mandazi);?>
                            <?php echo htmlentities($result->kaimati);?>
                            <?php echo htmlentities($result->scones);?>
                            <?php echo htmlentities($result->mahamri);?>
                            <?php echo htmlentities($result->qita);?>
                            <?php echo htmlentities($result->pizza);?>
                            <?php echo htmlentities($result->bhature);?>
                            <?php echo htmlentities($result->splitdal);?>
                            <?php echo htmlentities($result->roti);?>
                            <?php echo htmlentities($result->chapatiwhite);?>
                            <?php echo htmlentities($result->chapatibrown);?>
                            <?php echo htmlentities($result->pancakes);?>
                            <?php echo htmlentities($result->nowheat_foods);?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- BAKEDFOODS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Bakedfoods Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->whitebread);?>
                            <?php echo htmlentities($result->brownbread);?>
                            <?php echo htmlentities($result->sweetbread);?>
                            <?php echo htmlentities($result->sweetbiscuits);?>
                            <?php echo htmlentities($result->biscuitsavoury);?>
                            <?php echo htmlentities($result->weetabix);?>
                            <?php echo htmlentities($result->cornflakes);?>
                            <?php echo htmlentities($result->buns);?>
                            <?php echo htmlentities($result->cupcakes);?>
                            <?php echo htmlentities($result->fruitcakes);?>
                            <?php echo htmlentities($result->spongecakes);?>
                            <?php echo htmlentities($result->icedcakes);?>
                            <?php echo htmlentities($result->cookies);?>
                            <?php echo htmlentities($result->nobaked_foods);?>
                        </td>
                    </tr>
                </table>

                
            </div>

        </div>
            
        


        <?php }} else{
                echo ' No Data Available !!';
                } 
        ?>


        <?php	
                $id=$_GET['plan'];
                $ret="select * from users 
                join ricefoods_preference on ricefoods_preference.client=users.ID
                join mashedfoods_preference on mashedfoods_preference.user=users.ID
                join legumes_preference on legumes_preference.usercode=users.ID
                join fruits_preference on fruits_preference.user_code=users.ID
                where ID=:id";
                $query= $conn -> prepare($ret);
                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                {
                
        ?> 
        <!-- FOOD PREFERENCES -->
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- RICEFOODS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Ricefoods Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->pilau);?>
                            <?php echo htmlentities($result->boiledrice);?>
                            <?php echo htmlentities($result->biryani);?>
                            <?php echo htmlentities($result->friedrice);?>
                            <?php echo htmlentities($result->ricespecial1);?>
                            <?php echo htmlentities($result->ricespecial2);?>
                            <?php echo htmlentities($result->ricespecial3);?>
                            <?php echo htmlentities($result->steamedrice);?>
                            <?php echo htmlentities($result->ricespecial4);?>
                            <?php echo htmlentities($result->macaroni);?>
                            <?php echo htmlentities($result->spaghetti);?>
                            <?php echo htmlentities($result->norice_foods);?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                
                        <!-- MASHEDFOODS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Mashedfoods Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->mukimo1);?>
                            <?php echo htmlentities($result->mukimo2);?>
                            <?php echo htmlentities($result->mukimo3);?>
                            <?php echo htmlentities($result->mukimo4);?>
                            <?php echo htmlentities($result->mashedpotatoes);?>
                            <?php echo htmlentities($result->mashedbananas);?>
                            <?php echo htmlentities($result->kimanga);?>
                            <?php echo htmlentities($result->mukimo5);?>
                            <?php echo htmlentities($result->ndoto);?>
                            <?php echo htmlentities($result->nzenga);?>
                            <?php echo htmlentities($result->kimanga2);?>
                            <?php echo htmlentities($result->kimito);?>
                            <?php echo htmlentities($result->nyenyi);?>
                            <?php echo htmlentities($result->githeri);?>
                            <?php echo htmlentities($result->githeri2);?>
                            <?php echo htmlentities($result->nomashed_foods);?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                    
                        <!-- LEGUMES PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Legumes Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->ndengu);?>
                            <?php echo htmlentities($result->maharagwe);?>
                            <?php echo htmlentities($result->kamande);?>
                            <?php echo htmlentities($result->pigeon);?>
                            <?php echo htmlentities($result->pea);?>
                            <?php echo htmlentities($result->chickpeas);?>
                            <?php echo htmlentities($result->blackbeans);?>
                            <?php echo htmlentities($result->no_legumes);?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- FRUITS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Fruits Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->melon);?>
                            <?php echo htmlentities($result->treetomato);?>
                            <?php echo htmlentities($result->tangerine);?>
                            <?php echo htmlentities($result->strawberries);?>
                            <?php echo htmlentities($result->plums);?>
                            <?php echo htmlentities($result->pineapple);?>
                            <?php echo htmlentities($result->pear);?>
                            <?php echo htmlentities($result->peach);?>
                            <?php echo htmlentities($result->passion);?>
                            <?php echo htmlentities($result->pawpaw);?>
                            <?php echo htmlentities($result->orange);?>
                            <?php echo htmlentities($result->mulberry);?>
                            <?php echo htmlentities($result->mango);?>
                            <?php echo htmlentities($result->lime);?>
                            <?php echo htmlentities($result->lemon);?>
                            <?php echo htmlentities($result->loquat);?>
                            <?php echo htmlentities($result->jackfruit);?>
                            <?php echo htmlentities($result->guava);?>
                            <?php echo htmlentities($result->grapes);?>
                            <?php echo htmlentities($result->doupalm);?>
                            <?php echo htmlentities($result->dates);?>
                            <?php echo htmlentities($result->custard);?>
                            <?php echo htmlentities($result->baobab);?>
                            <?php echo htmlentities($result->banana);?>
                            <?php echo htmlentities($result->avocado);?>
                            <?php echo htmlentities($result->apple);?>
                            <?php echo htmlentities($result->zambarau);?>
                            <?php echo htmlentities($result->passionjuice);?>
                            <?php echo htmlentities($result->no_fruits);?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>


        <?php }} else{
                echo ' No Data Available !!';
                } 
        ?>

        <?php	
                $id=$_GET['plan'];
                $ret="select * from users 
                join vegetable_preference on vegetable_preference.ref_id=users.ID
                join tubers_preference on tubers_preference.ref=users.ID
                join animalproducts_preference on animalproducts_preference.ref_code=users.ID
                join beverages_preference on beverages_preference.ref_client=users.ID
                where ID=:id";
                $query= $conn -> prepare($ret);
                $query->bindParam(':id',$id, PDO::PARAM_STR);
                $query-> execute();
                $results = $query -> fetchAll(PDO::FETCH_OBJ);
                $cnt=1;
                if($query -> rowCount() > 0)
                {
                foreach($results as $result)
                { 
        ?> 
        <!-- FOOD PREFERENCES -->
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                        <!-- VEGETABLE PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Vegetable Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->sukumawiki);?>
                            <?php echo htmlentities($result->cabbage);?>
                            <?php echo htmlentities($result->terere);?>
                            <?php echo htmlentities($result->spinach);?>
                            <?php echo htmlentities($result->thabai);?>
                            <?php echo htmlentities($result->pumpkinleaves);?>
                            <?php echo htmlentities($result->cowpeasleaves);?>
                            <?php echo htmlentities($result->vinespinach);?>
                            <?php echo htmlentities($result->stewedkunde);?>
                            <?php echo htmlentities($result->veges1);?>
                            <?php echo htmlentities($result->veges2);?>
                            <?php echo htmlentities($result->broccoli);?>
                            <?php echo htmlentities($result->veges3);?>
                            <?php echo htmlentities($result->obwoba);?>
                            <?php echo htmlentities($result->veges4);?>
                            <?php echo htmlentities($result->veges5);?>
                            <?php echo htmlentities($result->novegetable_foods);?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                
                        <!-- TUBERS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Tubers Preference :
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->yamstew);?>
                            <?php echo htmlentities($result->tuber1);?>
                            <?php echo htmlentities($result->tuber2);?>
                            <?php echo htmlentities($result->tuber3);?>
                            <?php echo htmlentities($result->tuber4);?>
                            <?php echo htmlentities($result->mushenye);?>
                            <?php echo htmlentities($result->nduma);?>
                            <?php echo htmlentities($result->boiledcassava);?>
                            <?php echo htmlentities($result->tuber5);?>
                            <?php echo htmlentities($result->tuber6);?>
                            <?php echo htmlentities($result->tuber7);?>
                            <?php echo htmlentities($result->tuber8);?>
                            <?php echo htmlentities($result->notuber_foods);?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row" style="padding:0 10px 0 10px;">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">

                        <!-- ANIMALPRODUCTS PREFERENCE -->
                <table style="font-size:10px;">
                    <tr style="text-align:center;">
                        <td style="background-color:#421966;color:#fff;border-radius:10px;">
                            Animal Products Preference:
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo htmlentities($result->beef);?>
                            <?php echo htmlentities($result->goatmeat);?>
                            <?php echo htmlentities($result->mutton);?>
                            <?php echo htmlentities($result->camelmeat);?>
                            <?php echo htmlentities($result->fish);?>
                            <?php echo htmlentities($result->omena);?>
                            <?php echo htmlentities($result->chicken);?>
                            <?php echo htmlentities($result->mincedmeat);?>
                            <?php echo htmlentities($result->guineafowl);?>
                            <?php echo htmlentities($result->quail);?>
                            <?php echo htmlentities($result->eggs);?>
                            <?php echo htmlentities($result->eggtoast);?>
                            <?php echo htmlentities($result->samosa);?>
                            <?php echo htmlentities($result->sausages);?>
                            <?php echo htmlentities($result->omelette);?>
                            <?php echo htmlentities($result->okra);?>
                            <?php echo htmlentities($result->pork);?>
                            <?php echo htmlentities($result->rabbit);?>
                            <?php echo htmlentities($result->cheese);?>
                            <?php echo htmlentities($result->ghee);?>
                            <?php echo htmlentities($result->honey);?>
                            <?php echo htmlentities($result->beefbroth);?>
                            <?php echo htmlentities($result->noanimal_products);?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6" style="text-align:left;">
                
                        <!-- BEVERAGES PREFERENCE -->
                    <table style="font-size:10px;">
                        <tr style="text-align:center;">
                            <td style="background-color:#421966;color:#fff;border-radius:10px;">
                                Beverages Preference:
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php echo htmlentities($result->chai);?>
                                <?php echo htmlentities($result->whitecoffee);?>
                                <?php echo htmlentities($result->whitechocolate);?>
                                <?php echo htmlentities($result->icecream);?>
                                <?php echo htmlentities($result->cowmilk);?>
                                <?php echo htmlentities($result->camelmilk);?>
                                <?php echo htmlentities($result->maziwamala);?>
                                <?php echo htmlentities($result->yoghurt);?>
                                <?php echo htmlentities($result->sugarcanejuice);?>
                                <?php echo htmlentities($result->water);?>
                                <?php echo htmlentities($result->wine);?>
                                <?php echo htmlentities($result->energydrinks);?>
                                <?php echo htmlentities($result->beer);?>
                                <?php echo htmlentities($result->fruitjuice);?>
                                <?php echo htmlentities($result->skimmedmilk);?>
                                <?php echo htmlentities($result->no_beverages);?>
                            </td>
                        </tr>
                    </table>
            </div>
        </div>


        <?php }} else{
                echo ' No Data Available !!';
                } 
        ?>
        



       
</div>
</div>
<script type="text/javascript">

                
   
    
    // Get the modal
    var modal = document.getElementById("myModal");
    

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");
    

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }
    

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }
    

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }



</script>