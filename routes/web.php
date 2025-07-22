<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Meta;
use App\Helpers\Breadcrumbs;

Route::get('/', function () {

    $title = "Visoka škola akademskih studija Dositej - Početna";
    Meta::setTitle($title);
    // Dodajte meta tagove
    Meta::addMeta('description', 'Dobrodošli na zvaničnu stranicu Visoke škole akademskih studija Dositej. Smerovi: Ekonomija i Informatika.');
    Meta::addMeta('keywords', 'Dositej, Ekonomija, Informatika, studije, obrazovanje');
    Meta::addMeta('og:title', $title, 'property');  // primer Open Graph taga

    return Inertia::render('Home');
})->name('home');

Route::get('/kontakt', function () {
    $title = "Visoka škola akademskih studija Dositej - Kontakt";
    Meta::setTitle($title);
    // Dodajte meta tagove
    Meta::addMeta('description', 'Dobrodošli na zvaničnu stranicu Visoke škole akademskih studija Dositej. Smerovi: Ekonomija i Informatika.');
    Meta::addMeta('keywords', 'Dositej, Ekonomija, Informatika, studije, obrazovanje');
    Meta::addMeta('og:title', $title, 'property');  // primer Open Graph taga
    return Inertia::render('user/Contact');
})->name('Kontakt');


Route::get('/cenovnik', function () {
    $title = "Visoka škola akademskih studija Dositej - Cenovnik";
    Meta::setTitle($title);
    return Inertia::render('user/Price');
})->name('Cena');

Route::get('/osoblje/{tipOsoblja}', function ($tipOsoblja) {
    $title = "Visoka škola akademskih studija Dositej - Osoblje";
    Meta::setTitle($title);
    return Inertia::render('user/Staff',["tipOsoblja"=>$tipOsoblja]);
})->name('Osoblje');

Route::get('/prijava', function () {
    $title = "Visoka škola akademskih studija Dositej - Prijava";
    Meta::setTitle($title);
    return Inertia::render('user/Application');
})->name('Prijava');

Route::get('/raspored-aktivnosti', function () {
    $title = "Visoka škola akademskih studija Dositej - Raspored nastave";
    Meta::setTitle($title);
    return Inertia::render('user/ScheduleClass');
})->name('RasporedNastave');

Route::get('/biblioteka', function () {
    $title = "Visoka škola akademskih studija Dositej - Biblioteka";
    Meta::setTitle($title);
    return Inertia::render('user/Library');
})->name('Prijava');

Route::get('/važni-dokumenti', function () {
    $title = "Visoka škola akademskih studija Dositej - Važni Dokumenti";
    Meta::setTitle($title);
    return Inertia::render('user/ImportantDocuments');
})->name('Prijava');

Route::get('/akreditacija', function () {
    $title = "Visoka škola akademskih studija Dositej - Akreditacija";
    Meta::setTitle($title);
    return Inertia::render('user/Accreditation');
})->name('Akreditacija');

Route::get('/prijava-ispita', function () {
    $title = "Visoka škola akademskih studija Dositej - Prijava Ispita";
    Meta::setTitle($title);
    return Inertia::render('user/ExamApplication');
})->name('Akreditacija');


Route::get('/upustvo-za-studente', function () {
    $title = "Visoka škola akademskih studija Dositej - Upustvo za studente";
    Meta::setTitle($title);
    return Inertia::render('user/InstructionsForStudents');
})->name('UpustvoZaStudente');


Route::get('/ekonomija', function () {
    $title = "Visoka škola akademskih studija Dositej - Ekonomija";
    Meta::setTitle($title);
    return Inertia::render('user/Economy');
})->name('Ekonomija');

Route::get('/ekonomija-master', function () {
    $title = "Visoka škola akademskih studija Dositej - Ekonomija Master studije";
    Meta::setTitle($title);
    return Inertia::render('user/EconomyMaster');
})->name('EkonomijaMaster');

Route::get('/informatika', function () {
    $title = "Visoka škola akademskih studija Dositej - Informacioni smer";
    Meta::setTitle($title);
    return Inertia::render('user/Information');
})->name('Informatika');

Route::get('/informatika-master', function () {
    $title = "Visoka škola akademskih studija Dositej - Informacioni smer - Master";
    Meta::setTitle($title);
    return Inertia::render('user/InformationMaster');
})->name('InformatikaMaster');

Route::get('/osoba/{slug}', [\App\Http\Controllers\StaffMemebersController::class,'getOneWithTemplate'])->name('osobaJedna');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/',function () {
        return Inertia::render('admin/Home');
    })->name('dashboard');

    Route::get('/rasporedi',function () {
        return Inertia::render('admin/Scheduls');
    })->name('rasporedi');


    Route::get('/osoblje',function () {
        return Inertia::render('admin/StaffMembers');
    })->name('osoblje');

    Route::get('/osobljeSvo', [\App\Http\Controllers\StaffMemebersController::class, 'getAll'])->name('osobljeSvo');
    Route::get('/osoblje/{id}', [\App\Http\Controllers\StaffMemebersController::class, 'getOne'])->name('osoba');
    Route::post('/osoblje', [\App\Http\Controllers\StaffMemebersController::class, 'store'])->name('osobaDodavanje');
    Route::patch(
        '/osoblje/{member}',
        [\App\Http\Controllers\StaffMemebersController::class, 'update']
    )->name('osobljeIzmena');


    Route::get('/pozicije',[\App\Http\Controllers\PositionController::class,'getAll'])->name('pozicije');

//    Route::post(
//        '/staff-members/{member}/documents',
//        [\App\Http\Controllers\StaffDocumentController::class, 'store']
//    )->name('staff-members.documents.store');

    Route::post('/obavestenja', [\App\Http\Controllers\NoticeController::class, 'store'])->name('obavestenjeDodavanje');
    Route::patch('/obavestenja/{id}', [\App\Http\Controllers\NoticeController::class, 'update'])->name('obavestenjeIzmena');
    Route::get('/obavestenja/{id}', [\App\Http\Controllers\NoticeController::class, 'showInAdminPanel'])->name('obavestenjeJedno');
    Route::patch('/obavestenja/{id}/published', [\App\Http\Controllers\NoticeController::class, 'updatePublished'])->name('updatePublished');

    Route::post('/raspored', [\App\Http\Controllers\ScheduleController::class, 'store'])->name('rasporedDodavanje');
    Route::get('/rasporediSvi', [\App\Http\Controllers\ScheduleController::class, 'getAllInAdmin'])->name('rasporedi');
    Route::patch('/raspored/{id}', [\App\Http\Controllers\ScheduleController::class, 'update'])->name('rasporedIzmena');
    Route::get('/raspored/{id}', [\App\Http\Controllers\ScheduleController::class, 'getOne'])->name('jedanRaspored');
    Route::patch('/raspored/{id}/published', [\App\Http\Controllers\ScheduleController::class, 'updatePublished'])->name('updatePublishedRaspored');

});

Route::get('/raspored/{type?}', [\App\Http\Controllers\ScheduleController::class, 'get'])->name('rasporedi');

Route::get('/obavestenja/{notice}', [\App\Http\Controllers\NoticeController::class, 'show'])->name('obavestenje');
Route::get('/obavestenja', [\App\Http\Controllers\NoticeController::class, 'getAll'])->name('obavestenjeSva');
Route::get('/obavestenjaApp', [\App\Http\Controllers\NoticeController::class, 'getAllInApp'])->name('obavestenjeSvaUPrikazu');
Route::get('/sva-obavestenja', [\App\Http\Controllers\NoticeController::class, 'getAllInApp'])->name('obavestenjeSvaUPrikazu');

Route::post('/prijaviStudenta',[\App\Http\Controllers\StudentController::class,'sendMail'])->name('slanjeEPoste');
Route::post('/kontakt',[\App\Http\Controllers\StudentController::class,'sendMail'])->name('slanjeEPoste');
Route::get('/osobljeSvo', [\App\Http\Controllers\StaffMemebersController::class, 'getAll'])->name('osobljeSvo');

Route::get('/osobljeSvoSaPozicijama', [\App\Http\Controllers\StaffMemebersController::class, 'getAllWithPosition'])->name('osobljeSvo');


Route::get('/o-nama', function () {

    $title = "Visoka škola akademskih studija Dositej - O nama";
    Meta::setTitle($title);
    // Dodajte meta tagove
    Meta::addMeta('description', 'Dobrodošli na zvaničnu stranicu Visoke škole akademskih studija Dositej. Smerovi: Ekonomija i Informatika.');
    Meta::addMeta('keywords', 'Dositej, Ekonomija, Informatika, studije, obrazovanje');
    Meta::addMeta('og:title', $title, 'property');  // primer Open Graph taga

    return Inertia::render('user/AboutUs');
})->name('onama');


require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
