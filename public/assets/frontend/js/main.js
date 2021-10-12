$(document).ready( function () {
    $('#table_id').DataTable({
        "bFilter": false,
        "dom": 'rtip',
        "info":     false,
        "paging":   false,
        "order": [[1,"des"]]
    });
} );

