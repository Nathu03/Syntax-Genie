<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<table id="parentTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Profession</th>
            <th>Login Status</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#parentTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('admin/get_parent_details'); ?>",
                "type": "POST"
            },
            "columns": [
                { "data": "name" },
                { "data": "email" },
                { "data": "phone" },
                { "data": "address" },
                { "data": "profession" },
                { "data": "login_status" }
            ]
        });
    });
</script>
