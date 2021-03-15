<?php

namespace App\Exports;
use App\Repositories\Repository;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;


class UserExport implements FromCollection, WithMapping, WithHeadings, WithStrictNullComparison
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user = Repository::getUser()->join('roles', 'users.role', 'roles.role_num');
        foreach($user as $key=>$value){
            if($value->status == 1){
                $value->status = "Kích hoạt";
            }elseif($value->status == 0){
                $value->status = "Vô hiệu hóa";
            }
        }
        return $user;
    }

    public function headings():array
    {
        return [
            "Username", 
            "Email", 
            "Quyền", 
            "Trạng thái", 
        ];
    }

    public function map($user):array
    {
        return [
            $user->username, 
            $user->email, 
            $user->role, 
            $user->status, 
            ];
    }
}
