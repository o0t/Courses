                        {{-- Comments --}}
                        @if ($content->allow_comments == 'yes')
                        @if ($content && $content->Comments)
                            @foreach ($content->Comments as $Comment)
                                @if ($Comment->user)
                                    <br>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="list-group-item">
                                                    <div class="row align-items-center">
                                                    <div class="col-auto">
                                                        <a href="#">
                                                            <span class="avatar" style="background-image: url(./static/avatars/000m.jpg)"></span>
                                                            <a href="#" class="text-reset d-block">{{ $Comment->user->username }}</a>
                                                        </a>
                                                    </div>
                                                    <div class="col">
                                                        <div class="container text-secondary ">
                                                            <span>
                                                                {!! $Comment->comment !!}
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="col-auto">

                                                        @if (Auth::user()->hasLikes_comments($content->id, $Comment->id))
                                                            <a href="{{ route('course.comment.like', ['content_token' => $content->token, 'id' => $Comment->id]) }}" class="btn btn-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(203, 67, 53, 1);transform: ;msFilter:;"><path d="M20.205 4.791a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412L12 21.414l8.207-8.207c2.354-2.353 2.355-6.049-.002-8.416z"></path></svg>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('course.comment.like', ['content_token' => $content->token, 'id' => $Comment->id]) }}" class="btn btn-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                                    <path d="M12 4.595a5.904 5.904 0 0 0-3.996-1.558 5.942 5.942 0 0 0-4.213 1.758c-2.353 2.363-2.352 6.059.002 8.412l7.332 7.332c.17.299.498.492.875.492a.99.99 0 0 0 .792-.409l7.415-7.415c2.354-2.354 2.354-6.049-.002-8.416a5.938 5.938 0 0 0-4.209-1.754A5.906 5.906 0 0 0 12 4.595zm6.791 1.61c1.563 1.571 1.564 4.025.002 5.588L12 18.586l-6.793-6.793c-1.562-1.563-1.561-4.017-.002-5.584.76-.756 1.754-1.172 2.799-1.172s2.035.416 2.789 1.17l.5.5a.999.999 0 0 0 1.414 0l.5-.5c1.512-1.509 4.074-1.505 5.584-.002z"></path>
                                                                </svg>
                                                            </a>
                                                        @endif

                                                        <a href="#" class="btn btn-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-secondary" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;">
                                                                <path d="M10 11h6v7h2v-8a1 1 0 0 0-1-1h-7V6l-5 4 5 4v-3z"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            {{ $Comment->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                @else
                                    <p>No user associated with this comment.</p>
                                @endif
                            @endforeach
                        @endif
                    <br><br>
                        {{-- Form Comment --}}
                            <form class="container"  id="commentForm"  action="{{ route('course.comment.create',$content->token) }}" method="POST">
                                @csrf
                                <textarea id="tinymce-default" name="comment"></textarea>

                                @error('comment')
                                    <div class="form-text text-danger"> {{ $errors->first('comment') }} </div>
                                @enderror

                                <br>
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="button" id="sendComment" class="btn btn-primary">{{ __('Send') }}</button>
                                </div>
                                <br>
                            </form>

                            <script>
                                $(document).ready(function() {
                                    $('#sendComment').on('click', function() {
                                        // Serialize the form data
                                        var formData = $('#commentForm').serialize();

                                        // Send the AJAX request
                                        $.ajax({
                                            type: 'POST',
                                            url: $('#commentForm').attr('action'),
                                            data: formData,
                                            success: function(response) {
                                                // Handle success and update comments section
                                                $('#commentsContainer').append(
                                                    '<div class="comment">' + response.comment + '</div>'
                                                );
                                                // Optionally, clear the textarea
                                                $('#tinymce-default').val('');
                                            },
                                            error: function(xhr) {
                                                // Handle errors (e.g., show error messages)
                                                var errorMessage = xhr.responseJSON.message || 'An error occurred.';
                                                alert(errorMessage);
                                            }
                                        });
                                    });
                                });
                                </script>
                        {{-- Form Comment / End --}}



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
                    @else

                    <br>
                    <div class="text-center">
                            {{ __('Comments are closed') }}
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(114, 126, 140, 1);transform: ;msFilter:;"><path d="M12 2C9.243 2 7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5zm6 10 .002 8H6v-8h12zm-9-2V7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9z"></path></svg>
                    </div>

                    @endif
                {{-- Comments / End --}}
