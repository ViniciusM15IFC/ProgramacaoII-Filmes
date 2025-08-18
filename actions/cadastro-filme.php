<?php
require_once "../src/FilmesDAO.php";
FilmeDAO::inserir($_POST);


header("Location: ../form-filme.php");