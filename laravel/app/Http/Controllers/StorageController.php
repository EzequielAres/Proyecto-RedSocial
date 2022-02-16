<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Mascota;
use App\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StorageController extends Controller {

    public function get($path) {
        return response(Storage::disk('local')->get($path))
                ->header("Content-Type", "image/png");
    }

}