</div>
</div>

<!-- CDN for SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Tailwind CSS -->
<script src="https://cdn.tailwindcss.com/"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.4/js/dataTables.tailwindcss.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.4/css/dataTables.tailwindcss.css">

<!-- your custom JavaScript files -->
<script src="<?= BASEURL . '/js/script.js' ?>"></script>
<script src="<?= BASEURL . '/js/noexpiry.js' ?>"></script>

<script>
    new DataTable('#example');
    new DataTable('#pelanggan');
</script>

</body>

</html>