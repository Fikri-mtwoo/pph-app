<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PphController extends Controller
{
    //
    public function index()
    {
        return view('pph.index');
    }

    public function store(Request $request)
    {
        $rule = [
            'nama_karyawan' => 'required|string',
            'status' => 'required',
            'tanggungan' => 'required',
            'gaji_pokok' => 'required|numeric',
            'biaya_jabatan' => 'required|numeric',
            'biaya_pensiun' => 'required|numeric',
            'tun_makan' => 'required|numeric',
            'tun_transport' => 'required|numeric',
            'tun_jabatan' => 'required|numeric',
            'tun_kesehatan' => 'required|numeric',
        ];

        $message = [
            'required' => 'Kolom :attribute tidak boleh kosong.',
            'string' => 'Kolom :attribute harus bertype string.',
            'numeric' => 'Kolom :attribute harus bertype angka.',
        ];
        $validator = Validator::make($request->all(), $rule, $message)->validate();

        if($request->status == 'bk'){
            $status = "Belum Kawin";
        }else{
            $status = "Kawin";
        }

        if ($request->tanggungan == '0') {
            $tanggungan = "Tanpa Tanggungan";
        } else if ($request->tanggungan == '1') {
            $tanggungan = "1 orang";
        } else if ($request->tanggungan == '2') {
            $tanggungan = "2 orang";
        } else {
            $tanggungan = "3 orang";
        }

        if ($request->status == 'bk') {
            if ($request->tanggungan == '0') {
                $ptkp = 54000000;
            } else if ($request->tanggungan == '1') {
                $ptkp = 58500000;
            } else if ($request->tanggungan == '2') {
                $ptkp = 63000000;
            } else {
                $ptkp = 67500000;
            }
        } else {
            if ($request->tanggungan == '0') {
                $ptkp = 58500000;
            } else if ($request->tanggungan == '1') {
                $ptkp = 63000000;
            } else if ($request->tanggungan == '2') {
                $ptkp = 67500000;
            } else {
                $ptkp = 72000000;
            }
        }

        try {
            //code...
            $bruto = ($request->gaji_pokok * 12) + ($request->tun_makan * 12) + ($request->tun_transport * 12) + ($request->tun_jabatan * 12) + ($request->tun_kesehatan * 12);
            $netto = $bruto - (($request->biaya_jabatan * 12) + ($request->biaya_pensiun * 12));
            $pkp = $netto - $ptkp;
            while ($pkp > 0) {
                if ($pkp > 0 and $pkp <= 50000000) {
                    $persen = 5;
                    $pajak_terhutang = ($pkp * $persen) / 100;
                    $pkp = 0;
                } else if ($pkp > 50000000 and $pkp <= 250000000) {
                    $persen = 15;
                    $pajak_terhutang = (($pkp - 50000000) * $persen) / 100;
                    $pkp = 50000000;
                } else if ($pkp > 250000000 and $pkp <= 500000000) {
                    $persen = 25;
                    $pajak_terhutang = (($pkp - 250000000) * $persen) / 100;
                    $pkp = 250000000;
                } else {
                    $persen = 30;
                    $pajak_terhutang = (($pkp - 500000000) * $persen) / 100;
                    $pkp = 500000000;
                }
                $data[] = [
                    "persen" => $persen,
                    "pajak" => $pajak_terhutang
                ];
            }
            $total = 0;
            foreach ($data as $value) {
                $total += $value['pajak'];
            }
            $data_pajak = [
                "nama" => $request->nama_karyawan,
                "status" => $status,
                "tanggungan" => $tanggungan,
                "gaji_pokok" => $request->gaji_pokok,
                "biaya_jabatan" => $request->biaya_jabatan,
                "tun_makan" => $request->tun_makan,
                "tun_transport" => $request->tun_transport,
                "tun_jabatan" => $request->tun_jabatan,
                "tun_kesehatan" => $request->tun_kesehatan,
                "biaya_pensiun" => $request->biaya_pensiun,
                "bruto" => $bruto,
                "netto" => $netto,
                "ptkp" => $ptkp,
                "pkp" => $netto - $ptkp,
                "pajak" => $data,
                "total" => $total
            ];
            return view('pph.view', $data_pajak);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('pph.index');
        }
    }

    public function create()
    {
        return view('pph.view');
    }
}
