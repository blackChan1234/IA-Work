let questions = [
    "1.當你沒有玩線上遊戲時,你多常幻想自己在玩線上遊戲、想著前幾次玩遊戲的事;或期待下㇐次的遊戲?",
    "2.當你不能玩線上遊戲或是玩得比平常少的時候,你多常感到靜不下心、煩躁、焦慮、或悲傷?",
    "3.在過去的 12 個月裡,你感覺需要更常玩線上遊戲,或打更久的時間才覺得你玩夠了?",
    "4.在過去的 12 個月裡,你曾經試著減少花在線上遊戲的時間,但沒有成功?",
    "5.在過去的 12 個月裡,你曾經會玩線上遊戲而沒和朋友見面,或不再從事你以前常參加的嗜好活動?",
    "6.即使線上遊戲的負面影響(例如減少睡眠、無法把學業或工作做好、與家人或朋友爭吵、或無視於重要的責任),你還是玩很多?",
    "7.你曾試著不讓你的家人、朋友或其他重要的人知道你玩線上遊戲的時間,或你曾對他們謊稱你玩線上遊戲的情形?",
    "8.你曾玩線上遊戲來舒解負面的情緒(例如感到無助、內疚、或焦慮)?",
    "9.你曾因為玩線上遊戲而可能危害或失去重要的人際關係?",
    "10.在過去的 12 個月裡,你曾經因為玩線上遊戲而使你在學校或工作的表現陷入重大危機?"
];

let answers = [];
let currentIndex = 0;

document.getElementById('startGameBtn').addEventListener('click', function() {
    // 顯示小恶魔和對話框
    document.getElementById('demon').style.display = 'block';
    document.getElementById('dialogueBox').style.display = 'block';
    alert("歡迎來到這個遊戲！小心你的選擇…");
        document.getElementById('quiz-container').style.display = 'block';  // 啟動問卷

    // 隱藏開始遊戲的按鈕
    this.style.display = 'none';
});

function displayTextAnimation(text, callback) {
    let dialogueTextElement = document.getElementById('dialogueText');
    let textArray = [...text];
    let currentTextIndex = 0;

    let interval = setInterval(function() {
        if (currentTextIndex < textArray.length) {
            dialogueTextElement.innerText += textArray[currentTextIndex];
            currentTextIndex++;
        } else {
            clearInterval(interval);
            if(callback) callback(); // 問卷開始
        }
    }, 100);
}


function displayQuestion() {
    if (currentIndex < questions.length) {
        document.getElementById("questionDisplay").innerText = questions[currentIndex];
    } else {
        // 暫停短時間後計算結果
        setTimeout(() => {
            calculateResult();
        }, 500);
    }
}


let timer = 120; // 120秒

let timerInterval = setInterval(function() {
    timer--;
    document.getElementById('timer').textContent = "Remaining Time: " + timer + "s";

    if (timer <= 0) {
        clearInterval(timerInterval);
        endGame("時間到了!");
    }
}, 1000);

function endGame(reason) {
    document.getElementById('game-over').style.display = 'block';
    document.getElementById('reason').textContent = reason;
    document.getElementById('quiz-container').style.display = 'none';
}


function nextQuestion() {
    let selectedOption = document.querySelector('input[name="answer"]:checked');

    if (selectedOption) {
        answers.push(parseInt(selectedOption.value));
        increaseScore();
        currentIndex++;
        displayQuestion();

        // Reset the selected option for the next question
        selectedOption.checked = false;
    } else {
        alert("請選擇一個答案！");
    }
}
let score = 0;

function increaseScore() {
    let selectedOption = document.querySelector('input[name="answer"]:checked').value;

    // 當選擇radio button為2時，才調用以下代碼
    if (selectedOption == "2") {
        // 顯示小恶魔
        document.getElementById('demon').style.display = 'block';

        // 修改分數
        score += 1;
        document.getElementById('score').textContent = "Score: " + score;

        // 每次分數增加，小恶魔增大10%
        let demon = document.getElementById('demon');
        let currentWidth = parseInt(window.getComputedStyle(demon).width);
        demon.style.width = (currentWidth * 1.1) + "px";

        if (score > 5 && currentIndex == questions.length - 1) { // 修改條件，直到答完所有問題
            document.getElementById('game-over').style.display = 'block';
            document.getElementById('quiz-container').style.display = 'none'; // 隱藏問卷

            // 加上返回主頁的按鈕
            let btn = document.createElement("button");
            btn.innerHTML = "返回主頁";
            btn.onclick = function() {
                location.reload();  // 重新加載頁面
            };
            document.body.appendChild(btn);
        }
    }
        // 根據選擇的答案顯示不同對話
        let dialogue = '';
        switch (selectedOption) {
            case "0":
                dialogue = "你很清醒啊！";
                break;
            case "1":
                dialogue = "要小心哦！";
                break;
            case "2":
                dialogue = "我將更強大！";
                let demonLaughSound = document.getElementById('demonLaugh');
                demonLaughSound.play();
                break;
        }
        alert(dialogue);
}
function reloadPage() {
    location.reload();
}
function returnToIndex() {
    window.location.href = "index.php";
}
function calculateResult() {
    let score = answers.reduce((a, b) => a + b, 0);

    document.getElementById('quiz-container').style.display = 'none'; // 隱藏問卷

    if (score >= 5) {
        document.getElementById('game-over').style.display = 'block';
    } else {
        // 如果分數低於5，則顯示 "You Win" 的訊息
        document.getElementById('reason').textContent = "You Win! 您目前沒有網路遊戲成癮的跡象。";
        document.getElementById('game-over').style.display = 'block';
    }
}

displayQuestion();
