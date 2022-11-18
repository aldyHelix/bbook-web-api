<?php
namespace App\Services;

use App\Repositories\Quiz\QuizInterface as QuizInterface;
use App\Models\Quiz;

class QuizService
{
    protected $quizRepository;
    protected $quizModel;

    public function __construct(QuizInterface $quizRepository, Quiz $quizModel)
    {
        $this->quizRepository = $quizRepository;
        $this->quizModel = $quizModel;
    }

	 public function createQuiz($request)
	 {

        $request->validate([
			'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
	    ]);

		$data = $request->dt;
        $gambar = $request->file('gambar');
        if($gambar != null){
                $nama_file1 = time()."_".$gambar->getClientOriginalName();
                $tujuan_upload = 'uploads/quiz';
                $gambar->move($tujuan_upload,$nama_file1);
                $data['image'] = $nama_file1;
        }

		if($this->quizModel->create($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function updateQuiz($request, $id)
	 {

        $request->validate([
			'gambar' => 'image|mimes:jpg,jpeg,png,gif|max:1048',
	  	]);

        $data = $request->dt;
        $gambar = $request->file('gambar');
        if($gambar != null){
                $nama_file1 = time()."_".$gambar->getClientOriginalName();
                $tujuan_upload = 'uploads/materi';
                $gambar->move($tujuan_upload,$nama_file1);
                $data['image'] = $nama_file1;
        }
		$getData = $this->quizRepository->getQuizById($id);

		if($getData->update($data))
		{
			return true;
		}
		else
		{
			return false;
		}
	 }

	 public function deleteQuiz($id)
	 {
		 $quiz = $this->quizRepository->getQuizById($id);

		 if($quiz->delete())
		 {
			return true;
		 }
		 else
		 {
			return false;
		 }
	 }
}
