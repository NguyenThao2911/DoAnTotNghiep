<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Phat;
use App\BanDoc;
use App\AnPham;


class Exports implements FromCollection
{
	public $thaogau;

	function __construct($thaoxinh)
        {
            $this->thaogau = $thaoxinh;
        }

    public function collection()
    {
	    	// return Phat::select('*')->where('tienphat', '>', $this->thaogau);
        return Phat::select('*')->join('anpham', 'phat.maanpham', '=', 'anpham.maanpham')->join('bandoc', 'phat.mathe', '=', 'bandoc.mathe')->where('phat.mathe', $this->thaogau);
    }
}
