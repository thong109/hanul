<?php

use App\Http\Controllers\ActivityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MailAdminController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SpecController;
use Illuminate\Routing\RouteUri;
use Illuminate\Support\Facades\Artisan;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
Route::get('/clear-cache',function(){
    $exitCode = Artisan::call('cache:clear');
});
// Route::get('/', function () {
//     return view('layout');
// });
// Route::get('/trang-chu', function () {
//     return view('layout');
// });
//Frontend
Route::resource('trang-chu', HomeController::class);
Route::resource('/', HomeController::class);
//Search
Route::get('/timkiem', [HomeController::class, 'timkiem']);


//Danh muc
Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_slug}', [ProductController::class, 'details_product']);
Route::get('/chi-tiet-course/{course_id}', [CourseController::class, 'details_course']);
//Register
Route::get('/register', [RegisterController::class, 'register']);
Route::get('/activity', [HomeController::class, 'activity']);
Route::get('/sponsor', [HomeController::class, 'sponsor']);
Route::get('/course', [HomeController::class, 'course']);
Route::get('/map', [HomeController::class, 'map']);

//Mail
Route::get('/mail', [RegisterController::class, 'mail']);

// Route::get('/language/{language}', [LanguageController::class, 'language.dashboard']);
//Backend
Route::resource('/admin', AdminController::class);
Route::get('/dashboard', [AdminController::class, 'showdashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::get('/language/{language}', [LanguageController::class, 'language']);
Route::post('/postcontact', [RegisterController::class, 'postcontact']);
//Category Product
Route::get('/add-category', [CategoryProduct::class, 'add_category']);
Route::get('/edit-category/{category_id}', [CategoryProduct::class, 'edit_category']);
Route::get('/delete-category/{category_id}', [CategoryProduct::class, 'delete_category']);
Route::get('/all-category', [CategoryProduct::class, 'all_category']);
Route::get('/unactive-category/{category_id}', [CategoryProduct::class, 'unactive_category']);
Route::get('/active-category/{category_id}', [CategoryProduct::class, 'active_category']);
Route::post('/save-category', [CategoryProduct::class, 'save_category']);
Route::post('/update-category/{category_id}', [CategoryProduct::class, 'update_category']);
//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);
Route::get('/unactive-tinhtrang/{product_id}', [ProductController::class, 'unactive_tinhtrang']);
Route::get('/active-tinhtrang/{product_id}', [ProductController::class, 'active_tinhtrang']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);
//Special
Route::get('/add-spec', [SpecController::class, 'add_spec']);
Route::get('/edit-spec/{spec_id}', [SpecController::class, 'edit_spec']);
Route::get('/all-spec', [SpecController::class, 'all_spec']);
Route::post('/save-spec', [SpecController::class, 'save_spec']);
Route::post('/update-spec/{spec_id}', [SpecController::class, 'update_spec']);
Route::get('/delete-spec/{spec_id}', [SpecController::class, 'delete_spec']);


//Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
//Checkout
Route::get('/login-checkout', [CheckoutController::class, 'login_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::post('/save-checkout', [CheckoutController::class, 'save_checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
//Order
Route::post('/order-place', [CheckoutController::class, 'order_place']);
//Order Admin
Route::get('/manager-order', [CheckoutController::class, 'manager_order']);
Route::get('/view-order/{orderId}', [CheckoutController::class, 'view_order']);

//Banner
Route::get('/add-banner', [BannerController::class, 'add_banner']);
Route::get('/edit-banner/{banner_id}', [BannerController::class, 'edit_banner']);
Route::get('/delete-banner/{banner_id}', [BannerController::class, 'delete_banner']);
Route::get('/all-banner', [BannerController::class, 'all_banner']);
Route::get('/unactive-banner/{banner_id}', [BannerController::class, 'unactive_banner']);
Route::get('/active-banner/{banner_id}', [BannerController::class, 'active_banner']);
Route::post('/save-banner', [BannerController::class, 'save_banner']);
Route::post('/update-banner/{banner_id}', [BannerController::class, 'update_banner']);
//Slider
Route::get('/add-slider', [SliderController::class, 'add_slider']);
Route::get('/edit-slider/{slider_id}', [SliderController::class, 'edit_slider']);
Route::get('/delete-slider/{slider_id}', [SliderController::class, 'delete_slider']);
Route::get('/all-slider', [SliderController::class, 'all_slider']);
Route::get('/unactive-slider/{slider_id}', [SliderController::class, 'unactive_slider']);
Route::get('/active-slider/{slider_id}', [SliderController::class, 'active_slider']);
Route::post('/save-slider', [SliderController::class, 'save_slider']);
Route::post('/update-slider/{slider_id}', [SliderController::class, 'update_slider']);
//Sponsor
Route::get('/add-sponsor', [SponsorController::class, 'add_sponsor']);
Route::get('/edit-sponsor/{sponsor_id}', [SponsorController::class, 'edit_sponsor']);
Route::get('/delete-sponsor/{sponsor_id}', [SponsorController::class, 'delete_sponsor']);
Route::get('/all-sponsor', [SponsorController::class, 'all_sponsor']);
Route::get('/unactive-sponsor/{sponsor_id}', [SponsorController::class, 'unactive_sponsor']);
Route::get('/active-sponsor/{sponsor_id}', [SponsorController::class, 'active_sponsor']);
Route::post('/save-sponsor', [SponsorController::class, 'save_sponsor']);
Route::post('/update-sponsor/{sponsor_id}', [SponsorController::class, 'update_sponsor']);
//Course
Route::get('/add-course', [CourseController::class, 'add_course']);
Route::get('/edit-course/{course_id}', [CourseController::class, 'edit_course']);
Route::get('/delete-course/{course_id}', [CourseController::class, 'delete_course']);
Route::get('/all-course', [CourseController::class, 'all_course']);
Route::get('/unactive-course/{course_id}', [CourseController::class, 'unactive_course']);
Route::get('/active-course/{course_id}', [CourseController::class, 'active_course']);
Route::post('/save-course', [CourseController::class, 'save_course']);
Route::post('/update-course/{course_id}', [CourseController::class, 'update_course']);
//Activity
Route::get('/add-activity', [ActivityController::class, 'add_activity']);
Route::get('/edit-activity/{activity_id}', [ActivityController::class, 'edit_activity']);
Route::get('/delete-activity/{activity_id}', [ActivityController::class, 'delete_activity']);
Route::get('/all-activity', [ActivityController::class, 'all_activity']);
Route::get('/unactive-activity/{activity_id}', [ActivityController::class, 'unactive_activity']);
Route::get('/active-activity/{activity_id}', [ActivityController::class, 'active_activity']);
Route::post('/save-activity', [ActivityController::class, 'save_activity']);
Route::post('/update-activity/{activity_id}', [ActivityController::class, 'update_activity']);
//introduce
