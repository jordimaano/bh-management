  document.addEventListener("DOMContentLoaded", () => {
    const uploadedPhotoDisplay = document.querySelector("#uploadedPhotoDisplay")
    photo.onchange = evt => {
    const [file] = photo.files
    if (file) {
      uploadedPhotoDisplay.src = URL.createObjectURL(file)
    }
  }

  //prevent user from accidental clicks
  let print = (message) => {
    console.log(message);
  }

  let confirmDelete = (message, form) => {
    if (confirm(message) == true) {
        document.getElementById(form).submit();
    }
  }
});