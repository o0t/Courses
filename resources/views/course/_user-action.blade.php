<br>
<div>
    {{-- Like --}}
    @if (Auth::user()->hasLiked($content->id))
        <a href="#" class="btn btn-icon like-button" data-token="{{ $content->token }}">
            <svg class="icon text-secondary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(203, 67, 53, 1);">
                <path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path>
            </svg>
        </a>
    @else
        <a href="#" class="btn btn-icon like-button" data-token="{{ $content->token }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);">
                <path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path>
            </svg>
        </a>
    @endif


    <script>
        $(document).ready(function() {
            $('.like-button').on('click', function(e) {
                e.preventDefault();
                var token = $(this).data('token');
                var url = "{{ route('course.content.like', ':token') }}".replace(':token', token);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {

                        if (response.status === 'create like') {
                            $(this).html(`
                                <svg class="icon text-secondary" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(203, 67, 53, 1);">
                                    <path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path>
                                </svg>
                            `);
                        } else {

                            $(this).find('svg').css('fill', 'rgba(114, 126, 140, 1)');
                        }
                    }.bind(this),
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    {{-- Like / End --}}
    {{-- Note --}}
    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{__('My notes')}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>

            {{-- Form --}}

             <form id="commentForm"  action="{{route('course.content.note',$content->token)}}" method="POST">

                @csrf
                <textarea id="tinymce-default" name="note">{{ old('note', Auth::user()->hasNote($content->id) ? Auth::user()->ShowNote($content->id)->note : '') }}</textarea>
                    @error('note')
                        <div class="form-text text-danger">{{ $errors->first('note') }}</div>
                    @enderror
                    {{-- Txt Content --}}
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                        let options = {
                            selector: '#tinymce-default',
                            height: 250,
                            menubar: false,
                            statusbar: false,
                            plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                            ],
                            toolbar: 'undo redo | formatselect | ' +
                            'bold italic backcolor | alignleft aligncenter ' +
                            'alignright alignjustify | bullist numlist outdent indent | ' +
                            'removeformat',
                            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
                        }
                        if (localStorage.getItem("tablerTheme") === 'dark') {
                            options.skin = 'oxide-dark';
                            options.content_css = 'dark';
                        }
                        tinyMCE.init(options);
                        })
                    </script>
                    {{-- Txt Content --}}
                </div>
                </div>
                <div class="modal-footer">
                    @if (app()->getLocale() == 'en')
                        <button  type="button" class="btn me-auto" data-bs-dismiss="modal">{{__('close')}}</button>
                        <button id="sendComment" type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__('save')}}</button>
                    @elseif (app()->getLocale() == 'ar')
                        <button  id="sendComment" type="button" class="btn btn-primary" data-bs-dismiss="modal">{{__('save')}}</button>
                        <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{__('close')}}</button>
                    @endif
                </div>
            </form>

            <script>
                $(document).ready(function() {
                    $('#sendComment').on('click', function() {
                        var noteContent = tinyMCE.get('tinymce-default').getContent();

                        // Prepare form data
                        var formData = {
                            note: noteContent,
                            _token: $('input[name="_token"]').val() // Include CSRF token
                        };

                        $.ajax({
                            type: 'POST',
                            url: $('#commentForm').attr('action'),
                            data: formData,
                            success: function(response) {
                                // This will only be executed if the note is saved successfully
                                $('#commentsContainer').append(
                                    '<div class="comment">' + response.note.note + '</div>'
                                );
                                alert(response.message);

                                $('.HasNote').html(`
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(237, 220, 37, 1);">
                                        <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8l8-8V5a2 2 0 0 0-2-2zm-7 16v-7h7l-7 7z"></path>
                                    </svg>
                                `);
                            },
                            error: function(xhr) {
                                // This will handle validation errors
                                if (xhr.status === 422) {
                                    var errorMessage = 'Validation errors:\n';
                                    var errors = xhr.responseJSON.errors;
                                    for (var key in errors) {
                                        errorMessage += errors[key].join(', ') + '\n'; // Join error messages for each field
                                    }
                                    alert(errorMessage); // "Data entry error"
                                } else {
                                    var errorMessage = xhr.responseJSON.message || 'An error occurred.';
                                    alert(errorMessage); // Handle other errors
                                }
                            }
                        });
                    });
                });
            </script>

            {{-- Form / End --}}
          </div>
        </div>
      </div>
      @if (Auth::user()->hasNote($content->id))
        <a href="#" class="btn btn-icon" data-bs-toggle="modal" data-bs-target="#modal-team">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(237, 220, 37, 1);transform: ;msFilter:;"><path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h8l8-8V5a2 2 0 0 0-2-2zm-7 16v-7h7l-7 7z"></path></svg>
        </a>
      @else
        <a href="#" class="btn btn-icon HasNote" data-bs-toggle="modal" data-bs-target="#modal-team">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M19 3H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h8a.996.996 0 0 0 .707-.293l7-7a.997.997 0 0 0 .196-.293c.014-.03.022-.061.033-.093a.991.991 0 0 0 .051-.259c.002-.021.013-.041.013-.062V5c0-1.103-.897-2-2-2zM5 5h14v7h-6a1 1 0 0 0-1 1v6H5V5zm9 12.586V14h3.586L14 17.586z"></path></svg>
        </a>
      @endif
    {{-- Note / End --}}

    {{-- Archive --}}
        @if (Auth::user()->hasArchive($content->id))
            <a href="#" class="btn btn-icon archive-button" data-token="{{ $content->token }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(77, 72, 121, 1);transform: ;msFilter:;">
                    <path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.997.997 0 0 0-.707.293L2.294 5.292A.996.996 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM12 18l-5-5h3v-3h4v3h3l-5 5z"></path>
                </svg>
            </a>
        @else
            <a href="#" class="btn btn-icon archive-button" data-token="{{ $content->token }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z">
                    </path><path d="M14 9h-4v3H7l5 5 5-5h-3z"></path>
                </svg>
            </a>
        @endif

    <script>
        $(document).ready(function() {
            $('.archive-button').on('click', function(e) {
                e.preventDefault();
                var token = $(this).data('token');
                var url = "{{ route('course.content.archive', ':token') }}".replace(':token', token);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {

                        if (response.status === 'create Archive') {
                            $(this).html(`
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(77, 72, 121, 1);transform: ;msFilter:;">
                                    <path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.997.997 0 0 0-.707.293L2.294 5.292A.996.996 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM12 18l-5-5h3v-3h4v3h3l-5 5z"></path>
                                </svg>
                            `);
                        } else {

                            $(this).find('svg').css('fill', 'rgba(114, 126, 140, 1)');
                        }
                    }.bind(this),
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
    {{-- Archive / End --}}
</div>
<script>
    $(document).ready(function() {
        const videoName = '{{ $content->file_name }}';

    $('#loading').show();

    const url = '{{ route('file.get', ['name' => '__name__']) }}'.replace('__name__', encodeURIComponent(videoName));

    $.get(url, function(data) {

                $('#loading').hide();

                if (data.status === 'success') {
                    // Display video information
                    $('#response').html(`
                        <video controls class="container" controlsList="nodownload">
                            <source src="data:${data.mime_type};base64,${data.file_content}" type="${data.mime_type}" >
                            Your browser does not support the video tag.
                        </video>
                    `);
                } else {
                    $('#response').html(`<p>${data.message}</p>`);
                }
            })
            .fail(function() {
                $('#response').html('<p>Error fetching video.</p>');
            });
    });
</script>
