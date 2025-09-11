<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class QuizController extends Controller
{



    function quiz_level(int $level): array
    {
        $correctAnswer = Character::where('idcharacters','<=',$level)
        ->inrandomOrder()->first();
        $wrongAnswer = Character::where('idcharacters', '!=', $correctAnswer->id)
            ->where('type','=',$correctAnswer->type)
            ->where('idcharacters','<=',$level)
            ->inrandomOrder()
            ->limit(3)
            ->get();

        $options = $wrongAnswer->push($correctAnswer)->shuffle();

        $choices=[];
        $choices['options'] = $options;
        $choices['correctAnswer'] = $correctAnswer;
        return $choices;
    }

    function intermediate_quiz(): View{
        
        $answer_collect = session()->get('quiz_answers', []);
        $question_number = count($answer_collect) + 1;
        $choices = $this->quiz_level(92);
        $options = $choices['options'];
        $correctAnswer = $choices['correctAnswer'];

        return view('hira-kata.intermediate', [
            'options' => $options,
            'correctAnswer' => $correctAnswer,
            'question_number' => $question_number,
            'quiz_level' => 'intermediate',
        ]);
    }

    function beginner_quiz(): View{
       
        $id_range = session()->get('beginner_id_range');
   
        $answer_collect = session()->get('quiz_answers', []);

        $question_number = count($answer_collect) + 1;
        $choices = $this->quiz_level($id_range);
        $options = $choices['options'];
        $correctAnswer = $choices['correctAnswer'];

        return view('hira-kata.beginner', [
            'options' => $options,
            'correctAnswer' => $correctAnswer,
            'question_number' => $question_number,
            'quiz_level' => 'beginner',
            'id_range' => $id_range,
        ]);
    }




    function process(ServerRequestInterface $request): RedirectResponse
    {
        $data = $request->getParsedBody();
        $answer_collect = session()->get('quiz_answers', []);
        $answer_collect[] = [
            'correct_answer_id' => (int) $data['correct_answer_id'],
            'choice_id' => (int) $data['choice']
        ];
        session()->put('quiz_answers', $answer_collect);

        if($data['quiz_level'] == 'intermediate'){
        return redirect()->route('quiz.intermediate');
        }else{
        return redirect()->route('quiz.beginner');
        }
    }

    public function prepareAnswers(array $items): array
    {
        $enrichedItems = [];

        foreach ($items as $item) {
            $enrichedItems[] = [

                'correct_answer' => Character::find($item['correct_answer_id']),


                'user_choice' => Character::find($item['choice_id']),
            ];
        }

        return $enrichedItems;
    }



    function result(ServerRequestInterface $request): view
    {
        $data = $request->getParsedBody();
        $answers_collect = session()->get('quiz_answers', []);
        $quiz_level = $data['quiz_level'];


        $score = 0;
        foreach ($answers_collect as $answer) {
            if ($answer['correct_answer_id'] === $answer['choice_id']) {
                $score++;
            }
        }
        $answer_info = $this->prepareAnswers($answers_collect);
        session()->forget('quiz_answers');
        

        return view('quiz.result', [
            'score' => $score,
            'total' => count($answers_collect),
            'answers' => $answer_info,
            'quiz_level' => $quiz_level,


        ]);
    }

    public function start(ServerRequestInterface $request):RedirectResponse
    {
        $data = $request->getParsedBody();
        $level = $data['quiz_level']; 
        session()->forget('quiz_answers');
        $data_id_range = $data['id_range'] ?? 10 ;
        $id_range = (int) $data_id_range ;
        session()->put('beginner_id_range', $id_range);
        

        if($level == 'intermediate'){
        return redirect()->route('quiz.intermediate');
        }else{
        return redirect()->route('quiz.beginner');
        }
    } 

    public function restart(ServerRequestInterface $request):RedirectResponse
    {
        $data = $request->getParsedBody();
        $level = $data['quiz_level']; 
        session()->forget('quiz_answers');
        
        

        if($level == 'intermediate'){
        return redirect()->route('quiz.intermediate');
        }else{
        return redirect()->route('quiz.beginner');
        }
    } 
}
