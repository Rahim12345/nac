<?php

use App\Http\Controllers\front\PagesController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

Route::get('langs/{locale}',[App\Http\Controllers\profileController::class,'langSwitcher'])
    ->name('lang.swithcher');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    Lfm::routes();
});


Route::group(['middleware'=>['locale']],function (){
    Route::get('/', [PagesController::class,'home'])
        ->name('front.home');

//    Route::get('/who-we-are', [PagesController::class,'whoWeAre'])
//        ->name('front.who.we.are');
//
//    Route::get('/current-issues', [PagesController::class,'currentIssues'])
//        ->name('front.current.issues');

    Route::get('/menu/{slug}', [PagesController::class,'Menu'])
        ->name('front.menu');
});



Route::group(['prefix'=>'admin','middleware'=>['auth', 'en_locale']],function (){

    Route::get('/',[App\Http\Controllers\AdminController::class,'index'])
        ->name('back.dashboard');
    Route::get('profile',[App\Http\Controllers\profileController::class,'profile'])
        ->name('back.profile');
    Route::resource('option',App\Http\Controllers\OptionController::class);
//    Home start
    Route::resource('menu',App\Http\Controllers\MenuController::class);
    Route::get('menu-deleter/{id}',[App\Http\Controllers\MenuController::class,'menuDeleter'])
        ->name('menu.deleter');
    Route::resource('banner',App\Http\Controllers\BannerController::class);
    Route::resource('mission',App\Http\Controllers\MissionController::class);
    Route::resource('involve',App\Http\Controllers\InvolveController::class);
    Route::resource('press',App\Http\Controllers\PressController::class);
    Route::resource('pmission',App\Http\Controllers\PMissionController::class);
//    Home end
//    Who are N.A.C start
    Route::resource('subscribe',App\Http\Controllers\SubscribeController::class);
    Route::get('who/{section}',[App\Http\Controllers\WhoController::class, 'index'])
        ->name('back.who');
    Route::post('who-post',[App\Http\Controllers\WhoController::class, 'store'])
        ->name('back.who.post');

    Route::get('statistics',[App\Http\Controllers\WhoController::class, 'statistics'])
        ->name('back.statistics');

    Route::post('statistics',[App\Http\Controllers\WhoController::class, 'statisticsPost'])
        ->name('back.statistics.post');

    Route::resource('moment',App\Http\Controllers\MomentController::class);

    Route::get('flag-part',[App\Http\Controllers\WhoController::class, 'flagPart'])
        ->name('back.flag.part');

    Route::post('flag-part',[App\Http\Controllers\WhoController::class, 'flagPartPost'])
        ->name('back.flag.part.post');
//    Who are N.A.C end
//    OUR ADVOCACY start
    //    Current issues start
    Route::resource('current-issues-banner',App\Http\Controllers\CurrentIssuesBannerController::class);
    Route::resource('current-issues-category',App\Http\Controllers\CurrentIssuesCategoryController::class);
    //    Current issues start
//    OUR ADVOCACY end
});



Route::get('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'login'])
    ->middleware('locale')
    ->name('login');

Route::post('daxil-ol',[App\Http\Controllers\sign\sign_in_upController::class,'loginPost'])
    ->middleware('locale')
    ->middleware('throttle:5,60')
    ->name('login.post');

Route::get('cixis-et',[App\Http\Controllers\sign\sign_in_upController::class,'logout'])
    ->middleware( 'auth' )
    ->name( 'logout' );

Route::post('avatar-upload',[ App\Http\Controllers\profileController::class,'avatarUpload' ])
    ->name('front.avatar.upload')
    ->middleware('auth');

Route::post('profile',[ App\Http\Controllers\profileController::class,'profileUpdate' ])
    ->name('front.profile.update')
    ->middleware('auth');
