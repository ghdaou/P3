<?php

# Main aplication entry route
Route::get('', 'LipsumUserController@index')->name('lipsumUser.index');

# Lorem Ipsum generation and display route
Route::post('/', 'LipsumUserController@lipsumShow')->name('lipsum.show');

# user data generation and display route
Route::post('/user', 'LipsumUserController@userShow')->name('user.show');

# contact us page route
Route::get('/contact', 'ContactController');
