            <!-- MAIN CONTENT-->
            <div class="main-content">
            	<div class="section__content section__content--p30">
            		<div class="container-fluid">
            			<nav aria-label="breadcrumb">
            				<ol class="breadcrumb">
            					<li class="breadcrumb-item"><b>Dashboard</b></li>
            					<li class="breadcrumb-item" aria-current="page">Guru</li>
            				</ol>
            			</nav>
            			<div class="row">
            				<div class="col">
            					<!-- Pengumuman Guru-->
            					<div class="top-campaign" style="background-color: #71bf5c!important;">
            						<h3 class="title-3 m-b-10 text-white">Pengumuman</h3>
            						<div class="table-responsive">
            							<table class="table table-top-campaign">
            								<tbody>
            									<?php foreach ($pengumumanguru as $i) {?>
            									<tr>
            										<td><a
            												href="<?= base_url('pengajar/TampilPengumuman/').$i->id ?>" class="text-white"><?= $i->judul?></a>
            										</td>
            										<td><span class="text-white"><?= $i->tgl_tampil?></span></td>
            									</tr>
            									<?php }?>
            								</tbody>
            							</table>
            						</div>
            					</div>
            					<!--  Pengumuman Guru-->
            				</div>
            			</div>
            			<div class="row">
            				<div class="col">
            					<div class="card" style="background-color: #3d692f!important;">
            						<div class="card-body">
            							<div class="row">
                                            <div class="col">
                                                <i class="fa fa-globe text-white" aria-hidden="true" style="font-size: 120px;"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="text-center text-white">Jadwal Pelajaran</h3>
                                                <h3 class="text-center mt-4 text-white"><?= count($pelajaran) ?></h3>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('pengajar/jadwalMengajar/1')?>" class="card-link mt-2 ml-3 text-white"><i class="fas fa-chevron-circle-right"></i> Views</a>
            						</div>
            					</div>
            				</div>
                            <div class="col">
            					<div class="card" style="background-color: #c28427!important;">
            						<div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-sticky-note text-white" aria-hidden="true" style="font-size: 120px;"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="text-center text-white">Jumlah Tugas</h3>
                                                <h3 class="text-center mt-4 text-white"><?= count($tugas) ?></h3>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('pengajar/tugas')?>" class="card-link mt-2 ml-3 text-white"><i class="fas fa-chevron-circle-right"></i> Views</a>
                                        </div>
            						</div>
            					</div>
            				</div>
            			</div>
                        <div class="row mx-1">
            				<div class="col">
            					<div class="card" style="background-color: #223687!important;">
            						<div class="card-body">
            							<div class="row">
                                            <div class="col">
                                                <i class="fa fa-sticky-note text-white" aria-hidden="true" style="font-size: 120px;"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="text-center text-white">Jumlah Materi</h3>
                                                <h3 class="text-center mt-4 text-white"><?= count($materi) ?></h3>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('pengajar/materi')?>" class="card-link mt-2 ml-3 text-white"><i class="fas fa-chevron-circle-right"></i> Views</a>
            						</div>
            					</div>
            				</div>
                            <div class="col">
            					<div class="card" style="background-color: #613915!important;">
            						<div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <i class="fas fa-pencil-alt text-white" aria-hidden="true" style="font-size: 120px;"></i>
                                            </div>
                                            <div class="col">
                                                <h3 class="text-center text-white">Jumlah Ujian</h3>
                                                <h3 class="text-center text-white mt-4"><?= count($ujian) ?></h3>
                                            </div>
                                        </div>
                                        <a href="<?= base_url('pengajar/ujian')?>" class="card-link mt-2 ml-3 text-white"><i class="fas fa-chevron-circle-right"></i> Views</a>
                                        </div>
            						</div>
            					</div>
            				</div>
            			</div>
            		</div>
            	</div>
            	<!-- END MAIN CONTENT-->
            	<!-- END PAGE CONTAINER-->
            </div>
