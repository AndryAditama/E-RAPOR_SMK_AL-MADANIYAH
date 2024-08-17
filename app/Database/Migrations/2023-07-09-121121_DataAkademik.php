<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataAkademik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_akademik' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'id_siswa' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_guru' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_kelas' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_tahun' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
        ]);
        $this->forge->addKey('id_akademik', true);
        $this->forge->createTable('data_akademik');
    }

    public function down()
    {
        $this->forge->dropTable("data_akademik");
    }
}
