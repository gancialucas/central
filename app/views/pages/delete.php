<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Titulo de la vista -->
    <title>Borrar</title>

    <!-- Link css -->
    <link rel="stylesheet" href="<?php echo PATH_URL; ?>/css/login/styles.css">

    <!-- Bootstrap Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <form action="<?php echo PATH_URL; ?>/delete/deleteUser/<?php echo $data['id'] ?>" method="POST">

        <img src="<?php echo PATH_URL; ?>/img/logoRegistroAzul.jpg" class="img-fluid rounded" alt="logoRegistro">
        <h4>Asisteril</h4><br>

        <!-- Dos columnas con los inputs tipo texto para el Nombre y Apellido -->
        <div class="row mb-4">
            <div class="col">
                <div class="form-outline">
                    <input required type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" />
                </div>
            </div>
            <div class="col">
                <div class="form-outline">
                    <input required type="text" name="phone" class="form-control" value="<?php echo $data['phone']; ?>" />
                </div>
            </div>
        </div>

        <!-- Email input -->
        <div class="form-outline mb-4">
            <input required type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" />
        </div>

        <!-- Contraseña input -->
        <div class="form-outline mb-4">
            <input required type="password" name="pass" class="form-control" value="<?php echo $data['pass']; ?>" />
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-danger btn-block mb-4">Borrar</button>

        <div class="text-center">
            <a href="<?php echo PATH_URL; ?>/admin">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
        </div>
    </form>