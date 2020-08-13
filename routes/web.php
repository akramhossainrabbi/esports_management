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
Route::get('/','GuestHomeController@guestView')->name('guest.home');
Route::post('/','GuestHomeController@contactSend')->name('guest.contact');
Route::get('/privacy_policy','GuestHomeController@PrivacyPolicy')->name('guest.privacy');
Route::get('/terms_and_condition','GuestHomeController@TermsConditions')->name('guest.terms');
Route::get('/services','GuestHomeController@Services')->name('guest.services');
Route::get('/about-us','GuestHomeController@AboutUs')->name('guest.about-us');
Route::get('/login','LoginController@loginView')->name('user.login');
Route::post('/login','LoginController@logUserVarify')->name('user.logUserVarify');
Route::get('/register','RegistrationController@registrationView')->name('user.registrationView');
Route::get('/username','RegistrationController@usernameCheck')->name('user.usernameCheck');
Route::get('/email','RegistrationController@emailCheck')->name('user.emailCheck');
Route::post('/register','RegistrationController@storeUser')->name('user.storeUser');
Route::post('/user/subscribe','SubscribeController@saveSubscribe')->name('user.subscribe');

Route::get('password-reminder', [
    'uses'  => 'AuthController@showPasswordReminder',
    'as'    => 'password-reminder'
]);

Route::post('password-reminder', [
    'uses'  => 'AuthController@postPasswordReminder',
]);

Route::get('password-reminder/{id}', [
    'uses'  => 'AuthController@confirmPasswordToken',
    'as'    => 'confirm-password-token'
]);

Route::post('password-reminder/{id}', [
    'uses'  => 'AuthController@resetPasswordUpdate',
    'as'    => 'resetPasswordUpdate'
]);

Route::group(['middleware'=>['UserSess']],function (){
    Route::get('/join/{id}','HomeController@homeView')->name('user.homeView');
    Route::get('/join/match/{id}','SubmitJoiningReqController@joinView')->name('user.joinView');
    Route::post('/join/match/{id}','SubmitJoiningReqController@saveJoinReq')->name('user.saveJoinReq');
    Route::get('/play','UserHomeController@userHomeView')->name('user.userHomeView');
    Route::get('/profile','ProfileController@profileView')->name('user.profileView');
    Route::post('/profile','ProfileController@suportSend')->name('user.suportSend');
    Route::get('/result/{id}','ResultController@resultView')->name('user.resultView');
    Route::get('/result/search/{id}','ResultController@searchResult')->name('user.searchResult');
    Route::get('/transaction','TransactionController@transactionView')->name('user.transactionView');
    Route::post('/transaction','TransactionController@withDraw')->name('user.withDraw');
    Route::get('/transaction/bKash','TransactionController@addMoneyView')->name('user.addMoneyView');
    Route::post('/transaction/bKash','TransactionController@addMoney')->name('user.addMoney');
    Route::get('/wait/{id}','PlayerWaitController@waitView')->name('user.waitView');
    Route::get('/transaction/rocket','TransactionController@addRocketMoneyView')->name('user.addRocketMoneyView');
    Route::post('/transaction/rocket','TransactionController@addRocketMoney')->name('user.addRocketMoney');
    Route::get('/user/tutorial','TutorialController@tutorialCotroller')->name('user.tutorial');
    Route::get('/user/logout','LoginController@userLogout')->name('user.logout');
});

Route::get('/esport.admin.login.panel','AdminLoginController@viewAdminLogin')->name('admin.login');
Route::post('/esport.admin.login.panel','AdminLoginController@logAdminVarify')->name('admin.logAdminVarify');

Route::group(['middleware'=>['AdminSess']],function (){
    Route::get('/esport.admin.login.panel/home','AdminHomeController@homeView')->name('admin.home');
    Route::post('/esport.admin.login.panel/home','AdminHomeController@addGame')->name('admin.addGame');
    Route::get('/esport.admin.login.panel/add-admin','AddAdminController@viewAddAdmin')->name('admin.viewAddAdmin');
    Route::post('/esport.admin.login.panel/add-admin','AddAdminController@storeAdmin')->name('admin.storeAdmin');
    Route::get('/esport.admin.login.panel/logout','AdminLoginController@adminLogout')->name('admin.adminLogout');
    Route::get('/esport.admin.login.panel/add-match','MatchController@matchView')->name('admin.matchView');
    Route::post('/esport.admin.login.panel/add-match','MatchController@storeMatch')->name('admin.storeMatch');
    Route::get('/esport.admin.login.panel/match-players','MatchPlayerSearchController@matchPlayerSearchView')->name('admin.matchPlayerSearchView');
    Route::post('/esport.admin.login.panel/match-players','MatchPlayerSearchController@savePassword');
    Route::get('/esport.admin.login.panel/match-players/{id}','MatchPlayerSearchController@addKillView')->name('admin.addKillView');
    Route::post('/esport.admin.login.panel/match-players/{id}','MatchPlayerSearchController@addKillSave')->name('admin.addKillSave');
    Route::get('/esport.admin.login.panel/users','UserSearchController@userSearchView')->name('admin.userSearchView');
    Route::post('/esport.admin.login.panel/users','UserSearchController@addBalance')->name('admin.addBalance');
    Route::get('/esport.admin.login.panel/match-list','MatchController@matchList')->name('admin.matchList');
    Route::get('/esport.admin.login.panel/match-list/{id}','MatchController@deleteMatch')->name('admin.deleteMatch');
    Route::get('/esport.admin.login.panel/notification','AdminNotificationController@notificationView')->name('admin.notificationView');
    Route::get('/esport.admin.login.panel/notification/{id}','AdminNotificationController@fullNotification')->name('admin.fullNotification');
    Route::get('/esport.admin.login.panel/update-status/{uid}','AdminNotificationController@updateStatus')->name('admin.updateStatus');
    Route::get('/esport.admin.login.panel/notify','AdminNotificationController@notificationCount')->name('admin.notify');
    Route::get('/esport.admin.login.panel/game-list','AdminHomeController@gameList')->name('admin.gameList');
    Route::get('/esport.admin.login.panel/game-list/{id}','AdminHomeController@deleteGame')->name('admin.deleteGame');
    Route::get('/esport.admin.login.panel/user-list','UserListController@userList')->name('admin.userList');
    Route::get('/esport.admin.login.panel/add-news','NewsController@newsView')->name('admin.addnews');
    Route::post('/esport.admin.login.panel/add-news','NewsController@addNews')->name('admin.addnews');
    Route::get('/esport.admin.login.panel/liability','UserBalanceController@userBalanceView')->name('admin.liability');
    Route::get('/esport.admin.login.panel/message','MessageController@messageView')->name('admin.message');
});
