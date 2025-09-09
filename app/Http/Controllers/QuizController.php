<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class QuizController extends Controller
{



    function quiz_form(): View
    {
        $correctAnswer = Character::inrandomOrder()->first();
        $wrongAnswer = Character::where('idcharacters', '!=', $correctAnswer->id)
            ->inrandomOrder()
            ->limit(3)
            ->get();



        $answer_collect = session()->get('quiz_answers', []);
        $question_number = count($answer_collect) + 1;




        $options = $wrongAnswer->push($correctAnswer)->shuffle();
        return view('quiz.choice', [
            'options' => $options,
            'correctAnswer' => $correctAnswer,
            'question_number' => $question_number,

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

        return redirect()->route('quiz.form');
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



    function result(): view
    {
        $answers_collect = session()->get('quiz_answers', []);


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


        ]);
    }

    public function start():RedirectResponse
    {
        
        session()->forget('quiz_answers');
        return redirect()->route('quiz.form');
    } 
}
