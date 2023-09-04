<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SystemCalendarController;
use App\Http\Controllers\SystemAppointmentController;
use App\Http\Controllers\FinancingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SystemAutoDetailingController;
use App\Http\Controllers\SystemCarwashController;
use App\Http\Controllers\SystemPaintjobController;
use App\Http\Controllers\SystemTradesController;
use App\Http\Controllers\WalkInController;
use App\Http\Middleware\SystemRoleMiddleware;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Auth::routes();


// Route::get('/services', function(){
//     return view('home.services');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function(){
    Route::prefix('profile')->name('profile.')->group(function(){
        Route::get('/booked/services', [ProfileController::class, 'booked_services'])->name('booked_services');
        Route::get('/trade/request', [ProfileController::class, 'trade_request'])->name('trade_request');
        Route::get('/appointment', [ProfileController::class, 'appoints'])->name('appoints');
});
});

Route::middleware(['auth'])->group(function(){
    Route::prefix('services')->name('services.')->group(function(){
        Route::get('/carwash', [ServiceController::class, 'carwash'])->name('carwash');
        Route::post('/carwash/check', [ServiceController::class, 'check'])->name('check');
        Route::view('/carwash/done', 'services.carwash.done')->name('done');

        Route::get('/auto-detailing', [ServiceController::class, 'autodetailing'])->name('auto-detailing');
        Route::post('/auto-detailing/check', [ServiceController::class, 'check1'])->name('check1');
        Route::view('/auto-detailing/done', 'services.auto-detailing.done')->name('done1');

        Route::get('/paintjob', [ServiceController::class, 'paintjob'])->name('paintjob');
        Route::post('/paintjob/check', [ServiceController::class, 'check2'])->name('check2');
        Route::view('/paintjob/done', 'services.paintjob.done')->name('done2');
    });
});

Route::get('/vehicles', [UnitController::class, 'vehicles'])->name('vehicles');
Route::middleware(['auth'])->group(function(){
    Route::prefix('vehicles')->name('vehicles.')->group(function(){
        Route::get('/trade_in/{uid}', [TradeController::class, 'show']);
        Route::post('/trade_in/check', [TradeController::class, 'check']);
        Route::view('/trade-in/done', 'trade-in.doneTrade')->name('done3');

        Route::get('/view_details/{uid}', [AppointmentController::class, 'show']);
        Route::post('/view_details/check', [AppointmentController::class, 'check']);
        Route::view('/view-details/done', 'view-details.doneAppointment')->name('done4');
    });
});
        
Route::get('/new-arrival', [UnitController::class, 'newArrival'])->name('new-arrival');
Route::middleware(['auth'])->group(function(){
    Route::prefix('new-arrival')->name('new-arrival.')->group(function(){
        Route::get('/trade_in/{uid}', [TradeController::class, 'show1']);
        Route::post('/trade_in/check', [TradeController::class, 'check1']);
        Route::view('/tradein/done', 'trade-in.done')->name('done5');

        Route::get('/view_details/{uid}', [AppointmentController::class, 'show1']);
        Route::post('/view_details/check', [AppointmentController::class, 'check1']);
        Route::view('/view-details/done', 'view-details.doneAppointment')->name('done6');
    });
});

// Route::get('/new-arrival/view-details/{uid}', [AppointmentController::class, 'show']);

// Route::view('/view-details', 'home.view-details');

Route::get('/financing-calculator', [HomeController::class, 'finanCal'])->name('financing-calculator');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');


Route::middleware(['guest'])->group(function(){
    Route::view('/login', 'user.login')->name('login');
    Route::view('/register', 'user.register')->name('register');
    Route::post('/login/process', [UserController::class, 'process'])->name('process');
    Route::post('/store', [UserController::class, 'store'])->name('store');
});


Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');



Route::prefix('system')->name('system.')->group(function(){
    Route::middleware(['guest:system'])->group(function(){
       Route::view('/login', 'system.login')->name('login');
       Route::post('/check', [SystemController::class, 'check'])->name('check');
    });
    Route::middleware(['auth:system'])->group(function(){
        Route::view('/', 'system.dashboard.index')->name('home');

        Route::prefix('inventory')->name('inventory.')->group(function(){
            Route::get('/add_unit', [UnitController::class, 'addUnit'])->name('addUnit');
            Route::get('/showroom', [UnitController::class, 'showroom'])->name('showroom');
            Route::get('/sold_units', [UnitController::class, 'soldUnits'])->name('soldUnits');
    });
        Route::get('/calendar', [SystemCalendarController::class, 'calendar'])->name('calendar');


        Route::prefix('appointments')->name('appointments.')->group(function(){
            Route::get('/', [SystemAppointmentController::class, 'appointments'])->name('appointments');
            Route::post('/process/receipt/{id}', [SystemAppointmentController::class, 'toReceipt'])->name('toReceipt');
            Route::post('/process/receipt/store/{id}', [SystemAppointmentController::class, 'store'])->name('store');      
            Route::post('/process/receipt/sold/{id}', [SystemAppointmentController::class, 'toSold'])->name('toSold');
            Route::post('/process/receipt/financing/{id}', [SystemAppointmentController::class, 'toFinancing'])->name('toFinancing');
            Route::post('/process/receipt/reservation/{id}', [SystemAppointmentController::class, 'toReservation'])->name('toReservation');
            
            Route::post('/process/void/{id}', [SystemAppointmentController::class, 'toVoid'])->name('toVoid');
    });

        Route::prefix('reservations')->name('reservations.')->group(function(){
            Route::get('/', [ReservationController::class, 'reservation'])->name('reservation');
            Route::get('/cash', [ReservationController::class, 'resCash'])->name('resCash');
            Route::get('/financing', [ReservationController::class, 'resFinancing'])->name('resFinancing');
            Route::get('/trade_in', [ReservationController::class, 'resTradein'])->name('resTradein');
            Route::post('/process/receipt/{id}', [ReservationController::class, 'toresReceipt'])->name('toresReceipt');
            Route::post('/process/receipt/store/{id}', [ReservationController::class, 'reserveStore'])->name('reserveStore');
            Route::post('/process/receipt/soldunits/{id}', [ReservationController::class, 'toSoldunits'])->name('toSoldunits');
            
            Route::post('/process/financing/{id}', [ReservationController::class, 'toFinancing'])->name('toFinancing');
            
    });

        Route::prefix('financing')->name('financing.')->group(function(){
            Route::get('/confirmation', [FinancingController::class, 'fiConfirmation'])->name('confirmation');
            Route::post('/confirmation/status/{id}', [FinancingController::class, 'toStatus'])->name('toStatus');
            Route::post('/confirmation/request/{id}', [FinancingController::class, 'toSold'])->name('toSold');
            Route::get('/status', [FinancingController::class, 'fiStatus'])->name('status');
    });
        Route::prefix('trade_in')->name('trade_in.')->group(function(){
            Route::get('/requests', [SystemTradesController::class, 'tiRequests'])->name('requests');
            Route::post('/requests/phase_1/reject/{id}', [SystemTradesController::class, 'phase1'])->name('phase1');
            Route::post('/requests/status/{id}', [SystemTradesController::class, 'toStatus'])->name('toStatus');

            Route::get('/status', [SystemTradesController::class, 'status'])->name('status');
            Route::post('/status/phase_2/reject/{id}', [SystemTradesController::class, 'phase2'])->name('phase2');
            Route::post('/process/receipt/{id}', [SystemTradesController::class, 'totiReceipt'])->name('totiReceipt');
            Route::post('/process/receipt/trade/store/{id}', [SystemTradesController::class, 'tradeStore'])->name('tradeStore'); 

            Route::post('/status/traded/{id}', [SystemTradesController::class, 'toTraded'])->name('toTraded');
            Route::get('/traded', [SystemTradesController::class, 'traded'])->name('traded');
    }); 
        Route::prefix('receipts')->name('receipts.')->group(function(){
            Route::get('/acknowledgment_receipt', [ReceiptsController::class, 'ackReceipts'])->name('acknowledgment');
            Route::post('/acknowledgment_receipt/store', [ReceiptsController::class, 'store'])->name('store');  
            Route::post('/acknowledgment_receipt/process/to/sold', [ReceiptsController::class, 'toSold'])->name('toSold');
            Route::post('/acknowledgment_receipt/process/to/financing', [ReceiptsController::class, 'toFinancing'])->name('toFinancing');
            Route::post('/acknowledgment_receipt/process/to/reservation', [ReceiptsController::class, 'toReservation'])->name('toReservation');
            Route::get('/records', [ReceiptsController::class, 'records'])->name('records');
           
    });             
        Route::prefix('walk_in')->name('walk_in.')->group(function(){
            Route::get('/trade_in', [WalkInController::class, 'trades'])->name('trades');
            Route::get('/carwash', [WalkInController::class, 'carwash'])->name('carwash');
            Route::post('/carwash/process', [WalkInController::class, 'carwash_store'])->name('carwash_store');

            Route::get('/auto_detailing', [WalkInController::class, 'detailing'])->name('detailing');
            Route::post('/auto_detailing/process', [WalkInController::class, 'detailing_store'])->name('detailing_store');
            
            Route::get('/paintjob', [WalkInController::class, 'paintjob'])->name('paintjob');
            Route::post('/paintjob/process', [WalkInController::class, 'paintjob_store'])->name('paintjob_store');
    });  
        Route::prefix('carwash')->name('carwash.')->group(function(){
            Route::get('/confirmation', [SystemCarwashController::class, 'confirmation'])->name('confirmation');
            Route::post('/confirmation/process/void/{id}', [SystemCarwashController::class, 'void'])->name('void');
            Route::post('/confirmation/process/to_records/{id}', [SystemCarwashController::class, 'toRecords'])->name('toRecords');
            Route::get('/records', [SystemCarwashController::class, 'records'])->name('records');
    });
        Route::prefix('auto_detailing')->name('auto_detailing.')->group(function(){
            Route::get('/confirmation', [SystemAutoDetailingController::class, 'confirmation'])->name('confirmation');
            Route::post('/confirmation/process/phase_1/void/{id}', [SystemAutoDetailingController::class, 'phase_1'])->name('phase_1');
            Route::post('/confirmation/process/to_payment/{id}', [SystemAutoDetailingController::class, 'toPayment'])->name('toPayment');
            Route::get('/payment', [SystemAutoDetailingController::class, 'payment'])->name('payment');
            Route::post('/confirmation/process/void/{id}', [SystemAutoDetailingController::class, 'phase_2'])->name('phase_2');
            Route::post('/confirmation/process/to_records/{id}', [SystemAutoDetailingController::class, 'toRecords'])->name('toRecords');
            Route::get('/records', [SystemAutoDetailingController::class, 'records'])->name('records');
    });
        Route::prefix('paintjob')->name('paintjob.')->group(function(){
            Route::get('/confirmation', [SystemPaintjobController::class, 'confirmation'])->name('confirmation');
            Route::post('/confirmation/process/to_void/{id}', [SystemPaintjobController::class, 'phase_1'])->name('phase_1');
            Route::post('/confirmation/process/to_payment/{id}', [SystemPaintjobController::class, 'toPayment'])->name('toPayment');
            Route::get('/payment', [SystemPaintjobController::class, 'payment'])->name('payment');
            Route::post('/confirmation/process/void/{id}', [SystemPaintjobController::class, 'phase_2'])->name('phase_2');
            Route::post('/confirmation/process/to_records/{id}', [SystemPaintjobController::class, 'toRecords'])->name('toRecords');
            Route::get('/records', [SystemPaintjobController::class, 'records'])->name('records');
    });



    }); //system.
}); 