            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-8">
                         <?php echo $this->session->flashdata('alert');?>

                        <form id="form-submit" action="<?= base_url('pengajar/prosesUploadTugas')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Tambah tugas</strong>
                                </div>
                                <div class="card-body card-block">
                                    <?php if (isset($error)) {?>
                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
											<span class="badge badge-pill badge-danger">Error</span>
											<?= $error?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
                                    <?php }?>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">judul</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="judul" placeholder="Judul" class="form-control">
                                            <small class="form-text text-muted">Tulislah Judul pengumuman yang sesuai dengan Tugas</small>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">kelas</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" readonly value="<?= $kelas[0]->nama?>" name="kelas" placeholder="Judul" class="form-control">
                                            <input type="hidden" id="text-input" value="<?= $idkelas?>" name="idkelas" placeholder="Judul" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">mata Pelajaran</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" readonly value="<?= $mapel[0]->nama?>" name="mapel" placeholder="Judul" class="form-control">
                                            <input type="hidden" id="text-input" value="<?= $idmapel?>" name="idmapel" placeholder="Judul" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">tanggal</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tanggal" placeholder="Tanggal Pengumuman" readonly value="<?= date('Y-m-d H:i:s')?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">deadline</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="datetime-local" id="text-input" name="deadline" placeholder="Tanggal Pengumuman" class="form-control input-deadline">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Isi Content</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="isi" id="isi" rows="9" placeholder="Isi Pesan..." class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Upload Tugas</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="text-input" name="materi" class="form-control">
                                        </div>
                                    </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </div>
                            </div>        
                        </form>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
            $('#form-submit').on('submit', function(e) {
                e.preventDefault();
                var end = $('.input-deadline').val();

                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();
                today = yyyy + '-' + mm + '-' + dd;
                if (end<today) {
                    alert('Tidak dapat input deadline, karena tanggal kosong atau sudah berlalu');
                } else {
                    $(this).submit();
                }
                //alert(start+' '+end+' - '+today);
            });
        </script>