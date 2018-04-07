<?php
session_start();

?>

<?php  $room = $_POST['room'];
            $rate = $_POST['rate'];
              if(isset($_POST['declineType'])) {
                  if ($_POST['declineType'] == 'ratio') {
                       $ratioservice = ($rate / 100) * 10;
                  } else {
                      if ($_POST['declineType'] == 'fixed')
                           $fixedservice = $_POST['fixed'];
                  }
              }

            if(isset($_POST['vattype'])) {

                if ($_POST['vattype'] == 'ratio1') {
                    $ratiovat = ($rate / 100) * 15;
                } else {
                    if ($_POST['vattype'] == 'fixed1')

                         $fixedvate = $_POST['fixed1'];
                }
            }
        if(isset($_POST['discount'])) {
          $discount = $_POST['discount'];

        }
              $total=0;
              if ( ($_POST['declineType']=='ratio')&&($_POST['vattype']=='ratio1') )
              {
                  $total=$rate+$ratioservice+$ratiovat+$discount;

                   $total;
              }
              if ( ($_POST['declineType']=='fixed')&&($_POST['vattype']=='fixed1') ) {
                  $total = $rate + $fixedservice + $fixedvate - $discount;
                   $total;
              }

             ?>

<?php
$_SESSION['room']=$room;
$_SESSION['rate']=$_POST['rate'];

if(isset($_POST['declineType'])) {
    $_SESSION['declineType'] = $_POST['declineType'];
    //print_r( $_SESSION['declineType']);

    if ($_POST['declineType'] == 'ratio') {
           $_SESSION['ratioservice'] = ($_POST['rate'] / 100) * 10;
    } else {
        if ($_POST['declineType'] == 'fixed')
             $_SESSION['fixed'] = $_POST['fixed'];
    }
}
if(isset($_POST['vattype'])) {
    $_SESSION['vattype'] = $_POST['vattype'];

            if ($_POST['vattype']=='ratio1')
            {
                $_SESSION['ratiovat']=($_POST['rate']/100)*15;
            }

            {

                if ($_POST['vattype']=='fixed1')

                 $_SESSION['fixed1']= $_POST['fixed1'];
            }

}

$_SESSION['discount']=$_POST['discount'];
$_SESSION['total']=$total;
//$_SESSION['fixed1']=$_POST['fixed1'];


?>



<?php


$cart = array (
    'room' => $_SESSION['room'],
    'rate' => $_SESSION['rate'],
    'declineType'=>$_SESSION['declineType'],
    'vattype'=>$_SESSION['vattype'],
    'ratioservice'=> $_SESSION['ratioservice'],
    'fixedservice'=> $_SESSION['fixed'],
    'ratiovat'=>$_SESSION['ratiovat'],
    'fixedvate'=>$_SESSION['fixed1'],
    'discount'=>$_SESSION['discount'],
    'total'=>$_SESSION['total']
);
$_SESSION['cart'][] = $cart;
?>

<?php
$total=0;
foreach ($_SESSION['cart'] as $item) {   ?>
    <div id=""example4"">
    <table border="1">
     <tr>
        <th>
            Room number
        </th>

        <th>
             Rack Rate
        </th>

        <th>
            Service Charge
        </th>

        <th>
            VAT
        </th>
        <th>
            Discount
        </th>


        <th>
            Total
        </th>
    </tr>

    <tr>
    <td>
     <?php   echo  $item['room']; ?>

   </td>

        <td>
        <?php   echo  $item['rate']; ?>

        </td>
       <td>
         <?php
           if(isset($_POST['declineType'])){
               //$_SESSION['declineType'] = $_POST['declineType'];
           //print_r( $_SESSION['declineType']);

           if ($item['declineType']=='ratio')
           {
           echo  $ratioservice=($item['rate']/100)*10;
           }

           else
           {
           if ($item['declineType']=='fixed')
           echo $fixedservice  =$item['fixedservice'];
           }

           }
           ?>
       </td>


        <td>
           <?php
            if(isset($_POST['vattype'])) {
            //echo $ratiovat  = $item['vattype'];

            if ($item['vattype']=='ratio1')
            {
            echo  $ratiovat=($item['rate']/100)*15;
            }
            else
            {

            if ($item['vattype']=='fixed1')

            echo  $fixed= $item['fixedvate'];
            }

            }
            ?>

        </td>
        <td>
            <?php

           echo $discount = $item['discount'];
         ?>
        </td>

        <td>
         <?php    echo $subtotal = $item['total'];
           ?>
        </td>

   </tr>
        <?php   $total=$total+$item['total'] ?>
        <?php   $_SESSION['total']=$total  ?>
        <?php  } ?>
        <td>

        </td>

        <tr>
            <td colspan="7">Total : <?php echo($total); ?></td>
        </tr>
        </tr>


</table>
</div>









