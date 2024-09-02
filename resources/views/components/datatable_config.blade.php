<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('public/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<!-- DataTables  & Plugins -->
<script src="{{ asset('public/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script>
    // $(document).ready(function(){
        var DATATABLE_LANGUAGE = {
            "lengthMenu":"_MENU_",
            "info":"Showing _START_ to _END_ of _TOTAL_ records",
            "infoEmpty":"No records to show",
            "zeroRecords":"No records found",
            "infoFiltered":"(filtered from _MAX_ total records )"
        }
        // $(function)
    // });
    $(".filter-input").keyup(function(){
        table.column($(this).data('column'))
        .search($(this).val()).draw();
    });
    $(".filter-select").change(function(){
        table.column($(this).data('column'))
        .search($(this).val()).draw();
    });
</script>
