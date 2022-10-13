<!-- new -->
<div class="newproducts-w3agile">
    <div class="container">
        <h3>Keranjang Saya</h3>
        <br />
        <br />
        <div class="row">
            <div class="col-md-8">
                <div class="card bg">
                    <div class="card-body">
                        <h4>Detail Pembelian</h4>
                        <br />
                        <b>
                            <div class="row">
                                <div class="col-md-3">
                                    Nama Produk
                                </div>
                                <div class="col-md-3">
                                    Harga
                                </div>
                                <div class="col-md-3">
                                    Quantity
                                </div>
                                <div class="col-md-3">
                                    Subtotal
                                </div>
                            </div>
                        </b>
                        <hr />
                        <?php
							$total = 0;
							foreach($cr as $c):
							?>
                        <br />
                        <div class="row">
                            <div class="col-md-3">
                                <?php echo $c->nama_produk; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo rupiah($c->harga); ?>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <form action="<?php echo base_url('cart/qty'); ?>" method="POST">
									<input type="hidden" name="id_keranjang" value="<?php echo $c->id_keranjang; ?>" />
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="number" name="qty" value="<?php echo $c->qty; ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <button type="submit" class="btn lengk"><i
                                                        class="fa fa-check"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
									$subtotal = 0;
									$subtotal = $c->harga * $c->qty;
									$total += $subtotal;
									?>
                            <div class="col-md-3">
                                <?php echo rupiah($subtotal); ?>
                            </div>
                        </div>
                        <br />
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg">
                    <div class="card-body">
                        <h4>Total</h4>
                        <br />
                        <b>
                            <font size="6"><?php echo rupiah($total); ?></font>
                        </b>
                        <br />
                        <br />
                        <a href="<?php echo base_url('cart/checkout'); ?>"
                            class="btn lengk btn-block">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //new -->