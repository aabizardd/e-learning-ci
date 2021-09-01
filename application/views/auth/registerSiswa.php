<div class="page-wrapper">
        <div class="page-content">
            <div class="container">
                <div class="login-wrap">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="login-logo">
                                <p>Pendaftaran Siswa</p>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="<?= base_url('user/prosesRegisterSiswa')?>" method="post">
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="john@example.com" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="********" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="au-input au-input--full" type="text" name="nama" placeholder="John Doe" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Induk Siswa</label>
                                            <input class="au-input au-input--full" type="text" name="nis" placeholder="201400723" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input class="au-input au-input--full" type="text" name="tempatlahir" placeholder="Bandung" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label">Jenis Kelamin</label>
                                            </div>
                                            <div class="col col-md-6">
                                                <div class="form-check">
                                                    <label for="inline-radio1" class="form-check-inline form-check">
                                                        <input type="radio" id="inline-radio1" name="jk" value="Laki-laki" class="form-check-input" required>Laki-Laki
                                                    </label>
                                                    <label for="inline-radio2" class="form-check-label form-check">
                                                        <input type="radio" id="inline-radio2" name="jk" value="Perempuan" class="form-check-input" required>Perempuan
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="au-input au-input--full" type="text" name="alamat" placeholder="Jalan Cempaka No 5 RT002/015, Kecamatan Coblong, Kelurahan Coblong, Kota Bandung" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun Masuk</label>
                                            <input class="au-input au-input--full" type="text" name="tahunmasuk" placeholder="2020" required>
                                        </div>
                                        <button class="au-btn au-btn--block btn-primary m-b-20" type="submit">Daftar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Sudah punya akun ?  <a href="<?= base_url('user')?>">Masuk</a> atau Mendaftar sebagai <a href="<?= base_url('user/registerGuru')?>">Guru</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

    </div>
