const textElement = document.querySelector('#text')
const speakBtn = document.querySelector('#speak-btn')
const stopBtn = document.querySelector('#stop-btn')
const rateInput = document.querySelector('#id_speed')
const speedLabel = document.getElementById('speedLabel');

// ② 使える声が追加されたときに着火するイベントハンドラ。
// Chrome は非同期に(一個ずつ)声を読み込むため必要。
speechSynthesis.onvoiceschanged = (e) => {
    //appendVoices()
}

// input要素の値が変更されたときに速度ラベルを更新するイベントリスナーを追加
rateInput.addEventListener('input', () => {
    speedLabel.textContent = `(${rateInput.value})`;
});

speakBtn.addEventListener('click', () => {
    let btnText = document.querySelector('#speak-btn').textContent;
    console.log(btnText);

    const text = textElement.value;

    const splitTextArr = text.split(/[,\.]/);
    console.log(splitTextArr);

    speechSynthesis.cancel();

    splitTextArr.forEach(function (splitText) {
        const uttr = new SpeechSynthesisUtterance(splitText)
        console.log(splitText);

        uttr.voice = speechSynthesis
            .getVoices()
            .filter((voice) => voice.name === "Google US English")[0]
        const rate = parseFloat(rateInput.value);
        uttr.rate = rate

        //speechSynthesis.speak(uttr);
        //speechSynthesis.cancel();
        speechSynthesis.speak(uttr);
    })
})

stopBtn.addEventListener('click', () => {
    let btnText = document.querySelector('#stop-btn').textContent;
    console.log(btnText);
    if (btnText === '一時停止') {
        speechSynthesis.pause();
        document.querySelector('#stop-btn').innerHTML = '再開'
    }
    if (btnText === '再開') {
        speechSynthesis.resume();
        document.querySelector('#stop-btn').innerHTML = '一時停止'
    }
})
