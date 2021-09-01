

    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <img src="<?= base_url('assets/images/icon/login.svg')?>">
                                </div>
                                <div class="col">
                                    <form action="<?= base_url('user/prosesLogin')?>" method="post">
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                                        </div>
                                        <button class="au-btn au-btn--block btn-primary m-b-20" type="submit">Masuk</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            Belum punya akun ? Daftar sebagai <a href="<?= base_url('user/registerSiswa')?>">Siswa</a> atau <a href="<?= base_url('user/registerGuru')?>">Guru</a>
                            <br>Anda Lupa Password ? </br>
                            Google atau <a href="<?= base_url('user/registerGuru')?>">google</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
