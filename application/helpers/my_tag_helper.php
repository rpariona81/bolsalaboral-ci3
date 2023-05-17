<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Helper que da formato a los errores.
 * */
if (!function_exists('my_validation_errors')) {

    function my_validation_errors($errors) {
        $salida = '';
        if ($errors) {
            $salida = '<div class="alert alert-error">';
            $salida = $salida . '<button type="button" class="close" data-dismiss="alert"> × </button>';
            $salida = $salida . '<h4> Mensajes Validacion </h4>';
            $salida = $salida . '<small>' . $errors . '</small>';
            $salida = $salida . '</div>';
        }
        return $salida;
    }

}