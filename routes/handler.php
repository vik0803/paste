<?php

use Wdi\Http\Handlers\Paste\{
    AddPasteHandler, CreatePasteHandler, ForkPasteHandler, ShowPasteForksHandler, ShowPasteHandler
};

Route::prefix("pastes")->group(function () {
    Route::get("new", CreatePasteHandler::class)->name("paste.create");
    Route::post("", AddPasteHandler::class)->name("paste.add");
    
    
    Route::prefix("{paste}")->group(function () {
        Route::get("", ShowPasteHandler::class)->name("paste.show");
        Route::get("forks", ShowPasteForksHandler::class)->name("paste.forks");
        Route::post("fork", ForkPasteHandler::class)->name("paste.fork");
    });
});
