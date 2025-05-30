<div class="sidebar sidebar-style-2">
	<div class="sidebar-wrapper scrollbar scrollbar-inner">
		<div class="sidebar-content">
			<div class="user">
				<div class="avatar-sm float-left mr-2">
					<img src="../assets/img/admin.png" alt="..." class="avatar-img rounded-circle">
				</div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span><?php echo Auth::user()->name ?><span class="user-level"><?php echo Auth::user()->role ?></span>
					</a>
				</div>
			</div>
			<ul class="nav nav-primary">
				<li class="nav-section">
					<h4 class="text-section">Dashboard</h4>
				</li>
				<li class="nav-item active">
					<a href="/dashboard" class="collapsed" aria-expanded="false">
						<i class="fas fa-home"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Master</h4>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#base">
						<i class="fas fa-database"></i>
						<p>Stock Barang</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="base">
						<ul class="nav nav-collapse">
							<li>
								<a href="/databarang">
									<span class="sub-item">Data Barang</span>
								</a>
							</li>
							<li>
								<a href="/kategori">
									<span class="sub-item">Kategori Barang</span>
								</a>
							</li>
							<li>
								<a href="/jenis">
									<span class="sub-item">Jenis Barang</span>
								</a>
							</li>
							<li>
								<a href="/satuan">
									<span class="sub-item">Satuan</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Transaksi</h4>
				</li>
				<li class="nav-item">
					<a href="/barangmasuk" class="collapsed" aria-expanded="false">
						<i class="fas fa-sign-in-alt"></i>
						<p>Barang Masuk</p>
					</a>
				</li>
				 <li class="nav-item">
					<a href="/barangkeluar" class="collapsed" aria-expanded="false">
						<i class="fas fa-sign-out-alt"></i>
						<p>Barang Keluar</p>
					</a>
				</li>
				
				<li class="nav-section">
					<span class="sidebar-mini-icon">
						<i class="fa fa-ellipsis-h"></i>
					</span>
					<h4 class="text-section">Laporan</h4>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#bose">
						<i class="fas fa-file-alt"></i>
						<p>Data Laporan Barang</p>
						<span class="caret"></span>
					</a>
					<div class="collapse" id="bose">
						<ul class="nav nav-collapse">
							<li>
								<a href="/laporan-masuk">
									<span class="sub-item">Laporan Barang Masuk</span>
								</a>
							</li>
							<li>
								<a href="/laporan-keluar">
									<span class="sub-item">Laporan Barang Keluar</span>
								</a>
							</li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#">
						<i class="fas fa-file-alt"></i>
						<p>Laporan Retur Barang</p>
					</a>
				</li>
				<li class="nav-item">
					<a data-toggle="collapse" href="#">
						<i class="fas fa-file-alt"></i>
						<p>Laporan Shift</p>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>