$(".progress").hide();

$(document).on('submit', '#uploadForm', function (e) {
    e.preventDefault();
    var video = $('#video').val();
    var rubrique = $('#rubrique').val();
    var titre = $('#titre').val();
    var description = $('#description').val();


    if (video != '' && rubrique != '' && titre != '' && description != '') {
        $(function () {
            $('#uploadForm').ajaxForm({
                beforeSend: function () {
                    $(".progress").show();
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    $('.progress-bar').width(percentComplete + '%');
                    $('.progress-bar').html('<div id="progress-status">' + percentComplete + ' %</div>');

                },
                success: function () {
                    //$(".progress").hide();
                },
                complete: function (response) {
                    $('#msg').html('<h5 class="alert alert-success text-center">Téléchargement terminé.</h5>');
                    $('#uploadForm')[0].reset();
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);

                }
            });

        });
    } else {
        $('#msg').html('<h5 class="alert alert-danger text-center">Remplissez tous les champs</h5>');
        setTimeout(function () {
            $('#msg').html('');
        }, 5000);
    }

});


function Validation() {

    var fichier = document.getElementById('video');
    var valeur = fichier.value;
    //var extensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    var extensions = /(\.m4v|\.avi|\.flv|\.mp4|\.mov|\.mpg|\.mpa|\.mpeg|\.wmv|\.mkv|\.vob)$/i;
    if (!extensions.exec(valeur)) {
        /* alert('Format de fichier non valide'); */
        Swal.fire({
            icon: 'warning',
            text: 'Format de fichier non valide'
        });
        fichier.value = '';
        return false;
    }
    /* else
    {
    	if (fichier.files && fichier.files[0])
    	{
    		alert('Format de fichier valide');
    	}
    } */

    const fi = document.getElementById('video');
    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (const i = 0; i <= fi.files.length - 1; i++) {

            const fsize = fi.files.item(i).size;
            const file = Math.round((fsize / 1024));
            // The size of the file.
            if (file >= 100000) {
                /* alert("Fichier trop grand, svp veuillez selectionner un fichier ayant moins de 100mb"); */
                Swal.fire({
                    icon: 'warning',
                    text: 'Fichier trop grand, svp veuillez selectionner un fichier ayant moins de 100mb'
                });
                fichier.value = '';
                return false;
            } else if (file < 2048) {
                /* alert("Fichier trop petit, svp veuillez selectionner un fichier plus grand que 2mb"); */
                Swal.fire({
                    icon: 'warning',
                    text: 'Fichier trop petit, svp veuillez selectionner un fichier plus grand que 2mb'
                });
                fichier.value = '';
                return false;
            } else {
                document.getElementById('size').innerHTML = 'Taille du fichier : <b>' +
                    file + '</b> KB';
            }
        }
    }

}

/* Filevalidation = () => {
    const fi = document.getElementById('video');
    // Check if any file is selected.
    if (fi.files.length > 0) {
        for (const i = 0; i <= fi.files.length - 1; i++) {

            const fsize = fi.files.item(i).size;
            const file = Math.round((fsize / 1024));
            // The size of the file.
            if (file >= 4096) {
                alert(
                  "File too Big, please select a file less than 4mb");
            } else if (file < 2048) {
                alert(
                  "File too small, please select a file greater than 2mb");
            } else {
                document.getElementById('size').innerHTML = '<b>'
                + file + '</b> KB';
            }
        }
    }
} */




/* $(function () {
    $('#uploadForm').ajaxForm({
        beforeSend: function () {
            $(".progress").show();
        },
        uploadProgress: function (event, position, total, percentComplete) {
            $(".progress-bar").width(percentComplete + '%');
            $(".progress-bar").html('<div id="progress-status">' + percentComplete + ' %</div>');

        },
        success: function () {
            //$(".progress").hide();
        },
        complete: function (response) {
            $('#msg').html('<h5 class="alert alert-success text-center">Téléchargement terminé...</h5>');
            $('#uploadForm')[0].reset();
            //location.reload();
            //OU
            window.location.reload();
        }
    });
    $(".progress").hide();
}); */
