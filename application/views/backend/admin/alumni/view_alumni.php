
<!DOCTYPE html>
<html>
<head>
    <title>Alumni Data</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body>

<table id="alumniTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>Name</th>
            <th>Sex</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Profession</th>
            <th>Marital Status</th>
            <th>Graduation Year</th>
            <th>Club ID</th>
            <th>Interest</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

<script>
$(document).ready(function() {
    $('#alumniTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "<?php echo base_url('admin/get_alumni_details'); ?>",
            "type": "POST"
        },
        "columns": [
            { "data": "name" },
            { "data": "sex" },
            { "data": "phone" },
            { "data": "email" },
            { "data": "address" },
            { "data": "profession" },
            { "data": "marital_status" },
            { "data": "g_year" },
            { "data": "club_id" },
            { "data": "interest" }
        ]
    });
});
</script>

</body>
</html>
