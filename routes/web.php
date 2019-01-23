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

// Admin  routes  for user
Route::group([
    'namespace' => 'Admin',
    'prefix' => set_route_guard('web'),
], function () {
    Auth::routes();
    Route::get('password', 'UserController@getPassword');
    Route::post('password', 'UserController@postPassword');
    Route::get('/', 'ResourceController@home')->name('home');
    Route::get('/dashboard', 'ResourceController@dashboard')->name('dashboard');


    Route::group(['prefix' => 'banner','as' => 'banner.'], function ($router) {
        Route::resource('banner', 'BannerResourceController');
        Route::post('/banner/destroyAll', 'BannerResourceController@destroyAll');
        Route::resource('category', 'BannerCategoryResourceController');
        Route::post('/category/destroyAll', 'BannerCategoryResourceController@destroyAll');
    });

    Route::resource('news', 'NewsResourceController');
    Route::post('/news/destroyAll', 'NewsResourceController@destroyAll')->name('news.destroy_all');
    Route::post('/news/updateRecommend', 'NewsResourceController@updateRecommend')->name('news.update_recommend');
    Route::resource('system_page', 'SystemPageResourceController');
    Route::post('/system_page/destroyAll', 'SystemPageResourceController@destroyAll')->name('system_page.destroy_all');
    Route::get('/setting/index', 'SettingResourceController@index')->name('setting.index');
    Route::post('/setting/updateSetting', 'SettingResourceController@updateSetting');
    Route::get('/setting/company', 'SettingResourceController@company')->name('setting.company.index');
    Route::post('/setting/updateCompany', 'SettingResourceController@updateCompany');
    Route::get('/setting/publicityVideo', 'SettingResourceController@publicityVideo')->name('setting.publicity_video.index');
    Route::post('/setting/updatePublicityVideo', 'SettingResourceController@updatePublicityVideo');

    Route::resource('course', 'CourseResourceController');
    Route::post('/course/destroyAll', 'CourseResourceController@destroyAll')->name('course.destroy_all');

    Route::resource('link', 'LinkResourceController');
    Route::post('/link/destroyAll', 'LinkResourceController@destroyAll')->name('link.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::resource('role', 'RoleResourceController');

    Route::group(['prefix' => 'case','as' => 'case.'], function ($router) {
        Route::resource('case', 'CaseResourceController');
        Route::post('/case/destroyAll', 'CaseResourceController@destroyAll')->name('case.destroy_all');
        Route::resource('category', 'CaseCategoryResourceController');
        Route::post('/category/destroyAll', 'CaseCategoryResourceController@destroyAll')->name('category.destroy_all');
    });
    Route::group(['prefix' => 'service_case','as' => 'service_case.'], function ($router) {
        Route::resource('service_case', 'ServiceCaseResourceController');
        Route::post('/service_case/destroyAll', 'ServiceCaseResourceController@destroyAll')->name('service_case.destroy_all');
        Route::resource('category', 'ServiceCaseCategoryResourceController');
        Route::post('/category/destroyAll', 'ServiceCaseCategoryResourceController@destroyAll')->name('category.destroy_all');
        Route::resource('image', 'ServiceImageResourceController');
        Route::post('/image/destroyAll', 'ServiceImageResourceController@destroyAll')->name('image.destroy_all');
    });

    Route::resource('benefit', 'BenefitResourceController');
    Route::post('/benefit/destroyAll', 'BenefitResourceController@destroyAll')->name('benefit.destroy_all');

    Route::resource('intellect', 'IntellectResourceController');
    Route::post('/intellect/destroyAll', 'IntellectResourceController@destroyAll')->name('intellect.destroy_all');

    Route::resource('office_service', 'OfficeServiceResourceController');
    Route::post('/office_service/destroyAll', 'OfficeServiceResourceController@destroyAll')->name('office_service.destroy_all');

    Route::resource('customized_service', 'CustomizedServiceResourceController');
    Route::post('/customized_service/destroyAll', 'CustomizedServiceResourceController@destroyAll')->name('customized_service.destroy_all');

    Route::group(['prefix' => 'recruit','as' => 'recruit.'], function ($router) {
        Route::resource('recruit', 'RecruitResourceController');
        Route::post('/recruit/destroyAll', 'RecruitResourceController@destroyAll')->name('recruit.destroy_all');
        Route::resource('category', 'RecruitCategoryResourceController');
        Route::post('/category/destroyAll', 'RecruitCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::resource('message', 'MessageResourceController');
    Route::post('/message/destroyAll', 'MessageResourceController@destroyAll')->name('message.destroy_all');

    Route::group(['prefix' => 'page','as' => 'page.','namespace' => 'Page'], function ($router) {
        Route::resource('page', 'PageResourceController');
        Route::resource('category', 'PageCategoryResourceController');

        Route::get('/about/show', 'AboutResourceController@show')->name('about.show');
        Route::post('/about/store', 'AboutResourceController@store')->name('about.store');
        Route::put('/about/update/{page}', 'AboutResourceController@update')->name('about.update');

        Route::get('/about_image/show', 'AboutImageResourceController@show')->name('about_image.show');
        Route::post('/about_image/store', 'AboutImageResourceController@store')->name('about_image.store');
        Route::put('/about_image/update/{page}', 'AboutImageResourceController@update')->name('about_image.update');
    });

    Route::get('about_company','PageResourceController@getAboutCompany')->name('about_company');

    Route::group(['prefix' => 'menu'], function ($router) {
        Route::get('index', 'MenuResourceController@index');
    });

    Route::group(['prefix' => 'nav','as' => 'nav.'], function ($router) {
        Route::resource('nav', 'NavResourceController');
        Route::post('/nav/destroyAll', 'NavResourceController@destroyAll')->name('nav.destroy_all');
        Route::resource('category', 'NavCategoryResourceController');
        Route::post('/category/destroyAll', 'NavCategoryResourceController@destroyAll')->name('category.destroy_all');
    });

    Route::post('/upload/{config}/{path?}', 'UploadController@upload')->where('path', '(.*)');

    Route::resource('admin_user', 'AdminUserResourceController');
    Route::post('/admin_user/destroyAll', 'AdminUserResourceController@destroyAll')->name('admin_user.destroy_all');
    Route::resource('permission', 'PermissionResourceController');
    Route::post('/permission/destroyAll', 'PermissionResourceController@destroyAll')->name('permission.destroy_all');
    Route::resource('role', 'RoleResourceController');
    Route::post('/role/destroyAll', 'RoleResourceController@destroyAll')->name('role.destroy_all');
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group([
    'namespace' => 'Wap',
    'as' => 'wap.',
    'domain' => env('WAP_URL'),
], function () {
    Route::get('/','HomeController@home')->name('home');
    Route::get('/about','AboutController@home')->name('about');
    Route::get('/service','ServiceController@home')->name('service');
    Route::get('/join','JoinController@home')->name('join');
    Route::post('/message/store', 'MessageController@store')->name('message.store');
});

Route::group([
    'namespace' => 'Pc',
    'as' => 'pc.',
], function () {
    Route::get('/','HomeController@home')->name('home');
    Route::get('/about','AboutController@home')->name('about');
    Route::get('/service','ServiceController@home')->name('service');
    Route::get('/join','JoinController@home')->name('join');
    Route::post('/message/store', 'MessageController@store')->name('message.store');
});