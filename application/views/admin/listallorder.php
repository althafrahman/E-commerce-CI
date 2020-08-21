<div class="container" style="margin-top:20px">
    <table class="table table-separate table-head-custom table-checkable" id="example">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>


        </tbody>

    </table>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table;

        var now = new Date();
        var jsDate = now.getDate() + '-' + (now.getMonth() + 1) + '-' + now.getFullYear();
        table = $("#example").DataTable({
            "processing": true,
            "serverSide": true,
            "columnDefs": [{
                "targets": 'no-sort',
                "orderable": false,
                "order": []
            }],
            "ajax": {
                "url": "<?php echo base_url() ?>Admin/order_list",
                "type": "POST",
            }
        });

    });
</script>