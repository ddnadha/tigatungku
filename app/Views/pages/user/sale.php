<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,100&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('/assets/css/front.css') ?>" />
</head>
<body>
<div class="container mb-5 mt-4">
    <div class="row">
        <!-- start Main Content -->
        <div class="col-8">
            <!-- Start Header Checkout -->
            <section class="header-checkout">
                <div class="container">
                    <div class="row d-flex justify-content-center align-items-center">
                        <div class="col-6">
                            <h3 class="welcome">Welcome, <?= session()->get('userdata')->name ?></h3>
                            <p class="desc-welcome">Discover whatever you need and easily</p>
                        </div>
                        <div class="col-6">
                            <div class="form">
                                <input id="input-search" type="text" class="form-control form-input shadow" placeholder="Search product..." />
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Header Checkout -->

            <!-- Start List Product -->
            <section class="list-product mt-5">
                <div class="container">
                    <h4>List Product</h4>
                    <div class="row mt-4">
                        <?php foreach( $menu as $m) : ?>
                            <div class="col-4 filterable" data-name="<?= $m->name ?>">
                                <div class="card shadow">
                                    <img style="height: 157.55px; object-fit: cover" src="<?= base_url('uploads/img/menu/'.$m->img) ?>" class="card-img-top img-product" alt="..." />
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $m->name ?></h5>
                                        <p class="card-text"><?= $m->description ?></p>
                                        <p class="price-product"><?= "Rp " . number_format($m->price,0,',','.'); ?> <span class="quantity-product">/ 1 <?= $m->unit ?></span></p>
                                        <?php if(isset($m->qty) and $m->qty != null) : ?>
                                            <div class="quantity text-center">
                                                <a href="<?= base_url('/cart/add/'.$m->id) ?>">
                                                    <span class="btn btn-sm btn-secondary">+</span></a>
                                                <input readonly type="text" value="<?= $m->qty ?>" style="width: 50px; text-align: center" />
                                                <a href="<?= base_url('/cart/reduce/'.$m->id) ?>">
                                                    <span class="btn btn-sm btn-secondary">-</span>
                                                </a>
                                            </div>
                                        <?php else : ?>
                                            <a href="<?= base_url('/cart/add/'.$m->id) ?>" class="btn btn-primary mt-2 w-100"><i class="fas fa-cart-plus"></i> Add to Cart</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </section>
            <!-- End List Product -->
        </div>
        <!-- End Main Content -->

        <!-- Start Sidebar -->
        <div class="col-4">
            <section class="current-order">
                <div class="container">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-title"><h4>Current Order</h4></div>
                            <?php $total = 0 ?>
                            <?php foreach($menu as $m) : ?>
                                <?php if(isset($m->qty) and $m->qty != null) : ?>
                                    <div class="row mt-4">
                                        <div class="col-5">
                                            <img style="width: 111px; height: 74px; object-fit: cover" src="<?= base_url('/uploads/img/menu/'.$m->img) ?>" class="card-img-top img-current-product" alt="..." />
                                        </div>
                                        <div class="col-7">
                                            <p class="card-title title-current-product"><?= $m->name ?></p>
                                            <p class="price-current-product"> <?= "Rp " . number_format($m->qty*$m->price,0,',','.'); ?> <span class="quantity-current-product">(<?= $m->qty.' '.$m->unit ?>)</span></p>
                                        </div>
                                    </div>
                                    <?php $total += $m->qty * $m->price ?>
                                <?php endif ?>
                            <?php endforeach ?>
                            <div class="row mt-5">
                                <div class="col-6"><h6>Total Pesanan</h6></div>
                                <div class="col-6 justify-content-end">
                                    <p style="text-align: right"><?= "Rp " . number_format($total,0,',','.'); ?></p>
                                </div>
                            </div>
                            <a href="<?= base_url('/salesconfirm') ?>" class="btn btn-primary mt-1" style="width: 100%; font-size: 15px; padding: 10px">Continue to payment</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Sidebar -->
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
<script>
    // $(document).on('ready', function (){
        $('#input-search').on('keyup', function (){
            console.log($(this).val())
            let q = $(this).val().toLowerCase()
            $('.filterable').each(function (){
                let s = $(this).attr('data-name').toLowerCase()
                if (!s.includes(q)){
                    console.log('ada')
                    $(this).css('display', 'none')
                }else{
                    $(this).css('display', 'block')
                }

            })
        })
    // })
</script>
</body>
</html>
