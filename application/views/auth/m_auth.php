<div class="col-md-6">
					<h2>Masuk Akun</h2>
					<?php echo $this->session->flashdata('yeay'); ?>
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
						<form action="<?php echo base_url('auth/login'); ?>" method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" />
								<a href=""><small>Lupa password?</small></a>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-info btn-block">Masuk</button>
							</div>
						</form>
					</div>
				</div>
				<br/>
				<br/>
				<br/>
				<div class="col-md-6">
				<h2>Buat Akun</h2>
		
					<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
						<form action="<?php echo base_url('auth/create'); ?>" method="POST">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" required />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" required />
							</div>
							<div class="form-group">
								<label>Nama Lengkap</label>
								<input type="text" class="form-control" name="nama_lengkap" required />
							</div>
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control" name="alamat" row="10" required></textarea>
							</div>
							<div class="form-group">
								<label>Provinsi</label>
								<select name="id_provinsi" class="form-control" required>
									<option value="">-- Pilih Salah Satu--</option>
									<?php
									$d = $this->db->query("SELECT * FROM provinsi")->result();
									foreach($d as $w):
									?>
									<option value="<?php echo $w->id_provinsi; ?>"><?php echo $w->nama_provinsi; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group">
								<label>Nomor HP</label>
								<input type="number" class="form-control" name="no_hp" required />
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Buat akun sekarang</button>
							</div>
						</form>
					</div>
				</div>