# Zadanie rekrutacyjne

[Setup mojego rozwiązania](setup.md)

### Routes
```
  GET|HEAD        / ........................................................................................................... 
  GET|HEAD        _debugbar/assets/javascript ..................... debugbar.assets.js › Barryvdh\Debugbar › AssetController@js 
  GET|HEAD        _debugbar/assets/stylesheets .................. debugbar.assets.css › Barryvdh\Debugbar › AssetController@css 
  DELETE          _debugbar/cache/{key}/{tags?} ............ debugbar.cache.delete › Barryvdh\Debugbar › CacheController@delete 
  GET|HEAD        _debugbar/clockwork/{id} ........... debugbar.clockwork › Barryvdh\Debugbar › OpenHandlerController@clockwork 
  GET|HEAD        _debugbar/open ...................... debugbar.openhandler › Barryvdh\Debugbar › OpenHandlerController@handle 
  POST            _ignition/execute-solution .....ignition.executeSolution › Spatie\LaravelIgnition › ExecuteSolutionController 
  GET|HEAD        _ignition/health-check ................ ignition.healthCheck › Spatie\LaravelIgnition › HealthCheckController 
  POST            _ignition/update-config ............. ignition.updateConfig › Spatie\LaravelIgnition › UpdateConfigController 
  GET|HEAD        api/books ................................................ api.books.index › Api\Library\BookController@index 
  POST            api/books ................................................ api.books.store › Api\Library\BookController@store 
  GET|HEAD        api/books/{book} ........................................... api.books.show › Api\Library\BookController@show 
  PUT|PATCH       api/books/{book} ....................................... api.books.update › Api\Library\BookController@update 
  DELETE          api/books/{book} ..................................... api.books.destroy › Api\Library\BookController@destroy 
  GET|HEAD        api/user ............................................................................................... api. 
  GET|HEAD        books ........................................................ books.index › Web\Library\BookController@index 
  POST            books ........................................................ books.store › Web\Library\BookController@store  
  GET|HEAD        books/create ............................................... books.create › Web\Library\BookController@create  
  GET|HEAD        books/{book} ................................................... books.show › Web\Library\BookController@show  
  PUT|PATCH       books/{book} ............................................... books.update › Web\Library\BookController@update  
  DELETE          books/{book} ............................................. books.destroy › Web\Library\BookController@destroy  
  GET|HEAD        books/{book}/edit .............................................. books.edit › Web\Library\BookController@edit  
  GET|HEAD        confirm-password ................................. password.confirm › Auth\ConfirmablePasswordController@show  
  POST            confirm-password ................................................... Auth\ConfirmablePasswordController@store  
  GET|HEAD        dashboard ......................................................................................... dashboard  
  POST            email/verification-notification ...... verification.send › Auth\EmailVerificationNotificationController@store  
  GET|HEAD        forgot-password .................................. password.request › Auth\PasswordResetLinkController@create  
  POST            forgot-password ..................................... password.email › Auth\PasswordResetLinkController@store  
  GET|HEAD        login .................................................... login › Auth\AuthenticatedSessionController@create  
  POST            login ............................................................. Auth\AuthenticatedSessionController@store  
  POST            logout ................................................. logout › Auth\AuthenticatedSessionController@destroy  
  PUT             password ................................................... password.update › Auth\PasswordController@update  
  GET|HEAD        profile ............................................................... profile.edit › ProfileController@edit  
  PATCH           profile ........................................................... profile.update › ProfileController@update  
  DELETE          profile ......................................................... profile.destroy › ProfileController@destroy  
  GET|HEAD        register .................................................... register › Auth\RegisteredUserController@create  
  POST            register ................................................................ Auth\RegisteredUserController@store  
  POST            reset-password ............................................ password.store › Auth\NewPasswordController@store  
  GET|HEAD        reset-password/{token} ................................... password.reset › Auth\NewPasswordController@create  
  GET|HEAD        sanctum/csrf-cookie ....................... sanctum.csrf-cookie › Laravel\Sanctum › CsrfCookieController@show  
  GET|HEAD        verify-email ................................... verification.notice › Auth\EmailVerificationPromptController  
  GET|HEAD        verify-email/{id}/{hash} ................................... verification.verify › Auth\VerifyEmailController
```
