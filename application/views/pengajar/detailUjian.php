<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <h3 class="title-3 m-b-30">Ujian</h3>
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <div class="card card-body">
                            <a href="#modalUjian" type="button" data-toggle="modal"
                                class="btn btn-primary pull-right">Edit Ujian</a>
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <?php foreach ($ujian as $k) {
    ?>
                                        <tr>
                                            <td>Nama Ujian</td>
                                            <td><?=$k->judul?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas dan Mata Pelajaran</td>
                                            <td><?=$k->kelas?> || <?=$k->mapel?></td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td><?=$k->waktu?></td>
                                        </tr>
                                        <tr>
                                            <td>Batas Waktu</td>
                                            <td><?=$k->tgl_expired?></td>
                                        </tr>
                                        <tr>
                                            <td>Status Verifikasi</td>
                                            <td><?=($k->is_verify) == 0 ? "Belum diverifikasi" : "Sudah diverifikasi"?>
                                            </td>
                                        </tr>
                                        <?php }?>

                                        <tr>
                                            <td>
                                                <?php if ($k->is_verify == 0): ?>
                                                <a class="btn btn-success text-white"
                                                    href="<?=base_url('pengajar/verifyUjian/1/' . $this->uri->segment(3))?>">Verifikasi</a>
                                                <?php else: ?>
                                                <a class="btn btn-danger text-white"
                                                    href="<?=base_url('pengajar/verifyUjian/0/' . $this->uri->segment(3))?>">Batalkan
                                                    Verifikasi</a>
                                                <?php endif?>
                                            </td>
                                            <td></td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

            </div>

            <div class="map-data m-b-40">
                <div>
                    <h3 class="title-3">Bank Soal</h3>

                </div>


                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <div class="table-responsive">

                            <table id="table_id" class="display">
                                <thead>
                                    <tr>
                                        <th>Pilih</th>
                                        <th>Soal</th>
                                        <th>Tipe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1?>
                                    <?php foreach ($bank_soal as $item): ?>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control checkb"
                                                    value="<?=$item->id_banksoal?>" name="banksoal[]">
                                            </div>

                                        </td>
                                        <td>
                                            <?php if ($item->tipe != 3): ?>
                                            <?=$item->pertanyaan?>
                                            <?php else: ?>
                                            <a
                                                href="<?=base_url('assets/images/soal/' . $item->file_soal)?>"><?=$item->file_soal?></a>
                                            <?php endif?>
                                        </td>
                                        <td>
                                            <?php if ($item->tipe == 1): ?>
                                            PG
                                            <?php elseif ($item->tipe == 2): ?>
                                            Essay
                                            <?php else: ?>
                                            File Soal
                                            <?php endif?>
                                        </td>

                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>

                            <form action="<?=base_url('pengajar/addfrombanksoal')?>" method="POST" id="form_salinsoal">
                                <input type="hidden" name="soaldipilih" id="soaldipilih">
                                <input type="hidden" name="idujian" id="idujian" value="<?=$this->uri->segment(3)?>">
                                <button class="btn btn-success float-right" type="submit" style="display: none;"
                                    id="btnsalin">Salin Soal</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


            <div class="map-data m-b-40">
                <div>
                    <h3 class="title-3">Soal</h3>
                    <button class="btn btn-info m-b-30" data-toggle="modal" data-target="#modalUploadSoal">Upload
                        Soal</button>
                </div>

                <div class="btn-group btn-block" role="group" aria-label="Basic example">
                    <a href="#modalPG" type="button" data-toggle="modal" class="btn btn-primary ">Buat Soal PG</a>
                    <a href="#modalEssay" type="button" data-toggle="modal" class="btn btn-primary ">Buat Soal Essay</a>
                </div>
                <!--<button class="btn btn-primary btn-block" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Atur Soal
                    </button><br>
                <div class="collapse" id="collapseExample">
                <form action="<?=base_url()?>pengajar/tambahSoalUjian/<?=$id_soalnya?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="col-sm-10">
                              <?php $no = 1;foreach ($soal as $key) {?>
                                <div class="form-check form-check-inline">
                                          <input class="form-check-input" type="checkbox" id="inlineCheckbox<?=$no?>" value="<?=$key->id_soal?>" name="pertanyaan[]">
                                          <label class="form-check-label" for="inlineCheckbox<?=$no?>"><?=$key->pertanyaan?></label>
                                </div><hr>
                                <?php $no++;}?>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>-->
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <div class="table-responsive">
                            <h5>Daftar Soal Ujian</h5>
                            <table class="table">
                                <?php foreach ($soal_ujian as $key): ?>
                                <tr>
                                    <?php
if ($key->gambar != null) {
    ?>
                                    <td><a target="_blank"
                                            href="<?=base_url('assets/images/soal')?>/<?=$key->gambar?>"><img
                                                style="width:20%;"
                                                src="<?=base_url('assets/images/soal')?>/<?=$key->gambar?>" /></a></td>
                                    <?php } else {?>
                                    <td> - tidak ada gambar - </td>
                                    <?php }?>
                                    <td>
                                        <?php if ($key->tipe != 3): ?>
                                        <?=$key->pertanyaan?>
                                        <?php else: ?>
                                        <a href="<?=base_url('assets/images/soal/' . $key->file_soal)?>"
                                            target="_blank"><?=$key->file_soal?></a>
                                        <?php endif?>
                                    </td>
                                    <td><?php if ($key->tipe == 1) {
    echo "Pilihan Ganda";
} elseif ($key->tipe == 2) {
    echo "Essay";
} elseif ($key->tipe == 3) {
    echo "File";
}?></td>
                                    <td><?=$key->pg_a?><br><?=$key->pg_b?><br><?=$key->pg_c?></td>
                                    <td><?=$key->jawaban_pg?></td>
                                    <td><a class="btn btn-danger btn-sm mt-2"
                                            href="<?=base_url('pengajar/hapusSoalUjian/')?><?=$key->id_ujian_soal?>/<?=$key->id_ujian?>">Hapus</a>

                                        <?php if ($key->tipe == 1): ?>

                                        <button type="button" data-toggle="modal" data-target="#modalEdit1"
                                            class="btn btn-info btn-sm mt-2" id="btnEditPG"
                                            data-idsoal="<?=$key->id_banksoal?>" data-gambar="<?=$key->gambar?>"
                                            data-pertanyaan="<?=$key->pertanyaan?>" data-pilihana="<?=$key->pg_a?>"
                                            data-pilihanb="<?=$key->pg_b?>" data-pilihanc="<?=$key->pg_c?>"
                                            data-jawaban="<?=$key->jawaban_pg?>">Edit</button>
                                        <?php elseif ($key->tipe == 2): ?>
                                        <button type="button" data-toggle="modal" data-target="#modalEdit2"
                                            class="btn btn-info btn-sm mt-2" id="btnEditEssay"
                                            data-idsoal="<?=$key->id_banksoal?>"
                                            data-pertanyaan="<?=$key->pertanyaan?>">Edit</button>
                                        <?php else: ?>
                                        <button type="button" data-toggle="modal" data-target="#modalEdit3"
                                            class="btn btn-info btn-sm mt-2" id="btnEditFile"
                                            data-idsoal="<?=$key->id_banksoal?>"
                                            data-filelama="<?=$key->file_soal?>">Edit</button>
                                        <?php endif?>
                                    </td>
                                </tr>
                                <?php endforeach?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>

</div>
<script type=" text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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

<div class="modal fade" id="modalUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Ujian
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php foreach ($ujian as $k) {?>
                <form action="<?=base_url()?>pengajar/updateUjian/<?=$k->id?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Judul <span class="text-error">*</span></label>
                        <input type="text" name="nama" class="form-control" value="<?=$k->judul?>" required>
                    </div>
                    <div class="form-group">
                        <label>Waktu <span class="text-error">*menit</span></label>
                        <input type="number" name="waktu" class="form-control" value="<?=$k->waktu?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mata Pelajaran <span class="text-error"></span></label>
                        <select class="form-control" required name="mapelKelas">
                            <?php foreach ($mapel as $key) {?>
                            <option value="<?=$key->mapel_kelas_id;?>"
                                <?php if ($key->mapel_kelas_id == $k->mapel_kelas_id): ?> selected <?php endif?>>
                                <?=$key->kelas?> - <?=$key->mapel?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Berakhir <span class="text-error">*</span></label>
                        <input type="date" name="tgl" class="form-control" value="<?=$k->tgl_expired?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Berakhir <span class="text-error">*</span></label>
                        <input type="time" name="jam" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                <?php }?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalUploadSoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/simpanSoal/3/<?=$id_ujian?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>File <span class="text-error">(word)</span></label>
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEssay" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Soal
                    Essay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/simpanSoal/2/<?=$id_ujian?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Pertanyaan <span class="text-error">*</span></label>
                        <textarea class="form-control" name="pertanyaan" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalPG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Ujian
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/simpanSoal/1/<?=$id_ujian?>" method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Gambar <span class="text-error">(opsional)</span></label>
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label>Pertanyaan <span class="text-error">*</span></label>
                        <textarea class="form-control" name="pertanyaan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pilihan A <span class="text-error">*</span></label>
                        <input type="text" name="pg_a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan B <span class="text-error">*</span></label>
                        <input type="text" name="pg_b" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan C <span class="text-error">*</span></label>
                        <input type="text" name="pg_c" class="form-control" required>

                    </div>
                    <div class="form-group">
                        <label>Jawaban Pilihan <span class="text-error"></span></label>
                        <select class="form-control" required name="jawaban_pg">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Soal
                    Essay</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/editSoal/2" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_banksoal" id="id_banksoal">
                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?=$this->uri->segment(3)?>">
                    <div class="form-group">
                        <label>Pertanyaan <span class="text-error">*</span></label>
                        <textarea class="form-control" name="pertanyaan" required id="pertanyaan"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalEdit1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Soal PG
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/editSoal/1" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="file_lama" id="file_lama">
                    <input type="hidden" name="id_banksoal" id="id_banksoal">
                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?=$this->uri->segment(3)?>">

                    <div class="form-group">
                        <label>Gambar <span class="text-error">(opsional)</span></label>
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>

                    <div class="form-group">
                        <label>Pertanyaan <span class="text-error">*</span></label>
                        <textarea class="form-control" name="pertanyaan" id="pertanyaan" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Pilihan A <span class="text-error">*</span></label>
                        <input type="text" name="pg_a" id="pg_a" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan B <span class="text-error">*</span></label>
                        <input type="text" name="pg_b" id="pg_b" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan C <span class="text-error">*</span></label>
                        <input type="text" name="pg_c" id="pg_c" class="form-control" required>

                    </div>
                    <div class="form-group">
                        <label>Jawaban Pilihan <span class="text-error"></span></label>
                        <select class="form-control" required name="jawaban_pg" id="jawaban_pg">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Soal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url()?>pengajar/editSoal/3" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_banksoal" id="id_banksoal">
                    <input type="hidden" name="id_ujian" id="id_ujian" value="<?=$this->uri->segment(3)?>">
                    <input type="hidden" name="file_lama" id="file_lama">

                    <div class="form-group">
                        <label>File <span class="text-error">(word)</span></label>
                        <input type="file" id="file-input" name="file-input" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(document).on("click", "#btnEditPG", function() {
    var idSoal = $(this).data('idsoal');
    var gambar = $(this).data('gambar');
    var pertanyaan = $(this).data('pertanyaan');
    var pilihana = $(this).data('pilihana');
    var pilihanb = $(this).data('pilihanb');
    var pilihanc = $(this).data('pilihanc');
    var jawaban = $(this).data('jawaban');
    // alert(pilihana.substring(2, 3));

    $(".modal-body #file_lama").val(gambar);
    $(".modal-body #id_banksoal").val(idSoal);
    $(".modal-body #pertanyaan").val(pertanyaan);
    $(".modal-body #pg_a").val(pilihana.substring(2, 3));
    $(".modal-body #pg_b").val(pilihanb.substring(2, 3));
    $(".modal-body #pg_c").val(pilihanc.substring(2, 3));
    $(".modal-body #jawaban_pg").val(jawaban);
    // alert(gambar)
});
</script>

<script>
$(document).on("click", "#btnEditEssay", function() {
    var idSoal = $(this).data('idsoal');
    // var gambar = $(this).data('gambar');
    var pertanyaan = $(this).data('pertanyaan');
    $(".modal-body #id_banksoal").val(idSoal);
    $(".modal-body #pertanyaan").val(pertanyaan);
    // al
    // ert("hai")
});
</script>

<script>
$(document).on("click", "#btnEditFile", function() {
    var idSoal = $(this).data('idsoal');
    var filelama = $(this).data('filelama');
    // var gambar = $(this).data('gambar');
    // var pertanyaan = $(this).data('pertanyaan');
    $(".modal-body #id_banksoal").val(idSoal);
    $(".modal-body #file_lama").val(filelama);
    // alert("hai")
});
</script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>

<script>
// it is checked

$(function() {
    $('.checkb').click(function() {
        var val = [];

        $(':checkbox:checked').each(function(i) {
            $("#btnsalin").css("display", "block");
            val[i] = $(this).val();
        });

        if (val === undefined || val.length == 0) {
            // array empty or does not exist
            $("#btnsalin").css("display", "none");
        }

        $("#form_salinsoal #soaldipilih").val(val.join(','));
        // console.log(val.join(','))
        // alert(val)
        // console.log(val)

    });
});

// $(document).on("click", ".checkb", function() {
//     var id = $('.checkb').val();
//     alert(id);
// });
</script>