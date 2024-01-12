<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $area = [
        //     "BANGLI 0101",
        //     "BANGLI 0102",
        //     "BANGLI 0103",
        //     "BANGLI 0104",
        //     "KUBU 0317",
        //     "KUBU 0318",
        //     "KUBU 0319",
        //     "KUBU 0320",
        //     "TAMANBALI 0210",
        //     "TAMANBALI 0211",
        //     "KINTAMANI 1305",
        //     "KINTAMANI 1323",
        //     "KINTAMANI 1324",
        //     "KINTAMANI 1325",
        //     "KINTAMANI 1326",
        //     "KINTAMANI 1327",
        //     "ABUAN 0812",
        //     "ABUAN 0813",
        //     "ABUAN 0814",
        //     "DEMULIH",
        //     "MALET 1228",
        //     "SESAT 1131",
        //     "SUSUT 1024",
        //     "KEDUI 1408",
        //     "PENINJOAN 0615",
        //     "TAMBAHAN 0507",
        //     "TEMBUKU 0406",
        //     "UNDISAN 0716",
        //     "UNDISAN 0717",
        //     "BANGLI 0101-0101(Mertayasa)",
        //     "BANGLI 0101-0102(Mertayasa)",
        //     "BANGLI 0101-0103(Mertayasa)",
        //     "BANGLI 0101-0104(Mertayasa)",
        //     "BANGLI 0101-0105(Mertayasa)",
        //     "BANGLI 0101-0106(Mertayasa)",
        //     "BANGLI 0101-0107(Mertayasa)",
        //     "BANGLI 0101-0108(Mertayasa)",
        //     "BANGLI 0101-0109(Mertayasa)",
        //     "BANGLI 0101-0110(Mertayasa)",
        //     "BANGLI 0101-0111(Mertayasa)",
        //     "BANGLI 0101-0112(Mertayasa)",
        //     "BANGLI 0101-0113(Mertayasa)",
        //     "BANGLI 0101-0114(Mertayasa)",
        //     "BANGLI 0101-0115(Mertayasa)",
        //     "BANGLI 0101-0116(Mertayasa)",
        //     "BANGLI 0101-0117(Mertayasa)",
        //     "BANGLI 0101-0118(Mertayasa)",
        //     "BANGLI 0101-0119(Mertayasa)",
        //     "BANGLI 0101-0120(Mertayasa)",
        //     "BANGLI 0102-0201(Komang)",
        //     "BANGLI 0102-0202(Komang)",
        //     "BANGLI 0102-0203(Komang)",
        //     "BANGLI 0102-0204(Komang)",
        //     "BANGLI 0102-0205(Komang)",
        //     "BANGLI 0102-0206(Komang)",
        //     "BANGLI 0102-0207(Komang)",
        //     "BANGLI 0102-0208(Komang)",
        //     "BANGLI 0102-0209(Komang)",
        //     "BANGLI 0102-0210(Komang)",
        //     "BANGLI 0102-0211(Komang)",
        //     "BANGLI 0102-0212(Komang)",
        //     "BANGLI 0102-0213(Komang)",
        //     "BANGLI 0102-0214(Komang)",
        //     "BANGLI 0102-0215(Komang)",
        //     "BANGLI 0102-0216(Komang)",
        //     "BANGLI 0102-0217(Komang)",
        //     "BANGLI 0102-0218(Komang)",
        //     "BANGLI 0103-0301(Ngakan)",
        //     "BANGLI 0103-0302(Ngakan)",
        //     "BANGLI 0103-0303(Ngakan)",
        //     "BANGLI 0103-0304(Ngakan)",
        //     "BANGLI 0103-0305(Ngakan)",
        //     "BANGLI 0103-0306(Ngakan)",
        //     "BANGLI 0103-0307(Ngakan)",
        //     "BANGLI 0103-0308(Ngakan)",
        //     "BANGLI 0103-0309(Ngakan)",
        //     "BANGLI 0103-0310(Ngakan)",
        //     "BANGLI 0103-0311(Ngakan)",
        //     "BANGLI 0103-0312(Ngakan)",
        //     "BANGLI 0103-0313(Ngakan)",
        //     "BANGLI 0103-0314(Ngakan)",
        //     "BANGLI 0104-0401(Juni)",
        //     "BANGLI 0104-0402(Juni)",
        //     "BANGLI 0104-0403(Juni)",
        //     "BANGLI 0104-0404(Juni)",
        //     "BANGLI 0104-0405(Juni)",
        //     "BANGLI 0104-0406(Juni)",
        //     "BANGLI 0104-0407(Juni)",
        //     "BANGLI 0104-0408(Juni)",
        //     "BANGLI 0104-0409(Juni)",
        //     "BANGLI 0104-0410(Juni)",
        //     "BANGLI 0104-0411(Juni)",
        //     "BANGLI 0104-0412(Juni)",
        //     "BANGLI 0104-0413(Juni)",
        //     "BANGLI 0104-0414(Juni)",
        //     "BANGLI 0104-0415(Juni)",
        //     "BANGLI 0104-0416(Juni)",
        //     "BANGLI 0104-0417(Juni)",
        //     "BANGLI 0104-0418(Juni)",
        //     "0",
        // ];
        //

        // for ($i=0; $i < count($area); $i++) {
        //     Area::create([
        //         "area" => $area[$i]
        //     ]);
        // }

       $xls = (new FastExcel()) -> import('/home/freak_mei/Downloads/uas/area.xlsx');

        foreach($xls as $index=>$item) {
            $area = $item["nama_area"];
            Area::create(
                [
                    "area" => $area
                ]
            );
        }


    }
}
