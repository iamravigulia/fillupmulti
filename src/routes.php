<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package!';
// });

// Route::get('test', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@test')->name('test');

Route::post('fmt/fillupmulti/store', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@store')->name('fmt.fillupmulti.store');

Route::post('fmt/fillupmulti/update{id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@update')->name('fmt.fillupmulti.update');

Route::post('fmt/fillupmulti/uploadFile', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@uploadFile')->name('fmt.fillupmulti.csv');

Route::any('fmt/fillupmulti/delete/{id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@delete')->name('fmt.fillupmulti.delete');


Route::prefix('fmt_fillupmulti')->group(function () { // ->middleware(['auth'])
    // ------- Get Classes List by Branch ID -------- //
    // Route::get('get-classes-by-branch-id/{country_id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@getClassesByCountryId');
    Route::get('getTopics/{id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@getTopicBySubjectId');
    Route::get('getsubtopics/{topic}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@getSubTopicByTopicId');
    Route::get('get-sub-question-format/{question_format_id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@getSubQuestionByQuestionFormatId');
    Route::get('get-topic/{subject_id}', 'EdgeWizz\Fillupmulti\Controllers\FillupmultiController@getTopic');
});
