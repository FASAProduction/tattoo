<div class="accordion-body collapse show" id="all">
	<div class="card">
                  <div class="boxs mail_listing">
                    <div class="inbox-center table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th class="text-center">
                              Kode Pemesanan
                            </th>
                            <th class="text-center">
                              Tanggal Pemesanan
                            </th>
							<th class="text-center">
                              Total
                            </th>
							<th class="text-center">
                              Status Bayar
                            </th>
							<th class="text-center">
                              Status Kirim
                            </th>
							<th class="text-center">
                              Aksi
                            </th>
                          </tr>
                        </thead>
                        <tbody>
						<?php
						foreach($ordall as $or):
						?>
                          <tr class="unread">
                            <td class="max-texts">
                                <?php echo $or->kode_pemesanan; ?>
                            </td>
							<td class="max-texts">
                                <?php echo format_indo($or->tanggal_pemesanan); ?>
                            </td>
							<td class="max-texts">
                                <?php echo rupiah($or->total); ?>
                            </td>
							<td class="max-texts">
							<?php
							if($or->status_bayar == "Belum Bayar"){
							?>
                                <span class="badge badge-danger badge-shadow"><?php echo $or->status_bayar; ?></span>
							<?php }else{ ?>
                                <span class="badge badge-success badge-shadow"><?php echo $or->status_bayar; ?></span>
							<?php } ?>
                            </td>
							<td class="max-texts">
                                <span class="badge badge-info badge-shadow"><?php echo $or->status_kirim; ?></span>
                            </td>
							<td class="max-texts">
                                <a href="" class="btn btn-primary">Detail</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
</div>