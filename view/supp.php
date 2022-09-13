<?php

    $id =$_GET['id'];
    deleteEtudiant($id);
    header("location:?page=list");
