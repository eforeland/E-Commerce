function validateForm() {
    var image = document.getElementById("image");
    var acceptedFiles = [".jpg", ".png", ".tif"];
    var imageCheck = true;

    /* if (image != null) {
        for (var i = 0; i < acceptedFiles.length; i++) {
            if (image.includes(acceptedFiles[i])) {
                imageCheck = true;
                break;
            }
        }
    } else 
        imageCheck = true; */

    var checkboxes = document.getElementsByName("category[]");
    var checkboxCheck = false;

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            checkboxCheck = true;
            break;
        }
    }
    
    if (imageCheck && checkboxCheck) {
        return true;

    } else if (!imageCheck) {
        alert("Image must be of type jpg, png, or tif.");
        return false;

    } else if (!checkboxCheck) {
        alert("Product must be in at least 1 category.");
        return false;

    }
}