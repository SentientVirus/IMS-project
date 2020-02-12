<?php
include("connectDB.php");
$result = mysqli_query($link,"select disease_name, Traits.id, question, rg from Diseases, Traits, Correlations where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression';");
?>

<html>
<h1>The test of your Depression risk</h1>
<form name="Depression">
Are your working environment noisy?<p>
<input type="radio" value="Yes" name="Q1" >Yes<p>
<input type="radio" value="No" name="Q1">No<p>
<hr>
Is your BMI higher than 25?<p>
<input type="radio" value="Yes" name="Q2" >Yes<p>
<input type="radio" value="No" name="Q2">No<p>
<hr>
Have you ever experienced any probelm with falling asleep recently?<p>
<input type="radio" value="Yes" name="Q3" >Yes<p>
<input type="radio" value="No" name="Q3">No<p>
<hr>
Do you have frequent alcohol intake?<p>
<input type="radio" value="Yes" name="Q4" >Yes<p>
<input type="radio" value="No" name="Q4">No<p>
<hr>
Do you Exercise regularly?<p>
<input type="radio" value="Yes" name="Q5" >Yes<p>
<input type="radio" value="No" name="Q5">No<p>
<hr>
Do you have siblings have heart diseases?<p>
<input type="radio" value="Yes" name="Q6" >Yes<p>
<input type="radio" value="No" name="Q6">No<p>
<hr>
Do you have pain when walking for 10 min?<p>
<input type="radio" value="Yes" name="Q7" >Yes<p>
<input type="radio" value="No" name="Q7">No<p>
<hr>
Do you have partents having high blood pressure?<p>
<input type="radio" value="Yes" name="Q8" >Yes<p>
<input type="radio" value="No" name="Q8">No<p>
<hr>
Do you enjoy going to high volume concert?<p>
<input type="radio" value="Yes" name="Q9" >Yes<p>
<input type="radio" value="No" name="Q9">No<p>
<hr>
Do you smoke?<p>
<input type="radio" value="Yes" name="Q10" >Yes<p>
<input type="radio" value="No" name="Q10">No<p>
<hr>

<br>
<input type="button" value="Submit" onclick="loopForm(document.thisForm);">
</form>
<p>
<div id="radioResults"></div>



<script type="text/javascript">
  function loopForm(form) {
    var cbResults = 'Checkboxes: ';
    var radioResults = 'Radio buttons: ';
    for (var i = 0; i < form.elements.length; i++ ) {
        if (form.elements[i].type == 'checkbox') {
            if (form.elements[i]. == true) {
                cbResults += form.elements[i].value + ' ';
            }
        }
        if (form.elements[i].type == 'radio') {
            if (form.elements[i]. == true) {
                radioResults += form.elements[i].value + ' ';
            }
        }
    }
    document.getElementById("cbResults").innerHTML = cbResults;
    document.getElementById("radioResults").innerHTML = radioResults;
}
</script>
