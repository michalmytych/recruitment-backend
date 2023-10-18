<?php

namespace App\Models\Library;

use App\Filters\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Library\Filters\BookSearchFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'title',
        'author',
        'published_at_year',
        'description',
        'available_amount',
        'category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

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
            'category_id' => [
                'operators' => ['eq'],
                'input' => 'integer'
            ],
        ];
    }
}
