<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('auth_roles');

        $table->addColumn('auth_role','string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addTimestamps('created','modified')
            ->create();

        $table = $this->table('section_types');

        $table->addColumn('section_type', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addIndex(['section_type'], ['unique' => true])
            ->addTimestamps('created', 'modified')
            ->create();


        $table = $this->table('districts');

        $table->addColumn('district','string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addTimestamps('created', 'modified')
            ->addIndex(['district'], ['unique' => true])
            ->create();

        $table = $this->table('scout_groups');

        $table->addColumn('scout_group', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('district_id', 'integer', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addTimestamps('created', 'modified')
            ->addForeignKey(
                'district_id',
                'districts',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addIndex(['scout_group'], ['unique' => true])
            ->create();

        $table = $this->table('sections');

        $table->addColumn('section', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('scout_group_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('section_type_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addTimestamps('created', 'modified')
            ->addForeignKey(
                'scout_group_id',
                'scout_groups',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'section_type_id',
                'section_types',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addIndex(['section'], ['unique' => true])
            ->addIndex(['scout_group_id'])
            ->addIndex(['section_type_id'])
            ->create();

        $table = $this->table('roles');

        $table->addColumn('role', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addTimestamps('created', 'modified')
            ->addIndex(['role'], ['unique' => true])
            ->create();

        $table = $this->table('users');

        $table->addColumn('username', 'string', [
                'default' => null,
                'limit' => 63,
                'null' => false,
            ])
            ->addColumn('last_login', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('login_count', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('role_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('auth_role_id', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('section_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('first_name', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('last_name', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('email', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('password', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('phone', 'string', [
                'default' => null,
                'limit' => 12,
                'null' => false,
            ])
            ->addColumn('address_1', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ])
            ->addColumn('address_2', 'string', [
                'default' => '',
                'limit' => 255,
                'null' => true,
            ])
            ->addColumn('city', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('county', 'string', [
                'default' => null,
                'limit' => 125,
                'null' => false,
            ])
            ->addColumn('postcode', 'string', [
                'default' => null,
                'limit' => 8,
                'null' => false,
            ])
            ->addTimestamps('created','modified')
            ->addColumn('osm_user_id', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('osm_secret', 'text', [
                'default' => null,
                'null' => true,
            ])
            ->addColumn('osm_linked', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('osm_linkdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('osm_current_term', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('osm_term_end', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'username',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'email',
                ],
                ['unique' => true]
            )
            ->addIndex(
                [
                    'role_id',
                ]
            )
            ->addIndex(
                [
                    'auth_role_id',
                ]
            )
            ->addIndex(
                [
                    'section_id',
                ]
            )
            ->addForeignKey(
                'section_id',
                'sections',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'auth_role_id',
                'auth_roles',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'role_id',
                'roles',
                'id',
                [
                    'update' => 'CASCADE',
                    'delete' => 'RESTRICT'
                ]
            )
            ->create();
    }
}
