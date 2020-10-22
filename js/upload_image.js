function handleFileSelect(evt)
{

    if (window.File && window.FileReader && window.FileList && window.Blob) 
    {
        
        var files = evt.target.files; // FileList object
        
        // Loop through the FileList and render image files as thumbnails.
        for (var i = 0, f; f = files[i]; i++) 
        {
    
            // Only process image files.
            if (!f.type.match('image.*')) 
            {
                continue;
            }
        
            var reader = new FileReader();
            
            // Closure to capture the file information.
            reader.onload = (function(theFile) {
                return function(e) {
                    var imgHldr = document.getElementById("profile-img");
                    imgHldr.src = e.target.result;
                };
            })(f);
        
            // Read in the image file as a data URL.
            reader.readAsDataURL(f);

            uploadUserProfileImage(f)
        }
      
    } 
    else {
        alert('The File APIs are not fully supported in this browser. Try using Chrome / Firefox');
    }
}

document.getElementById('img-upload').addEventListener('change', handleFileSelect, false);

