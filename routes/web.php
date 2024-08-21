<?php
Route::get('sub-menu/demo', 'Frontend\FrontController@demo');

Route::get('/cache_clear', function(){
	try {
		Artisan::call('config:cache');
		Artisan::call('config:clear');
		Artisan::call('view:clear');
		Artisan::call('route:clear');
		Artisan::call('cache:clear');
	} catch(\Exception $e) {
		dd($e);
	}
});

Route::get('/language/{language}',function($language){
	Session::put('language',$language);
	return redirect()->back();
})->name('language');

// Frontend
Route::get('/','Frontend\FrontController@index');
Route::get('/about-us','Frontend\FrontController@aboutUs')->name('frontend.about-us');
Route::get('/services','Frontend\FrontController@ourServices')->name('frontend.our-services');
Route::get('/service-details/{id}','Frontend\FrontController@ourServicesDetails')->name('frontend.our-services.details');
Route::get('/works','Frontend\FrontController@ourWorks')->name('frontend.our-works');
Route::get('/work-details/{id}','Frontend\FrontController@ourWorksDetails')->name('frontend.our-works.details');
Route::get('/specialists','Frontend\FrontController@ourSpecialist')->name('frontend.our-specialist');
Route::get('/contact-us','Frontend\FrontController@contactUs')->name('frontend.contact-us');
Route::post('/contact-store','Frontend\FrontController@contactStore')->name('frontend.contact-store');
Route::get('/how-we-work','Frontend\FrontController@howWeWork')->name('frontend.how-we-work');

Route::get('sub-menu/{menu_url}', 'Frontend\FrontController@MenuUrl')->name('menu_url')->where('menu_url', '.*');

//Reset Password
Route::get('reset/password','Backend\PasswordResetController@resetPassword')->name('reset.password');
Route::post('check/email','Backend\PasswordResetController@checkEmail')->name('check.email');
Route::get('check/name','Backend\PasswordResetController@checkName')->name('check.name');
Route::get('check/code','Backend\PasswordResetController@checkCode')->name('check.code');
Route::post('submit/check/code','Backend\PasswordResetController@submitCode')->name('submit.check.code');
Route::get('new/password','Backend\PasswordResetController@newPassword')->name('new.password');
Route::post('store/new/password','Backend\PasswordResetController@newPasswordStore')->name('store.new.password');

Auth::routes();

Route::middleware(['auth'])->group(function(){

	Route::get('/home', 'Backend\HomeController@index')->name('dashboard');

	Route::group(['middleware'=>['permission']],function(){

		Route::prefix('menu')->group(function(){
			Route::get('/view', 'Backend\Menu\MenuController@index')->name('menu');
			Route::get('/add', 'Backend\Menu\MenuController@add')->name('menu.add');
			Route::post('/store', 'Backend\Menu\MenuController@store')->name('menu.store');
			Route::get('/edit/{id}', 'Backend\Menu\MenuController@edit')->name('menu.edit');
			Route::post('/update/{id}','Backend\Menu\MenuController@update')->name('menu.update');
			Route::get('/subparent','Backend\Menu\MenuController@getSubParent')->name('menu.getajaxsubparent');

			Route::get('/icon','Backend\Menu\MenuIconController@index')->name('menu.icon');
			Route::post('icon/store','Backend\Menu\MenuIconController@store')->name('menu.icon.store');
			Route::get('icon/edit','Backend\Menu\MenuIconController@edit')->name('menu.icon.edit');
			Route::post('icon/update/{id}','Backend\Menu\MenuIconController@update')->name('menu.icon.update');
			Route::post('icon/delete','Backend\Menu\MenuIconController@delete')->name('menu.icon.delete');
		});

		Route::post('/data/statuschange', 'Backend\DefaultController@statusChange')->name('table.status.change');
		Route::post('/data/delete', 'Backend\DefaultController@delete')->name('table.data.delete');
		Route::get('/sub/menu', 'Backend\DefaultController@SubMenu')->name('table.data.submenu');
		Route::get('get-photo-folder', 'Backend\DefaultController@photoFolder')->name('get-photo-folder');

		Route::prefix('user')->group(function(){
			Route::get('/','UserController@index')->name('user');
			Route::get('/add','UserController@userAdd')->name('user.add');
			Route::post('/store','UserController@userStore')->name('user.store');
			Route::get('/edit/{id}','UserController@userEdit')->name('user.edit');
			Route::post('/update/{id}','UserController@updateUser')->name('user.update');
			Route::get('/delete','UserController@deleteUser')->name('user.delete');

			Route::get('/role','Backend\Menu\RoleController@index')->name('user.role');
			Route::post('/role/store','Backend\Menu\RoleController@storeRole')->name('user.role.store');
			Route::get('/role/edit','Backend\Menu\RoleController@getRole')->name('user.role.edit');
			Route::post('/role/update/{id}','Backend\Menu\RoleController@updateRole')->name('user.role.update');
			Route::post('/role/delete','Backend\Menu\RoleController@deleteRole')->name('user.role.delete');

			Route::get('/permission','Backend\Menu\MenuPermissionController@index')->name('user.permission');
			Route::get('/permission/store','Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');
		});

		Route::prefix('profile-management')->group(function(){
			//Change Password
			Route::get('change/password','Backend\PasswordChangeController@changePassword')->name('profile-management.change.password');
			Route::post('store/password','Backend\PasswordChangeController@storePassword')->name('profile-management.store.password');
			//Profile
			Route::get('change/profile','Backend\PasswordChangeController@changeProfile')->name('profile-management.change.profile');
			Route::post('store/profile','Backend\PasswordChangeController@storeProfile')->name('profile-management.store.profile');
		});

		Route::prefix('site-setting')->group(function(){
			//test page
			Route::get('test/page','Backend\PasswordChangeController@changePassword')->name('site-setting.test.page');

		});

		Route::prefix('frontend-menu')->group(function(){
			//Post
			Route::get('/post/view', 'Backend\Post\PostController@view')->name('frontend-menu.post.view');
	        Route::get('/post/add','Backend\Post\PostController@add')->name('frontend-menu.post.add');
			Route::post('/post/store','Backend\Post\PostController@store')->name('frontend-menu.post.store');
			Route::get('/post/edit/{id}','Backend\Post\PostController@edit')->name('frontend-menu.post.edit');
			Route::post('/post/update/{id}','Backend\Post\PostController@update')->name('frontend-menu.post.update');
	        Route::get('/post/delete', 'Backend\Post\PostController@delete')->name('frontend-menu.post.delete');
			Route::get('/post/file-delete','Backend\Post\PostController@fileDelete')->name('frontend-menu.post.file.delete');
	        //Frontend Menu
	        Route::get('/menu/view', 'Backend\Post\FrontendMenuController@view')->name('frontend-menu.menu.view');
	        Route::get('/menu/add','Backend\Post\FrontendMenuController@add')->name('frontend-menu.menu.add');
			Route::post('/menu/single/store','Backend\Post\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
			Route::post('/menu/store','Backend\Post\FrontendMenuController@store')->name('frontend-menu.menu.store');
			Route::get('/menu/edit/{id}','Backend\Post\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
			Route::post('/menu/update/{id}','Backend\Post\FrontendMenuController@update')->name('frontend-menu.menu.update');
	        Route::get('/menu/delete', 'Backend\Post\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');
		});

		Route::prefix('homepages')->group(function(){
			//Slider
			Route::get('/service/view','Backend\Homepage\ServiceController@serviceView')->name('homepages.service.view');
			Route::get('/service/add','Backend\Homepage\ServiceController@serviceAdd')->name('homepages.service.add');
			Route::post('/service/store','Backend\Homepage\ServiceController@serviceStore')->name('homepages.service.store');
			Route::get('/service/edit/{id}','Backend\Homepage\ServiceController@serviceEdit')->name('homepages.service.edit');
			Route::post('/service/update/{id}','Backend\Homepage\ServiceController@serviceUpdate')->name('homepages.service.update');
			Route::get('/service/delete','Backend\Homepage\ServiceController@serviceDelete')->name('homepages.service.delete');

			// Portfolio
			Route::get('/work/view','Backend\Homepage\WorkController@workView')->name('homepages.work.view');
			Route::get('/work/add','Backend\Homepage\WorkController@workAdd')->name('homepages.work.add');
			Route::post('/work/store','Backend\Homepage\WorkController@workStore')->name('homepages.work.store');
			Route::get('/work/edit/{id}','Backend\Homepage\WorkController@workEdit')->name('homepages.work.edit');
			Route::post('/work/update/{id}','Backend\Homepage\WorkController@workUpdate')->name('homepages.work.update');
			Route::get('/work/delete','Backend\Homepage\WorkController@workDelete')->name('homepages.work.delete');

			//About Us
			Route::get('/about/view','Backend\Homepage\AboutController@aboutView')->name('homepages.about.view');
			Route::get('/about/add','Backend\Homepage\AboutController@aboutAdd')->name('homepages.about.add');
			Route::post('/about/store','Backend\Homepage\AboutController@aboutStore')->name('homepages.about.store');
			Route::get('/about/edit/{id}','Backend\Homepage\AboutController@aboutEdit')->name('homepages.about.edit');
			Route::post('/about/update/{id}','Backend\Homepage\AboutController@aboutUpdate')->name('homepages.about.update');
			Route::get('/about/delete','Backend\Homepage\AboutController@aboutDelete')->name('homepages.about.delete');
			//Blog
			Route::get('/blog/view','Backend\Homepage\BlogController@blogView')->name('homepages.blog.view');
			Route::get('/blog/add','Backend\Homepage\BlogController@blogAdd')->name('homepages.blog.add');
			Route::post('/blog/store','Backend\Homepage\BlogController@blogStore')->name('homepages.blog.store');
			Route::get('/blog/edit/{id}','Backend\Homepage\BlogController@blogEdit')->name('homepages.blog.edit');
			Route::post('/blog/update/{id}','Backend\Homepage\BlogController@blogUpdate')->name('homepages.blog.update');
			Route::get('/blog/delete','Backend\Homepage\BlogController@blogDelete')->name('homepages.blog.delete');
			Route::get('/blog-file/delete','Backend\Homepage\BlogController@blogFileDelete')->name('homepages.blog.file.delete');
			//Contact Us
			Route::get('/contact/view','Backend\Homepage\ContactController@contactView')->name('homepages.contact.view');
			Route::get('/contact/add','Backend\Homepage\ContactController@contactAdd')->name('homepages.contact.add');
			Route::post('/contact/store','Backend\Homepage\ContactController@contactStore')->name('homepages.contact.store');
			Route::get('/contact/edit/{id}','Backend\Homepage\ContactController@contactEdit')->name('homepages.contact.edit');
			Route::post('/contact/update/{id}','Backend\Homepage\ContactController@contactUpdate')->name('homepages.contact.update');
			Route::get('/contact/delete','Backend\Homepage\ContactController@contactDelete')->name('homepages.contact.delete');
			//Faq
			Route::get('/team/view','Backend\Homepage\TeamController@teamView')->name('homepages.team.view');
			Route::get('/team/add','Backend\Homepage\TeamController@teamAdd')->name('homepages.team.add');
			Route::post('/team/store','Backend\Homepage\TeamController@teamStore')->name('homepages.team.store');
			Route::get('/team/edit/{id}','Backend\Homepage\TeamController@teamEdit')->name('homepages.team.edit');
			Route::post('/team/update/{id}','Backend\Homepage\TeamController@teamUpdate')->name('homepages.team.update');
			Route::get('/team/delete','Backend\Homepage\TeamController@teamDelete')->name('homepages.team.delete');
			//Notice
			Route::get('/partner/view','Backend\Homepage\PartnerController@partnerView')->name('homepages.partner.view');
			Route::get('/partner/add','Backend\Homepage\PartnerController@partnerAdd')->name('homepages.partner.add');
			Route::post('/partner/store','Backend\Homepage\PartnerController@partnerStore')->name('homepages.partner.store');
			Route::get('/partner/edit/{id}','Backend\Homepage\PartnerController@partnerEdit')->name('homepages.partner.edit');
			Route::post('/partner/update/{id}','Backend\Homepage\PartnerController@partnerUpdate')->name('homepages.partner.update');
			Route::get('/partner/delete','Backend\Homepage\PartnerController@partnerDelete')->name('homepages.partner.delete');
			//How We Work
			Route::get('/how-work/view','Backend\Homepage\PartnerController@howWorkView')->name('homepages.how-work.view');
			Route::get('/how-work/add','Backend\Homepage\PartnerController@howWorkAdd')->name('homepages.how-work.add');
			Route::post('/how-work/store','Backend\Homepage\PartnerController@howWorkStore')->name('homepages.how-work.store');
			Route::get('/how-work/edit/{id}','Backend\Homepage\PartnerController@howWorkEdit')->name('homepages.how-work.edit');
			Route::post('/how-work/update/{id}','Backend\Homepage\PartnerController@howWorkUpdate')->name('homepages.how-work.update');
			Route::get('/how-work/delete','Backend\Homepage\PartnerController@howWorkDelete')->name('homepages.how-work.delete');
			//Performance
			Route::get('/performance/view','Backend\Homepage\PartnerController@performanceView')->name('homepages.performance.view');
			Route::get('/performance/add','Backend\Homepage\PartnerController@performanceAdd')->name('homepages.performance.add');
			Route::post('/performance/store','Backend\Homepage\PartnerController@performanceStore')->name('homepages.performance.store');
			Route::get('/performance/edit/{id}','Backend\Homepage\PartnerController@performanceEdit')->name('homepages.performance.edit');
			Route::post('/performance/update/{id}','Backend\Homepage\PartnerController@performanceUpdate')->name('homepages.performance.update');
			Route::get('/performance/delete','Backend\Homepage\PartnerController@performanceDelete')->name('homepages.performance.delete');
		});

		Route::prefix('galleries')->group(function(){
			//Photo Folder
			Route::get('/folder/view','Backend\Gallery\PhotoFolderController@folderView')->name('galleries.folder.view');
			Route::get('/folder/add','Backend\Gallery\PhotoFolderController@folderAdd')->name('galleries.folder.add');
			Route::post('/folder/store','Backend\Gallery\PhotoFolderController@folderStore')->name('galleries.folder.store');
			Route::get('/folder/edit/{id}','Backend\Gallery\PhotoFolderController@folderEdit')->name('galleries.folder.edit');
			Route::post('/folder/update/{id}','Backend\Gallery\PhotoFolderController@folderUpdate')->name('galleries.folder.update');
			Route::post('/folder/delete','Backend\Gallery\PhotoFolderController@folderDelete')->name('galleries.folder.delete');
			//Photo Gallery
			Route::get('/photo/view','Backend\Gallery\PhotoGalleryController@photoView')->name('galleries.photo.view');
			Route::get('/photo/add','Backend\Gallery\PhotoGalleryController@photoAdd')->name('galleries.photo.add');
			Route::post('/photo/store','Backend\Gallery\PhotoGalleryController@photoStore')->name('galleries.photo.store');
			Route::get('/photo/edit/{id}','Backend\Gallery\PhotoGalleryController@photoEdit')->name('galleries.photo.edit');
			Route::get('/photo/details/{id}','Backend\Gallery\PhotoGalleryController@photoDetails')->name('galleries.photo.details');
			Route::post('/photo/update/{id}','Backend\Gallery\PhotoGalleryController@photoUpdate')->name('galleries.photo.update');
			Route::post('/photo/status/{id}','Backend\Gallery\PhotoGalleryController@photoStatus')->name('galleries.photo.status');
			Route::get('/photo/delete','Backend\Gallery\PhotoGalleryController@photoDelete')->name('galleries.photo.delete');
			Route::get('/photo/details-delete','Backend\Gallery\PhotoGalleryController@photoDetailsDelete')->name('galleries.photo.details.delete');
			//Video Gallery
			Route::get('/video/view','Backend\Gallery\VideoGalleryController@videoView')->name('galleries.video.view');
			Route::get('/video/add','Backend\Gallery\VideoGalleryController@videoAdd')->name('galleries.video.add');
			Route::post('/video/store','Backend\Gallery\VideoGalleryController@videoStore')->name('galleries.video.store');
			Route::get('/video/edit/{id}','Backend\Gallery\VideoGalleryController@videoEdit')->name('galleries.video.edit');
			Route::post('/video/update/{id}','Backend\Gallery\VideoGalleryController@videoUpdate')->name('galleries.video.update');
			Route::get('/video/delete','Backend\Gallery\VideoGalleryController@videoDelete')->name('galleries.video.delete');
			//Audio Gallery
			Route::get('/audio/view','Backend\Gallery\AudioGalleryController@audioView')->name('galleries.audio.view');
			Route::get('/audio/add','Backend\Gallery\AudioGalleryController@audioAdd')->name('galleries.audio.add');
			Route::post('/audio/store','Backend\Gallery\AudioGalleryController@audioStore')->name('galleries.audio.store');
			Route::get('/audio/edit/{id}','Backend\Gallery\AudioGalleryController@audioEdit')->name('galleries.audio.edit');
			Route::post('/audio/update/{id}','Backend\Gallery\AudioGalleryController@audioUpdate')->name('galleries.audio.update');
			Route::get('/audio/delete','Backend\Gallery\AudioGalleryController@audioDelete')->name('galleries.audio.delete');
		});

		Route::prefix('communicates')->group(function(){
			//Communicate
			Route::get('/communicate/view','Backend\Communicate\CommunicateController@communicateView')->name('communicates.communicate.view');
			Route::get('/communicate/edit/{id}','Backend\Communicate\CommunicateController@communicateEdit')->name('communicates.communicate.edit');
			Route::post('/communicate/update/{id}','Backend\Communicate\CommunicateController@communicateUpdate')->name('communicates.communicate.update');
			//Comments
			Route::get('/comment/view','Backend\Communicate\CommunicateController@commentView')->name('communicates.comment.view');
			Route::get('/comment/approve/{id}','Backend\Communicate\CommunicateController@commentApprove')->name('communicates.comment.approve');
			Route::post('/comment/approve/{id}','Backend\Communicate\CommunicateController@commentStore')->name('communicates.comment.approve.store');
			Route::get('/comment/delete','Backend\Communicate\CommunicateController@commentDelete')->name('communicates.comment.delete');
			Route::get('/comment/reply/{id}','Backend\Communicate\CommunicateController@commentReply')->name('communicates.comment.reply');
			Route::post('/comment/reply/{id}','Backend\Communicate\CommunicateController@replyStore')->name('communicates.comment.reply.store');
			Route::post('/sub-comment/store/{id}','Backend\Communicate\CommunicateController@subCommentStore')->name('communicates.sub.comment.store');
			Route::get('/sub-comment/delete','Backend\Communicate\CommunicateController@subCommentDelete')->name('communicates.sub.comment.detele');
			//NewsLetter
			Route::get('/letter/view','Backend\Communicate\CommunicateController@letterView')->name('communicates.letter.view');
			Route::get('/letter/delete','Backend\Communicate\CommunicateController@letterDelete')->name('communicates.letter.delete');
		});

	});
});
