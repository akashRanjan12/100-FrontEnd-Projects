// script.js
document.getElementById('imageInput').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('previewImage');
            img.src = e.target.result;
            img.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});

document.getElementById('convertButton').addEventListener('click', function() {
    const image = document.getElementById('previewImage');
    if (image.src === "#") {
        alert("Please upload an image first.");
        return;
    }

    Tesseract.recognize(
        image.src,
        'eng',
        {
            logger: m => console.log(m)
        }
    ).then(({ data: { text } }) => {
        document.getElementById('textOutput').innerText = text;
    }).catch(err => {
        console.error(err);
        alert("An error occurred while converting the image to text.");
    });
});