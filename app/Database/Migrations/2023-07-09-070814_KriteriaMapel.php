<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KriteriaMapel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kriteria' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'id_mapel' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'nama_kriteria' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'deskripsi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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

        $this->forge->addKey("id_kriteria", true);
        $this->forge->createTable("kriteria_mapel");
    }

    public function down()
    {
        $this->forge->dropTable("kriteria_mapel");
    }
}
