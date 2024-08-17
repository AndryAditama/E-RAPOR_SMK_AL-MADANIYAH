<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataGuru extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_guru' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => false,
                'auto_increment' => true,
            ],
            'guru_userid' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'id_kelas' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'no_hp' => [
                'type'       => 'INT',
                'constraint' => '15',
            ],
            'alamat' => [
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
        $this->forge->addKey('id_guru', true);
        $this->forge->createTable('data_guru');
    }

    public function down()
    {
        $this->forge->dropTable('data_guru');
    }
}
