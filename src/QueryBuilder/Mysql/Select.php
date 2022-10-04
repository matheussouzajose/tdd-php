<?php

namespace Source\QueryBuilder\Mysql;

class Select
{
    private string $table;
    private array $fields = [];
    private string $filters = '';

    public function table(string $table): Select
    {
        $this->table = $table;
        return $this;
    }

    public function fields(array $fields): Select
    {
        $this->fields = $fields;
        return $this;
    }

    public function filters(Filters $filters)
    {
        $this->filters = $filters->getSql();
    }

    public function getSql(string $fields = '*'): string
    {
        if (!empty($this->fields)) {
            $fields = implode(', ', $this->fields);
        }

        $filters = '';
        if (!empty($this->filters)) {
            $filters = $this->filters;
        }

        return trim(sprintf('SELECT %s FROM %s %s', $fields, $this->table, $filters));
    }
}
