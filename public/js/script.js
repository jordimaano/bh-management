    const uploadedPhotoDisplay = document.querySelector("#uploadedPhotoDisplay")
    photo.onchange = evt => {
    const [file] = photo.files
    if (file) {
      uploadedPhotoDisplay.src = URL.createObjectURL(file)
    }
  }