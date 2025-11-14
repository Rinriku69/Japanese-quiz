<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class QuizController extends Controller
{



    function quiz_level(int $minimum, int $max): array
    {
        $correctAnswer = Character::where('idcharacters', '<=', $max)
            ->where('idcharacters', '>=', $minimum)
            ->inrandomOrder()->first();

        $wrongAnswer = Character::where('idcharacters', '!=', $correctAnswer->idcharacters)
            ->where('type', '=', $correctAnswer->type)
            ->where('idcharacters', '<=', $max)
            ->where('idcharacters', '>=', $minimum)
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
        $choices = $this->quiz_level(1, 92);
        $options = $choices['options'];
        $correctAnswer = $choices['correctAnswer']->idcharacters;
        session()->put('correctAnswer', $correctAnswer);

        return view('hira-kata.intermediate', [
            'question' => $choices['correctAnswer']->character,
            'question_type' => $choices['correctAnswer']->type,
            'options' => $options,
            'question_number' => $question_number,
            'quiz_level' => 'intermediate',
        ]);
    }

    function beginner_quiz(): View
    {

        $id_range = session()->get('beginner_id_range');

        $answer_collect = session()->get('quiz_answers', []);

        $question_number = count($answer_collect) + 1;
        if ($id_range <= 46) {
            $minimum = 1;
        } else {
            $minimum = 47;
        }
        $choices = $this->quiz_level($minimum, $id_range);
        $options = $choices['options'];
        $correctAnswer = $choices['correctAnswer']->idcharacters;
        session()->put('correctAnswer', $correctAnswer);

        return view('hira-kata.beginner', [
            'options' => $options,
            'question' => $choices['correctAnswer']->character,
            'question_type' => $choices['correctAnswer']->type,
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

        if (time() >= $endTime) {
            session()->forget('quiz_end_time');
            return redirect()->route('quiz.result-text', ['quiz_level' => 'text']);
        }

        $timeLeft = $endTime - time();
        $answer_collect = session()->get('quiz_answers', []);
        $question_number = count($answer_collect) + 1;
        $choices = $this->quiz_level(1, 92);
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
        $user_answer = Character::where('idcharacters', '=', $data['choice'])
            ->first();
        $user_input = $user_answer->romaji;
        $correctAnswer = session()->get('correctAnswer', []);
        /* dd($correctAnswer); */
        $answer_collect[] = [
            'correct_answer_id' => (int)$correctAnswer,
            'choice_id' => (int) $data['choice'],
            'user_input' => (string) $user_input
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
        $user_input = $data['romaji'];
        $user_input_id = Character::where('romaji', '=', $user_input)->where('idcharacters', '>', 46)
            ->first() ?? Character::where('idcharacters', '=', 999)->first();
        $answer_collect = session()->get('quiz_answers', []);

        $answer_collect[] = [
            'correct_answer_id' => (int) $data['correct_answer_id'],
            'choice_id' => (int) $user_input_id->idcharacters,
            'user_input' => (string) $user_input
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
                'user_answer' => $item['user_input']
            ];
        }

        return $enrichedItems;
    }

    function result(ServerRequestInterface $request): view
    {
        $data = $request->getQueryParams();
        $answers_collect = session()->get('quiz_answers', []);
        if (isset($data['quiz_level'])) {
            $quiz_level = $data['quiz_level'];
        }

        $score = 0;
        foreach ($answers_collect as $answer) {
            if ($answer['correct_answer_id'] === $answer['choice_id']) {
                $score++;
            }
        }
        $answer_info = $this->prepareAnswers($answers_collect);
        session()->forget('quiz_answers');
        session()->forget('quiz_end_time');

        return view('quiz.result', [
            'score' => $score,
            'total' => count($answers_collect),
            'answers' => $answer_info,
            'quiz_level' => $quiz_level,



        ]);
    }

    function result_text(ServerRequestInterface $request, string $quiz_level): view
    {
        $data = $request->getQueryParams();
        $answers_collect = session()->get('quiz_answers', []);
        if (isset($data['quiz_level'])) {
            $quiz_level = $data['quiz_level'];
        }


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
        } else {
            $durationInSeconds = 120;
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
        } elseif ($level == 'beginner') {
            return redirect()->route('quiz.beginner');
        } else {
            $durationInSeconds = 120;
            session()->put('quiz_end_time', now()->addSeconds($durationInSeconds)->timestamp);
            return redirect()->route('quiz.text');
        }
    }

    public function drawing_quiz(): View
    {

        $character = Character::inRandomOrder()
            ->where('idcharacters', '>', 46)
            ->where('idcharacters', '<=', 56)
            ->first();

        return view('quiz.drawing', [
            'characterToDraw' => $character
        ]);
    }
}
