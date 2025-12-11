@extends('layouts.main', ['title' => 'Word Quiz'])

@section('content')

    <style>
        .quiz-transition {
            transition: opacity 0.3s ease-in-out, transform 0.3s ease-in-out;
            opacity: 1;
            transform: translateY(0);
        }
        .quiz-transition.fade-out {
            opacity: 0;
            transform: translateY(-10px);
        }
        .quiz-transition.fade-in {
            opacity: 0;
            transform: translateY(10px);
        }
    </style>

    <div class="quiz-container" id="quiz-wrapper">    
        <div id="quiz-content" class="quiz-transition">
            <h1>Question : {{ $question_number }}</h1>
            <div class="quiz-question">
                <h1>{{ $question }}</h1>
                <p class="kana-type">Translate to English</p>
            </div>

            <form action="{{ route('quiz.word-text-process') }}" method="POST" id="quiz-form-submit">
                @csrf
                
                <div class="text-input-container">
                    <input type="text" name="meaning" class="text-input-field" placeholder="Type the meaning..." autofocus autocomplete="off">
                </div>
                
                <button type="submit" class="btn-action clickable-sound">Next Question</button>
            </form>
        </div>

        <div class="view-result-container">
            <form action="{{ route('quiz.result-text',['quiz_level' => 'word']) }}" method="get" id="quiz-form-finish">
                @if ($question_number >= 2)
                    <input type="hidden" name="quiz_level" value="word">
                    <button type="submit" class="btn-view-result result-sound">Finish & View Result</button>
                @endif
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const wrapper = document.getElementById('quiz-wrapper');
            
            // Event delegation for the dynamic form
            wrapper.addEventListener('submit', function(e) {
                if (e.target && e.target.id === 'quiz-form-submit') {
                    e.preventDefault();
                    handleFormSubmit(e.target);
                }
            });

            async function handleFormSubmit(form) {
                const content = document.getElementById('quiz-content');
                const formData = new FormData(form);
                const action = form.action;

                // 1. Fade Out
                content.classList.add('fade-out');

                try {
                    // 2. Fetch new content
                    const response = await fetch(action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        redirect: 'follow' 
                        // Laravel redirects after POST, 'follow' will get the GET page
                    });

                    if (!response.ok) throw new Error('Network response was not ok');

                    const text = await response.text();
                    
                    // 3. Parse HTML
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(text, 'text/html');
                    const newContent = doc.getElementById('quiz-content');
                    const newFinishBtn = doc.querySelector('.view-result-container'); // Get updated finish button container

                    if (!newContent) throw new Error('New content not found');

                    // 4. Swap Content (after short delay for anim)
                    setTimeout(() => {
                        content.innerHTML = newContent.innerHTML;
                        
                        // Update Finish button area if it exists outside the swappable area
                        const currentFinishBtnContainer = document.querySelector('.view-result-container');
                        if (currentFinishBtnContainer && newFinishBtn) {
                            currentFinishBtnContainer.innerHTML = newFinishBtn.innerHTML;
                        }

                        // 5. Fade In
                        content.classList.remove('fade-out');
                        content.classList.add('fade-in');
                        
                        // Re-focus input
                        const input = content.querySelector('input[name="meaning"]');
                        if (input) input.focus();

                        // Cleanup anim class
                        setTimeout(() => {
                            content.classList.remove('fade-in');
                        }, 300);

                    }, 300);

                } catch (error) {
                    console.error('Quiz Error:', error);
                    // Fallback to normal submit if something breaks
                    form.submit();
                }
            }
        });
    </script>
@endsection
