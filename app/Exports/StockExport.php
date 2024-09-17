<?php
namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StockExport implements FromQuery, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Database\Query\Builder
     */
    public function query()
    {
        return DB::table('stock')
                 ->select(DB::raw('sku, GROUP_CONCAT(id ORDER BY id SEPARATOR "|") as ids'))
                 ->groupBy('sku')
                 ->orderBy('sku');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'sku',
            'stock_ids',
        ];
    }

    /**
     * @param array $row
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->sku,
            $row->ids,
        ];
    }
}
