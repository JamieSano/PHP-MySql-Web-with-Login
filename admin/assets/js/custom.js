$(document).ready(function (){
    $(document).on('click', '.increment', function () {
        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodID').val();
        var currentVal = parseInt($quantityInput.val());

        if(!isNaN(currentVal)){
            var qtyVal = currentVal + 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }
        //window.location.reload();
    });

    $(document).on('click', '.decrement', function () {
        var $quantityInput = $(this).closest('.qtyBox').find('.qty');
        var productId = $(this).closest('.qtyBox').find('.prodID').val();
        var currentVal = parseInt($quantityInput.val());

        if(!isNaN(currentVal) && currentVal > 1){
            var qtyVal = currentVal - 1;
            $quantityInput.val(qtyVal);
            quantityIncDec(productId, qtyVal);
        }
        //window.location.reload();
    });
 
    function quantityIncDec(prodID, qty){
        $.ajax({
            type: "POST",
            url: "code_logs.php",
            data: {
                'productIncDec': true,
                'product_id': prodID,
                'quantity': qty
            },
            success: function (response){
                var res = JSON.parse(response);
                if(res.status == 200){
                    window.location.reload();
                    alertify.success(res.message);
                } else{
                    alertify.error(res.message);
                }
            }
        });
    }

    //proceedToPlace
    $(document).on('click', '.proceedToPlace', function () {
        console.log('proceedToPlace');
        var payment_mode = $('#payment_mode').val();
        var contact_no = $('#contact_no').val();

        if(payment_mode ==''){
            
            swal("Select Payment Mode", "Please select payment mode", "warning");
            return false;
        }

        if(contact_no =='' && !$.isNumeric(contact_no)){
            
            swal("Enter Phone Number", "Enter Valid Phone Number", "warning");
            return false;
        }

        var data = {
            'proceedToPlaceBtn': true,
            'payment_mode': payment_mode,
            'contact_no': contact_no,
        }

        $.ajax({
            type: "POST",
            url: "code_logs.php",
            data: data,
            sucess: function (response){
                var res = JSON.parse(response);
                if(res.status == 200){
                    window.location.href = 'order.php';
                } else if(res.status == 404){
                    swal(res.message, res.message, res.status_type,{
                        buttons:{
                            catch:{
                                text: "OK",
                                value: "catch",
                            },
                            cancel: "Cancel"
                        }
                    })
                    .then((value) => {
                        switch(value){
                            case "catch":
                                console.log('Pop the customer add modal');
                                break;
                            default:
                        }
                    });
                } else{
                    swal(res.message, res.message, res.status_type);
                }
            }
        });
        
    });



});