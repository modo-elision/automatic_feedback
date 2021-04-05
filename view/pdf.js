// will hold the PDF handle returned by PDF.JS API
var _PDF_DOC;

// PDF.JS renders PDF in a <canvas> element
var _CANVAS = document.querySelector('#pdf-preview');

// will hold object url of chosen PDF
var _OBJECT_URL;

// load the PDF
function showPDF(pdf_url) {
    PDFJS.getDocument({ url: pdf_url }).then(function(pdf_doc) {
        _PDF_DOC = pdf_doc;

        // show the first page of PDF
        showPage(1);

        // destroy previous object url
        URL.revokeObjectURL(_OBJECT_URL);
    }).catch(function(error) {
        // error reason
        alert(error.message);
    });;
}

// show page of PDF
function showPage(page_no) {
    _PDF_DOC.getPage(page_no).then(function(page) {
        // set the scale of viewport
        var scale_required = _CANVAS.width / page.getViewport(1).width;

        // get viewport of the page at required scale
        var viewport = page.getViewport(scale_required);

        // set canvas height
        _CANVAS.height = viewport.height;

        var renderContext = {
            canvasContext: _CANVAS.getContext('2d'),
            viewport: viewport
        };
        
        // render the page contents in the canvas
        page.render(renderContext).then(function() {
            document.querySelector("#pdf-preview").style.display = 'inline-block';
            document.querySelector("#pdf-loader").style.display = 'none';
        });
    });
}

/* showing upload file dialog */
document.querySelector("#upload-dialog").addEventListener('click', function() {
    document.querySelector("#pdf-file").click();
});

/* when users selects a file */
document.querySelector("#pdf-file").addEventListener('change', function() {
    // user selected PDF
    var file = this.files[0];

    // allowed MIME types
    var mime_types = [ 'application/pdf' ];
    
    // validate whether PDF
    if(mime_types.indexOf(file.type) == -1) {
        alert('Error : Incorrect file type');
        return;
    }

    // validate file size
    if(file.size > 10*1024*1024) {
        alert('Error : Exceeded size 10MB');
        return;
    }

    // validation is successful

    // hide upload dialog
    document.querySelector("#upload-dialog").style.display = 'none';
    
    // show the PDF preview loader
    document.querySelector("#pdf-loader").style.display = 'inline-block';

    // object url of PDF 
    _OBJECT_URL = URL.createObjectURL(file)

    // send the object url of the pdf to the PDF preview function
    showPDF(_OBJECT_URL);
});