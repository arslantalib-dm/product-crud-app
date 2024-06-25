<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("/products", [ProductController::class, "index"])->name("product.index");
Route::post("/product", [ProductController::class, "store"])->name("product.store");
Route::get("/product/{slug}", [ProductController::class, "find"])->name("product.find");
Route::patch("/product", [ProductController::class, "update"])->name("product.update");
Route::delete("/product/{id}", [ProductController::class, "destroy"])->name("product.update");

