const text = document.querySelector('#text')
const voiceSelect = document.querySelector('#voice-select')
const speakBtn = document.querySelector('#speak-btn')
const rateInput = document.querySelector('#id_speed')

// selectタグの中身を声の名前が入ったoptionタグで埋める
const appendVoices = () => {
    // ①　使える声の配列を取得
    // 配列の中身は SpeechSynthesisVoice オブジェクト
    const voices = speechSynthesis.getVoices()
    console.log(voices)
    voiceSelect.innerHTML = ''
    voices.forEach((voice) => {
        // 日本語と英語以外の声は選択肢に追加しない。
        if (!voice.lang.match('en-US')) return
        const option = document.createElement('option')
        option.value = voice.name
        option.text = `${voice.name} (${voice.lang})`
        option.setAttribute('selected', voice.default)
        voiceSelect.appendChild(option)
    });
}

appendVoices()

// ② 使える声が追加されたときに着火するイベントハンドラ。
// Chrome は非同期に(一個ずつ)声を読み込むため必要。
speechSynthesis.onvoiceschanged = e => {
    console.log("aaaa");
    appendVoices()
}



speakBtn.addEventListener('click', (e) => {
    // 発言を作成
    const uttr = new SpeechSynthesisUtterance(text.value)
    // ③ 選択された声を指定
    uttr.voice = speechSynthesis
        .getVoices()
        .filter(voice => voice.name === voiceSelect.value)[0]
    const rate = parseFloat(rateInput.value);
    uttr.rate = rate
    // 発言を再生 (発言キュー発言に追加)
    console.log(e);
    speechSynthesis.speak(uttr)
})