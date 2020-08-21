<div class="text-center">
    <h3>MY ORDERS</h3>
</div>

<div id="orderz">

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var text = '';
        $.ajax({
            url: "<?php echo base_url() ?>HomeController/getOrders",
            async: false,
            success: function(result) {
                if (result !== '[]') {
                    $.each(JSON.parse(result), function(i, items) {
                        text = text + '<div class="row text-center" style="justify-content : center;margin-top:20px">';
                        text = text + '<div class="col-md-6">';
                        text = text + '<div class="card">';
                        text = text + '<div class="card-header" style="display:flex; justify-content : space-between">';
                        text = text + '<div>';
                        text = text + '<span><b>Order Id</b></span> <br>';
                        text = text + '<span>' + items.order_id + '</span>';
                        text = text + '</div>';
                        text = text + '<div>';
                        text = text + '<span><b>Status</b></span> <br>';
                        var stat = 'Order Placed';
                        if(items.status == 1){
                            stat = 'Shipped' 
                        }else if (items.status == 2){
                            stat = 'Delivered' 
                        }
                        text = text + '<span>' + stat + '</span>';
                        text = text + '</div>';
                        text = text + '<div>';
                        text = text + '<span><b>Total Amount</b></span> <br>';
                        text = text + '<span style="color: green">$ ' + items.total + '</span>';
                        text = text + '</div>';
                        text = text + '</div>';
                        text = text + '<div class="card-body">';
                        $.ajax({
                            url: "<?php echo base_url() ?>HomeController/getOrderItems",
                            async: false,
                            type: "POST",
                            data: {
                                "main_id": items.id,
                            },
                            success: function(rr) {
                                $.each(JSON.parse(rr), function(i, itemsingle) {
                                    text = text + '<div class="row">';
                                    text = text + '<div class="col-md-4" style="float : right"><img style="width : 15vh; height:15vh" src="'+itemsingle.image+'" /></div>';
                                    text = text + '<div class="col-md-4" style="text-align : left">';
                                    text = text + '<h6>'+itemsingle.item_name+'</h6>';
                                    text = text + '<p>In '+itemsingle.cat_name+'</p>';
                                    text = text + '<p style = "color : green">$ '+itemsingle.price+'</p>';
                                    text = text + '</div>';
                                    text = text + '</div>';
                                })
                            }
                        })
                        text = text + '</div>';
                        text = text + '</div>';
                        text = text + '</div>';
                        text = text + '</div>';
                    });
                    $('#orderz').html(text);
                    text = '';
                } else {
                    $('#orderz').html('<h2 style = "margin:20px">No Orders</h2>')
                }

            }
        });
    });
</script>