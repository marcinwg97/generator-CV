$( function() {

    var handleWyswig = {

        init: function() {

            tinymce.baseURL = $( '#tinymce-url' ).data( 'tinymce-url' );
            tinymce.images_upload_url = $( '#tinymce-img-api-url' ).data( 'tinymce-img-api-url' );

            tinymce.init({ 
                selector: '.textarea-wyswig' ,
                language: 'pl',
                menubar: false,
                automatic_uploads: true,
                file_picker_types: 'image',
                plugins: "textcolor image link lists code",
                extended_valid_elements: 'img[src|alt]',
                toolbar: 'undo redo | bold italic underline forecolor | alignleft aligncenter alignright alignjustify | fontselect fontsizeselect | bullist numlist outdent indent | image link | code',
                file_picker_callback: function ( callback, value, meta ) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');
                    input.onchange = function() {
                        var file = this.files[0];

                        var formData = new FormData();
                        formData.append('uploading_file', this.files[0], $(this).val());

                        $.ajax({
                            url: tinymce.images_upload_url,
                            type: "POST",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(res) {
                                callback(res.location, {alt: 'My alt text'});
                                console.log("SUCCESS: " + res.location);
                            },
                            error: function (error) {
                                console.log("ERROR: " + error);
                            },
                        });

                    };
                    input.click();
                }
            });

            // tinymce.activeEditor.uploadImages(function(success) {
            //   $.post('ajax/post.php', tinymce.activeEditor.getContent()).done(function() {
            //     console.log("Uploaded images and posted content as an ajax request.");
            //   });
            // });

        }

    };

    handleWyswig.init();

} );