const textElement = document.querySelector('#text');
const speakBtn = document.querySelector('#speak-btn');
const stopBtn = document.querySelector('#stop-btn');
const rateInput = document.querySelector('#id_speed');
const speedLabel = document.getElementById('speedLabel');

// ② 使える声が追加されたときに着火するイベントハンドラ。
// Chrome は非同期に(一個ずつ)声を読み込むため必要。
speechSynthesis.onvoiceschanged = (e) => {
    //appendVoices();
}

// input要素の値が変更されたときに速度ラベルを更新するイベントリスナーを追加
rateInput.addEventListener('input', () => {
    speedLabel.textContent = `(${rateInput.value})`;
});

speakBtn.addEventListener('click', () => {
    document.querySelector('#stop-btn').innerHTML = '一時停止';
    const text = textElement.value;

    if (text.match(/[^\x01-\x7E\uFF61-\uFF9F]+/)) {
        //全角文字
        alert('全角文字は再生できません。');
    } else {
        //全角文字以外
        console.log("全角文字ではありません");

        const splitTextArr = text.split(/[,\.]/);

        speechSynthesis.cancel();

        splitTextArr.forEach((splitText) => {
            const uttr = new SpeechSynthesisUtterance(splitText);

            uttr.voice = speechSynthesis.getVoices().filter((voice) => voice.name === "Google US English")[0];
            const rate = parseFloat(rateInput.value);
            uttr.rate = rate;

            speechSynthesis.speak(uttr);
        })
    }
});

stopBtn.addEventListener('click', () => {
    let btnText = document.querySelector('#stop-btn').textContent;

    if (btnText === '一時停止') {
        speechSynthesis.pause();
        document.querySelector('#stop-btn').innerHTML = '再開';
    }
    if (btnText === '再開') {
        speechSynthesis.resume();
        document.querySelector('#stop-btn').innerHTML = '一時停止';
    }
});
