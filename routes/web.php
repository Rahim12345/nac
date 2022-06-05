<?php

use App\Http\Controllers\BlogController;
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
    Route::post('/subscribe', [PagesController::class,'subscribe'])->name('front.subscribe');

    Route::get('/menu/{slug}', [PagesController::class,'Menu'])
        ->name('front.menu');

    Route::post('blog-loader', [PagesController::class, 'blogLoader'])
        ->name('blog.loader');

    Route::get('take-action-details/{slug}', [PagesController::class, 'takeActionDetails'])
        ->name('take.action.details');
    Route::get('statements-details/{slug}', [PagesController::class, 'statementsDetails'])
        ->name('statements.details');
    Route::get('community-updates-details/{slug}', [PagesController::class, 'communityUpdatesDetails'])
        ->name('community.updates.details');
    Route::get('volunteer-details/{slug}', [PagesController::class, 'volunteerDetails'])
        ->name('volunteer.details');
    Route::get('media-details/{slug}', [PagesController::class, 'mediaDetails'])
        ->name('media.details');
});



Route::group(['prefix'=>'admin','middleware'=>['auth', 'en_locale']],function (){

    Route::get('/',[App\Http\Controllers\AdminController::class,'index'])
        ->name('back.dashboard');
    Route::get('profile',[App\Http\Controllers\profileController::class,'profile'])
        ->name('back.profile');
    Route::resource('option',App\Http\Controllers\OptionController::class);

    Route::resource('menu',App\Http\Controllers\MenuController::class);
    Route::get('menu-deleter/{id}',[App\Http\Controllers\MenuController::class,'menuDeleter'])
        ->name('menu.deleter');
    Route::get('shown/{id}',[App\Http\Controllers\MenuController::class,'shown'])
        ->name('menu.shown');
    Route::resource('banner',App\Http\Controllers\BannerController::class);
    Route::resource('mission',App\Http\Controllers\MissionController::class);
    Route::resource('involve',App\Http\Controllers\InvolveController::class);
    Route::resource('press',App\Http\Controllers\PressController::class);
    Route::resource('pmission',App\Http\Controllers\PMissionController::class);

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

    Route::get('page-banner/{key}',[App\Http\Controllers\OptionController::class, 'pageBanner'])
        ->name('back.page.banner');

    Route::post('page-banner-post',[App\Http\Controllers\OptionController::class, 'pageBannerPost'])
        ->name('back.page.banner.post');

    Route::resource('current-issues-banner',App\Http\Controllers\CurrentIssuesBannerController::class);
    Route::resource('current-issues-category',App\Http\Controllers\CurrentIssuesCategoryController::class);

    Route::get('blog/{id}',[BlogController::class,'blogIndex'])
        ->name('blog.index');

    Route::resource('blog',\App\Http\Controllers\BlogController::class);
    Route::get('blog-list/{menu_id}', [\App\Http\Controllers\BlogController::class, 'blogList'])->name('blog.list');
    Route::get('blog-create/{menu_id}', [\App\Http\Controllers\BlogController::class, 'blogCreate'])->name('blog.create');
    Route::get('blog-edit/{menu_id}/{id}', [\App\Http\Controllers\BlogController::class, 'blogEdit'])->name('blog.edit');
    Route::get('blog-past/{menu_id}/{id}', [\App\Http\Controllers\BlogController::class, 'blogPast'])->name('blog.past');
    Route::get('blog-image-deleter/{id}', [\App\Http\Controllers\BlogController::class, 'blogImageDeleter'])->name('blog.image.deleter');
    Route::post('blog-cover', [\App\Http\Controllers\BlogController::class, 'is_cover'])->name('blog.is_cover');

    Route::get('become-member-text',[\App\Http\Controllers\OptionController::class,'becomeMemberText'])
        ->name('become.member.text');
    Route::post('become-member-text',[\App\Http\Controllers\OptionController::class,'becomeMemberTextPost'])
        ->name('become.member.text.post');
    Route::resource('membership',\App\Http\Controllers\MembershipController::class);
    Route::post('membership-other-fields',[\App\Http\Controllers\OptionController::class,'membershipOtherFields'])
        ->name('membership.other.fields');

    Route::get('media-text',[\App\Http\Controllers\OptionController::class,'mediaText'])
        ->name('media.text');
    Route::post('media-text',[\App\Http\Controllers\OptionController::class,'mediaTextPost'])
        ->name('media.text.post');
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
