<div class="container card" style="margin-top : 10px; padding : 10px">
<div class="row ">
    <div class="col-md-6">
        <h3>Shipping Address</h3><br>
        <p>Lorem Ipsum <br /> Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br /> <i class="fa fa-phone" style="color:green"></i> 8888888888</p>
    </div>
    <div class="col-md-6">
        <h5>Billing Details</h5>
        <p><b>Total</b> : <span class = "total">sada</span></p>
        <p><b>Shipping</b> : Free Shipping</p>
        <p><b>Discount</b> : 0.00</p>
        <hr>
        <p><b>Sub Total</b> : <span class = "total">asdas</span></p><br>
    </div>
</div>
<div class="row" style="display : flex; justify-content:space-between">
    <div >
        
    </div>
    <div style="margin:20px">
    <form action="<?php echo base_url() ?>CartController/placeOrder">
    <button class = "btn btn-success pay" type = "submit" >Proceed To Pay</button>
    </form>
        
    </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $.ajax({
            url : "<?php echo base_url() ?>CartController/getTotal",
            async:false,
            success : function(result){
                var res = JSON.parse(result);
                $('.total').html('$ '+ res.total + '.00');
                $('#tot').val(res.total );
            }
        })
    })

    
</script>
