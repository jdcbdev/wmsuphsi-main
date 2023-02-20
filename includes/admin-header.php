<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>PHSI - Admin Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/jaydee.css"> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!--<link rel ="styleshee" href="https://unpkg.com/aos@2.3.1/dist/aos.css">-->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <!-- Custom IconScunt for this template-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <!--Adding datatable style cdn css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <!--Adding jQuery cdn-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!--Adding datable cdn-->
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <!--Initializing datatables-->
    <script>
        $(document).ready(function () {
            $('#user-table').DataTable();
            $('#misvis-table').DataTable();
        });
    </script>
</head>
<body>