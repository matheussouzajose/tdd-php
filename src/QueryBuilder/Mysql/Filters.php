<?php

namespace Source\QueryBuilder\Mysql;

class Filters
{
    private array $sql = [];

    public function where(string $field, string $condition, $value): Filters
    {
        $where = 'WHERE %s %s %s';
        $this->sql[] = sprintf($where, $field, $condition, $value);
        return $this;
    }

    public function orderby(string $field, string $order): Filters
    {
        $where = 'ORDER BY %s %s';
        $this->sql[] = sprintf($where, $field, $order);
        return $this;
    }

    public function getSql(): string
    {
        return implode(' ', $this->sql);
    }
}
