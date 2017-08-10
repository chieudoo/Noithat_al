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

Route::group(['namespace'=>'website'],function(){
	Route::get('/',['uses'=>'indexController@getIndex']);
	Route::group(['namespace'=>'page'],function(){
		Route::get('danh-muc/{id}-{slug}',['as'=>'danhmuc','uses'=>'pageController@getDM'])->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
		Route::get('chi-tiet/{id}-{slug}',['as'=>'chitiet','uses'=>'detailController@chitiet'])->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
		Route::get('chi-tiet-du-an/{id}-{slug}',['as'=>'ctduan','uses'=>'duanController@ctduan'])->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
	});
}); /*End route group website*/


Route::group(['namespace'=>'Login'],function(){
	Route::get('lar-login',['as'=>'getIn','uses'=>'dangnhapController@getIn']);
	Route::post('lar-login',['as'=>'postIn','uses'=>'dangnhapController@postIn']);

	Route::get('lar-logout',['uses'=>'dangnhapController@logout']);
});
Route::group(['middleware'=>'guest'],function(){
	Route::group(['namespace'=>'quantri'],function(){
		Route::get('wine-admin',['as'=>'quantri','uses'=>'indexController@index']);
		Route::group(['namespace'=>'danhmuc'],function(){
			Route::get('wine-danh-muc',['as'=>'danhmuc','uses'=>'cateController@getCate']);
			Route::post('wine-danh-muc',['as'=>'pdanhmuc','uses'=>'cateController@postCate']);
			Route::get('data-danh-muc',['uses'=>'cateController@getDataCate']);//get data use api

            Route::post('sua-danh-muc/{id}',['as'=>'postdanhmuc','uses'=>'cateController@postEdit'])->where('id','[0-9]+');
            Route::post('xoa-danh-muc/{id}',['as'=>'delcate','uses'=>'cateController@Delete'])->where('id','[0-9]+');
            Route::get('data-cate-one/{id}',['uses'=>'cateController@getDataEditCate'])->where('id','[0-9]+');//get data edit use api 
		}); /*end route group danh muc*/

		Route::group(['namespace'=>'sanpham'],function(){
			Route::get('wine-san-pham',['as'=>'sanpham','uses'=>'proController@getPro']);
			Route::post('wine-san-pham',['as'=>'addsanpham','uses'=>'proController@postPro']);

			Route::get('wine-chi-tiet-san-pham/{id}',['uses'=>'detailController@getDetail'])->where('id','[0-9]+');
			Route::post('wine-chi-tiet-san-pham/{id}',['uses'=>'detailController@postDetail'])->where('id','[0-9]+');

			Route::get('wine-xoa-san-pham/{id}',['uses'=>'proController@getDelete'])->where('id','[0-9]+');
		}); /*end route group san pham*/

		Route::group(['namespace'=>'duan'],function(){
			Route::get('wine-du-an',['as'=>'duan','uses'=>'duanController@getDuan']);
			Route::post('wine-du-an',['uses'=>'duanController@postDuan']);

			Route::get('wine-chi-tiet-du-an/{id}',['uses'=>'duanController@getDetail'])->where('id','[0-9]+');
			Route::post('wine-chi-tiet-du-an/{id}',['uses'=>'duanController@postDetail'])->where('id','[0-9]+');

			Route::get('wine-xoa-du-an/{id}',['uses'=>'duanController@getDelete'])->where('id','[0-9]+');
		}); /*end route group du an*/

		Route::group(['namespace'=>'slide'],function(){
			Route::get('wine-slide',['as'=>'slide','uses'=>'slideController@getSlide']);
			Route::post('wine-slide',['uses'=>'slideController@postSlide']);

			Route::get('wine-chi-tiet-slide/{id}',['uses'=>'slideController@getDetail'])->where('id','[0-9]+');
			Route::post('wine-chi-tiet-slide/{id}',['uses'=>'slideController@postDetail'])->where('id','[0-9]+');

			Route::get('wine-xoa-slide/{id}',['uses'=>'slideController@getDelete'])->where('id','[0-9]+');
		}); /*end route group slide*/

		Route::group(['namespace'=>'about'],function(){
			Route::get('wine-about',['as'=>'about','uses'=>'aboutController@getAbout']);
			Route::post('wine-about/{id}',['uses'=>'aboutController@postAbout'])->where('id','[0-9]+');
		}); /*end route group about*/

		Route::group(['namespace'=>'daily'],function(){
			Route::get('wine-dai-ly',['as'=>'daily','uses'=>'dailyController@getDaily']);
			Route::post('wine-dai-ly',['uses'=>'dailyController@postDaily']);
			Route::post('wine-sua-dai-ly/{id}',['uses'=>'dailyController@postEdit'])->where('id','[0-9]+');
			Route::get('wine-xoa-dai-ly/{id}',['uses'=>'dailyController@getDelete'])->where('id','[0-9]+');
		}); /*end route group about*/

		Route::group(['namespace'=>'lienhe'],function(){
			Route::get('wine-lien-he',['as'=>'lienhe','uses'=>'lienheController@getLienhe']);
			Route::post('wine-lien-he',['uses'=>'lienheController@postLienhe']);
		}); /*end route group about*/

		Route::group(['namespace'=>'youtube'],function(){
			Route::get('wine-video',['as'=>'youtube','uses'=>'youController@getYou']);
			Route::post('wine-video',['uses'=>'youController@postYou']);
			Route::get('wine-xoa-video/{id}',['uses'=>'youController@getDelete'])->where('id','[0-9]+');
		}); /*end route group youtube*/

		Route::group(['namespace'=>'user'],function(){
			Route::get('wine-users',['as'=>'users','uses'=>'userController@getU']);
			Route::post('wine-users',['uses'=>'userController@postU']);
			Route::post('wine-sua-user/{id}',['uses'=>'userController@postEdit'])->where('id','[0-9]+');
			Route::get('wine-sua-user/{id}',['uses'=>'userController@getEdit'])->where('id','[0-9]+');
			Route::get('wine-xoa-user/{id}',['uses'=>'userController@getDelete'])->where('id','[0-9]+');
		}); /*end route group user*/
	});
}); /*Route group quan tri*/


