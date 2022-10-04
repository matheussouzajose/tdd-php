<?php

namespace Source;

use PHPUnit\Framework\TestCase;
use Source\QueryBuilder\Mysql\Filters;
use Source\QueryBuilder\Mysql\Select;


class SelectAndFiltersIntegrationTest extends TestCase
{
    public function testSelectWithFilterWhereAndOrder()
    {
        $select = new Select();
        $select->table('users');

        $filters = new Filters();
        $filters->where('id', '=', 1);
        $filters->orderby('created', 'desc');

        $select->filters($filters);

        $actual = $select->getSql();
        $expected = 'SELECT * FROM users WHERE id = 1 ORDER BY created desc';

        $this->assertEquals($expected, $actual);
    }
}
