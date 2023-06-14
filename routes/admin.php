<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChilCategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/admin-login', [LoginController::class, 'adminLogin'])->name('admin.login');

// Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['middleware'=>'is_admin'] ,function () { 
    Route::get('/admin/home', [AdminController::class, 'admin'])->name('admin.home');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/password/change', [AdminController::class, 'passwordchange'])->name('admin.passwordchange');
    Route::post('/admin/password/change', [AdminController::class, 'updatePassword'])->name('admin.update');
   
    
    Route::group(['prefix'=>'category'] ,function () {
      Route::get('/', [CategoryController::class, 'index'])->name('category.index');
      Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
      Route::get('/delete/{id}', [CategoryController::class, 'destory'])->name('category.delete');
      Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit'); 
      Route::post('/update', [CategoryController::class, 'update'])->name('category.update'); 
     });

     Route::group(['prefix'=>'subcategory'] ,function () {
      Route::get('/', [SubCategoryController::class, 'index'])->name('subcategory.index');
      Route::post('/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
       Route::get('/delete/{id}', [SubCategoryController::class, 'destory'])->name('subcategory.delete');
       Route::get('/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit'); 
       Route::post('/update', [SubCategoryController::class, 'update'])->name('subcategory.update'); 
     });

     Route::group(['prefix'=>'chailcategory'] ,function () {
      Route::get('/', [ChilCategoryController::class, 'index'])->name('chailcategory.index');
      Route::post('/store', [ChilCategoryController::class, 'store'])->name('chailcategory.store');
       Route::get('/delete/{id}', [ChilCategoryController::class, 'destory'])->name('chailcategory.delete');
       Route::get('/edit/{id}', [ChilCategoryController::class, 'edit'])->name('chailcategory.edit'); 
      //  Route::post('/update', [ChilCategoryController::class, 'update'])->name('chailcategory.update'); 
     });

     Route::group(['prefix'=>'brand'] ,function () {
      Route::get('/', [BrandController::class, 'index'])->name('brand.index');
      Route::post('/store', [BrandController::class, 'store'])->name('brand.store');
        Route::get('/delete/{id}', [BrandController::class, 'destory'])->name('brand.delete');
       Route::get('/edit/{id}', [BrandController::class, 'edit']); 
       Route::post('/update', [BrandController::class, 'update'])->name('brand.update'); 
     });

      //warehouse routes
	Route::group(['prefix'=>'warehouse'], function(){
		Route::get('/',[WarehouseController::class,'index'])->name('warehouse.index');
		Route::post('/store',[WarehouseController::class,'store'])->name('warehouse.store');
		Route::get('/delete/{id}',[WarehouseController::class,'destroy'])->name('warehouse.delete');
		Route::get('/edit/{id}',[WarehouseController::class,'edit']);
		Route::post('/update',[WarehouseController::class,'update'])->name('warehouse.update');
	});


  //    //product routes
	// Route::group(['prefix'=>'product'], function(){
	// 	Route::get('/','ProductController@index')->name('product.index');
	// 	Route::get('/create','ProductController@create')->name('product.create');
	// 	Route::post('/store','ProductController@store')->name('product.store');
	// 	Route::get('/delete/{id}','ProductController@destroy')->name('product.delete');
	// 	Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
	// 	Route::post('/update','ProductController@update')->name('product.update');
	// 	Route::get('/active-featured/{id}','ProductController@activefeatured');
	// 	Route::get('/not-featured/{id}','ProductController@notfeatured');
	// 	Route::get('/active-deal/{id}','ProductController@activedeal');
	// 	Route::get('/not-deal/{id}','ProductController@notdeal');
	// 	Route::get('/active-status/{id}','ProductController@activestatus');
	// 	Route::get('/not-status/{id}','ProductController@notstatus');
	// });

	//Coupon Routes
	Route::group(['prefix'=>'coupon'], function(){
		Route::get('/',[CouponController::class,'index'])->name('coupon.index');
		Route::post('/store',[CouponController::class,'store'])->name('store.coupon');
		Route::delete('/delete/{id}',[CouponController::class,'destroy'])->name('coupon.delete');
		Route::get('/edit/{id}',[CouponController::class,'edit']);
		Route::post('/update',[CouponController::class,'update'])->name('update.coupon');
	});

	// //Campaign Routes
	// Route::group(['prefix'=>'campaign'], function(){
	// 	Route::get('/','CampaignController@index')->name('campaign.index');
	// 	Route::post('/store','CampaignController@store')->name('campaign.store');
	// 	Route::get('/delete/{id}','CampaignController@destroy')->name('campaign.delete');
	// 	Route::get('/edit/{id}','CampaignController@edit');
	// 	Route::post('/update','CampaignController@update')->name('campaign.update');
	// });

	// //__campaign product routes__//
	// Route::group(['prefix'=>'campaign-product'], function(){
	// 	Route::get('/{campaign_id}','CampaignController@campaignProduct')->name('campaign.product');
	// 	Route::get('/add/{id}/{campaign_id}','CampaignController@ProductAddToCampaign')->name('add.product.to.campaign');
	// 	Route::get('/list/{campaign_id}','CampaignController@ProductListCampaign')->name('campaign.product.list');
	// 	Route::get('/remove/{id}','CampaignController@RemoveProduct')->name('product.remove.campaign');
	// 	// Route::post('/update','CampaignController@update')->name('campaign.update');
	// });

	// //__order 
	// Route::group(['prefix'=>'order'], function(){
	// 	Route::get('/','OrderController@index')->name('admin.order.index');
	// 	// Route::post('/store','CampaignController@store')->name('campaign.store');
	// 	Route::get('/admin/edit/{id}','OrderController@Editorder');
	// 	Route::post('/update/order/status','OrderController@updateStatus')->name('update.order.status');
	// 	Route::get('/view/admin/{id}','OrderController@ViewOrder');
	// 	Route::get('/delete/{id}','OrderController@delete')->name('order.delete');
		 
	// });

     //setting

     Route::group(['prefix'=>'setting'] ,function () {
      //seo setting
      Route::group(['prefix'=>'seo'] ,function () {
        Route::get('/', [SettingController::class, 'seo'])->name('seo.setting');
        Route::post('/update/{id}', [SettingController::class, 'seoupdate'])->name('seo.setting.update');
        });

         //smtp setting
      Route::group(['prefix'=>'smtp'] ,function () {
        Route::get('/', [SettingController::class, 'smtp'])->name('smtp.setting');
        Route::post('/update/{id}', [SettingController::class, 'smtpupdate'])->name('smtp.setting.update');
        });

        //pages create
        Route::group(['prefix'=>'page'] ,function () {
          Route::get('/', [PageController::class, 'index'])->name('page.index');
          Route::post('/update/{id}', [PageController::class, 'pageupdate'])->name('page.update');
          Route::get('/edit/{id}', [PageController::class, 'edit'])->name('page.edit');
          Route::get('/create', [PageController::class, 'create'])->name('page.create');
          Route::get('/delete/{id}', [PageController::class, 'destory'])->name('page.delete');
          Route::post('/store', [PageController::class, 'store'])->name('page.store');
         });

         //web sitting

      Route::group(['prefix'=>'web'] ,function () {
        Route::get('/', [SettingController::class, 'web'])->name('web.setting');
        Route::post('/update/{id}', [SettingController::class, 'webupdate'])->name('web.setting.update');
        });
       
    
    });

   
    //Pickup Point
		// Route::group(['prefix'=>'pickup-point'], function(){
		// 	Route::get('/','PickupController@index')->name('pickuppoint.index');
		// 	Route::post('/store','PickupController@store')->name('store.pickup.point');
		// 	Route::delete('/delete/{id}','PickupController@destroy')->name('pickup.point.delete');
		// 	Route::get('/edit/{id}','PickupController@edit');
		// 	Route::post('/update','PickupController@update')->name('update.pickup.point');
	  //   });


	  //   //Ticket 
		// Route::group(['prefix'=>'ticket'], function(){
		// 	Route::get('/','TicketController@index')->name('ticket.index');
		// 	Route::get('/ticket/show/{id}','TicketController@show')->name('admin.ticket.show');
		// 	Route::post('/ticket/reply','TicketController@ReplyTicket')->name('admin.store.reply');
		// 	Route::get('/ticket/close/{id}','TicketController@CloseTicket')->name('admin.close.ticket');
		// 	Route::delete('/ticket/delete/{id}','TicketController@destroy')->name('admin.ticket.delete');
			
	  //   });

		// //Blog category
	  //   Route::group(['prefix'=>'blog-category'], function(){
		// 	Route::get('/','BlogController@index')->name('admin.blog.category');
		// 	Route::post('/store','BlogController@store')->name('blog.category.store');
		// 	Route::get('/delete/{id}','BlogController@destroy')->name('blog.category.delete');
		// 	Route::get('/edit/{id}','BlogController@edit');
		// 	Route::post('/update','BlogController@update')->name('blog.category.update');
		// });

	  //   //__role create__
	  //   Route::group(['prefix'=>'role'], function(){
		// 	Route::get('/','RoleController@index')->name('manage.role');
		// 	Route::get('/create','RoleController@create')->name('create.role');
		// 	Route::post('/store','RoleController@store')->name('store.role');
		// 	Route::get('/delete/{id}','RoleController@destroy')->name('role.delete');
		// 	Route::get('/edit/{id}','RoleController@edit')->name('role.edit');
		// 	Route::post('/update','RoleController@update')->name('update.role');
		// });

	  //   //__report routes__//
	  //   Route::group(['prefix'=>'report'], function(){
		// 	Route::get('/order','OrderController@Reportindex')->name('report.order.index');
		// 	Route::get('/order/print','OrderController@ReportOrderPrint')->name('report.order.print');
			
		// });


});