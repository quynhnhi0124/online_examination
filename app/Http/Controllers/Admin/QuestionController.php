<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    public function question()
    {
        return view('subject.question.create');
    }
}
