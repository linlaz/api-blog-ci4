<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blogs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'categories_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'author_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status'      => [
				'type'           => 'ENUM',
				'constraint'     => ['published', 'draft'],
				'default'        => 'draft',
			],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],      
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('categories_id', 'categories', 'id', 'cascade', 'cascade');
        $this->forge->addForeignKey('author_id', 'users', 'id', 'cascade', 'cascade');
        $this->forge->createTable('blogs');
    }

    public function down()
    {
        $this->forge->dropTable('blogs');
    }
}
