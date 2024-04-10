$(function () {
    // tooltip
    $('[data-toggle="tooltip"]').tooltip();
    // Toast
    var Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
    });
    // Custom File Input
    bsCustomFileInput.init();
    // CSRF token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
// Disable submit button during form submission
$("#submitBtn").on("click", function () {
    var button = $(this);
    var buttonBeforeText = button.text().toLowerCase();
    var buttonAfterText = "";

    switch (buttonBeforeText) {
        case "create":
            buttonAfterText = "Creating...";
            break;
        case "update":
            buttonAfterText = "Updating...";
            break;
        case "submit":
            buttonAfterText = "Submitting...";
            break;
        case "sign in":
            buttonAfterText = "Signing In...";
            break;
        case "import":
            buttonAfterText = "Importing...";
            break;
        default:
            buttonAfterText = "Processing...";
            break;
    }

    button.html('<i class="fa fa-spinner fa-spin"></i> ' + buttonAfterText);
    button.prop("disabled", true);
    button.closest("form").submit();
});
// Delete using SweetAlert2
$(".delete-btn").on("click", function (event) {
    event.preventDefault();
    const deleteForm = $(this).closest("form");

    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this item!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: primary_color,
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            deleteForm.submit();
        }
    });
});
// Data Table
function initializeDataTable(options) {
    $("#dataTable")
        .DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            paging: true,
            lengthMenu: [20, 40, 60, 80, 100],
            buttons: options.buttons, // Pass the buttons option
            stateSave: true,
        })
        .buttons()
        .container()
        .appendTo("#dataTable_wrapper .col-md-6:eq(0)");
}
// delete function of single image
function removeSingleImage(instance, url) {
    var deleteButton = $(instance);
    var imageItem = deleteButton.closest(".image-item");
    var imagePath = deleteButton.data("image");
    var id = deleteButton.data("id");

    $.ajax({
        url: url,
        method: "POST",
        data: {
            image: imagePath,
            id: id,
        },
        success: function (response) {
            var success = response.success;
            var message = response.message;

            if (success) {
                if (message) {
                    imageItem.remove();
                    toastr.success(message);
                }
            } else {
                toastr.error(message);
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
// delete function of single file
function removeSingleFile(instance, url) {
    var deleteButton = $(instance);
    var imageItem = deleteButton.closest(".image-item");
    var filePath = deleteButton.data("file");
    var fileName = deleteButton.data("name");
    var id = deleteButton.data("id");

    $.ajax({
        url: url,
        method: "POST",
        data: {
            name: fileName,
            file: filePath,
            id: id,
        },
        success: function (response) {
            var success = response.success;
            var message = response.message;

            if (success) {
                if (message) {
                    imageItem.remove();
                    toastr.success(message);
                }
            } else {
                toastr.error(message);
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}
// delete function of multiple images
function removeMultipleImages(instance, url) {
    var deleteButton = $(instance);
    var imageItem = deleteButton.closest(".image-item");
    var imagePath = deleteButton.data("image");
    var id = deleteButton.data("id");

    $.ajax({
        url: url,
        method: "POST",
        data: {
            image: imagePath,
            id: id,
        },
        success: function (response) {
            var success = response.success;
            var message = response.message;

            if (success) {
                if (message) {
                    imageItem.remove();
                    toastr.success(message);
                }
            } else {
                toastr.error(message);
            }
        },
        error: function (xhr, status, error) {
            console.log(error);
        },
    });
}

//multiple image /video preview
$(".file-input-preview").change(function () {
    var _this = this;
    // Clear existing preview
    $($(_this).closest('.form-group').find(".filePreview")).empty();
    // Get selected files
    var files = _this.files;

    // Loop through each selected file
    for (var i = 0; i < files.length; i++) {
        var file = this.files[0];
        var fileType = file["type"];
        var validImageTypes = [
            "image/gif",
            "image/jpeg",
            "image/png",
            "image/jpg",
            "image/webp",
            "image/svg+xml",
        ];
        var validVideoTypes = [
            "video/flv",
            "video/avi",
            "video/mov",
            "video/mpg",
            "video/wmv",
            "video/m4v",
            "video/3gp",
            "video/mp4",
        ];
        let is_image = (is_video = 1);
        if ($.inArray(fileType, validImageTypes) < 0) {
            is_image = 0;
        }

        if ($.inArray(fileType, validVideoTypes) < 0) {
            is_video = 0;
        }

        // Create a FileReader
        var reader = new FileReader();
        //image preview
        if (is_image) {
            reader.onload = (function (file) {
                return function (e) {
                    // Create an image element
                    var imgElement = $("<img>");
                    imgElement.attr("src", e.target.result);
                    imgElement.attr("height", 80);
                    imgElement.attr("class", "pl-1 pt-1");
                    imgElement.addClass("preview-file");

                    // Append the image to the preview container
                    $($(_this).closest('.form-group').find(".filePreview")).append(
                        imgElement
                    );
                    if (fileType === "image/svg+xml") {
                        $($(_this).closest('.form-group').find(".filePreview")).addClass(
                            "SVGFile"
                        );
                    } else {
                        $($(_this).closest('.form-group').find(".filePreview")).removeClass(
                            "SVGFile"
                        );
                    }
                };
            })(files[i]);
        }
        //video preview
        else if (is_video) {
            reader.onload = (function (file) {
                return function (e) {
                    // Create an video element
                    var videoElement = $("<video>");
                    videoElement.attr("src", e.target.result);
                    videoElement.attr("height", 100);
                    videoElement.attr("class", "pl-1 pt-1");
                    videoElement.attr("preloads", "none");
                    videoElement.attr("controls", "");
                    videoElement.addClass("preview-file");

                    // Append the video to the preview container
                    $($(_this).closest('.form-group').find(".filePreview")).append(
                        videoElement
                    );
                };
            })(files[i]);
        }

        // Read in the image / video file as a data URL
        reader.readAsDataURL(files[i]);
    }
});

var sortOrderDebounceTimer;

$(document).on("change", ".sort-order", function () {
    clearTimeout(sortOrderDebounceTimer);
    var value = $(this).val();
    var model = $(this).data("model");
    var id = $(this).data("id");

    if (value != null && value != "" && value != undefined && value >= 0) {
        sortOrderDebounceTimer = setTimeout(function () {
            $.ajax({
                url: base_path + "/b3-macbis-admin-portal/update-sort-order",
                type: "POST",
                data: {
                    id: id,
                    model: model,
                    value: value,
                },
                success: function (response) {
                    if (response)
                        toastr.success("Sort Order Updated successfully");
                    else {
                        $(this).val('');
                        toastr.error("Something went wrong");
                    }
                },
            });
        }, 300);
    } else {
        $(this).val('');
        toastr.warning("Please enter value Greater than or Equal to zero");
    }
});

var statusDebounceTimer;

$(document).on("change", ".status", function () {
    clearTimeout(statusDebounceTimer);
    var value = $(this).is(":checked") ? 1 : 0;
    var model = $(this).data("model");
    var id = $(this).data("id");
    var $label = $(this).siblings('label');

    if (value === 0 || value === 1) {
        $label.text(value === 1 ? 'Enabled' : 'Disabled');
        statusDebounceTimer = setTimeout(function () {
            $.ajax({
                url: base_path + "/b3-macbis-admin-portal/update-status",
                type: "POST",
                data: {
                    id: id,
                    model: model,
                    value: value,
                },
                success: function (response) {
                    if (response) {
                        toastr.success("Status Updated successfully");
                    } else {
                        $(this).val(value === 1 ? 0 : 1);
                        $label.text(value === 1 ? 'Disabled' : 'Enabled');
                        toastr.error("Something went wrong");
                    }
                },
            });
        }, 300);
    } else {
        $(this).val(0);
        $label.text('Disabled');
        toastr.error("Something went wrong");
    }
});