<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TahunAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'nama_tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'semester' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'status' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
        ]);
        $this->forge->addKey('id_tahun', true);
        $this->forge->createTable('tahun_akademik');
    }

    public function down()
    {
        $this->forge->dropTable("tahun_akademik");
    }
}
