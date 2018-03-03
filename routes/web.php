<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foo', function() {
    return config('company.razon_social');
});
