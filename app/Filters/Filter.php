<?php

namespace App\Filters;

use Illuminate\Support\Carbon;
use App\Filters\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Filter
{
    public const OPERATORS = [
        'eq',
        'lt',
        'gt',
        'lte',
        'gte',
        'ends',
        'starts',
        'custom',
        'contains',
    ];

    public const CUSTOM_FILTER = 'custom';

    public const SQL_COMPARISON_OPERATORS = [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '=<',
        'gte' => '>=',
    ];

    public function __construct(
        public ?string $column,
        public ?string $operatorAlias,
        public mixed   $value,
    )
    {
    }

    public function applyOnQuery(Builder $builder): Builder
    {
        if (is_null($this->column) || is_null($this->operatorAlias)) {
            return $builder;
        }

        /** @var Filterable|Model $model */
        $model = $builder->getModel();

        $modelCustomFilters = $model::getCustomFilters();
        $columnIsAFilter = array_key_exists($this->column, $modelCustomFilters);

        if ($this->operatorAlias == self::CUSTOM_FILTER && $columnIsAFilter) {
            /** @var CustomFilter $filterClass */
            $filterClass = app($modelCustomFilters[$this->column]);

            return $filterClass->applyQuery($builder, $this->value);
        }

        $filterableColumns = $model::getFilterableColumns();
        $columnNotFilterable = !array_key_exists($this->column, $filterableColumns);
        $operatorNotAllowed = !in_array($this->operatorAlias, self::OPERATORS);

        if ($columnNotFilterable || $operatorNotAllowed) {
            return $builder;
        }

        if (array_key_exists($this->operatorAlias, self::SQL_COMPARISON_OPERATORS)) {
            if (data_get($filterableColumns, $this->operatorAlias . '.' . 'input') === 'date') {
                return $builder->whereDate(
                    $this->column,
                    self::SQL_COMPARISON_OPERATORS[$this->operatorAlias],
                    Carbon::parse($this->value)
                );
            }

            if (data_get($filterableColumns, $this->operatorAlias . '.' . 'input') === 'integer') {
                return $builder->where(
                    $this->column,
                    self::SQL_COMPARISON_OPERATORS[$this->operatorAlias],
                    (integer)$this->value
                );
            }

            if (data_get($filterableColumns, $this->operatorAlias . '.' . 'input') === 'float') {
                return $builder->where(
                    $this->column,
                    self::SQL_COMPARISON_OPERATORS[$this->operatorAlias],
                    (float)$this->value
                );
            }

            return $builder->where(
                $this->column,
                self::SQL_COMPARISON_OPERATORS[$this->operatorAlias],
                $this->value
            );
        }

        if ($this->operatorAlias === 'contains') {
            return $builder->where($this->column, 'LIKE', "%$this->value%");
        }

        if ($this->operatorAlias === 'starts') {
            return $builder->where($this->column, 'LIKE', "$this->value%");
        }

        if ($this->operatorAlias === 'ends') {
            return $builder->where($this->column, 'LIKE', "%$this->value");
        }

        return $builder;
    }
}
