<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP_PATRICK - CRUD</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    
    <?php include("app/views/home.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#announcements').DataTable({
                "ajax": {
                    "url": "index.php?i=get",
                    "dataSrc": "results",
                },
                columns: [
                    { data: 'id' },
                    { data: 'title' },
                    { data: 'description' },
                    { data: 'created_at' },
                    {
                        "orderable":      false,
                        "data":           null,
                        "defaultContent": `<button class="btn btn-info mx-1 btn-read" data-toggle="modal" data-target="#read">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button class="btn btn-primary mx-1 btn-update" data-toggle="modal" data-target="#update">
                                <i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn btn-danger mx-1 btn-delete" data-toggle="modal" data-target="#delete">
                                <i class="fa fa-trash"></i>
                            </button>`
                    }
                ],
            });

            var forms = document.getElementsByClassName('needs-validation');
            
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });

            $(document).on('click', '.create', function() {
            });

            $(document).on('click', '.btn-read', function() {
                var id = $(this).parents('tr[role="row"]').find('td').first().text();

                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: {
                        _method: 'GET',
                        id: id,
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $('#read #view_title').text(response.title);
                        $('#read #view_description').text(response.description);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            });

            $(document).on('click', '.btn-update', function() {
                var id = $(this).parents('tr[role="row"]').find('td').first().text();

                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: {
                        _method: 'GET',
                        id: id,
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $('#update input[name="id"]').val(response.id);
                        $('#update input[name="title"]').val(response.title);
                        $('#update input[name="description"]').val(response.description);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            });

            $(document).on('click', '.btn-delete', function() {
                var id = $(this).parents('tr[role="row"]').find('td').first().text();

                $.ajax({
                    url: 'index.php',
                    type: 'POST',
                    data: {
                        _method: 'GET',
                        id: id,
                    },
                    success: function (response) {
                        response = JSON.parse(response);
                        $('#delete input[name="id"]').val(response.id);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR, textStatus, errorThrown);
                    }
                });
            });

        });
    </script>
</body>
</html>