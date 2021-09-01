let idUjian = document.getElementById('id-ujian');
let idSiswa = document.getElementById('id-siswa');
let idSoal = document.getElementById('id-soal');
let jawaban = '';
let jawabanEssay = document.getElementById('essay-jawaban');
let uri = 'http://localhost/e-learning-ci';

function onRadioChange(radio) {
    jawaban = radio.value

    const body = {
        id_ujian: idUjian.value,
        id_siswa: idSiswa.value,
        id_soal: idSoal.value,
        jawaban: jawaban,
        nilai_pg: 0,
        nilai_essay: null,
        nilai_total: null,
        jumlah_soal: 3,
        tgl: new Date().toISOString()
    }

    fetch(uri + '/siswa/updateJawaban', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(body)
    })
    .then(res => res.text())
    .then(data => console.log(data))
    .catch(err => console.log(err))
}

function onTextChange(textarea) {
    jawaban = textarea.value

    const body = {
        id_ujian: idUjian.value,
        id_siswa: idSiswa.value,
        id_soal: idSoal.value,
        jawaban: jawaban,
        nilai_pg: 0,
        nilai_essay: null,
        nilai_total: null,
        jumlah_soal: 3,
        tgl: new Date().toISOString()
    }

    fetch(uri + '/siswa/updateJawaban', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(body)
    })
    .then(res => res.text())
    .then(data => console.log(data))
    .catch(err => console.log(err))
}