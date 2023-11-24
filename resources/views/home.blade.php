<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
        <table>
        <tr>
            <td>tipo de manzana</td>
            <td>precio</td>
            <td><a href="/formularioAgregarManzana"><button class="Btn">agregarManzana</button></a></td>
        </tr>
       
            @foreach ($manzanas as $manzana)
            
                <tr>
                    <td>{{ $manzana->tipoManzana}}</td>
                    <td>{{ $manzana->precioKilo}}</td>
                    <td><a href="/verManzana/{{$manzana->id}}"><button class="Btn">Ver</button></a></td>
                    <td><form action="/eliminarManzana/{id}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{$manzana->id }}">
                    <button type="submit" class="bin" onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">Eliminar</button>
                    </form></td>
                </tr>
            @endforeach
    </table>
</body>
</html>