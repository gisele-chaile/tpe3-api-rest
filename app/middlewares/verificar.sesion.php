<?php
    function verificarSesion($respuesta) {
         if($respuesta->usuario) {
            return;
            } else {
                header('Location: ' . BASE_URL . 'mostrarLogin');
                die();
            }
        }
    
  
