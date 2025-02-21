<?php
protected $routeMiddleware = [
    // Otros middlewares
    'admin' => \App\Http\Middleware\Admin::class,
    'profesor' => \App\Http\Middleware\Profesor::class,
    'estudiante' => \App\Http\Middleware\Estudiante::class,
];
?>