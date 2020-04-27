<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
require "../login/cerrarsesion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My ToDoList</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>

<body>
    <div class="img_gradient">
        <?php require "templates/navigation_bar.php"; ?>
        <header>
            <h1>Lista de tareas</h1>
        </header>
        <form>
            <p>Inserta una tarea:&nbsp&nbsp</p>
            <input class="todo-input" type="text">
            <button class="todo-button" type="submit">
                <i class="fas fa-plus-square"></i>
            </button>
            <div class="select">
                <select name="todos" class="filter-todo">
                    <option value="all">All</option>
                    <option value="completed">Completados</option>
                    <option value="uncompleted">Incompletos</option>
                </select>
            </div>
        </form>
        <div class="todo-container">
            <ul class="todo-list">

            </ul>
        </div>
    </div>
    <footer>Diseñado por Jhon F Benavides</footer>
    <script type="text/javascript" src="./js/app.js"></script>
</body>

</html>