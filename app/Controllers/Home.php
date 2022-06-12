<?php

namespace App\Controllers;

use App\Models\Mahasiswa;

class Home extends BaseController
{
    public function index()
    {
        echo $this->request->getIPAddress();
        $mahasiswa = new Mahasiswa();
        $data['mhs'] = $mahasiswa->findAll();
        return view('tes/tesview', $data);
    }
}
