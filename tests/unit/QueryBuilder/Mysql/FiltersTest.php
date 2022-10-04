<?php

namespace Source\QueryBuilder\Mysql;

use PHPUnit\Framework\TestCase;

class FiltersTest extends TestCase
{
    public function testWhere()
    {
        $filters = new Filters();
        $filters->where('id', '=', 1);

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1';

        $this->assertEquals($expected, $actual);
    }

    public function testOrderBy()
    {
        $filters = new Filters();
        $filters->orderby('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }

    public function testWhereAndOrderBy()
    {
        $filters = new Filters();
        $filters->where('id', '=', 1);
        $filters->orderby('created', 'desc');

        $actual = $filters->getSql();
        $expected = 'WHERE id = 1 ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }
}
