
function updateStats(element){
    var id = element.dataset.order;
    var status = element.dataset.status;
    var assign = element.dataset.assign;
    var url = '/mobile/update/'+id;

    let formdata = new FormData();
    if(status == 'picked' || status == 'delivered'){
      var photoInput = document.getElementById("takePhoto-"+id);
      formdata.append('photoFile',photoInput.files[0]);
    }
    formdata.append('status', status);
    formdata.append('assign', assign);
    updateStatus(url,formdata);
    // console.log(photoInput);
  }

function uploadPhoto(element, btnConfirmElement, fileInputElement){
    var btnConfirm = document.getElementById(btnConfirmElement);
    var photoInput = document.getElementById(fileInputElement);
    photoInput.click();
    btnConfirm.dataset.order = element.dataset.order;
    btnConfirm.dataset.status = element.dataset.status;
    btnConfirm.dataset.assign = element.dataset.assign;
  }

function showPreview(e){
    const myModal = new bootstrap.Modal(document.getElementById('modal-take-photo'), {static:false});
    myModal.show();
    previewImg(e.id, 'preview-img');
  }

function cancelUpload(){
    var confirmUploadPhoto = document.getElementById("confirmPhoto");
    const dataset = confirmUploadPhoto.dataset;
    Object.keys(dataset).forEach((key) => delete dataset[key]);
  }

function updateStatus(link,formdata){
    fetch(link,{
      method:'POST',
      body: formdata
    })
    .then(res=>res.json())
    .then(data=>{
      location.reload();
    })
    .catch(err=>console.log(err))
  }