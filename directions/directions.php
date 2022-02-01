<?php
namespace Route;
/**
 * Define as Rotas/Direções do sistema.
 * @author David Rusycki
 * @since 31/01/2022
 */
Direction::define([
    Route::set('/routes/teste/', [new ControllerTeste(), 'init']),
    Route::set('/routes/lindo', [new ControllerORM(), 'teste']),
    Route::set('/routes/', [new ControllerORM(), 'asdf']),
]); 