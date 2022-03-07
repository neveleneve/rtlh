<?php

namespace App\Http\Controllers;

use App\Models\kelurahan;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function pilihkelurahan(Request $data)
    {
        if ($data) {
            $returndata = null;
            $kelurahan = kelurahan::where('kecamatan_id', $data->id)->get();
            foreach ($kelurahan as $key) {
                $returndata .= "<option value=" . $key->id . ">" . ucwords(strtolower($key->name));
            }
            return json_encode($returndata);
        }
    }
}
