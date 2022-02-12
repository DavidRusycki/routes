<?php
use Route\Route;

/**
 * Arquivo usado para definir as rotas da aplicação.
 */

Route::getInstance()->define([
    Route::add('asldfjl/aklsjçdfkl', [new ControllerConsulta(), 'iniciaConsulta']);
]);