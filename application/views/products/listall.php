<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/tick.css" />
<script type="text/javascript" src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js'></script>
<link rel="stylesheet" href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css'
    media="screen" />
<style>
    .image-sizes img {
        max-width: 100%;
        max-height: 100%;
    }

    .image-sizes {
        width: 170px;
        height: 200px;
        text-align: center;
        display: table-cell;
        vertical-align: middle;
    }

    .to-details {
        text-decoration: none;
        color: black;
    }

    .to-details:hover {
        text-decoration: none;
        color: black;
    }

    .btn-add-to-cart {
        padding: 0px 10px;
        background: #fc0339;
        color: #fff;
    }

    .btn-add-to-cart:hover {
        background: #fff;
        color: #000;
        border: 1px solid #000;
    }

    .card-filter-header {
        bottom: 0px;
        border-bottom: 2px solid #ccc;
        padding: 10px;
    }

    .card-filter-body {
        bottom: 0px;
        border-bottom: 1px solid #ccc;
        padding: 10px;
    }

    .card-filter {
        padding: 20px;
        width : 100%
    }
</style>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" style=" width:100%; height: 600px !important;">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/banner1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/banner2.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?php echo base_url() ?>assets/images/banner3.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="listing-section">
    <div class="filter-section">
        <nav class="second-navbars">
            <h5 class="text-all">Filters</h5>
            <p><i class="fa fa-filter"></i></p>
        </nav>
        <div class="row">
            <div class="card-filter">
                <div class="card-filter-header">
                    <b>Category</b>
                </div>
                <div class="card-filter-body" id="category-filter">

                </div>

            </div>
        </div>
    </div>
    <div class="products-section">
        <nav class="second-navbars" style="padding-bottom : 10px">
            <h5 class="text-all">Todays Deal</h5>
        </nav>
        <div class="row" id="list-prod">

        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                        <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                        <span class="swal2-success-line-tip"></span>
                        <span class="swal2-success-line-long"></span>
                        <div class="swal2-success-ring"></div>
                        <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                        <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                    </div>
                    <div class="text-center">
                    <h4>Successfully added to cart</h4>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a  href="<?php echo base_url() ?>HomeController/listCart" type="button" id="intocarts" class="btn btn-secondary">Goto Cart</a>
                    <button type="button" id="continue" data-dismiss="modal" class="btn btn-info">Continue Shopping</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        var text = '';
        $.ajax({
            url: "<?php echo base_url() ?>HomeController/getCategories",
            type: "POST",
            data: {

            },
            success: function(result) {
                text = text + '<input type="radio" name="category_name" value = "" id = "all" checked /> <label for = "all">All</label> <br />';
                $.each(JSON.parse(result), function(i, items) {
                    text = text + '<input type="radio" name="category_name" value = "' + items.id + '" id = "cat_'+items.id+'" /> <label for = "cat_'+items.id+'">' + items.name + '</label> <br />';
                });
                $('#category-filter').html(text);
                text = '';
            }
        });

        products();
        // alert($('input[name=category_name]:checked').val())

        // $('input[name=category_name]').change(function(){
        //     alert(1)
        // })
    });

    $(document).on('change', 'input[name=category_name]', function(){
        products();
    })

    function products() {
        var text  = "";
        $.ajax({
            url: "<?php echo base_url() ?>HomeController/getProducts",
            type: "POST",
            data: {
                "filter": $('input[name=category_name]:checked').val(),
            },
            success: function(result) {
                $.each(JSON.parse(result), function(i, items) {
                    text = text + '<div class="col-md-3 text-center" style="margin-top: 10px">';
                    text = text + '<a class="to-details">';
                    text = text + '<div class="zoom image-sizes">';
                    text = text + '<img alt="No Search" src="' + items.image + '" />';
                    text = text + '</div>';
                    text = text + '<div class="details-product">';
                    text = text + '<p><b>' + items.name + '</b></p>';
                    text = text + '<p class="price">$ ' + items.price + '</p>';
                    text = text + '</div>';
                    text = text + '</a>';
                    text = text + '<button class="btn btn-add-to-cart"  data-toggle="modal" data-target="#successModal" val = "' + items.id + '">Add To Cart</button>';
                    text = text + '</div>';
                });
                $('#list-prod').html(text);
                text = '';
            }
        });
    }


    $(document).on('click', '.btn-add-to-cart', function(){
        var item_id = $(this).attr('val');
        $.ajax({
            url: "<?php echo base_url() ?>HomeController/addToCart",
            type: "POST",
            data: {
                "item": item_id,
            },
            success: function(result) {
                // $('#successModal').modal('show');
            }
        });
    })
</script>