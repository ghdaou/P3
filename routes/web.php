<?php



/**
* Index Route
*/
Route::get('/', 'LipsumUserController@index')->name('lipsumUser.index');
Route::post('/', 'LipsumUserController@lipsumShow')->name('lipsum.show');
Route::post('/user', 'LipsumUserController@userShow')->name('user.show');
Route::get('contact', 'ContactController')->name('contact');



/**
* A quick and dirty way to set up a whole bunch of practice routes
* that I'll use in lecture.
*/
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}
