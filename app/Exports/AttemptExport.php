<?php

namespace App\Exports;

use App\StudentAttemptModel;
use App\Repositories\Repository;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class AttemptExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
    }

    public function headings():array
    {
        return [
            "Tên bài thi", 
            "Số lần thực hiện", 
            "Số điểm cao nhất", 
            "Số điểm thấp nhất",
        ];
    }

    public function map($personal):array
    {

            return [
                $personal->exam_name,
                $personal->attempt,
                $personal->max,
                $personal->min,
                ];
    }
}
