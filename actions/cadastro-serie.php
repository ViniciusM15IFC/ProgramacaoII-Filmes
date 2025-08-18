<?php
require_once "../src/SeriesDAO.php";
SerieDAO::inserir($_POST);

header("Location: ../form-serie.php");