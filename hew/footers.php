</body>
<script src="../assets/scripts/jq.js"></script>
<script src="../assets/scripts/jquery1.js" type="text/javascript"></script>
<script src="../assets/scripts/jquery2.js" type="text/javascript"></script>
<script src="../assets/scripts/script.js" type="text/javascript"></script>
<script src="../assets/scripts/validate.js"></script>
<script src="../assets/datatables/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable-1').dataTable();
        $('.dataTables_paginate').addClass("btn-group datatable-pagination");
        $('.dataTables_paginate > a').wrapInner('<span />');
        $('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
        $('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
    });
</script>

</html>