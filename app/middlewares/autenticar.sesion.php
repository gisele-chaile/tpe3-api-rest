<?php
    function autenticarSesion($respuesta){
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    if(isset($_SESSION['ID_usuario'])){
        $respuesta->usuario = new stdClass();
        $respuesta->usuario->ID_usuario = $_SESSION['ID_usuario'];
        $respuesta->usuario->usuario = $_SESSION['usuario'];
        return;
    }
   }
   
    