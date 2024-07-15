  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>

  <script>

    // Defining a function to display error message
    function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
    }

    function validateLoginForm(){

    //Collect User Input Values 

    let email = document.client_loginform.email.value;

    let password = document.client_loginform.password.value;

    // Define error variables with a default value

    var emailErr = passwordErr  = true;

    //1. Validate the Email Address (User Login ID)
    if(email == "") {
        document.getElementById("email").focus();
        printError("emailErr", "Please Enter your Email Address!!");
        return false;
    } else {
        // Regular expression for email validation
        var regex = /^\S+@\S+\.\S+$/;
        if(regex.test(email) === false) {
            document.getElementById("email").focus();
            printError("emailErr", "Please Enter a Valid Email Address!!");
            return false;
        } else{
            printError("emailErr", "");
            emailErr = false;
        }
    }

    //2. Validate Password

    if(password == "") {
        document.getElementById("password").focus();
        printError("passwordErr", "You Must Secure your Account!!");
        return false;
    } else {
        // Regular expression for Password Length validation
        var regex = /(?=^.{4,}$)/;

        if(regex.test(password) === false) {
            document.getElementById("password").focus();
            printError("passwordErr", "Your Password is too Short!!");
            return false;
        } else{
            printError("passwordErr", "");
            passwordErr = false;
        }
    }



    }

  </script>
  <script>

     setTimeout (function(){
           //closing the alert
           $('.alert').alert('close');
       }, 4000);

    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
       // document.getElementById("nextBtn").type="submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) 
      
      return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("nextBtn").type="submit";
        document.getElementById("regForm").submit();
       
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, z, q, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      z = x[currentTab].getElementsByTagName("textarea");
      q = x[currentTab].getElementsByTagName("select");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // A loop that checks every textarea field in the current tab:
      for (i = 0; i < z.length; i++) {
        // If a field is empty...
        if (z[i].value == "") {
          // add an "invalid" class to the field:
          z[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // A loop that checks every select option in the current tab:
      for (i = 0; i < q.length; i++) {
        // If a field is empty...
        if (q[i].value == "") {
          // add an "invalid" class to the field:
          q[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }

      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }

    //bmi show functions

    function change_cards(){

      document.getElementById("data_card").style.display = "none";
      document.getElementById("bmi_card").style.display = "block";


        var goal = document.getElementById("bmigoal").value;
        var weight = parseFloat(document.getElementById("bmiweight").value);
        var targetweight = document.getElementById("targetweight").value;
        var weightdifference = (weight-targetweight);
        var centimeter = parseFloat(document.getElementById("bmiheight").value);
        var meter = (centimeter/100);
        var height = (meter*meter);


       

        // BMI CALCULATION
        var bmi = (weight/height).toFixed(2);

        //WEIGHT RANGE CALCULATIONS
         var lowerrange = (18.5*height).toFixed(1);
         var upperrange = (24.99*height).toFixed(1);

         //WEIGHT RANGES
         var minimumloss = (0.02*weight).toFixed(1);
         var maximumloss = (0.035*weight).toFixed(1);
        

         //TARGET TIME RANGES (IN MONTHS)
         
         var minimumtime = Math.abs(weightdifference / minimumloss);
         var mintime = Math.ceil(minimumtime);
         var maximumtime = Math.abs(weightdifference / maximumloss);
         var maxtime = Math.ceil(maximumtime);

        //DISPLAY BMI
        document.getElementById("bmivalue").value = bmi + " " + "kg/m2";

        //DISPLAY TARGET WEIGHT
        document.getElementById("tweight").value = targetweight + " " + "kgs";

        // DISPLAY WEIGHT RANGE
        document.getElementById("lowerweightrange").value = lowerrange + " " + "kgs";
        document.getElementById("upperweightrange").value = upperrange + " " + "kgs";
        
        //DISPLAY TIME RANGE
        document.getElementById("uppertimerange").value = mintime + " " + "Months";
        document.getElementById("lowertimerange").value = maxtime + " " +  "Months";

        if(goal == 'Diabetes Management Diet Plan' || goal == 'Diabetes and Weight Management Diet Plan' ){

          document.getElementById("special_info").style.display = "block";
        } else {

          document.getElementById("special_info").style.display = "none";
        }

        if(bmi <16) {

          document.getElementById("bmivalue").style.color = "red";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Severe Acute Malnutrition";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "red";
          document.getElementById("bmiclass").style.borderRadius = "20px";
        }
        else if(bmi >16 && bmi <= 16.99){
          document.getElementById("bmivalue").style.color = "red";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Moderate Acute Malnutrition";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "red";
          document.getElementById("bmiclass").style.borderRadius = "20px";
        }
        else if(bmi >=17 && bmi <= 18.49){
          document.getElementById("bmivalue").style.color = "yellow";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Mild Acute Malnutrition";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "orange";
          document.getElementById("bmiclass").style.borderRadius = "20px";
        }
        else if(bmi >=18.50 && bmi <= 24.99){
          document.getElementById("bmivalue").style.color = "green";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Normal Weight";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "green";
          document.getElementById("bmiclass").style.borderRadius = "20px";
        }
         else if(bmi >=25.0 && bmi <= 29.99) {
          document.getElementById("bmivalue").style.color = "orange";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Pre - Obese / Overweight";
          document.getElementById("bmiclass").style.fontWeight = "300px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "orange";
          document.getElementById("bmiclass").style.borderRadius = "10px";
         }
         else if (bmi >=30.0 && bmi <= 34.99){
          document.getElementById("bmivalue").style.color = "red";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Obesity - Class One";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "red";
          document.getElementById("bmiclass").style.borderRadius = "20px";
         }
         else if(bmi >=35.0 && bmi <= 39.90){
          document.getElementById("bmivalue").style.color = "red";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Obesity - Class Two";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "red";
          document.getElementById("bmiclass").style.borderRadius = "20px";
         }
         else if(bmi > 40){
          document.getElementById("bmivalue").style.color = "red";
          document.getElementById("bmivalue").style.fontWeight = "600px";
          document.getElementById("bmiclass").value = "Obesity - Class Three";
          document.getElementById("bmiclass").style.fontWeight = "600px";
          document.getElementById("bmiclass").style.color = "white";
          document.getElementById("bmiclass").style.backgroundColor = "red";
          document.getElementById("bmiclass").style.borderRadius = "20px";

         }

    };

    // Calculate Reference Data
function EER(){

  var b = document.getElementById("gender").value;

  if(b == "") {
    document.getElementById("nutrients_card").style.display = "none";
  }
  else {
    document.getElementById("nutrients_card").style.display = "block";
    document.getElementById("nutrients_image").style.display = "block";
    document.getElementById('btn').style.visibility='hidden';
    document.getElementById("card_bio").style.display = "none";
  }



var a = document.getElementById("age").value;
var g = document.getElementById("gender").value;
var p = document.getElementById("pregnant").value;
var l = document.getElementById("lactating").value;
var w = document.getElementById("weight").value;
var h = document.getElementById("height").value;
var j = document.getElementById("pal").value;







//male EER  + Nutrients Calculation

// (0.5 - 1 years)
if (a >= 0.5 && a <= 1 && g == "Male") {
        var eer = (99 * w - 100) + 22;
        var protein = (eer * 0.0375).toFixed(1);
        var fat = (eer * 0.0333).toFixed(1);
        var carbohydrate = (eer * 0.1375).toFixed(1);
        var water = (eer * 1).toFixed(1);
        var fibre = 12;
        var calcium = 260;
        var iron = 11;
        var magnesium = 75;
        var phosphorous = 275;
        var potassium = 700;
        var sodium = 370;
        var zinc = 5;
        var sellenium = 20;
        var vitarae = 500;
        var vitare = 0;
        var retinol = 0;
        var bcarotene = 0;
        var thiamin = 0.3;
        var riboflavin = 0.4;
        var niacin = 4;
        var dietaryfolate = 80;
        var foodfolate = 0;
        var vitb12 = 0.5;
        var vitc = 50;
        var cholestrol = 300;
        var oxalicacid = 0;
        var phytate = 0;
}  
// 2 - 3 yrs
else if (a >= 2 && a <= 3 && g == "Male") {
        var eer = (99 * w - 100) + 20;
        var protein = (eer * 0.0375).toFixed(1);
        var fat = (eer * 0.0333).toFixed(1);
        var carbohydrate = (eer * 0.1375).toFixed(1);
        var water = (eer * 1).toFixed(1);
        var fibre = 19;
        var calcium = 700;
        var iron = 7;
        var magnesium = 65;
        var phosphorous = 460;
        var potassium = 3000;
        var sodium = 1000;
        var zinc = 7;
        var sellenium = 20;
        var vitarae = 300;
        var vitare = 0;
        var retinol = 0;
        var bcarotene = 0;
        var thiamin = 0.5;
        var riboflavin = 0.5;
        var niacin = 6;
        var dietaryfolate = 150;
        var foodfolate = 0;
        var vitb12 = 0.9;
        var vitc = 15;
        var cholestrol = 300;
        var oxalicacid = 0;
        var phytate = 0;
}
// 4 - 8 yrs (PAL = Sedentary)
else if (a >= 4 && a <= 8 && j == "Sedentary" && g == "Male") {
        var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 20;
        var protein = (eer * 0.0375).toFixed(1);
        var fat = (eer * 0.0333).toFixed(1);
        var carbohydrate = (eer * 0.1375).toFixed(1);
        var water = (eer * 1).toFixed(1);
        var fibre = 25;
        var calcium = 1000;
        var iron = 10;
        var magnesium = 130;
        var phosphorous = 500;
        var potassium = 3800;
        var sodium = 1200;
        var zinc = 12;
        var sellenium = 30;
        var vitarae = 400;
        var vitare = 0;
        var retinol = 0;
        var bcarotene = 0;
        var thiamin = 0.6;
        var riboflavin = 0.6;
        var niacin = 8;
        var dietaryfolate = 200;
        var foodfolate = 0;
        var vitb12 = 1.2;
        var vitc = 25;
        var cholestrol = 300;
        var oxalicacid = 0;
        var phytate = 0;
}
// 4 - 8 yrs (PAL = Light)
else if (a >= 4 && a <= 8 && j == "Light" && g == "Male") {
        var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 20;
        var protein = (eer * 0.0375).toFixed(1);
        var fat = (eer * 0.0333).toFixed(1);
        var carbohydrate = (eer * 0.1375).toFixed(1);
        var water = (eer * 1).toFixed(1);
        var fibre = 25;
        var calcium = 1000;
        var iron = 10;
        var magnesium = 130;
        var phosphorous = 500;
        var potassium = 3800;
        var sodium = 1200;
        var zinc = 12;
        var sellenium = 30;
        var vitarae = 400;
        var vitare = 0;
        var retinol = 0;
        var bcarotene = 0;
        var thiamin = 0.6;
        var riboflavin = 0.6;
        var niacin = 8;
        var dietaryfolate = 200;
        var foodfolate = 0;
        var vitb12 = 1.2;
        var vitc = 25;
        var cholestrol = 300;
        var oxalicacid = 0;
        var phytate = 0;
}
// 4 - 8 yrs (PAL = Moderate)
else if (a >= 4 && a <= 8 && j == "Moderate" && g == "Male") {
        var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 20;
        var protein = (eer * 0.0375).toFixed(1);
        var fat = (eer * 0.0333).toFixed(1);
        var carbohydrate = (eer * 0.1375).toFixed(1);
        var water = (eer * 1).toFixed(1);
        var fibre = 25;
        var calcium = 1000;
        var iron = 10;
        var magnesium = 130;
        var phosphorous = 500;
        var potassium = 3800;
        var sodium = 1200;
        var zinc = 12;
        var sellenium = 30;
        var vitarae = 400;
        var vitare = 0;
        var retinol = 0;
        var bcarotene = 0;
        var thiamin = 0.6;
        var riboflavin = 0.6;
        var niacin = 8;
        var dietaryfolate = 200;
        var foodfolate = 0;
        var vitb12 = 1.2;
        var vitc = 25;
        var cholestrol = 300;
        var oxalicacid = 0;
        var phytate = 0;
}
// 4 - 8 yrs (PAL = Heavy)
else if (a >= 4 && a <= 8 && j == "Heavy" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1000;
    var iron = 10;
    var magnesium = 130;
    var phosphorous = 500;
    var potassium = 3800;
    var sodium = 1200;
    var zinc = 12;
    var sellenium = 30;
    var vitarae = 400;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.6;
    var riboflavin = 0.6;
    var niacin = 8;
    var dietaryfolate = 200;
    var foodfolate = 0;
    var vitb12 = 1.2;
    var vitc = 25;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 9 - 13 yrs (PAL = Sedentary)
else if (a >= 9 && a <= 13 && j == "Sedentary" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 31;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 12;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 9 - 13 yrs (PAL = Light)
else if (a >= 9 && a <= 13 && j == "Light" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 31;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 12;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 9 - 13 yrs (PAL = Moderate)
else if (a >= 9 && a <= 13 && j == "Moderate" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 31;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 12;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 9 - 13 yrs (PAL = Heavy)
else if (a >= 9 && a <= 13 && j == "Heavy" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 31;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 12;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 14 -18 (PAL = Sedentary)
else if (a >= 14 && a <= 18 && j == "Sedentary" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.00 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1300;
    var iron = 11;
    var magnesium = 410;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 14 -18 (PAL = Light)
else if (a >= 14 && a <= 18 && j == "Light" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.13 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1300;
    var iron = 11;
    var magnesium = 410;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 14 -18 (PAL = Moderate)
else if (a >= 14 && a <= 18 && j == "Moderate" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.26 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1300;
    var iron = 11;
    var magnesium = 410;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
// 14 -18 (PAL = Heavy)
else if (a >= 14 && a <= 18 && j == "Heavy" && g == "Male") {
    var eer = 88.5 - 61.9 * a + 1.42 * (26.7 * w + 903 * (h / 100)) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1300;
    var iron = 11;
    var magnesium = 410;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//19 -30 (PAL = Sedentary)
else if (a >= 19 && a <= 30 && j == "Sedentary" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 400;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//19 -30 (PAL = Light)
else if (a >= 19 && a <= 30 && j == "Light" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 400;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//19 -30 (PAL = Moderate)
else if (a >= 19 && a <= 30 && j == "Moderate" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 400;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//19 -30 (PAL = Heavy)
else if (a >= 19 && a <= 30 && j == "Heavy" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 400;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//31 - 50 (PAL = Sedentary)
else if (a >= 31 && a <= 50 && j == "Sedentary" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//31 - 50 (PAL = Light)
else if (a >= 31 && a <= 50 && j == "Light" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//31 - 50 (PAL = Moderate)
else if (a >= 31 && a <= 50 && j == "Moderate" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//31 - 50 (PAL = Heavy)
else if (a >= 31 && a <= 50 && j == "Heavy" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 38;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//51 - 70 (PAL = Sedentary)
else if (a >= 51 && a <= 70 && j == "Sedentary" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//51 - 70 (PAL = Light)
else if (a >= 51 && a <= 70 && j == "Light" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//51 - 70 (PAL = Moderate)
else if (a >= 51 && a <= 70 && j == "Moderate" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//51 - 70 (PAL = Heavy)
else if (a >= 51 && a <= 70 && j == "Heavy" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1000;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//71 - 100 (PAL = Sedentary)
else if (a >= 71 && a <= 100 && j == "Sedentary" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.00 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1200;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 1200;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//71 - 100 (PAL = Light)
else if (a >= 71 && a <= 100 && j == "Light" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.11 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1200;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 1200;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//71 - 100 (PAL = Moderate)
else if (a >= 71 && a <= 100 && j == "Moderate" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.25 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1200;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 1200;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//71 - 100 (PAL = Heavy)
else if (a >= 71 && a <= 100 && j == "Heavy" && g == "Male") {
    var eer = 662 - 9.53 * a + 1.48 * (15.91 * w + 539.6 * (h / 100));
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 30;
    var calcium = 1200;
    var iron = 8;
    var magnesium = 420;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 1200;
    var zinc = 11;
    var sellenium = 55;
    var vitarae = 900;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.2;
    var riboflavin = 1.3;
    var niacin = 16;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 90;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}

//End of male EER  + Nutrients Calculation

//Female EER  + Nutrients Calculation

// (0.5 - 1 years)
else if (a >= 0.5 && a <= 1 && g == "Female") {
    var eer = (99 * w - 100) + 22;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 12;
    var calcium = 260;
    var iron = 11;
    var magnesium = 75;
    var phosphorous = 275;
    var potassium = 700;
    var sodium = 370;
    var zinc = 3;
    var sellenium = 20;
    var vitarae = 500;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.3;
    var riboflavin = 0.4;
    var niacin = 4;
    var dietaryfolate = 80;
    var foodfolate = 0;
    var vitb12 = 0.5;
    var vitc = 30;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//(2 - 3 years)
else if (a >= 2 && a <= 3 && g == "Female") {
    var eer = (99 * w - 100) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 19;
    var calcium = 700;
    var iron = 9;
    var magnesium = 80;
    var phosphorous = 460;
    var potassium = 3000;
    var sodium = 1000;
    var zinc = 3;
    var sellenium = 20;
    var vitarae = 300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.5;
    var riboflavin = 0.5;
    var niacin = 6;
    var dietaryfolate = 150;
    var foodfolate = 0;
    var vitb12 = 0.9;
    var vitc = 35;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//4 - 8 (PAL = Sedentary)
else if (a >= 4 && a <= 8 && j == "Sedentary" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1000;
    var iron = 10;
    var magnesium = 130;
    var phosphorous = 500;
    var potassium = 3800;
    var sodium = 1200;
    var zinc = 5;
    var sellenium = 30;
    var vitarae = 400;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.6;
    var riboflavin = 0.6;
    var niacin = 8;
    var dietaryfolate = 200;
    var foodfolate = 0;
    var vitb12 = 1.2;
    var vitc = 35;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//4 - 8 (PAL = Light)
else if (a >= 4 && a <= 8 && j == "Light" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1000;
    var iron = 10;
    var magnesium = 130;
    var phosphorous = 500;
    var potassium = 3800;
    var sodium = 1200;
    var zinc = 5;
    var sellenium = 30;
    var vitarae = 400;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.6;
    var riboflavin = 0.6;
    var niacin = 8;
    var dietaryfolate = 200;
    var foodfolate = 0;
    var vitb12 = 1.2;
    var vitc = 35;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//4 - 8 (PAL = Moderate)
else if (a >= 4 && a <= 8 && j == "Moderate" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1000;
    var iron = 10;
    var magnesium = 130;
    var phosphorous = 500;
    var potassium = 3800;
    var sodium = 1200;
    var zinc = 5;
    var sellenium = 30;
    var vitarae = 400;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.6;
    var riboflavin = 0.6;
    var niacin = 8;
    var dietaryfolate = 200;
    var foodfolate = 0;
    var vitb12 = 1.2;
    var vitc = 35;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//4 - 8 (PAL = Heavy)
else if (a >= 4 && a <= 8 && j == "Heavy" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.56)) + (934 * h / 100) + 20;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1000;
    var iron = 10;
    var magnesium = 130;
    var phosphorous = 500;
    var potassium = 3800;
    var sodium = 1200;
    var zinc = 5;
    var sellenium = 30;
    var vitarae = 400;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.6;
    var riboflavin = 0.6;
    var niacin = 8;
    var dietaryfolate = 200;
    var foodfolate = 0;
    var vitb12 = 1.2;
    var vitc = 35;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//9 - 13 (PAL = Sedentary)
else if (a >= 9 && a <= 13 && j == "Sedentary" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 8;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//9 - 13 (PAL = Light)
else if (a >= 9 && a <= 13 && j == "Light" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 8;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//9 - 13 (PAL = Moderate)
else if (a >= 9 && a <= 13 && j == "Moderate" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 8;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//9 - 13 (PAL = Heavy)
else if (a >= 9 && a <= 13 && j == "Heavy" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1300;
    var iron = 8;
    var magnesium = 240;
    var phosphorous = 1250;
    var potassium = 4500;
    var sodium = 1500;
    var zinc = 8;
    var sellenium = 40;
    var vitarae = 600;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 0.9;
    var riboflavin = 0.9;
    var niacin = 12;
    var dietaryfolate = 300;
    var foodfolate = 0;
    var vitb12 = 1.8;
    var vitc = 45;
    var cholestrol = 0;
    var oxalicacid = 0;
    var phytate = 0;
}
//14 - 18 (NON PREGNANT & NON LACTATING)

//(PAL = Sedentary)
else if (a >= 14 && a <= 18 && j == "Sedentary" && p == "No" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Light)
else if (a >= 14 && a <= 18 && j == "Light" && p == "No" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.16)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 14 && a <= 18 && j == "Moderate" && p == "No" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.31)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Heavy)
else if (a >= 14 && a <= 18 && j == "Heavy" && p == "No" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.56)) + (934 * h / 100) + 25;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}

//14 - 18 (PREGNANT & NON LACTATING)

//(PAL = Sedentary)
else if (a >= 14 && a <= 18 && j == "Sedentary" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25 + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1300;
    var iron = 27;
    var magnesium = 400;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 60;
    var vitarae = 750;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 80;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Light)
else if (a >= 14 && a <= 18 && j == "Light" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.12)) + (934 * h / 100) + 25 + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1300;
    var iron = 27;
    var magnesium = 400;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 60;
    var vitarae = 750;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 80;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 14 && a <= 18 && j == "Moderate" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.27)) + (934 * h / 100) + 25 + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1300;
    var iron = 27;
    var magnesium = 400;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 60;
    var vitarae = 750;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 80;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Heavy)
else if (a >= 14 && a <= 18 && j == "Heavy" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.45)) + (934 * h / 100) + 25 + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1300;
    var iron = 27;
    var magnesium = 400;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 60;
    var vitarae = 750;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 80;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}

//14 - 18 (NON PREGNANT & LACTATING)
//(PAL = Sedentary)
else if (a >= 14 && a <= 18 && j == "Sedentary" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.00)) + (934 * h / 100) + 25 + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//(PAL = Light)
else if (a >= 14 && a <= 18 && j == "Light" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.12)) + (934 * h / 100) + 25 + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//(PAL = Moderate)
else if (a >= 14 && a <= 18 && j == "Moderate" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.27)) + (934 * h / 100) + 25 + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//(PAL = Heavy)
else if (a >= 14 && a <= 18 && j == "Heavy" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (135.3 - (30.8 * a) + (10 * w * 1.45)) + (934 * h / 100) + 25 + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 26;
    var calcium = 1400;
    var iron = 15;
    var magnesium = 360;
    var phosphorous = 1250;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 9;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1;
    var riboflavin = 1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 65;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//19 - 30 (NON PREGNANT & NON LACTATING)
//(PAL = Sedentary)
else if (a >= 19 && a <= 30 && j == "Sedentary" && p == "No" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1300;
    var iron = 18;
    var magnesium = 360;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 8;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.1;
    var riboflavin = 1.1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Light)
else if (a >= 19 && a <= 30 && j == "Light" && p == "No" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1300;
    var iron = 18;
    var magnesium = 360;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 8;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.1;
    var riboflavin = 1.1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 19 && a <= 30 && j == "Moderate" && p == "No" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1300;
    var iron = 18;
    var magnesium = 360;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 8;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.1;
    var riboflavin = 1.1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Heavy)
else if (a >= 19 && a <= 30 && j == "Heavy" && p == "No" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 25;
    var calcium = 1300;
    var iron = 18;
    var magnesium = 360;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 8;
    var sellenium = 55;
    var vitarae = 700;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.1;
    var riboflavin = 1.1;
    var niacin = 14;
    var dietaryfolate = 400;
    var foodfolate = 0;
    var vitb12 = 2.4;
    var vitc = 75;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}

//19 - 50 (PREGNANT & NON LACTATING)
//(PAL = Sedentary)
else if (a >= 19 && a <= 50 && j == "Sedentary" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100) + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1000;
    var iron = 27;
    var magnesium = 350;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 60;
    var vitarae = 770;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 85;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//(PAL = Light)
else if (a >= 19 && a <= 50 && j == "Light" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100) + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1000;
    var iron = 27;
    var magnesium = 350;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 60;
    var vitarae = 770;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 85;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 19 && a <= 50 && j == "Moderate" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100) + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1000;
    var iron = 27;
    var magnesium = 350;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 60;
    var vitarae = 770;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 85;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//(PAL = Heavy)
else if (a >= 19 && a <= 50 && j == "Heavy" && p == "Yes" && l == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100) + 272 + 180;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 28;
    var calcium = 1000;
    var iron = 27;
    var magnesium = 350;
    var phosphorous = 700;
    var potassium = 4700;
    var sodium = 2300;
    var zinc = 11;
    var sellenium = 60;
    var vitarae = 770;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.4;
    var niacin = 18;
    var dietaryfolate = 600;
    var foodfolate = 0;
    var vitb12 = 2.6;
    var vitc = 85;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
} 
//19 - 50 (NONPREGNANT &  LACTATING)
//(PAL = Sedentary)
else if (a >= 19 && a <= 50 && j == "Sedentary" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100) + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Light)
else if (a >= 19 && a <= 50 && j == "Light" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100) + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 19 && a <= 50 && j == "Moderate" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100) + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Heavy)
else if (a >= 19 && a <= 50 && j == "Heavy" && l == "Yes" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100) + 500 - 170;
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//31 - 100 (NONPREGNANT & NON LACTATING) 
//(PAL = Sedentary)
else if (a >= 31 && a <= 100 && j == "Sedentary" && l == "No" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.00)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Light)
else if (a >= 31 && a <= 100 && j == "Light" && l == "No" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.12)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Moderate)
else if (a >= 31 && a <= 100 && j == "Moderate" && l == "No" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.27)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}
//(PAL = Heavy)
else if (a >= 31 && a <= 100 && j == "Heavy" && l == "No" && p == "No" && g == "Female") {
    var eer = (354.6 - (6.91 * a) + (9.36 * w * 1.45)) + (726 * h / 100);
    var protein = (eer * 0.0375).toFixed(1);
    var fat = (eer * 0.0333).toFixed(1);
    var carbohydrate = (eer * 0.1375).toFixed(1);
    var water = (eer * 1).toFixed(1);
    var fibre = 29;
    var calcium = 1000;
    var iron = 9;
    var magnesium = 310;
    var phosphorous = 700;
    var potassium = 5100;
    var sodium = 2300;
    var zinc = 12;
    var sellenium = 70;
    var vitarae = 1300;
    var vitare = 0;
    var retinol = 0;
    var bcarotene = 0;
    var thiamin = 1.4;
    var riboflavin = 1.6;
    var niacin = 17;
    var dietaryfolate = 500;
    var foodfolate = 0;
    var vitb12 = 2.8;
    var vitc = 120;
    var cholestrol = 300;
    var oxalicacid = 0;
    var phytate = 0;
}

var eer = (eer.toFixed(2));

document.getElementById("eer").value = eer + "Kcals";
document.getElementById("protein").value = protein + "g";
document.getElementById("fat").value = fat + "g";
document.getElementById("carbohydrate").value = carbohydrate + "g";
document.getElementById("water").value = water + "mls";
document.getElementById("fibre").value = fibre + "g";
document.getElementById("calcium").value = calcium + "mg";
document.getElementById("iron").value = iron + "mg";
document.getElementById("magnesium").value = magnesium + "mg";
document.getElementById("phosphorous").value = phosphorous + "mg";
document.getElementById("potassium").value = potassium + "mg";
document.getElementById("sodium").value = sodium + "mg";
document.getElementById("zinc").value = zinc + "mg";
document.getElementById("sellenium").value = sellenium + "mcg";
document.getElementById("vitarae").value = vitarae + "mcg";
document.getElementById("vitare").value = vitare + "mcg";
document.getElementById("retinol").value = retinol + "mcg";
document.getElementById("bcarotene").value = bcarotene + "mcg";
document.getElementById("thiamin").value = thiamin + "mg";
document.getElementById("riboflavin").value = riboflavin + "mg";
document.getElementById("niacin").value = niacin + "mg";
document.getElementById("dietaryfolate").value = dietaryfolate + "mcg";
document.getElementById("foodfolate").value = foodfolate + "mcg";
document.getElementById("vitb12").value = vitb12 + "mcg";
document.getElementById("vitc").value = vitc + "mg";
document.getElementById("cholestrol").value = cholestrol + "mg";
document.getElementById("oxalicacid").value = oxalicacid + "mg";
document.getElementById("phytate").value = phytate + "mg";

};
</script>
<script>

      <?php
        echo "var weights = $weightvariables; \n";
      ?>
      for(i=0;i<weights.length;i++){
        var startweight = parseInt(weights[i][2]);
        var targetweight = parseInt(weights[i][3]); 

        //document.write(w); 
        //document.write(k); 

      }

      //review variables from Json
        <?php 
            echo "var seven = $reviewnumber1; \n";
            echo "var eight = $reviewnumber2; \n";
            echo "var nine = $reviewnumber3; \n";
            echo "var ten = $reviewnumber4; \n";
            echo "var eleven = $reviewnumber5; \n";
            echo "var twelve = $reviewnumber6; \n";
         ?>

            var p = seven;
            var q = eight;
            var r = nine;
            var s = ten;
            var t = eleven;
            var u = twelve;


      //weight variables from Json
      <?php
            echo "var one = $firstreview; \n";
            echo "var two = $secondreview; \n";
            echo "var three = $thirdreview; \n";
            echo "var four = $fourthreview; \n";
            echo "var five = $fifthreview; \n";
            echo "var six = $sixthreview; \n";
        ?>
        
        var j = one;
        var k = two;
        var l = three;
        var m = four;
        var n = five;
        var o = six;

      
      //document.write(w); 
      //document.write(k);
      //document.write(l);
      
 //success Message
 
        //document.getElementById("successmessage").style.display = "block";


        if (j == '0'){
            document.getElementById("one").style.display = "block";

        } else {
            document.getElementById("one").style.display = "none";
            
        }

        if (j!== '0' && k == '0'){
            document.getElementById("two").style.display = "block";

        } else {
            document.getElementById("two").style.display = "none";
        }
        if (j!== '0' && k !== '0' && l=='0'){
            document.getElementById("three").style.display = "block";

        } else {
            document.getElementById("three").style.display = "none";
        }
        if (j!== '0' && k !== '0' && l!=='0' && m=='0'){
            document.getElementById("four").style.display = "block";

        } else {
            document.getElementById("four").style.display = "none";
        }
        if (j!== '0' && k !== '0' && l!=='0' && m!=='0' && n=='0'){
            document.getElementById("five").style.display = "block";

        } else {
            document.getElementById("five").style.display = "none";
        }
        if (j!== '0' && k !== '0' && l!=='0' && m!=='0' && n!=='0' && o=='0'){
            document.getElementById("six").style.display = "block";

        } else {
            document.getElementById("six").style.display = "none";
           
        }


        
        function transfer(){
            document.getElementById("w1").value = j;
            document.getElementById("w2").value = k;
            document.getElementById("w3").value = l;
            document.getElementById("w4").value = m;
            document.getElementById("w5").value = n;
            document.getElementById("w6").value = o;

            document.getElementById("y1").value = p;
            document.getElementById("y2").value = q;
            document.getElementById("y3").value = r;
            document.getElementById("y4").value = s;
            document.getElementById("y5").value = t;
            document.getElementById("y6").value = u;

            document.getElementById("savereview").style.display = "block";

        }
        
        //grab your imports
        const second = document.querySelector('.second');
        const third = document.querySelector('.third');
        const fourth = document.querySelector('.fourth');
        const fifth = document.querySelector('.fifth');
        const sixth = document.querySelector('.sixth');
        const seventh = document.querySelector('.seventh');

        var xValues = ["Initial Weight", "1st", "2nd", "3rd", "4th", "5th", "6th", "Target Weight"];
       
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145",
            "#1e7145",
            "#1e7145",
            "#1e7145"
        ];

        let michart = new Chart("myCharx", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: 'Weight Monitor(Kgs)',
                    pointRadius: "7",
                    pointBackgroundColor: barColors,
                    backgroundColor: "#421966",
                    // your input field values will be inserted into this data and this is what your function does
                    data: [startweight, j, k, l, m, n, o, targetweight]
                }]
            },

            //X AXIS LABEL 
            options : {
                    scales: {
                        xAxes: [{
                        scaleLabel: {
                            display: true,

                            labelString: 'Number of Reviews'
                        }
                        }]
                    }
                }

        });


        //mychart meets object data, data meets object datasets, datasets calls arrays then meets object data, data calls arrays
        const updatechartt = (input, dataorder) => {
            input.addEventListener('change', e => {
                //whatever dataorder selected, input becomes the corresponding value
                // if data[dataorder] = 2, input will be 'second' query selector
                mychart.data.datasets[0].data[dataorder] = e.target.value;
                //this helps update fields in every newly added input value
                mychart.update();
            });

        };

        //updatechartt(first, 0);
        updatechartt(second, 1);
        updatechartt(third, 2);
        updatechartt(fourth, 3);
        updatechartt(fifth, 4);
        updatechartt(sixth, 5);
        updatechartt(seventh, 6);

        //-----------------------second function
        const updatechart = (input, dataorder) => {
            input.addEventListener('change', e => {
                //whatever dataorder selected, input becomes the corresponding value
                // if data[dataorder] = 2, input will be 'second' query selector
                michart.data.datasets[0].data[dataorder] = e.target.value;
                michart.update();
            });

        };

        //updatechart(first, 0);
        updatechart(second, 1);
        updatechart(third, 2);
        updatechart(fourth, 3);
        updatechartt(fifth, 4);
        updatechartt(sixth, 5);
        updatechartt(seventh, 6);

        //console.log(c);
</script>
<script>
    
//show Register Button Function
document.getElementById("Selector").onchange = changeListener;
  
  function changeListener(){
  var value = this.value
      console.log(value);
      if (value == "Yes"){
          document.getElementById("registerbutton").style.display = "block";
          document.getElementById("successdiv").style.display = "block";
          document.getElementById("disclaimerdiv").style.display = "none";
      }else if (value == "No"){
          document.getElementById("registerbutton").style.display = "block";
          document.getElementById("successdiv").style.display = "none";
          document.getElementById("disclaimerdiv").style.display = "block";
      }
      
  }

</script>
 <!-- SCRIPT TO SHOW USER DATA -->
 <script>
    var goal = document.getElementById("goal").value;
    if(goal == 'Weight Management Diet Plan'){
        document.getElementById("plancost").value = "Ksh 1,600";
        document.getElementById("info").innerHTML = "<h5>When you choose this plan:</h5><p>1. We estimate possible Time Required to achieve your Stated goal.</p><p>2. We walk with you throughout the journey (sometimes The journey may go beyond years).</p><p>3. The diet plans remain congruently within your food preferences, availability and affordability.</p><p>4. We track your diet plan use compliance by assigning you simple tasks to do.</p><p>5. We remain committed to help you adjust as you request.</p><p>6. We communicate with you securely throughout the program Addressing possible challenges.</p><p>7. The meal plan is a 7 day plan, which will be reproduced week after week until the subsequent review date.</p>";
       
    }
    if(goal == 'Diabetes Management Diet Plan'){
        document.getElementById("plancost").value = "Ksh 1,800";
        document.getElementById("info").innerHTML = "<h5>When you choose this plan:</h5><p>1. We estimate possible Time Required to achieve your this goal.</p><p>2. We assume that you are on optimal drug treatment and you only need a diet plan to support the treatment.</p><p>3. We make diet plan that has consistent amount of nutrients (carbohydrate load)per meal or snack per day as per the guidelines.</p><p>4. We walk with you throughout the journey (sometimes The journey may go beyond years) until we achieve your goals.</p><p>5. The diet plans remain congruently within your food preferences, availability and affordability.</p><p>6. We monitor sugar levels progress on our charts on assigned times.</p><p>7. We track your diet plan use and compliance by assigning you simple tasks to do.</p><p>8. We remain committed to help you adjust as you request.</p><p>9. We communicate with you securely throughout the program Addressing possible challenges.</p><p>10. The meal plan is a 7 day plan, which will be reproduced week after week until the subsequent review date.</p>";
        
        
    }
    if(goal == 'Diabetes and Weight Management Diet Plan'){
        document.getElementById("plancost").value = "Ksh 2,000";
        document.getElementById("info").innerHTML = "<h5>When you choose this plan:</h5><p>1. We estimate possible Time Required to achieve your these 2 goals.</p><p>2. We assume that you are on optimal drug treatment and you only need a diet plan to support the treatment.</p><p>3. We make diet plan that has consistent amount of nutrients (carbohydrate load)per meal or snack per day as per the guidelines and consider your weight goal.</p><p>4. We walk with you throughout the journey (sometimes The journey may go beyond years) until we achieve your goals.</p><p>5. The diet plans remain congruently within your food preferences, availability and affordability.</p><p>6. We monitor sugar levels progress on our charts on assigned times.</p><p>7. We track your diet plan use and compliance by assigning you simple tasks to do.</p><p>8. We remain committed to help you adjust as you request.</p><p>9. We communicate with you securely throughout the program Addressing possible challenges.</p><p>10. The meal plan is a 7 day plan, which will be reproduced week after week until the subsequent review date.</p>";
        
    }
    
</script>

<script>
    function showinfo(){
        document.getElementById("info").style.display = "block";
        document.getElementById("hidedetails").style.display = "block";
        document.getElementById("showdetails").style.display = "none";
    }
    function hideinfo(){
        document.getElementById("info").style.display = "none";
        document.getElementById("showdetails").style.display = "block";
        document.getElementById("hidedetails").style.display = "none";
    }

</script>
<!-- SCRIPT TO SHOW USER DATA -->

<!-- CK EDITOR -->
<script>
    //CKEDITOR.replace( 'message' );
</script>
</body>
</html>
