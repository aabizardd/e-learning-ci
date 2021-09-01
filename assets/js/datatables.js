$(document).ready(function() {

$('#tabel-nilai').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'excel',
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'pdf',
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'csv',
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2, 3 ]
            }
        },
    ]
});

$('#tabel-ujian').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'excel',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'pdf',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'csv',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'print',
            exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ]
            }
        },
    ]
});

$('#tabel-absen').DataTable({
    dom: 'lBfrtip',
    buttons: [
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'excel',
            exportOptions: {
                columns: [ 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'pdf',
            exportOptions: {
                columns: [ 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'csv',
            exportOptions: {
                columns: [ 1, 2, 3 ]
            }
        },
        {
            className: 'btn btn-primary glyphicon glyphicon-duplicate',
            extend: 'print',
            exportOptions: {
                columns: [ 1, 2, 3 ]
            }
        },
    ]
});


});