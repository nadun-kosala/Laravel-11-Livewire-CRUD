<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $questions = [];
    public $qu;

    public function mount()
    {
        $this->questions = json_decode(
            '[
          {
            "id": "q1",
            "questionNumber": 1,
            "questionType": "multiple-choice",
            "componentName": "QuestionComponent1",
            "question": "What is your favorite color?",
            "answers": [
              "Red",
              "Blue",
              "Green",
              "Yellow"
            ],
            "validation": {
              "required": true,
              "minSelection": 1,
              "maxSelection": 1
            }
          },
          {
            "id": "q2",
            "questionNumber": 2,
            "questionType": "text",
            "componentName": "QuestionComponent2",
            "question": "Please describe your ideal vacation.",
            "answers": [],
            "validation": {
              "required": false,
              "maxLength": 500
            }
          },
          {
            "id": "q3",
            "questionNumber": 3,
            "questionType": "rating",
            "componentName": "QuestionComponent3",
            "question": "How satisfied are you with our service?",
            "answers": [
              "Very Unsatisfied",
              "Unsatisfied",
              "Neutral",
              "Satisfied",
              "Very Satisfied"
            ],
            "validation": {
              "required": true,
              "minValue": 1,
              "maxValue": 5
            }
          }
        ]',
            true,
        );

        $this->qu = $this->questions[0];
    }

    public function submit()
    {
        if ($this->qu) {
            $quNum = $this->qu['questionNumber'];
            $this->qu = $this->questions[$quNum];
        }
    }

    public function render()
    {
        return view('livewire.test', ['quetions']);
    }
}
