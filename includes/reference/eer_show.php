
<div class="row mt-3" style="padding:20px;">
    <div class="container-fluid">
        <form class="form" enctype="multipart/form-data" action="classes/eer_save.php" method="post">
                    <div class="col" id="card_bio">
                            <?php include 'user_data.php';?>
                    </div>
                    <div class="col">
                            <?php include 'eer_data.php';?>
                    </div>
        </form>
    </div>
</div>


<script>
    function calcSum() {
        let num1 = document.getElementsByName("years")[0].value;
        let num2 = document.getElementsByName("months")[0].value;
        let sum = (Number(num1) + Number(num2/12)).toFixed(1);
        document.getElementsByName("age")[0].value = sum;
    }  
  
    function show(){
    var y = document.getElementById("years").value;
    var k = document.getElementById("months").value;
    var b = document.getElementById("gender").value;

    if(y == "" && k == "" && b == "") {
        document.getElementById('btn').style.visibility='hidden';
    }
    else {
        document.getElementById('btn').style.visibility='visible';
    }

  }

  var routine = document.getElementById("routine").value;
    var workout = document.getElementById("workout").value;

    if(routine == 'Sitting Alot' && workout == 'Not Really'){
        document.getElementById("pal").value = "Sedentary";
    }
    else if(routine == 'Sitting Alot' && workout == '1-2 Days'){
        document.getElementById("pal").value = "Sedentary";
    }
    else if(routine == 'Sitting Alot' && workout == '3-5 Days'){
        document.getElementById("pal").value = "Light";
    }
    else if(routine == 'Sitting Alot' && workout == '6-7 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Walking Alot' && workout == 'Not Really'){
        document.getElementById("pal").value = "Light";
    }
    else if(routine == 'Walking Alot' && workout == '1-2 Days'){
        document.getElementById("pal").value = "Light";
    }
    else if(routine == 'Walking Alot' && workout == '3-5 Days'){
        document.getElementById("pal").value = "Moderate";
    }
    else if(routine == 'Walking Alot' && workout == '6-7 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Standing Alot' && workout == 'Not Really'){
        document.getElementById("pal").value = "Sedentary";
    }
    else if(routine == 'Standing Alot' && workout == '1-2 Days'){
        document.getElementById("pal").value = "Sedentary";
    }
    else if(routine == 'Standing Alot' && workout == '3-5 Days'){
        document.getElementById("pal").value = "Moderate";
    }
    else if(routine == 'Standing Alot' && workout == '6-7 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Lifting Alot' && workout == 'Not Really'){
        document.getElementById("pal").value = "Light";
    }
    else if(routine == 'Lifting Alot' && workout == '1-2 Days'){
        document.getElementById("pal").value = "Moderate";
    }
    else if(routine == 'Lifting Alot' && workout == '3-5 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Lifting Alot' && workout == '6-7 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Athlete' && workout == 'Not Really'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Athlete' && workout == '1-2 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Athlete' && workout == '3-5 Days'){
        document.getElementById("pal").value = "Heavy";
    }
    else if(routine == 'Athlete' && workout == '6-7 Days'){
        document.getElementById("pal").value = "Heavy";
    }

</script>



