<?php

namespace Source\QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class SelectTest extends TestCase
{
    public function testSelectWithoutFilter()
    {
        $select = new Select();
        $select->table('users');

        $actual = $select->getSql();
        $expected = 'SELECT * FROM users';

        $this->assertEquals($expected, $actual);
    }

    public function testSelectWithFields()
    {
        $select = new Select();
        $select->table('users');
        $select->fields(['name', 'email']);

        $actual = $select->getSql();
        $expected = 'SELECT name, email FROM users';

        $this->assertEquals($expected, $actual);
    }

    public function testSelectWithFilter()
    {
        $select = new Select();
        $select->table('users');
        $select->fields(['name', 'email']);

        $stub = $this->getMockBuilder(Filters::class)
            ->disableOriginalConstructor()
            ->getMock();

        $stub->method('getSql')
            ->willReturn('WHERE id = 1 ORDER BY created desc');

        $select->filters($stub);

        $actual = $select->getSql();
        $expected = 'SELECT name, email FROM users WHERE id = 1 ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }
}
