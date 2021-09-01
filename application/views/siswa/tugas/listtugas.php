            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Tugas</h3>
                                <h3 class="title-5 m-b-35"> <?=$mapel[0]->nama?></h3>
                                <div class="table-data__tool">
                                </div>
                                <div class="card card-body">
                                    <div class="table-responsive">
                                        <table id="table_id" class="display">
                                            <thead>
                                                <tr>
                                                    <th>id</th>
                                                    <th>Judul</th>
                                                    <th>Tanggal Upload</th>
                                                    <th>Deadline</th>
                                                    <th>Pengajar</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($materi as $i) {?>
                                                <tr class="tr-shadow">
                                                    <td><?=$i->id?></td>
                                                    <td>
                                                        <?=$i->judul?>
                                                    </td>
                                                    <?php $date1 = date_create("$i->tgl_buat");?>
                                                    <?php $date2 = date_create("$i->durasi");?>
                                                    <td class="desc"><?=date_format($date1, "d-m-Y H:i:s");?></td>
                                                    <td class="desc"><?=date_format($date2, "d-m-Y H:i:s");?></td>
                                                    <td class="desc"><?=$i->nama?></td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <a href="<?=base_url('siswa/detailTugas/') . $i->id . "/" . $mapelid . "/" . $idkelas?>"
                                                                class="item" data-toggle="tooltip" data-placement="top"
                                                                title="Open">
                                                                <i class="zmdi zmdi-open-in-new"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js">
            </script>
            <!-- <script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script> -->
            <script type="text/javascript" charset="utf8"
                src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>

            <script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
            </script>