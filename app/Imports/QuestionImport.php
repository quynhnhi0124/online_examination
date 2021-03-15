<?php

namespace App\Imports;

use App\QuestionModel;
use App\Repositories\Repository;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class QuestionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function headingRow() :int 
    {
        return 1;
    }

    public function model(array $row)
    {
        $subjects = Repository::getSubject()->join('questions','questions.subject_id','subjects.id');
        $category = Repository::getCategory()->get();
        return Repository::getQuestion()->insert([
            // 'subject_id'=>,
            // 'category_id'=>,
            // 'question'=>,
            // 'option_a'=>,
            // 'option_b'=>,
            // 'option_c'=>,
            // 'option_d'=>,
            // 'answer'=>,
            // 'image'=>,
            
        ]);
    }
}
