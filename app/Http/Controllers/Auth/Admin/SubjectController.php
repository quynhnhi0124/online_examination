<?php

// namespace App\Http\Controllers\Admin;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Admin\SubjectRequest;
// use App\Repositories\Admin\SubjectRepository;
// use Illuminate\Http\Request;

// class SubjectController extends Controller
// {
//     protected $subjectRepo;

//     public function __construct(SubjectRepository $subjectRepo)
//     {
//         $this->subjectRepo = $subjectRepo;
//     }
//     public function index()
//     {
//         $subjects = $this->subjectRepo->getAll();
//         return view('admin.content.subjects.index', ['subjects' => $subjects]);
//     }

//     public function create()
//     {
//         return view('admin.content.subjects.submit');
//     }

//     public function edit($id)
//     {
//         $subject = $this->subjectRepo->find($id);

//         return view('admin.content.subjects.edit', ['subject' => $subject]);
//     }

//     public function delete($id)
//     {
//         $subject = $this->subjectRepo->find($id);
//         return view('admin.content.subject.delete', ['subject' => $subject]);
//     }

//     public function store(SubjectRequest $request)
//     {
//         $validated = $request->validated();
//         $data = $request->all();

//         $subject = $this->subjectRepo->create($data);

//         return redirect()->route('admin.subject');
//     }

//     public function update(SubjectRequest $request, $id)
//     {
//         $validated = $request->validated();
//         $data = $request->all();
//         $subject = $this->subjectRepo->update($id, $data);

//         return redirect()->route('admin.subject');
//     }

//     public function destroy($id)
//     {
//         $this->subjectRepo->delete($id);
//         return redirect()->route('admin.subject');
//     }
// }