<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Tugas Kelas</h3>
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <?php foreach ($data as $key) {
    if ($key->id == $kelas[0]->id) {?>
                        <div class="card card-body">
                            <h5><?=$key->nama?></h5>
                            <hr>
                            <div class="table-responsive">
                                <table id="table_id" class="display">
                                    <thead>
                                        <tr>
                                            <th>Mata Pelajaran</th>
                                            <th>Tugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($mapel as $k) {
        if ($key->id == $k->kelas_id) {?>
                                        <tr>
                                            <td width="60%"><?=$k->nama?></td>
                                            <?php $i = 0;
            foreach ($count_tugas as $tugas) {?>
                                            <?php if ($tugas->id_mapel == $k->mapel_id) {?>
                                            <?php $i = $i + 1?>
                                            <?php }?>
                                            <?php }?>
                                            <td>
                                                <?php if ($i > 0) {?>
                                                <?=$i?> Tugas
                                                <?php } else {?>
                                                Tidak Ada Tugas
                                                <?php }?>
                                            </td>
                                            <td><a href="<?=base_url()?>siswa/listTugas/<?=$k->kelas_id?>/<?=$k->mapel_id?>"
                                                    class="btn btn-success">Lihat Tugas</a></td>
                                        </tr>
                                        <?php }}?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <?php }}?>
                    </div>
                </div>
                <br>

            </div>
            <!-- END MAP DATA-->
        </div>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<!-- <script src="//cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $("#laki").click(function() {
        $("#perempuan").attr("checked", false);
        $("#laki").attr("checked", true);

    });
    $("#perempuan").click(function() {
        $("#laki").attr("checked", false);
        $("#perempuan").attr("checked", true);
    });
});
</script>