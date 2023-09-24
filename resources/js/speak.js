const text = document.querySelector('#text')
//const voiceSelect = document.querySelector('#voice-select')
const speakBtn = document.querySelector('#speak-btn')
const stopBtn = document.querySelector('#stop-btn')
const rateInput = document.querySelector('#id_speed')
const speedLabel = document.getElementById('speedLabel');




/*
// selectタグの中身を声の名前が入ったoptionタグで埋める
const appendVoices = () => {
    // ① 使える声の配列を取得
    // 配列の中身は SpeechSynthesisVoice オブジェクト
    const voices = speechSynthesis.getVoices()
    console.log(voices);
    voiceSelect.innerHTML = ''
    voices.forEach((voice) => {
        if (!voice.lang.match('en-US')) return
        const option = document.createElement('option')
        option.value = voice.name
        option.text = `${voice.name} (${voice.lang})`
        option.setAttribute('selected', voice.default)
        voiceSelect.appendChild(option)
    });
}

appendVoices()
*/

// ② 使える声が追加されたときに着火するイベントハンドラ。
// Chrome は非同期に(一個ずつ)声を読み込むため必要。
speechSynthesis.onvoiceschanged = (e) => {
    //appendVoices()
}

// input要素の値が変更されたときに速度ラベルを更新するイベントリスナーを追加
rateInput.addEventListener('input', () => {
    speedLabel.textContent = `(${rateInput.value})`;
});

speakBtn.addEventListener('click', (e) => {
    // 発言を作成
    const uttr = new SpeechSynthesisUtterance(text.value)

    uttr.voice = speechSynthesis
        .getVoices()
        .filter((voice) => voice.name === "Google US English")[0]
    const rate = parseFloat(rateInput.value);
    uttr.rate = rate

    speechSynthesis.cancel();
    speechSynthesis.speak(uttr)
})

/*
stopBtn.addEventListener('click', (e) => {
    if (btnText === '再生') {
        speechSynthesis.resume();
        document.querySelector('#stop-btn').innerHTML = '一時停止'
    } else {
        speechSynthesis.pause();
        document.querySelector('#stop-btn').innerHTML = '再生'
    }
})
*/

stopBtn.addEventListener('click', (e) => {
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
