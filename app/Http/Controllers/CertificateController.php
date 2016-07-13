<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class CertificateController extends Controller {
    public function lets_encrypt() {
      return env('CERT_RES_KEY');
    }
}
