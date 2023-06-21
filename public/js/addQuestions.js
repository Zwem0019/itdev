
let amountOfAnswers = 0;
function addAmountOfAnswers() {
    const amountOfAnswersDiv = document.getElementById("AmountOfAnswers");
    amountOfAnswers += 1;
    amountOfAnswersDiv.setAttribute("value", amountOfAnswers);
}
function add_multiple_choice_answer() {
    let answerDiv = document.getElementById("answers");
    answerDiv.removeChild(answerDiv.lastChild);
    const amountOfAnswers = answerDiv.children.length / 2 + 1;
    const answerInput = document.createElement("input");
    answerInput.setAttribute("type", "text");
    answerInput.setAttribute("name", "AnswerOption" + amountOfAnswers);
    answerInput.setAttribute("placeholder", "Answer");
    answerInput.setAttribute("class", "form-control");
    answerDiv.appendChild(answerInput);
    answerDiv.appendChild(document.createElement("br"));

    const addQuestionButton = document.createElement("button");
    addQuestionButton.innerHTML = "Add Answer";
    addQuestionButton.setAttribute("type", "button");
    addQuestionButton.setAttribute("class", "btn btn-primary");
    addQuestionButton.setAttribute("onclick", "add_multiple_choice_answer()");
    answerDiv.appendChild(addQuestionButton);
    addAmountOfAnswers(1);
}
function add_multiple_choice() {
    const checkbox = document.getElementById("multiple_choice");

    const answerDiv = document.getElementById("answers");

    if (checkbox.checked === true) {
        for (let i = 0; i < 2; i++) {
            const answerInput = document.createElement("input");
            answerInput.setAttribute("type", "text");
            answerInput.setAttribute("name", "AnswerOption" + (i + 1));
            answerInput.setAttribute("placeholder", "Answer");
            answerInput.setAttribute("class", "form-control");
            answerDiv.appendChild(answerInput);
            answerDiv.appendChild(document.createElement("br"));
            addAmountOfAnswers();
        }
        const addQuestionButton = document.createElement("button");
        addQuestionButton.innerHTML = "Add Answer";
        addQuestionButton.setAttribute("type", "button");
        addQuestionButton.setAttribute("class", "btn btn-primary");
        addQuestionButton.setAttribute("onclick", "add_multiple_choice_answer()");
        answerDiv.appendChild(addQuestionButton);
    }
}

function remove_multiple_choice() {
    const checkbox = document.getElementById("short_answer");

    const answerDiv = document.getElementById("answers");

    if (checkbox.checked === true) {
       while (answerDiv.firstChild) {
           answerDiv.removeChild(answerDiv.lastChild);
       }
    }
}
