<?php
session_start();
?>
<div class="btn-group">
    <table>
        <tr>
            <th>Room Numbe</th>
            <th>Rack Rate</th>
            <th>Service Charge Type%</th>
            <th>Service Charge</th>
            <th>VAT Type</th>
            <th>VAT</th>
            <th>Discount</th>
            <th>SubTotal</th>
        </tr>
        <tr>
            <td>
                <input type="text"  readonly  value="101" >
            </td>
            <td>
                <input type="number"  name="rate">
            </td>
            <td>
                <input type="number"  placeholder="Ratio" name="servicecahrege"  oninput="showCustomer()">
            </td>

            <td id="example4">
            </td>
            <td>

                <input type="number"   placeholder="Vat Ratio" name="ratiovat"  oninput="showCustomer1()">

            </td>

            <td id="vat"">

            </td>
            <td>

                <input type="number"   placeholder="discount " name="discount"  oninput="showCustomer2()">

            </td>

            <td id="subtotal">
            </td>
        </tr>
            </tr>



                    <tr>
                        <td>
                            <input type="text"  readonly  value="102" >
                        </td>
                        <td>
                            <input type="number"  name="rate1">
                        </td>
                        <td>
                            <input type="number"  placeholder="fixed" name="fixedservice1"  oninput="showCustomer3()">
                        </td>

                        <td id="example5">
                        </td>
                        <td>

                            <input type="number"   placeholder=" Fixed vat" name="fixedvate"  oninput="showCustomer4()">

                        </td>

                        <td id="vat1"">

                        </td>
                        <td>

                            <input type="number"   placeholder="discount " name="discount1"    oninput="showCustomer5()">

                        </td>

                        <td id="subtotal1">
                        </td>

                    <td>
                    </td id="total">

                    </tr>

        
            <table>

                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                <script>


                    function showCustomer(){


                        var formData = {
                            'rate'              : $('input[name=rate]').val(),
                            'servicecahrege'    : $('input[name=servicecahrege]').val(),
                            //'discount'             : $('input[name=vat]').val(),


                        };

                        $.ajax({
                            type:'POST',
                            url:'test.php',
                            data:formData,
                            cache: false,
                            success:function(data)
                            {
                                $('#example4').html(data);

                            }

                        });
                    }
                    function showCustomer1(){


                        var formData = {
                            'rate'              : $('input[name=rate]').val(),
                            'vat'             : $('input[name=ratiovat]').val()

                        };

                        $.ajax({
                            type:'POST',
                            url:'test.php',
                            data:formData,
                            cache: false,
                            success:function(data)
                            {

                                $('#vat').html(data);

                            }

                        });
                    }

                    function showCustomer2(){


                        var formData = {
                               'rate'              : $('input[name=rate]').val(),
                               'vat'             : $('input[name=ratiovat]').val(),
                              'servicecahrege'    : $('input[name=servicecahrege]').val(),
                              'discount'             : $('input[name=discount]').val(),

                        };

                        $.ajax({
                            type:'POST',
                            url:'subtotal.php',
                            data:formData,
                            cache: false,
                            success:function(data)
                            {

                                $('#subtotal').html(data);
                                $("#total").html(data);

                            }

                        });
                    }
                    /for 102 room////////////////////////////////////////////////////////////////////

                    function showCustomer3(){


                        var formData = {
                            'rate1'              : $('input[name=rate1]').val(),
                            'servicecahrege1'    : $('input[name=fixedservice1]').val(),
                            //'discount'             : $('input[name=vat]').val(),


                        };

                        $.ajax({
                            type:'POST',
                            url:'test.php',
                            data:formData,
                            cache: false,
                            success:function(data)
                            {
                                $('#example5').html(data);

                                //$('#vat').html(data);

                                //alert(data);
                            }

                        });
                    }
                    function showCustomer4(){


                        var formData = {
                            'rate1'              : $('input[name=rate1]').val(),
                            'vat1'             : $('input[name=fixedvate]').val()

                        };

                        $.ajax({
                            type:'POST',
                            url:'test.php',
                            data:formData,
                            cache: false,
                            success:function(data)
                            {
                                //$('#example4').html(data);

                                $('#vat1').html(data);

                                //alert(data);
                            }

                        });
                    }

                    function showCustomer5() {


                        var formData = {


                            'rate': $('input[name=rate]').val(),
                            'vat': $('input[name=ratiovat]').val(),
                            'servicecahrege': $('input[name=servicecahrege]').val(),
                            'discount': $('input[name=discount]').val(),
                            'rate1': $('input[name=rate1]').val(),
                            'vat1': $('input[name=fixedvate]').val(),
                            'servicecahrege1': $('input[name=fixedservice1]').val(),
                            'discount1': $('input[name=discount1]').val(),


                        };
                        // var urls = ['/url/one','/url/two', ....];
                        //
                        // $.each(urls, function(i,u){
                        //     $.ajax(u,
                        //         { type: 'POST',
                        //             data: {
                        //                 answer_service: answer,
                        //                 expertise_service: expertise,
                        //                 email_service: email,
                        //             },
                        //             success: function (data) {
                        //                 $(".error_msg").text(data);
                        //             }
                        //         }
                        //     );
                        // });

                        var urls = ['subtotal.php', 'total.php'];
                        $.each(urls, function (i, u) {
                            $.ajax(u,
                                {
                                    type: 'POST',
                                    //url: 'subtotal.php',
                                    data: formData,
                                    cache: false,
                                    success: function (data) {

                                        // $('#subtotal1').html(data);
                                         $('#total').html(data);
                                        $('#subtotal1').html(data);

                                        //alert(data);
                                    }
                                }
                            );

                        });
                    }



                </script>


