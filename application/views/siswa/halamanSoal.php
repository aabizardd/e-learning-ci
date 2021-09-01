<?php
$data = $this->session->userdata('id_ujian') ? $this->session->userdata('id_ujian') : '';
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <!-- MAP DATA-->
            <div class="map-data m-b-40">
                <div class="mx-auto d-block">
                    <div class="container-fluid">
                        <h3 class="title-3 m-b-30">Ujian</h3>
                        <div class="row">
                            <div class="card col-md-7 mx-3">
                                <div class="card-body">
                                    <div><span>Waktu Anda mengerjakan Ujian </span><span id="hours"></span>:<span
                                            id="minutes"></span>:<span id="seconds"></span></div>
                                    <form id="ujianOnline" nama="ujianOnline" method="post"
                                        action="<?=base_url('siswa/koreksiUjian') . '/' . $this->session->userdata('id') . '/' . $id_ujian?>"
                                        enctype="multipart/form-data">
                                        <?php if ($soal_ujian->tipe == 1) {?>
                                        <div class="form-group mt-4">
                                            <?php
if ($soal_ujian->gambar != null) {
    ?>
                                            <td><a target="_blank"
                                                    href="<?=base_url('assets/images/soal')?>/<?=$soal_ujian->gambar?>"><img
                                                        style="width:70%;"
                                                        src="<?=base_url('assets/images/soal')?>/<?=$soal_ujian->gambar?>" /></a>
                                            </td>
                                            <?php }?><br />
                                            <p><?=$questionCount;?>. <?=$soal_ujian->pertanyaan?></p>
                                        </div>
                                        <div class="form-group row">
                                            <input type="hidden" value="<?=$id_ujian?>" id="id-ujian">
                                            <input type="hidden" id="id-siswa"
                                                value="<?=$this->session->userdata('id')?>">
                                            <input type="hidden" id="id-soal" value="<?=$soal_ujian->id_soal?>">
                                            <div class="col-sm-10">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="A" name="jawaban" value="A"
                                                        onchange="onRadioChange(this)"
                                                        <?=isset($data['id_ujian']['jawaban'][$soal_ujian->id_soal]) && $data['id_ujian']['jawaban'][$soal_ujian->id_soal] == 'A' ? 'checked' : ''?>>
                                                    <label class="form-check-label"
                                                        for="A"><?=$soal_ujian->pg_a?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="B" name="jawaban" value="B"
                                                        onchange="onRadioChange(this)"
                                                        <?=isset($data['id_ujian']['jawaban'][$soal_ujian->id_soal]) && $data['id_ujian']['jawaban'][$soal_ujian->id_soal] == 'B' ? 'checked' : ''?>>
                                                    <label class="form-check-label"
                                                        for="B"><?=$soal_ujian->pg_b?></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="C" name="jawaban" value="C"
                                                        onchange="onRadioChange(this)"
                                                        <?=isset($data['id_ujian']['jawaban'][$soal_ujian->id_soal]) && $data['id_ujian']['jawaban'][$soal_ujian->id_soal] == 'C' ? 'checked' : ''?>>
                                                    <label class="form-check-label"
                                                        for="C"><?=$soal_ujian->pg_c?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } elseif ($soal_ujian->tipe == 2) {?>
                                        <input type="hidden" value="<?=$id_ujian?>" id="id-ujian">
                                        <input type="hidden" id="id-siswa" value="<?=$this->session->userdata('id')?>">
                                        <input type="hidden" id="id-soal" value="<?=$soal_ujian->id_soal?>">
                                        <div class="form-group row mt-2">
                                            <label for="iiii"
                                                class="col col-form-label"><?=$soal_ujian->pertanyaan?></label>
                                        </div>
                                        <div class="col mb-2">
                                            <textarea id="essay-jawaban" name="jawaban" class="form-control"
                                                onchange="onTextChange(this)"><?=isset($data['id_ujian']['jawaban'][$soal_ujian->id_soal]) != null ? $data['id_ujian']['jawaban'][$soal_ujian->id_soal] : ''?></textarea>
                                        </div>
                                        <?php } else {?>
                                        <a href="<?=base_url('assets/images/soal/' . $soal_ujian->file_soal)?>"
                                            target="_blank">Download soal</a>


                                        <div class="form-group mt-3">
                                            <label for="exampleFormControlFile1">Masukkan jawaban (word)</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1"
                                                name="file_word">
                                        </div>


                                        <?php }?>
                                        <div class="form-group row mt-5">
                                            <?php if ($soalTerakhir == $soal_ujian->id_soal): ?>
                                            <button type="submit" class="form-control btn btn-success mb-3">Kirim
                                                Jawaban</button>
                                            <?php endif;?>
                                            <?php if ($soalPertama != $soal_ujian->id_soal): ?>
                                            <div class="col text-left">
                                                <a href="<?=base_url('siswa/masukUjian/' . $id_ujian . '/' . $ujian->waktu . '?q=' . $soal_ujian->id_soal . '&page=prev')?>"
                                                    class="btn btn-secondary">
                                                    < Previous</a>
                                            </div>
                                            <?php endif;?>
                                            <?php if ($soalTerakhir != $soal_ujian->id_soal): ?>
                                            <div class="col text-right">
                                                <a href="<?=base_url('siswa/masukUjian/' . $id_ujian . '/' . $ujian->waktu . '?q=' . $soal_ujian->id_soal . '&page=next')?>"
                                                    class="btn btn-secondary">Next ></a>
                                            </div>
                                            <?php endif;?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card col">
                                <div class="card-body">
                                    <p>Nomor Soal</p> <br>
                                    <?php $no = 1;?>
                                    <?php foreach ($questions as $question): ?>
                                    <a href="<?=base_url('siswa/masukUjian/' . $id_ujian . '/' . $ujian->waktu . '?q=' . $question->id_soal)?>"
                                        class="btn btn-secondary rounded-circle"><?=$no++?></a>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAP DATA-->
        </div>
    </div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
var d = new Date(<?=json_encode($waktu)?>);
var w = new Date();
var dd = d - w;
console.log(dd);
setTimeout(function() {
    SubmitFunction()
}, dd);

function SubmitFunction() {
    alert("Waktu Anda Habis");
    //submitted.innerHTML="Time is up!";
    document.getElementById('ujianOnline').submit();
}

function Countdown() {
    setInterval(function() {

        var jam = document.getElementById("hours");
        var menit = document.getElementById("minutes");
        var detik = document.getElementById("seconds");

        var deadline = d; //new Date(d);
        var waktu = new Date();
        var distance = deadline - waktu;
        //console.log(distance);
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // var minutes = parseInt(distance / 60, 10);
        // var seconds = parseInt(distance % 60, 10);

        // minutes = minutes < 10 ? "0" + minutes : minutes;
        // seconds = seconds < 10 ? "0" + seconds : seconds;
        jam.innerHTML = hours;
        menit.innerHTML = minutes;
        detik.innerHTML = seconds;

    }, 1000);
}
Countdown();
//var div = document.getElementById('');
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#A").click(function() {
        $("#B").attr("checked", false);
        $("#C").attr("checked", false);
        $("#A").attr("checked", true);
    });
    $("#B").click(function() {
        $("#A").attr("checked", false);
        $("#C").attr("checked", false);
        $("#B").attr("checked", true);
    });
    $("#C").click(function() {
        $("#A").attr("checked", false);
        $("#C").attr("checked", true);
        $("#B").attr("checked", false);
    });
});
</script>