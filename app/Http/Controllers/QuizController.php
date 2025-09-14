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
        $correctAnswer = Character::where('idcharacters', '<=', $level)
            ->where('idcharacters','>',30)
            ->inrandomOrder()->first();
        $wrongAnswer = Character::where('idcharacters', '!=', $correctAnswer->idcharacters)
            ->where('type', '=', $correctAnswer->type)
            ->where('idcharacters','>',30)
            ->where('idcharacters', '<=', $level)
            ->inrandomOrder()
            ->limit(3)
            ->get();

        $options = $wrongAnswer->push($correctAnswer)->shuffle();

        $choices = [];
        $choices['options'] = $options;
        $choices['correctAnswer'] = $correctAnswer;
        return $choices;
    }

    function intermediate_quiz(): View
    {

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

    function beginner_quiz(): View
    {

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
    function text_quiz(): View | RedirectResponse
    {
        $endTime = session()->get('quiz_end_time');

        
        if (!$endTime) {
            return redirect()->route('home.main');
        }

        // Check if the time is up
        if (time() >= $endTime) {
            session()->forget('quiz_end_time');
            return redirect()->route('quiz.result-text',['quiz_level' => 'text']);
        }

        
        $timeLeft = $endTime - time();
        $answer_collect = session()->get('quiz_answers', []);
        $question_number = count($answer_collect) + 1;
        $choices = $this->quiz_level(46);
        $correctAnswer = $choices['correctAnswer'];

        return view('quiz.text', [
            'correctAnswer' => $correctAnswer,
            'question_number' => $question_number,
            'timeLeft' => $timeLeft,
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

        if ($data['quiz_level'] == 'intermediate') {
            return redirect()->route('quiz.intermediate');
        } else {
            return redirect()->route('quiz.beginner');
        }
    }
    function text_process(ServerRequestInterface $request): RedirectResponse
    {
        $data = $request->getParsedBody();
        $user_input= $data['romaji'];
        $user_input_id = Character::where('romaji','=',$user_input)
                        ->first() ?? Character::where('idcharacters','=',999)->first();
        $answer_collect = session()->get('quiz_answers', []);
        $answer_collect[] = [
            'correct_answer_id' => (int) $data['correct_answer_id'],
            'choice_id' => (int) $user_input_id->idcharacters   
        ];
        session()->put('quiz_answers', $answer_collect);

            return redirect()->route('quiz.text');
        
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
        $data = $request->getQueryParams();
        $answers_collect = session()->get('quiz_answers', []);
        if(isset($data['quiz_level'])){
        $quiz_level = $data['quiz_level'];}
        

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
    function result_text(ServerRequestInterface $request,string $quiz_level): view
    {
        $data = $request->getQueryParams();
        $answers_collect = session()->get('quiz_answers', []);
        if(isset($data['quiz_level'])){
        $quiz_level = $data['quiz_level'];}
        

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

    public function start(ServerRequestInterface $request): RedirectResponse
    {
        $data = $request->getParsedBody();
        $level = $data['quiz_level'];
        session()->forget('quiz_answers');
        $data_id_range = $data['id_range'] ?? 10;
        $id_range = (int) $data_id_range;
        session()->put('beginner_id_range', $id_range);


        if ($level == 'intermediate') {
            return redirect()->route('quiz.intermediate');
        } elseif ($level == 'beginner') {
            return redirect()->route('quiz.beginner');
        }else{
            $durationInSeconds = 60;
            session()->put('quiz_end_time', now()->addSeconds($durationInSeconds)->timestamp);
            return redirect()->route('quiz.text');
        }
    }

    public function restart(ServerRequestInterface $request): RedirectResponse
    {
        $data = $request->getParsedBody();
        $level = $data['quiz_level'];
        session()->forget('quiz_answers');



        if ($level == 'intermediate') {
            return redirect()->route('quiz.intermediate');
        } elseif($level == 'beginner') {
            return redirect()->route('quiz.beginner');}
        else{
            return redirect()->route('quiz.text');
        }

        
    }

    public function drawing_quiz(): View
    {
        
        $character = Character::inRandomOrder()
        ->where('idcharacters','<=',30)
        ->first();

        return view('quiz.drawing', [
            'characterToDraw' => $character
        ]);
    }

    public function start_text_quiz(): RedirectResponse
    {
        // 1. Clear any previous quiz data
        session()->forget('quiz_answers');

        // 2. Set the quiz duration and store the END time in the session
        $durationInSeconds = 60;
        session()->put('quiz_end_time', now()->addSeconds($durationInSeconds)->timestamp);

        // 3. Redirect to the first question
        return redirect()->route('quiz.text'); // Assuming 'quiz.text' is the route for your text_input view
    }
}
