<?php

namespace Database\Seeders;

use App\Models\Instansi;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Tambah Instansi
        $instansi = Instansi::create([
            'name' => [
                'id' => 'Kedutaan Besar Republik Indonesia Damaskus',
                'ar' => 'سفارة جمهورية إندونيسيا بدمشق',
            ],
            'description' => [
                'id' => 'Damaskus, Suriah',
                'ar' => 'دمشق، سوريا',
            ],
        ]);

        // 2. Tambah Layanan (name & description dalam JSON)
        $layanan = $instansi->layanan()->create([
            'name' => [
                'id' => 'Pelayanan Konsuler',
                'ar' => 'الخدمات القنصلية',
            ],
            'description' => [
                'id' => 'Pelayanan Konsuler.',
                'ar' => 'الخدمات القنصلية',
            ],
        ]);

        // 3. Pertanyaan (JSON)
        $pertanyaan_id = [
            'Kemudahan prosedur pelayanan?',
            'Kecepatan pelayanan sesuai peraturan yang berlaku?',
            'Kemampuan petugas dalam memberikan pelayanan?',
            'Kesopanan dan keramahan petugas?',
            'Kemudahan pencarian informasi pelayanan?',
            'Kesesuaian antara alur/rancangan pelayanan dengan yang diberikan sesuai peraturan yang berlaku?',
            'Kecepatan dan ketetapan penanganan saran dan masukan mengenai pelayanan?',
            'Kenyamanan tempat pelayanan?',
            'Kelengkapan fasilitas tempat pelayanan?',
            'Kemudahan menuju Kantor Perwakilan Republik Indonesia?',
        ];

        $pertanyaan_ar = [
            'مدى سهولة إجراءات تقديم الخدمة؟',
            'مدى سرعة تقديم الخدمة وفقاً للأنظمة المعمول بها؟',
            'مدى كفاءة الموظف في تقديم الخدمة؟',
            'مدى لطف ولباقة الموظف في التعامل؟',
            'مدى سهولة الحصول على معلومات الخدمة؟',
            'مدى مطابقة سير/تصميم إجراءات الخدمة مع ما يتم تقديمه وفقاً للأنظمة المعمول بها؟',
            'مدى سرعة ودقة التعامل مع الاقتراحات والملاحظات بشأن الخدمة؟',
            'مدى راحة مكان تقديم الخدمة؟',
            'مدى توفر وتكامل مرافق مكان تقديم الخدمة؟',
            'مدى سهولة الوصول إلى مقر البعثة الدبلوماسية لجمهورية إندونيسيا؟',
        ];

        foreach ($pertanyaan_id as $i => $text) {
            $layanan->pertanyaan()->create([
                'question' => [
                    'id' => $text,
                    'ar' => $pertanyaan_ar[$i],
                ],
            ]);
        }

        $layanan = $instansi->layanan()->create([
            'name' => [
                'id' => 'Pelayanan Pengajuan dan Perlindungan WNI',
                'ar' => 'خدمة تقديم الطلبات وحماية المواطنين الإندونيسيين',
            ],
            'description' => [
                'id' => 'Pelayanan Pengajuan dan Perlindungan WNI.',
                'ar' => 'خدمة تقديم الطلبات وتوفير الحماية للمواطنين الإندونيسيين.',
            ],
        ]);

        // 3. Pertanyaan (JSON)
        $pertanyaan_id = [
            'Kemudahan prosedur pelayanan?',
            'Kecepatan pelayanan sesuai peraturan yang berlaku?',
            'Kemampuan petugas dalam memberikan pelayanan?',
            'Kesopanan dan keramahan petugas?',
            'Kemudahan pencarian informasi pelayanan?',
            'Kesesuaian antara alur/rancangan pelayanan dengan yang diberikan sesuai peraturan yang berlaku?',
            'Kecepatan dan ketetapan penanganan saran dan masukan mengenai pelayanan?',
            'Kenyamanan tempat pelayanan?',
            'Kelengkapan fasilitas tempat pelayanan?',
            'Kemudahan menuju Kantor Perwakilan Republik Indonesia?',
        ];

        $pertanyaan_ar = [
            'مدى سهولة إجراءات تقديم الخدمة؟',
            'مدى سرعة تقديم الخدمة وفقاً للأنظمة المعمول بها؟',
            'مدى كفاءة الموظف في تقديم الخدمة؟',
            'مدى لطف ولباقة الموظف في التعامل؟',
            'مدى سهولة الحصول على معلومات الخدمة؟',
            'مدى مطابقة سير/تصميم إجراءات الخدمة مع ما يتم تقديمه وفقاً للأنظمة المعمول بها؟',
            'مدى سرعة ودقة التعامل مع الاقتراحات والملاحظات بشاءن الخدمة؟',
            'مدى راحة مكان تقديم الخدمة؟',
            'مدى توفر وتكامل مرافق مكان تقديم الخدمة؟',
            'مدى سهولة الوصول إلى مقر البعثة الدبلوماسية لجمهورية إندونيسيا؟',
        ];

        foreach ($pertanyaan_id as $i => $text) {
            $layanan->pertanyaan()->create([
                'question' => [
                    'id' => $text,
                    'ar' => $pertanyaan_ar[$i],
                ],
                'order' => $i + 1,
            ]);
        }
    }
}
