<?php
$state_asdsdsdd = array("INDIA"=>array("Delhi","Gujarat","Rajasthan","Maharastra"),
    "PAKISTAN"=>array("Sindh","Punjab"),
    "CHINA"=>array("China state 1","China state 2"));
$city_array = array("Delhi"=>array("New Delhi","CP","Chanakyapuri"),
    "Gujarat"=>array("Ahmedabad","Katchch","Vadodara","Rajkot"),
    "Rajasthan"=>array("Jaipur","Pushkar","Udaypur"),
    "Maharastra"=>array("Mumbai","Pune","Nagpur"),
    "Sindh"=>array("Sindh City 1","Sindh city 2"),
    "Punjab"=>array("Punjab city 1","Punjab city 2"),
    "China state 1"=>array("China s1 c1","China s1 c2"),
    "China state 2"=>array("China s2 c1","China s2 c2")
);
if(isset($_POST['country'])!=""){
    $country = $_POST["country"]; ?>
    <option value="">-- Select State --</option>
    <?php foreach ($state_array[$country] as $statename) { ?>
        <option value="<?php echo $statename;?>"><?php echo $statename;?></option>
    <?php } ?>
<?php }

if(isset($_POST['state'])!=""){
    $state = $_POST["state"]; ?>
    <option value="">-- Select City --</option>
    <?php foreach ($city_array[$state] as $cityname) { ?>
        <option value="<?php echo $cityname;?>"><?php echo $cityname;?></option>
    <?php } ?>
<?php }
?>