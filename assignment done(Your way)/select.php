<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<form id="foo" method="post" >
    <table>

         <td>
        <label>Room Number</label>
              <input name="room" type="text" value="" />
          </td>

      <td>
      <label> Rack Rate</label>
    <input  name="rate" type="text" value="" />
  </td>
        <td>
        <label> Service Charge Type</label>
<!--        <input  name="rate" type="text" value="" />-->
            <select name="declineType" id="declineType" onchange="showfield(this.options[this.selectedIndex].value)">
                <option selected="selected">Please select ...</option>
                <option value="ratio">(10% service charge  wil be added)</option>
                <option value="fixed">Fixed</option>

            </select>
            <div id="div1"></div>
        </td>
                    <td>
                           <label> VAT Type</label>
                        <select name="vattype" id="vattype" onchange="showfield1(this.options[this.selectedIndex].value)">
                            <option selected="selected">Please select ...</option>
                            <option value="ratio1">Ratio(15% vat wil add)</option>
                           <option value="fixed1">Fixed</option>
                          </select>
                        <div id="div2"></div>
                     </td>
                     <td>
                          <label> Discount </label>
                         <input  name="discount" type="text" value="" />
               </td>
                 <td>
                     <input type="submit" value="show  total" />
              </td>
        </tr>
    </table>


</form>

<!-- The result of the search will be rendered inside this div -->
<div id="example4"></div>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
    function showfield(name){
        if(name=='fixed')document.getElementById('div1').innerHTML='Fixed: <input type="text" name="fixed" />';
        else document.getElementById('div1').innerHTML='';
    }
    function showfield1(name){
        if(name=='fixed1')document.getElementById('div2').innerHTML='Fixed: <input type="text" name="fixed1" />';
        else document.getElementById('div2').innerHTML='';
    }


</script>

<script>

    $(function () {

        $('form').on('submit', function (e) {

            e.preventDefault();
    $.ajax({
        type: "POST",
        url: 'test.php',
         //data: {name: '3', age: 4},
         data: $('form').serialize(),
        //data:{'name':name,'age':age},
        success: function(data){
            //alert(data);
            $('#example4').html(data);
        }
    });
        });

    });
</script>




</table>

