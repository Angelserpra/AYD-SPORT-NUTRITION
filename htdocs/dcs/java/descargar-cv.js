document.addEventListener("DOMContentLoaded", function() {
    var descargarCV = document.getElementById("descargar-cv");

    if (descargarCV) {
        descargarCV.addEventListener("click", function(event) {
            event.preventDefault();
            var link = document.createElement("a");
            link.href = "dcs/cv.pdf"; 
            link.download = "cv.pdf"; 
            document.body.appendChild(link);

            link.click();

            document.body.removeChild(link);
        });
    }
});
