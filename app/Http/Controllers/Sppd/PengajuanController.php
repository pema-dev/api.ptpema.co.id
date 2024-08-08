<?php

namespace App\Http\Controllers\Sppd;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use App\Models\Sppd\Sppd;
use App\Models\Sppd\TujuanSppd;
use App\Models\Employe;
use App\Models\Sppd\PenomoranSppd;
use App\Models\Sppd\KetetapanSppd;


class PengajuanController extends Controller
{

    public function store(Request $request)
    {
        $sppd = new Sppd();
        $sppd->nomor_sppd = ((PenomoranSppd::find($request->nomor)->last_number) + 1) . '/PEMA/ST-' . PenomoranSppd::find($request->nomor)->kode . '/' . $this->getRomawi(date('m')) . '/' . date('m') . '/' . date('Y');
        $sppd->nomor_dokumen = unique_random('documents', 'doc_id', 40);
        $sppd->employe_id = $request->employe_id;
        $sppd->nama = $request->name;
        $sppd->jabatan = $request->jabatann;
        $sppd->golongan_rate = $request->rate;
        $sppd->ketetapan =
        $sppd->submitted_by = Employe::employeId();
        $sppd->ketetapan = KetetapanSppd::where('status', 'active')->first()->id;
        $tujuans = $request->tujuan_sppd;
        if ($sppd->save()) {
        //     for ($i = 0; $i < count($tujuans); $i++) {
        //         TujuanSppd::insert([
        //             'id_sppd' => $sppd->id,
        //             'jenis_sppd' => $tujuans[$i]->jenis_sppd,
        //             'dasar' => $tujuans[$i]->dasar_sppd,
        //             'klasifikasi' => $tujuans[$i]->klasifikasi,
        //             'sumber'=>$tujuans[$i]->sumber_biaya,
        //             'rkap'=>$tujuans[$i]->renbis,
        //             'p_tiket' => $tujuans[$i]->p_tiket,
        //             'p_um' => $tujuans[$i]->p_um,
        //             'p_tl' => $tujuans[$i]->p_tl,
        //             'p_us' => $tujuans[$i]->p_us,
        //             'p_hotel' => $tujuans[$i]->p_hotel,
        //             'kategori'=>$tujuans[$i]->kategori_sppd,
        //             'detail_tujuan' => $tujuans[$i]->detail_tujuan,
        //             'tugas' => $tujuans[$i]->tugas_sppd,
        //             'waktu_berangkat' => date('Y-m-d H:i:s', strtotime($tujuans[$i]->waktu_berangkat)),
        //             'waktu_kembali' =>  date('Y-m-d H:i:s', strtotime($tujuans[$i]->waktu_kembali))
        //         ]);
        //     }
            return new PostResource(true, $tujuans[0]->jenis_sppd, [count($tujuans)]);
        }
        // return new PostResource(true, unique_random('documents', 'doc_id', 40), $request->all());
    }

    function getRomawi($bln)
    {
        switch ($bln) {
            case 1:
                return "I";
                break;
            case 2:
                return "II";
                break;
            case 3:
                return "III";
                break;
            case 4:
                return "IV";
                break;
            case 5:
                return "V";
                break;
            case 6:
                return "VI";
                break;
            case 7:
                return "VII";
                break;
            case 8:
                return "VIII";
                break;
            case 9:
                return "IX";
                break;
            case 10:
                return "X";
                break;
            case 11:
                return "XI";
                break;
            case 12:
                return "XII";
                break;
        }
    }
}
