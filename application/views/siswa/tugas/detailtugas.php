            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="title-5 m-b-35">Tugas </h3>
                                <?php echo $this->session->flashdata('alert');?>
                                <?php foreach ($materi as $i) {?> 
                                <form action="<?= base_url('admin/prosesTambahPengumuman')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Isi Tugas</strong>
                                        </div>
                                        <div class="card-body card-block">
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label"><strong><?= $i->judul ?></strong></label>
                                                    </div>

                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label"><u><?= $i->pengajar_id?></u></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="textarea-input" class=" form-control-label"><b>Start</b>  <?= $i->tgl_buat?></label>
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="textarea-input" class=" form-control-label"><u></u></label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="textarea-input" class=" form-control-label"><b>deadline</b>  <?= $i->durasi?></label>
                                                    </div>
                                                </div>
                                                <?php 
                                                $start_explode = explode(' ', $i->tgl_buat);
                                                $start = $start_explode[0];
                                                $start_time = $start_explode[1];
                                                $end_explode = explode(' ', $i->durasi);
                                                $end = $end_explode[0];
                                                $end_time = $end_explode[1];
                                                
                                                ?>
                                                <input type="hidden" id="start_date" value="<?= $start ?>" />
                                                <input type="hidden" id="end_date" value="<?= $end ?>" />

                                                <input type="hidden" id="start_time" value="<?= $start_time ?>" />
                                                <input type="hidden" id="end_time" value="<?= $end_time ?>" />
                                                
                                                <div class="row form-group">
                                                    <div class="col col-md-7">
                                                    <p><?php echo $i->info?></p> 
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-7">
                                                    <p>Download File tugas <a href="<?= base_url()."Pengajar/download/".$i->file?>"><?php echo $i->file?></a></p> 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>        
                                </form>
                                <?php }?>
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="mx-auto d-block">Nilai</strong>
                                        </div>
                                        <div class="card-body mx-auto d-block">
                                            <h1><?php if (!empty($nilai)) {
                                                echo $nilai[0]->nilai;
                                            }else{
                                                echo 0;
                                            } ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <?php echo $this->session->flashdata('alert');?>
    
                                    <form id="form-submit" action="<?= base_url('siswa/uploadTugas')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong>Upload tugas</strong>
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
                                                <?php if ($this->session->flashdata('success') != null) {?>
                                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                                        <span class="badge badge-pill badge-success">Success</span>
                                                        <?= $this->session->flashdata('success') ?>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                <?php }?>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="text-input" class=" form-control-label">Upload Tugas</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="hidden" id="text-input" value="<?= $kelasid?>" name="idkelas" class="form-control">
                                                        <input type="hidden" id="text-input" value="<?= $tugasid?>" name="idtugas" class="form-control">
                                                        <input type="hidden" id="text-input" value="<?= $mapelid?>" name="idmapel" class="form-control">
                                                        <input type="file" id="text-input" name="materi" class="form-control">
                                                    </div>
                                                </div>
    
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-sm" id="btn-submit">
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
                    </div>
                        <!-- END MAIN CONTENT-->
                        <!-- END PAGE CONTAINER-->
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script>
                $('#form-submit').on('submit', function(e) {
                    e.preventDefault();
                    var start = $('#start_date').val();
                    var end = $('#end_date').val();

                    var start_time = $('#start_time').val();
                    var end_time = $('#end_time').val();

                    var dt = new Date();
                    var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                    var yyyy = today.getFullYear();
                    today = yyyy + '-' + mm + '-' + dd;

                    if (today<start) {
                        alert('Belum saatnya mengumpulkan tugas');
                    } else {
                        if (today>end) {
                            alert('Waktu pengumpulan telah berakhir');
                        } else {
                            if (time<start_time) {
                                alert('Belum saatnya mengumpulkan tugas');
                            } else if (time>end_time) {
                                alert('Waktu pengumpulan telah berakhir');
                            } else {
                                $(this).submit();
                            }
                        }
                    }
                    //alert(start+' '+end+' - '+today);
                });
            </script>