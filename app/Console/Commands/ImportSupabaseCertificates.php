<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ImportSupabaseCertificates extends Command
{
    protected $signature = 'import:certificates';
    protected $description = 'Import certificates from Supabase PostgreSQL to MySQL';

    public function handle()
    {
        $supabase = DB::connection('supabase');

        $total = $supabase->table('VaccineRecord')->count();
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $supabase->table('VaccineRecord')
            ->orderBy('id')
            ->chunk(100, function ($rows) use ($bar) {
                foreach ($rows as $row) {

                    // Cari relasi biodata berdasarkan Supabase dataVaccineId
                    $biodata = DB::table('biodatas')->where('id', $row->dataVaccineId)->first();

                    if (!$biodata) {
                        Log::warning("Biodata tidak ditemukan untuk certificate Supabase ID {$row->id}, dataVaccineId={$row->dataVaccineId}");
                        $bar->advance();
                        continue;
                    }

                    DB::table('certificates')->insert([
                        'id'           => $row->id, // pakai id asli dari Supabase
                        'id_biodata'   => $biodata->id,
                        'vaccine_name' => $row->vaccine_name,
                        'start_date'   => $row->vaccination_date ? date('Y-m-d', strtotime($row->vaccination_date)) : null,
                        'docter'       => $row->supervising_doctor,
                        'batch_number' => $row->batch_number,
                        'expired_date' => $row->certificate_valid_until ? date('Y-m-d', strtotime($row->certificate_valid_until)) : null,
                        'next_booster' => $row->next_booster ? date('Y-m-d', strtotime($row->next_booster)) : null,
                        'dease_target' => $row->disease_targeted,
                        'created_at'   => $row->createdAt,
                        'updated_at'   => $row->updatedAt,
                    ]);

                    $bar->advance();
                }
            });

        $bar->finish();

        // Set auto increment ke angka terakhir + 1
        $maxId = DB::table('certificates')->max('id');
        DB::statement('ALTER TABLE certificates AUTO_INCREMENT = ' . ($maxId + 1));

        $this->newLine();
        $this->info('✅ Import Supabase certificates ke MySQL selesai!');
    }
}
