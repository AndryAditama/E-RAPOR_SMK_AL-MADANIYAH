<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NilaiRapor extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_nilai' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'id_kriteria' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'nilai' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'hasil' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'huruf' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id_nilai', true);
        $this->forge->createTable('nilai_rapor');
    }

    public function down()
    {
        $this->forge->dropTable("nilai_rapor");
    }
}
