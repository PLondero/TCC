const questions = [
    {
        questions: "Qual o tamanho da pança do pippi?",
        answers: [
            {id: 1, text: "120cm", correct: false},
            {id: 2, text: "90cm", correct: false},
            {id: 3, text: "180cm", correct: false},
            {id: 4, text: "340cm", correct: true},
        ]
    },

    {
        questions: "Qual o tamanho da peça do pippi?",
        answers: [
            {id: 1, text: "1cm", correct: false},
            {id: 2, text: "0.5cm", correct: true},
            {id: 3, text: "10", correct: false},
            {id: 4, text: "7", correct: false},
        ]
    },

    {
        questions: "Qual o tamanho da pança do pippi?",
        answers: [
            {id: 1, text: "120cm", correct: false},
            {id: 2, text: "90cm", correct: false},
            {id: 3, text: "180cm", correct: false},
            {id: 4, text: "340cm", correct: true},
        ]
    }
]


const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer-buttons");
const nextButton = document.getElementById("next-btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Próxima";
    showQuestion();
}

function resetState() {
    nextButton.style.display = "none";
    while (answerButtons.firstChild) {
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function showQuestion() {
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.questions;

    currentQuestion.answers.forEach((answer) => {
        const button = document.createElement("button")
        button.innerHTML = answer.text;
        button.dataset.id = answer.id;
        button.classList.add("btn");
        button.addEventListener("click", selectAnswer)
        answerButtons.appendChild(button);
    })

}

function selectAnswer(e) {
    answers = questions[currentQuestionIndex].answers;
    const correctAnswer = answers.filter((answer) => answer.correct == true)[0];

    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.id == correctAnswer.id;
    if (isCorrect) {
        selectedBtn.classList.add("correct");
        score++;
    } else {
        selectedBtn.classList.add("incorrect");
    }
    Array.from(answerButtons.children).forEach((button) => {
        button.disabled = true;
    });
    nextButton.style.display = "block";
}

function showScore() {
    resetState();
    questionElement.innerHTML = `Você acertou ${score} de ${questions.length}!`;
    nextButton.innerHTML = "Jogar denovo";
    nextButton.style.display ="block";
}

function handleNextButton() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {
        showQuestion();
    } else {
        showScore();
    }
}

nextButton.addEventListener("click", () => {
    if (currentQuestionIndex < questions.length) {
        handleNextButton();
    } else {
        startQuiz();
    }
})

startQuiz();