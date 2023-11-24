<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@if ($manzana)
        <table>
            <tr>
                <td>Tipo de manzana:</td>
                <td>{{ $manzana->tipoManzana}}</td>
            </tr>
            <tr>
                <td>Precio:</td>
                <td>{{ $manzana->precioKilo }}</td>
            </tr>
        </table>

        <div>
            <a href="{{ route('modificarManzana', $manzana->id) }}"><button class="Btn">Editar</button></a>
        </div>

        @else
        <h2 style="color: red;">La manzana no existe.</h2>
    @endif
</body>
</html>