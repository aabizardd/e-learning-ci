            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-8">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Mata Pelajaran</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                        <a href= "<?= base_url('admin/TambahMataPelajaran')?>"class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add Mata Pelajaran</a>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Judul</th>
                                                <th>Aktif</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($mapel as $i) { ?>
                                                <tr class="tr-shadow">
                                                    <td><?= $i->id ?></td>
                                                    <td>
                                                        <?= $i->nama ?>
                                                    </td>
                                                    <td class="desc"><?php
                                                        if($i->aktif == 1){?>
                                                            <i class="fa fa-check"></i>
                                                        <?php }else{ ?>
                                                            <i class="fa fa-minus"></i>

                                                        <?php } ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a href="<?= base_url('Admin/EditMataPelajaran/').$i->id?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </a>
                                                            <a href="<?= base_url('Admin/hapusMataPelajaran/').$i->id?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>