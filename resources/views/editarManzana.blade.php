<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('editarManzana', $manzana->id) }}">
            @csrf
            @method('PATCH')
            
            <label for="titulo">Tipo de manzana</label>
                <input type="text" id="titulo" name="titulo" required>

                <label for="descripcion">Precio:</label>
                <input type="text" id="precio" name="precio" required>

                <button type="submit"><a href=" {{url()->previous()}}" style="text-decoration: none;">Editar</a></button>
        </form>
</body>
</html>