$(function() {
    "use strict";

    $(".preloader").fadeOut();

    $(".left-sidebar").hover(
        function() {
            $(".navbar-header").addClass("expand-logo");
        },
        function() {
            $(".navbar-header").removeClass("expand-logo");
        }
    );
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".nav-lock").on('click', function() {
        $("body").toggleClass("lock-nav");
        $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
        $("body, .page-wrapper").trigger("resize");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ==============================================================
    // Right sidebar options
    // ==============================================================
    $(function() {
        $(".service-panel-toggle").on('click', function() {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function() {
            $(".customizer").removeClass('show-service-panel');
        });
    });
    // ==============================================================
    // This is for the floating labels
    // ==============================================================
    $('.floating-labels .form-control').on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // ==============================================================
    //tooltip
    // ==============================================================
    $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
        // ==============================================================
        //Popover
        // ==============================================================
    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    // ==============================================================
    // Perfact scrollbar
    // ==============================================================
    $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
        wheelPropagation: !0
    });

    /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

    // ==============================================================
    // Resize all elements
    // ==============================================================
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();

    // ==============================================================
    // To do list
    // ==============================================================
    $(".list-task li label").click(function() {
        $(this).toggleClass("task-done");
    });

    // ==============================================================
    // Collapsable cards
    // ==============================================================
    $('a[data-action="collapse"]').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="collapse"] i').toggleClass('ti-minus ti-plus');
        $(this).closest('.card').children('.card-body').collapse('toggle');
    });
    // Toggle fullscreen
    $('a[data-action="expand"]').on('click', function(e) {
        e.preventDefault();
        $(this).closest('.card').find('[data-action="expand"] i').toggleClass('mdi-arrow-expand mdi-arrow-compress');
        $(this).closest('.card').toggleClass('card-fullscreen');
    });
    // Close Card
    $('a[data-action="close"]').on('click', function() {
        $(this).closest('.card').removeClass().slideUp('fast');
    });
    // ==============================================================
    // LThis is for mega menu
    // ==============================================================
    $(document).on('click', '.mega-dropdown', function(e) {
        e.stopPropagation()
    });
    // ==============================================================
    // Last month earning
    // ==============================================================
    $('#monthchart').sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
        type: 'bar',
        height: '35',
        barWidth: '4',
        resize: true,
        barSpacing: '4',
        barColor: '#1e88e5'
    });
    $('#lastmonthchart').sparkline([5, 6, 2, 9, 4, 7, 10, 12], {
        type: 'bar',
        height: '35',
        barWidth: '4',
        resize: true,
        barSpacing: '4',
        barColor: '#7460ee'
    });
    var sparkResize;

    // ==============================================================
    // This is for the innerleft sidebar
    // ==============================================================
    $(".show-left-part").on('click', function() {
        $('.left-part').toggleClass('show-panel');
        $('.show-left-part').toggleClass('ti-menu');
    });

    // For Custom File Input
    $('.custom-file-input').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        console.log(fileName);
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
});

//uploader
function ekUpload() {
    function Init() {

        console.log("Upload Initialised");

        var fileSelect = document.getElementById('file-upload'),
            fileDrag = document.getElementById('file-drag'),
            submitButton = document.getElementById('submit-button');

        fileSelect.addEventListener('change', fileSelectHandler, false);

        // Is XHR2 available?
        var xhr = new XMLHttpRequest();
        if (xhr.upload) {
            // File Drop
            fileDrag.addEventListener('dragover', fileDragHover, false);
            fileDrag.addEventListener('dragleave', fileDragHover, false);
            fileDrag.addEventListener('drop', fileSelectHandler, false);
        }
    }

    function fileDragHover(e) {
        var fileDrag = document.getElementById('file-drag');

        e.stopPropagation();
        e.preventDefault();

        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
    }

    function fileSelectHandler(e) {
        // Fetch FileList object
        var files = e.target.files || e.dataTransfer.files;

        // Cancel event and hover styling
        fileDragHover(e);

        // Process all File objects
        for (var i = 0, f; f = files[i]; i++) {
            parseFile(f);
        }
    }

    // Output
    function output(msg) {
        // Response
        var m = document.getElementById('messages');
        m.innerHTML = msg;
    }

    function parseFile(file) {

        console.log(file.name);
        output(
            '<strong>' + encodeURI(file.name) + '</strong>'
        );

        // var fileType = file.type;
        // console.log(fileType);
        var imageName = file.name;

        var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
        if (isGood) {
            document.getElementById('start').classList.add("hidden");
            document.getElementById('response').classList.remove("hidden");
            document.getElementById('notimage').classList.add("hidden");
            // Thumbnail Preview
            document.getElementById('file-image').classList.remove("hidden");
            document.getElementById('file-image').src = URL.createObjectURL(file);
        } else {
            document.getElementById('file-image').classList.add("hidden");
            document.getElementById('notimage').classList.remove("hidden");
            document.getElementById('start').classList.remove("hidden");
            document.getElementById('response').classList.add("hidden");
            document.getElementById("file-upload-form").reset();
        }
    }



    // Check for the various File API support.
    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}
ekUpload();