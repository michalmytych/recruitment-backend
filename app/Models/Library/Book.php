<?php

namespace App\Models\Library;

use App\Filters\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library\Filters\BookSearchFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'title',
        'author',
        'published_at_year',
        'description',
        'available_amount',
    ];

    static function getCustomFilters(): array
    {
        return [
            'search' => BookSearchFilter::class
        ];
    }

    static function getFilterableColumns(): array
    {
        return [
            'title' => [
                'operators' => ['contains', 'starts', 'ends', 'eq'],
                'input' => 'text'
            ],
            'author' => [
                'operators' => ['contains', 'starts', 'ends', 'eq'],
                'input' => 'text'
            ],
        ];
    }
}
