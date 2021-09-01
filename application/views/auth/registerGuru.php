<div class="page-wrapper">
    <div class="page-content">
        <div class="container">
                <!-- <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <p>Register Guru</p>

                        </div>
                        <div class="login-form">
                            <form action="<?= base_url('user/prosesRegisterGuru')?>" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>NAMA</label>
                                    <input class="au-input au-input--full" type="text" name="nama" placeholder="nama">
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input class="au-input au-input--full" type="text" name="nip" placeholder="NIP">
                                </div>
                                <div class="form-group">
                                    <label>tempat lahir</label>
                                    <input class="au-input au-input--full" type="text" name="tempatlahir" placeholder="tempat lahir">
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label class=" form-control-label">Jenis Kelamin</label>
                                    </div>
                                    <div class="col col-md-6">
                                        <div class="form-check">
                                            <label for="inline-radio1" class="form-check-inline form-check">
                                                <input type="radio" id="inline-radio1" name="jk" value="Laki-laki" class="form-check-input">Laki-Laki
                                            </label>
                                            <label for="inline-radio2" class="form-check-label ">
                                                <input type="radio" id="inline-radio2" name="jk" value="Perempuan" class="form-check-input">Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>alamat</label>
                                    <input class="au-input au-input--full" type="text" name="alamat" placeholder="alamat">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                            </form>
                            <div class="register-link">
                                <p>Register Sebagai?
                                    <a href="<?= base_url('user/registerGuru')?>">Guru</a> atau
                                    <a href="<?= base_url('user/registerSiswa')?>">siswa</a>
                                </p>
                            </div>
                            <div class="register-link">
                                <p>Already have account?
                                    <a href="<?= base_url('user')?>">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="login-wrap">
                    <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="login-logo">
                                    <p>Pendaftaran Guru</p>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <form action="<?= base_url('user/prosesRegisterGuru')?>" method="post">
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
                                                <label>Nomor Identitas Pegawai</label>
                                                <input class="au-input au-input--full" type="text" name="nip" placeholder="0001523145">
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
                                                            <input type="radio" id="inline-radio1" name="jk" value="Laki-laki" class="form-check-input">Laki-Laki
                                                        </label>
                                                        <label for="inline-radio2" class="form-check-label form-check">
                                                            <input type="radio" id="inline-radio2" name="jk" value="Perempuan" class="form-check-input">Perempuan
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input class="au-input au-input--full" type="text" name="alamat" placeholder="Jalan Cikoneng No 5 RT002/015, Kecamatan bojongsoang, Kelurahan Cikoneng, Kota Bandung" required>
                                            </div>
                
                                            <button class="au-btn au-btn--block btn-primary m-b-20" type="submit">Daftar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                Sudah punya akun ?  <a href="<?= base_url('user')?>">Masuk</a> atau Mendaftar sebagai <a href="<?= base_url('user/registerSiswa')?>">Siswa</a>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>