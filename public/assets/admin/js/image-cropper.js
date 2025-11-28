let cropper;

function doImageCrop(e, imgId, width, height) {
    const file = e.files[0];
    if (!file) return;

    const imgObj = $('#' + imgId);

    const image = document.createElement('img');
    image.classList.add('img-thumbnail', 'uploaded-img-width')
    const btn = document.createElement('button');
    btn.classList.add('btn', 'btn-primary', 'crop-btn');
    btn.type = 'button';
    btn.textContent = 'Crop';

    btn.onclick = () => {
        cropImage(imgId)
    }


    const reader = new FileReader();
    reader.onload = (e) => {
        image.src = e.target.result;

        $(imgObj).html(image);
        $(imgObj).append(btn);


        if (cropper) cropper.destroy();

        cropper = new Cropper(image, {
            viewMode: 1,
            dragMode: 'move',
            autoCropArea: 0.8,
            restore: false,
            guides: false,
            highlight: false,
            cropBoxMovable: false,
            cropBoxResizable: false,
            aspectRatio: width / height,
            minCropBoxWidth: width,
            minCropBoxHeight: height,
            minContainerHeight: 300,
            ready: function () {
                croppable = true;
            }
        });
    };
    reader.readAsDataURL(file);
}

function cropImage(imgId) {
    if (!cropper) return;

    const imgObj = $('#' + imgId);


    const base64Src = cropper.getCroppedCanvas().toDataURL();
    const image = document.createElement('img');
    image.classList.add('img-thumbnail', 'uploaded-img-width')
    image.src = base64Src;

    const imgHiddenFile = document.createElement('input');
    imgHiddenFile.type = 'hidden';
    imgHiddenFile.name = 'hidden_img'
    imgHiddenFile.value = base64Src

    $(imgObj).html(image);
    $(imgObj).append(imgHiddenFile);


}


function checkNotFinishedCrops() {

    const cropBtns = document.getElementsByClassName('crop-btn');

    if ($(cropBtns).length) {
        $.each(cropBtns, function (e, v) {
            v.click();
        })
    }

    return true;

}
