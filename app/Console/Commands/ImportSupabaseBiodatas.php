<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\TypeDocument;

class ImportSupabaseBiodatas extends Command
{
    protected $signature = 'import:biodata';
    protected $description = 'Import biodatas from Supabase PostgreSQL to MySQL';

    public function handle()
    {
        $supabase = DB::connection('supabase');

        $total = $supabase->table('DataVaccine')->count();
        $bar = $this->output->createProgressBar($total);
        $bar->start();

        $supabase->table('DataVaccine')
            ->orderBy('id')
            ->chunk(100, function ($rows) use ($bar) {
                foreach ($rows as $row) {
                    $slug = Str::slug($row->certificate_name ?? 'unknown')
                        . '-' . Str::random(6);

                    $sex = $row->sex ? strtoupper($row->sex) : null;

                    // pakai helper dari model TypeDocument
                    $id_type_document = TypeDocument::getIdByNameOrDefault($row->typeDocument, 1);

                    // logging jika typeDocument tidak ditemukan
                    if (empty($row->typeDocument) || $id_type_document === 1) {
                        Log::warning("TypeDocument tidak ditemukan untuk Supabase ID {$row->id}, value: {$row->typeDocument}");
                    }

                    DB::table('biodatas')->insert([
                        'id'               => $row->id, // pakai id asli dari Supabase
                        'slug'             => $slug,
                        'no_document'      => $row->no_document,
                        'patient_name'     => $row->certificate_name,
                        'sex'              => $sex,
                        'date_of_birth'    => $row->date_of_birth
                            ? date('Y-m-d', strtotime($row->date_of_birth))
                            : null,
                        'nationality'      => $row->nationality,
                        'nationality_doc'  => $row->nationality_doc,
                        'disease'          => $row->disease,
                        'facility'         => $row->facility_name,
                        'id_type_document' => $id_type_document,
                        'status'           => 1,
                        'created_at'       => $row->createdAt,
                        'updated_at'       => $row->updatedAt,
                    ]);

                    $bar->advance();
                }
            });

        $bar->finish();

        // Set auto increment ke angka terakhir + 1
        $maxId = DB::table('biodatas')->max('id');
        DB::statement('ALTER TABLE biodatas AUTO_INCREMENT = ' . ($maxId + 1));

        $this->newLine();
        $this->info('✅ Import Supabase biodatas ke MySQL selesai!');
    }
}
