<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BusinessesFixture
 */
class BusinessesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'business_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Description' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created_at' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'last_modified_at' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'last_modified_by' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'manager_id' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'vendor_id' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'vendor_conn' => ['type' => 'index', 'columns' => ['vendor_id'], 'length' => []],
            'manager_conn' => ['type' => 'index', 'columns' => ['manager_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'manager_conn' => ['type' => 'foreign', 'columns' => ['manager_id'], 'references' => ['managers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'vendor_conn' => ['type' => 'foreign', 'columns' => ['vendor_id'], 'references' => ['vendors', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => '0a4ceddc-0e7e-49d5-87d8-80c4a6512e18',
                'business_name' => 'Lorem ipsum dolor sit amet',
                'Description' => 'Lorem ipsum dolor sit amet',
                'created_at' => '2019-07-18',
                'created_by' => 1,
                'last_modified_at' => '2019-07-18',
                'last_modified_by' => 1,
                'manager_id' => 'Lorem ipsum dolor sit amet',
                'vendor_id' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
