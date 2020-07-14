<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('products', 'ProductController');//->middleware('auth');


/* Route::delete('products/{id}', 'ProductController@destroy')->name('products.destroy');
Route::put('products/{id}', 'ProductController@update')->name('products.update');
Route::get('products/{id}/edit', 'ProductController@edit')->name('products.edit');
Route::get('products/create', 'ProductController@create')->name('products.create');
Route::get('products/{id}', 'ProductController@show')->name('products.show');
Route::get('products', 'ProductController@index')->name('products.index');
Route::post('products', 'ProductController@store')->name('products.store'); */


//Rota com controller
/* Route::middleware([])->group(function () {

    Route::prefix('admin')->group(function () {
        
        Route::namespace('Admin')->group(function () {

            Route::name('admin.')->group(function () {
                Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    
                Route::get('/financeiro', 'TesteController@teste')->name('financeiro');
        
                Route::get('/produtos', 'TesteController@teste')->name('produtos');
    
                Route::get('/', function () {
                    return redirect()->route('admin.dashboard');
                })->name('home');
            });
        });
    });
}); */

//Forma mais enxuta
/* Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'name' => 'admin.'
], function () {
    Route::get('/dashboard', 'TesteController@teste')->name('dashboard');
    
    Route::get('/financeiro', 'TesteController@teste')->name('financeiro');

    Route::get('/produtos', 'TesteController@teste')->name('produtos');

    Route::get('/', function () {
        return redirect()->route('dashboard');
    })->name('home');
}); */


//Rotas agrupadas com prefix
/* Route::middleware([])->group(function () {

    Route::prefix('panel')->group(function () {

        Route::get('/dashboard', function () {
            return 'Home Admin';
        });
    
        Route::get('/financeiro', function () {
            return 'Financeiro Admin';
        });
    
        Route::get('/produtos', function () {
            return 'Produtos Admin';
        });
        Route::get('/', function () {
            return 'Admin';
        });
    });
}); */

// Grupo de Rotas
//Rota redirecionando para a página de Login
Route::get('/login', function () {
    return 'Login';
})->name('login');

/* Route::get('/admin/dashboard', function () {
    return 'Home Admin';
})->middleware('auth');

Route::get('/admin/financeiro', function () {
    return 'Financeiro Admin';
})->middleware('auth');

Route::get('/admin/produtos', function () {
    return 'Produtos Admin';
})->middleware('auth'); */

// Rotas agrupadas
/* Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return 'Home Admin';
    });
    
    Route::get('/admin/financeiro', function () {
        return 'Financeiro Admin';
    });
    
    Route::get('/admin/produtos', function () {
        return 'Produtos Admin';
    });
}); */

// ====================================
/* Route::get('redirect3', function () {
    return redirect()->route('url.name');
}); */

// route('url.name');

/* Route::get('/nome-url', function () {
    return 'Hey hey hey';
})->name('url.name');

Route::get('redirect3', function () {
    return redirect('/nome-url');
});

Route::get('/nome-url', function () {
    return 'Hey hey hey';
});

Route::view('/view', 'welcome', ['id' => 'teste']);

Route::redirect('/redirect1', '/redirect2'); */

// Route::get('redirect1', function () {
//    return redirect('/redirect2');
// });

/* Route::get('redirect2', function () {
    return 'Redirect 02';
});

Route::get('/produtos/{idProduct?}', function ($idProduct = '') {
    return "Produto(s) {$idProduct}";
});

Route::get('/categoria/{flag}/posts', function ($flag) {
    return "Posts da categoria: {$flag}";
});

Route::get('/categorias/{flag}', function ($flag) {
    return "Produtos da categoria: {$flag}";
});

Route::match(['get', 'post'], '/match', function () {
    return 'match';
});

Route::any('/any', function () {
    return 'Any';
});

Route::post('/register', function () {
    return '';
});

Route::get('/empresa', function () {
    return view('site.contact');
});

Route::get('/', function () {
    return view('welcome');
}); */
