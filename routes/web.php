<?php


Route::get('/', function () {
    if(isset($_SESSION['logado']) && $_SESSION['logado'] == 1){
        return view('welcome');
    } else {
        return redirect('login');
    }
});

Route::get('/login', function(){
    return view('login');
});
