<!DOCTYPE html>
<html>
<head>
    <title>Ajax dependent dropdown (Country, State, City)</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style type="text/css">
    body{font-family: arial;font-size: 14px;}
    .form_container{border: 1px dashed #ccc;float: left;}
    form{width: 400px;padding: 5px;}
    div.input_row{width: 100%;float: left;margin: 5px 0;}
    .input_row label{width: 30%;float: left;}
    .input_row .input_fields{float: left;width: 70%;}
    select{width: 100%;}
</style>
<body>
<script>
    $(document).ready(function(){
        /*script run when you select country from dropdown*/
        $(document).on("change",".select_country",function(){ // You can either use $(".select_country").change(function(){
            var country = $(this).val();
            $.ajax({
                type: "POST",
                data: "country="+country,
                url: "process.php",
                success: function(data) {
                    if(data!="") {
                        //"<p> .select_state </p>"
                        // alert(".select_state");

                        $(".select_state").html(data);

                        $(".select_city").html('<option value="">-- Select State --</option>');
                    }else{
                        alert("there's some problem");
                    }
                }
            });
        });
        /*script run when you select state from dropdown*/
        $(document).on("change",".select_state",function(){
            var state = $(this).val();
            $.ajax({
                type: "POST",
                data: "state="+state,
                url: "process.php",
                success: function(data) {
                    if(data!="") {
                        $(".select_city").html(data);
                    }else{
                        alert("there's some problem");
                    }
                }
            });
        });
    });
</script>
<?php
$country_array = array("INDIA","PAKISTAN","CHINA");
?>
<h1>Ajax Dropdowns Country, State, City</h1>
<div class="form_container">
    <div class="inner_div">
        <form>
            <div class="input_row">
                <label>Country</label>
                <div class="input_fields">
                    <select class="select_country">
                        <option value="">-- Select Country --</option>
                        <?php foreach ($country_array as $countryname) { ?>
                            <option value="<?php echo $countryname;?>"><?php echo $countryname;?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>


            <div class="input_row">
                <label>State</label>
                <div class="input_fields">
                    <select class="select_state">
                        <option value="">-- Select Country --</option>
                    </select>
                </div>
            </div>
            <div class="input_row">
                <label>City</label>
                <div class="input_fields">
                    <select class="select_city">
                        <option value="">-- Select State --</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
</body>


</html>
