Copy code
<!doctype html>
<html lang="fr">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>tabletest</title>
    <style>
        body {
            margin-top: 5em;
        }
        .table {
            margin-top: 100px;
            margin-bottom: 100px;
        }
    </style>
</head>
    <body>
    <table class="table" id="studentsTable">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Email</th>
                <th scope="col">CRUD</th>
            </tr>
        </thead>
        <tbody id="studentsTableBody">
        </tbody>
    </table> 

    <form id="studentForm" action="" onsubmit="onFormSubmit(event);">
        <!-- Ajout d'un champ caché pour stocker l'index de la ligne en cours de modification -->
        <input type="hidden" id="editingRowIndex" value="-1">
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nom*</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputName" >
            </div>
        </div>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" id="inputEmail" >
            </div>
        </div>
        <div class="form-group row">
            <span class="col-sm-2"></span>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary form-control" id="submitButton">Ajouter</button>
            </div>
        </div>
    </form>

    <script>
$(document).ready(function () {
    <?php require_once('config_url.php')?>
    let url_api = "<?php echo $API_URL ?>";

    function showStudents() {
        $.ajax({
            url: url_api + 'api.php',
            type: 'GET',
            dataType: 'json',
        }).done(function (response) {
            $('#studentsTable').DataTable({
                data: response,
                columns: [
                    { data: 'id' },
                    { data: 'name' },
                    { data: 'email' },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return '<button class="delete-student" data-id="' + data.id + '">Supprimer</button>&nbsp<button class="edit-student" data-id="' + data.id + '">Modifier</button>';
                        }
                    }
                ]
            });
        }).fail(function (error) { alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        });
    }

    function deleteStudent(id) {
        if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
            $.ajax({
                url: url_api + `api.php?id=${id}`,
                method: 'DELETE',
                success: function() {
                    $('#studentsTable').DataTable().row($('button.delete-student[data-id="' + id + '"]').closest('tr')).remove().draw();
                },
                error: function(error) {
                    console.error('Error deleting student:', error);
                }
            });
        }
    }

    function addStudent(name, email) {
        $.ajax({
            url: url_api + 'api.php',
            type: 'POST',
            data: JSON.stringify({ "name": name, "email": email }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
        }).done(function (response) {
            $('#studentsTable').DataTable().row.add(response).draw();
            console.log('Utilisateur ajouté avec succès !');
        }).fail(function (error) {
            alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        });
    }

    function getStudentByID(id) {
        $.ajax({
            url: url_api + `api.php?id=${id}`,
            type: 'GET',
            dataType: 'json',
        }).done(function (response) {
            $('#edit-student-form').show();
            $('#idEdit').val(response.id);
            $('#inputNameEdit').val(response.name);
            $('#inputEmailEdit').val(response.email);
        }).fail(function (error) {
            alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        });
    }

    function editStudentByID(id, name, email) {
        $.ajax({
            url: url_api + `api.php?id=${id}`,
            type: 'PUT',
            data: JSON.stringify({ "name": name, "email": email }),
            contentType: 'application/json; charset=utf-8',
            dataType: 'json',
        }).done(function (response) {
            $('#edit-student-form').hide();
            var table = $('#studentsTable').DataTable();
            var row = table.row($('button.edit-student[data-id="' + id + '"]').closest('tr'));
            row.data(response).draw();
            console.log('Utilisateur modifié avec succès !');
        }).fail(function (error) {
            alert("La requête s'est terminée en échec. Infos : " + JSON.stringify(error));
        });
    }

    $(document).on('click', '.delete-student', function () {
        var studentID = $(this).data('id');
        deleteStudent(studentID);
    });

    $(document).on('click', '.edit-student', function () {
        var studentID = $(this).data('id');
        getStudentByID(studentID);
    });

    $('#studentForm').on('submit', function (event) {
        event.preventDefault();
        var name = $('#inputName').val();
        var email = $('#inputEmail').val();
        addStudent(name, email);
    });

    showStudents();
});
</script>
</body>
</html>