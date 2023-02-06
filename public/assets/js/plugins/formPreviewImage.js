function previewImg(idFileInput, classImagePreview){
    const formImage = document.querySelector('#'+idFileInput);
    const imgPreview = document.querySelector('.'+classImagePreview);

    imgPreview.style.display = 'block';

    const oFReader = new FileReader(); 
    oFReader.readAsDataURL(formImage.files[0]);

    oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
