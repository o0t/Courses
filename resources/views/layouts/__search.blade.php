                            {{-- Search --}}
                            <div class="me-3 mt-2 d-none d-md-block position-relative">
                                <div class="input-icon">
                                    <input type="text" id="search" class="form-control" name="search" placeholder="{{ __('Search for the course') }}">
                                    <span class="input-icon-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                            <path d="M21 21l-6 -6"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div id="results" style="display: none; position: absolute; z-index: 1000; background: white; border: 1px solid #ccc; max-height: 200px; overflow-y: auto;"></div>
                            </div>

                            <script>
                                $(document).ready(function() {
                                    $('#search').on('input', function() {
                                        var query = $(this).val();

                                        $.ajax({
                                            url: '{{ route("course.search") }}',
                                            type: 'POST',
                                            data: {
                                                _token: '{{ csrf_token() }}',
                                                search: query
                                            },
                                            success: function(data) {
                                                $('#results').empty().show();
                                                if (data.length > 0) {
                                                    $.each(data, function(index, item) {

                                                        // Generate the course URL using Laravel's route helper
                                                        var courseUrl = '{{ route("course.view", ":name") }}'.replace(':name', encodeURIComponent(item.name));
                                                        var resultItem = '<a href="' + courseUrl + '" style="text-decoration: none; color: inherit;">' + '<div class="result-item" style="padding: 10px;">';

                                                        // Create a clickable link for the course name and categories combined
                                                        resultItem +=  item.name;

                                                        // Check if categories exist
                                                        if (item.categories && item.categories.length > 0) {
                                                            var categories = item.categories.map(category => category.name).join(', ');
                                                            resultItem += ' (Categories: ' + categories + ')'; // Append categories to the link
                                                        } else {
                                                            resultItem += ' (Categories: None)'; // Indicate no categories
                                                        }

                                                        resultItem += '</div>'; // Close the result item div
                                                        resultItem += '</a>'; // Close the anchor tag

                                                        // Append the constructed result item to the results
                                                        $('#results').append(resultItem);
                                                    });
                                                } else {
                                                    $('#results').append('<div class="result-item" style="padding: 10px;">No results found</div>');
                                                }
                                            },
                                            error: function() {
                                                $('#results').empty().show().append('<div class="result-item" style="padding: 10px;">Error retrieving data</div>');
                                            }
                                        });
                                        if (query.length === 0) {
                                            $('#results').hide();
                                        }
                                    });

                                    $(document).on('click', '.result-item', function() {
                                        $('#search').val($(this).text());
                                        $('#results').hide();
                                    });

                                    $(document).on('click', function(event) {
                                        if (!$(event.target).closest('#search').length) {
                                            $('#results').hide();
                                        }
                                    });
                                });
                            </script>

                            <style>
                                #results {
                                    display: none;
                                    position: absolute;
                                    z-index: 1000;
                                    background: white;
                                    border: 1px solid #ccc;
                                    max-height: 200px;
                                    max-width: 270px;
                                    min-width: 270px;
                                    overflow-y: auto;
                                    color: black
                                }
                                .result-item {
                                    padding: 10px;
                                    cursor: pointer;
                                }
                                .result-item:hover {
                                    background-color: #f0f0f0;
                                }
                            </style>
                            {{-- Search / End --}}
