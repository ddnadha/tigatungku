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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="<?= base_url('/assets/css/front.css') ?>" />
</head>
<body>
<div class="container mb-5 mt-4">
    <section class="header-checkout">
        <div class="container">
            <div class="row d-flex">
                <div class="col-6">
                    <h3 class="welcome">Welcome, <?= session()->get('userdata')->name ?></h3>
                    <p class="desc-welcome">Discover whatever you need and easily</p>
                </div>
            </div>
        </div>
    </section>
    <div class="row">
        <!-- start Main Content -->
        <div class="col-8">
            <section class="list-product mt-3">
                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h4>Lengkapi Detail Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mt-4">
                                <form action="<?= base_url('/order/create') ?>" method="post">
                                    <div class="form-group mb-3">
                                        <label for="">Nama Pemesan</label>
                                        <input type="text" name="name" class="form-control" value="<?= session()->get('userdata')->name  ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Alamat Pengiriman</label>
                                        <textarea name="address" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Tanggal Pengiriman</label>
                                        <input type="text" name="date" class="form-control" value="<?php echo date('d M Y') ?>" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Opsi Pengiriman</label>
                                        <input type="text" name="shipment" class="form-control">
                                    </div>
                                    <button class="btn btn-primary" type="submit">Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- End Main Content -->

        <!-- Start Sidebar -->
        <div class="col-4">
            <section class="current-order mt-3">
                <div class="container">
                    <div class="card shadow">
                        <div class="card-body">
                            <div class="card-title"><h4>Rincian Order</h4></div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
    $(function() {
        $('input[name="date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: <?php echo date('Y') ?>,
            maxYear: parseInt(moment().format('YYYY'),10),
            locale: {
                format: 'DD MMM YYYY'
            }
        }, function(start, end, label) {

        });
    });
</script>
</body>
</html>
