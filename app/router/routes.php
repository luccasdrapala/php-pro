<?php 

return[
    "/" => 'Home@index',
    '/user/create' => 'User@create',
    '/user/[0-9]+' => 'User@show',
    '/login' => 'Login@index',
    '/user/[0-9]+/name/[a-z]+' => 'User@show'
];