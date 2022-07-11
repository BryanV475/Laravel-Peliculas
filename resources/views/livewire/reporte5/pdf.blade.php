<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead">
                        <tr>
                            <th>Mes</th>
                            <th>Socios</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 0; $i < 12; $i++) <tr>
                            <td>{{ $socioPorMes['label'][$i]}}</td>
                            <td>{{ $socioPorMes['data'][$i]}}</td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>