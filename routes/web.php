<?php

use App\AirtimeConfirmation;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Route::get('/giftcard', function () {
    return view('giftcard');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/digital', function () {
    return view('digital');
});

Route::get('/career', function () {
    return view('career');
});

Route::get('/bitcoin', function () {
    return view('bitcoin');
});

Route::get('/refill', function () {
    return view('refill');
});

Route::get('/aboutus', function () {
    return view('aboutUs');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', 'ContactController@getContact');
Route::post('/contact', 'ContactController@saveContact');

Auth::routes();

//Authenticated Users
Route::get('/logout', 'Auth\LoginController@logout');
//Route::get('/verifi', 'UserController@verify')->name('/verifi');
//Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
//Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activate/{code}', 'ActivationController@activation')->name('user.activation');
Route::get('/resend/code', 'ActivationController@coderesend')->name('code.resend');

Route::group(['middleware' => ['App\Http\Middleware\User', 'App\Http\Middleware\PreventBackHistory']], function(){

    //Route::group(['prefix'=>'2fa'], function(){
        Route::get('get_auth','LoginSecurityController@show2faForm')->name('get_auth');
        //Route::post('/generateSecret','LoginSecurityController@generate2faSecret')->name('generateSecret');
        Route::post('/generateSecret','LoginSecurityController@generate2faSecret')->name('generate2faSecret');
        Route::post('/enable2fa','LoginSecurityController@enable2fa')->name('enable2fa');
        Route::post('/disable2fa','LoginSecurityController@disable2fa')->name('disable2fa');

        // 2fa middleware
        Route::post('/verify_account', function () {
            return redirect('dashboard');
        })->name('verify_account')->middleware('2fa');

        // 2fa middleware
// Route::get('/verify', function () {
// })->middleware(['auth', '2fa','App\Http\Middleware\PreventBackHistory']);


Route::post('submit_giftcard', 'GiftcardController@store')->name('submit_giftcard');
Route::get('/dashboard/giftcard', 'GiftcardController@show')->name('dashboard.giftcard');
//Route::get('/dashboard/profile/{id}', 'UserController@edit')->name('dashboard.profile');
Route::get('/dashboard/account', 'UserController@account')->name('dashboard.account');
Route::patch('/dashboard/update', 'UserController@update')->name('dashboard.update');
Route::patch('/dashboard/bank_update', 'UserController@bankUpdate')->name('dashboard.bank_update');
Route::get('dashboard/get_subcat/{id}', 'GiftcardController@subcat')->name('dashboard.get_subcat');
Route::post('paypal', 'PaymentController@paywithpaypal')->name('paypal');
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');
Route::post('pm_pay', 'PaymentController@pm_pay')->name('pm_pay');
Route::get('dashboard/withdraw', 'PaymentController@withdraw')->name('dashboard.withdraw');
Route::post('submit_withdrawal', 'PaymentController@submit_withdrawal')->name('submit_withdrawal');
Route::get('/dashboard/digital_asset', 'GiftcardController@see')->name('dashboard.digital_asset');
Route::get('/dashboard/wallets', 'UserController@wallets')->name('dashboard.wallets');
Route::get('/dashboard/naira_wallet', 'UserController@naira_wallet')->name('dashboard.naira_wallet');
Route::get('/dashboard/bitcoin_wallet', 'UserWalletController@bitcoin_wallet')->name('dashboard.bitcoin_wallet');
Route::post('/dashboard/wallet_transfer', 'UserController@transfer_wall')->name('dashboard.wallet_transfer');
Route::get('/dashboard', 'UserController@dashhome')->name('dashboard');
Route::patch('/pass_update', 'UserController@update_pass')->name('pass_update');
Route::post('/send_bitcoin', 'UserWalletController@sendBitcoin')->name('send_bitcoin');
Route::post('/send_bit', 'UserWalletController@sendBit')->name('send_bit');
Route::get('/dashboard/recharge_airtime', 'BillerController@airtime')->name('dashboard.recharge_airtime');
Route::post('vend_airtime', 'BillerController@vendAirtime')->name('vend_airtime');
Route::get('/dashboard/data_recharge', 'BillerController@data_recharge')->name('dashboard.data_recharge');
Route::post('vend_data', 'BillerController@vendData')->name('vend_data');
Route::get('/get_data_bundle/{net}', 'BillerController@getDataBundle')->name('/get_data_bundle');
Route::get('/get_data_bundle_2/{phone}/{net}', 'BillerController@getDataBundle_2')->name('/get_data_bundle_2');
Route::get('/tv_bundle/{operator2}', 'BillerController@tv_bundle')->name('/tv_bundle');
Route::get('/validate_electricity/{meter}/{net}/{type}', 'BillerController@validateElectricity')->name('/validate_electricity');
Route::get('validate_television/{smartcard}/{operator}', 'BillerController@validateTelevision')->name('validate_television/{smartcard}/{operator}');
Route::get('/dashboard/electricity', 'BillerController@electricity')->name('dashboard.electricity');
Route::get('/dashboard/television', 'BillerController@television')->name('dashboard.television');
//Route::get('/get_electricity', 'BillerController@get_electricity')->name('get_electricity');
Route::get('/get_television', 'BillerController@get_television')->name('get_television');
Route::post('/submit_electricity', 'BillerController@submit_electricity')->name('submit_electricity');
Route::post('/submit_television', 'BillerController@submit_television')->name('submit_television');
Route::get('/resend_token', 'UserController@resend_token')->name('resend_token');
Route::get('/dashboard/transac', 'UserWalletController@transac')->name('dashboard.transac');
Route::get('/getbtc', 'UserWalletController@getBtcPrice')->name('getbtc');
Route::post('/buy_btc', 'UserWalletController@buyBtc')->name('buy_btc');
Route::post('/sell_btc', 'UserWalletController@sellBtc')->name('sell_btc');
Route::get('/paypal_rate', 'PaymentController@paypalRate')->name('paypal_rate');
Route::post('/send_pin', 'UserController@sendPin')->name('send_pin');
Route::post('/reset_pin', 'UserController@resetPin')->name('reset_pin');
Route::get('/validate_bank/{bnum}/{BankCode}', 'UserController@valBank')->name('validate_bank');
Route::post('/validate_bvn', 'UserController@validateBvn')->name('validate_bvn');
Route::get('dashboard/cards', 'CardController@index')->name('dashboard.cards');
Route::get('dashboard/virtual-card', 'CardController@virtual')->name('dashboard.virtual-card');
Route::post('create_card', 'CardController@createCard')->name('create_card');
Route::get('dashboard/card/{id}', 'CardController@show')->name('dashboard.card');
Route::post('fund_card', 'CardController@fund')->name('fund_card');
Route::post('/update_card/{card_id}/{status}', 'CardController@updateCard')->name('update_card');
Route::get('/dashboard/transactions', 'UserController@Transactions')->name('dashboard.transactions');
Route::get('/dashboard/airtime-to-cash', 'BillerController@airtime_cash')->name('dashboard.airtime-to-cash');
Route::post('submit_confirm', 'AirtimeConfirmationController@confirm')->name('submit_confirm');
Route::get('dashboard/rates', 'AirtimeConfirmationController@rates')->name('dashboard.rates');
Route::get('fetch_rates', 'AirtimeConfirmationController@fetchRate')->name('fetch_rates');
Route::get('dashboard/educational', 'BillerController@educational')->name('dashboard.educational');
Route::get('/dashboard/get_waec_reg/{serviceID}', 'BillerController@waecReg')->name('dashboard.get_waec_reg');


//Rave Payment Route
Route::match(['GET', 'POST'],'/pay', 'RaveController@initialize')->name('pay');
Route::get('/rave/callback', 'RaveController@callback')->name('callback');

});

//Admin
Route::group(['middleware' => ['App\Http\Middleware\Admin', 'App\Http\Middleware\PreventBackHistory']], function(){

Route::get('/admin/giftcards', 'AdminGiftcardController@all_giftcards')->name('admin.giftcards');
Route::get('/admin/exchange_rate', 'AdminDigitalController@index')->name('admin.exchange_rate');
Route::get('/admin/add_giftcards', 'AdminGiftcardController@index')->name('admin.add_giftcards');
Route::post('add_cat', 'AdminGiftcardController@add_cat')->name('add_cat');
Route::post('add_sub', 'AdminGiftcardController@add_sub')->name('add_sub');
Route::patch('update_pay/{id}', 'AdminDigitalController@update_pay')->name('update_pay');
Route::patch('update_pm/{id}', 'AdminDigitalController@update_pm')->name('update_pm');
Route::patch('update_cash/{id}', 'AdminDigitalController@update_cash')->name('update_cash');
Route::patch('update_payo/{id}', 'AdminDigitalController@update_payo')->name('update_payo');
Route::get('/admin/all_exchanges', 'AdminDigitalController@get_all_exchanges')->name('admin.all_exchanges');
Route::get('/admin/system-payment', 'AdminPaymentController@index')->name('admin.system-payment');
Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/notifications', 'AdminController@view_notification')->name('admin.notifications');
Route::get('/admin/airtime_exchange_log', 'AirtimeConfirmationController@index')->name('admin.airtime_exchange_log');
Route::get('approve_airtime_transfer/{id}', 'AirtimeConfirmationController@approve')->name('approve_airtime_transfer');

});
