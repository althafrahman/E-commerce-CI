<style>
    .cart-item-img {
        width: 15vh;
        height: 15vh;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }
</style>
<div id="cartz" class=" text-center">
    <div class="row" style="margin: 15px">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Sl No</th>
                    <th>Item</th>
                    <th></th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="cartItems">

            </tbody>
        </table>
    </div>

    <div class="row" style="display:flex; justify-content:space-between">
        <div>

        </div>
        <div style="width : 25%; float : right">
            <h3>Grand Total</h3>
            <p id="grand"></p>
        </div>
    </div>
    <div class="row" style="display:flex; justify-content:space-between">
        <div>

        </div>
        <div style="width : 25%; float : right; margin : 10px">
            <a class="btn btn-warning" style="width : 75%" href="<?php echo base_url() ?>CartController/checkout"><i class="fa fa-check" style="color:black"></i> Check Out</a>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        updateCart();
    });
    $(document).on('keyup', '.quantity', function() {
        var quantity = $(this).val();
        var id = $(this).attr('val');
        if (quantity !== "") {
            $.ajax({
                url: "<?php echo base_url() ?>CartController/updateCartItems",
                async: false,
                type: "POST",
                data: {
                    "id": id,
                    "quantity": quantity,
                }

            })
            updateCart();
        }

    });

    function updateCart() {
        var text = "";
        $.ajax({
            url: "<?php echo base_url() ?>CartController/getCartItems",
            async: false,
            success: function(result) {
                if (result !== '[]') {
                    $.each(JSON.parse(result), function(i, items) {
                        text = text + '<tr>';
                        text = text + '<td>' + parseInt(i + 1) + '</td>';
                        text = text + '<td>' + items.name + '</td>';
                        text = text + '<td><img class="cart-item-img" src="' + items.image + '" /> </td>';
                        text = text + '<td>$ ' + items.price + '</td>';
                        var q = 1
                        if (items.quantity > 1) {
                            q = items.quantity;
                        }
                        text = text + '<td><input type="number" value="' + q + '" class="quantity" val="' + items.c_id + '" style = "padding : 5px 10px" /></td>';
                        var total = q * parseInt(items.price)
                        text = text + '<td><input type="hidden" class="subtot" value="' + total + '"  /> $ ' + total + '</td>'
                        text = text + '<td><button type="button" val = "' + items.c_id + '" class="btn btn-danger btn-remove"><i class="fa fa-close" style="color:white; font-size : 20px"></i></button></td>';
                        text = text + '</tr>';
                    });
                    $('#cartItems').html(text);
                    text = '';
                } else {
                    $('#cartz').html('<h2 style = "margin:20px">Empty Cart</h2>')
                }

            }
        });
        calc_total();
    }

    function calc_total() {
        var total = 0;
        $('.subtot').each(function() {
            total = total + parseInt($(this).val());
        });
        $('#grand').html('$ ' + total);
    }

    $(document).on('click', '.btn-remove', function() {
        $.ajax({
            url: "<?php echo base_url() ?>CartController/removeCartItem",
            async: false,
            type: "POST",
            data: {
                "item_id": $(this).attr('val'),
            }
        })
        updateCart();
        $(this).closest("tr").remove();
    });
</script>