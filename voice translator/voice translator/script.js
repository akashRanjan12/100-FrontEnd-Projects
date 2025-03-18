const startRecordingBtn = document.getElementById("start-recording");
const translateBtn = document.getElementById("translate-btn");
const speakTranslationBtn = document.getElementById("speak-translation");
const recognizedText = document.getElementById("recognized-text");
const translatedText = document.getElementById("translated-text");
const languageSelect = document.getElementById("language-select");

let speechRecognition = new (window.SpeechRecognition || window.webkitSpeechRecognition)();
speechRecognition.lang = "en-US";
speechRecognition.interimResults = false;
speechRecognition.maxAlternatives = 1;

// 🎤 **Speech-to-Text**
startRecordingBtn.addEventListener("click", () => {
    recognizedText.textContent = "Listening...";
    speechRecognition.start();
});

speechRecognition.onresult = (event) => {
    const transcript = event.results[0][0].transcript;
    recognizedText.textContent = transcript;
};

speechRecognition.onerror = (event) => {
    recognizedText.textContent = "Error: " + event.error;
};

// 🌍 **Translate Text (Google Translate API)**
translateBtn.addEventListener("click", async () => {
    const textToTranslate = recognizedText.textContent;
    const targetLanguage = languageSelect.value;

    if (!textToTranslate || textToTranslate === "Your speech will appear here...") {
        alert("Please speak first!");
        return;
    }

    try {
        const response = await fetch("https://api.mymemory.translated.net/get?q=" + encodeURIComponent(textToTranslate) + "&langpair=en|" + targetLanguage);
        const data = await response.json();

        translatedText.textContent = data.responseData.translatedText;
    } catch (error) {
        translatedText.textContent = "Translation error!";
        console.error("Translation Error:", error);
    }
});

// 🔊 **Text-to-Speech**
speakTranslationBtn.addEventListener("click", () => {
    const text = translatedText.textContent;
    if (!text || text === "Translation will appear here...") {
        alert("Please translate first!");
        return;
    }

    let speech = new SpeechSynthesisUtterance(text);
    speech.lang = languageSelect.value;
    window.speechSynthesis.speak(speech);
});
