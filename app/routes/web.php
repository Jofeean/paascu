<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['banners'] = \App\WelcomeBanners::where('isSelected', true)->get();
    $data['news'] = \App\NewsBanners::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(1);
    $data['news'] = \App\NewsBanners::where('isSelected', true)->get();
    return view('guest.home', $data);
});

//home
Route::get('about', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(2);
    return view('guest.about.about', $data);
});

Route::get('about-paascu', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(3);
    return view('guest.about.paascu', $data);
});

Route::get('vision-mission', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(4);
    return view('guest.about.vision', $data);
});

Route::get('board-members', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(5);
    return view('guest.about.board', $data);
});

Route::get('commission-members', function () {
    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(6);
    return view('guest.about.commission', $data);
});


//accreditation
Route::get('what-is-accreditation', function () {

    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(7);
    return view('guest.accreditation.what', $data);
});

Route::get('accreditation-process', function () {

    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(8);
    return view('guest.accreditation.process', $data);
});

Route::get('accredited-programs', function () {

    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(9);
    return view('guest.accreditation.programs', $data);
});

Route::get('standards', function () {

    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(10);
    return view('guest.accreditation.standard', $data);
});

Route::get('benefits-incentives-advantages', function () {

    $data['footerContent'] = \App\FooterContent::all()->first();
    $data['footerImage'] = \App\FooterImage::where('isSelected', true)->first();
    $data['header'] = \App\BannerImage::where('isSelected', true)->first();
    $data['content'] = \App\Contents::find(11);
    return view('guest.accreditation.benefit', $data);
});


Route::group(['prefix' => 'admin'], function () {

    //add data
    Route::group(['prefix' => 'add'], function () {
        Route::post('banner', 'cms@addBannerImage');
        Route::post('footer', 'cms@addFooterImage');
        Route::post('welcome', 'cms@addWelcomeBanner');
        Route::post('news', 'cms@addNewsBanner');
    });

    //get data
    Route::group(['prefix' => 'get'], function () {
        Route::get('banner', 'cms@getBannerImage');
        Route::get('footer', 'cms@getFooterImage');
        Route::get('footer-content', 'cms@getFooterContent');
        Route::get('welcome-banner', 'cms@getWelcomeBanner');
        Route::get('landing', 'cms@getLandingContent');
        Route::get('news', 'cms@getNewsBanner');
        Route::get('about', 'cms@getAboutContent');
        Route::get('about-paascu', 'cms@getPaascuContent');
        Route::get('vision', 'cms@getVisionContent');
        Route::get('board-members', 'cms@getBoardContent');
        Route::get('commission', 'cms@getCommissionContent');
        Route::get('what', 'cms@getWhatContent');
        Route::get('process', 'cms@getProcessContent');
        Route::get('programs', 'cms@getProgramsContent');
        Route::get('standards', 'cms@getStandardsContent');
        Route::get('benefit', 'cms@getBenefitContent');
    });

    //select data
    Route::group(['prefix' => 'select'], function () {
        Route::post('banner', 'cms@selectBannerImage');
        Route::post('footer', 'cms@selectFooterImage');
        Route::post('news', 'cms@selectNewsImage');
        Route::post('welcome', 'cms@selectWelcomeImage');
    });

    //update data
    Route::group(['prefix' => 'update'], function () {
        Route::post('footer-content', 'cms@updateFooterContent');
        Route::post('home-content', 'cms@updateHomeContent');
        Route::post('title', 'cms@updateTitle');
        Route::post('content', 'cms@updateContent');
    });


    Route::get('/', function () {
        return view('admin.home');
    });

    Route::get('landing-page', function () {
        return view('admin.landing_page');
    });

    Route::get('common', function () {
        return view('admin.common');
    });

    Route::get('about-us', function () {
        return view('admin.about.about');
    });

    Route::get('about-paascu', function () {
        return view('admin.about.paascu');
    });

    Route::get('vision-mission-core-values', function () {
        return view('admin.about.vision');
    });

    Route::get('board-members', function () {
        return view('admin.about.board');
    });

    Route::get('commission', function () {
        return view('admin.about.commission');
    });

    Route::get('about-accreditation', function () {
        return view('admin.accreditation.about');
    });

    Route::get('accreditation-process', function () {
        return view('admin.accreditation.process');
    });

    Route::get('accredited-programs', function () {
        return view('admin.accreditation.programs');
    });

    Route::get('standards', function () {
        return view('admin.accreditation.standard');
    });

    Route::get('benefits', function () {
        return view('admin.accreditation.benefit');
    });

    Route::post('upload-img', 'cms@contentImage');

    Route::get('delete-img/{file}', 'cms@deleteContentImage');

});
