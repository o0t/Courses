<div class="container">

    @if ($content->type == 'video')
        {{-- video --}}
        <div id="loading">
            <div class="card placeholder-glow">
                <div class="ratio ratio-21x9 card-img-top placeholder"></div>
                <div class="card-body">
                  <div class="placeholder col-9 mb-3"></div>
                  <div class="placeholder placeholder-xs col-10"></div>
                  <div class="placeholder placeholder-xs col-11"></div>
                  <div class="mt-3">
                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
                  </div>
                </div>
              </div>
        </div>


            <video controls class="container" controlsList="nodownload">
                <source src="{{ asset('images/Seeder/'.$content->file_name) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>

        {{-- video / End --}}
    @elseif ($content->type == 'txt')

        {{-- txt --}}
        <br>
        <div class="container">
            {!! $content->content !!}
        </div>
        {{-- txt / End --}}
    @elseif ($content->type == 'file')
          {{-- pdf --}}
        <div id="loading">
            <div class="card placeholder-glow">
                <div class="ratio ratio-21x9 card-img-top placeholder"></div>
                <div class="card-body">
                  <div class="placeholder col-9 mb-3"></div>
                  <div class="placeholder placeholder-xs col-10"></div>
                  <div class="placeholder placeholder-xs col-11"></div>
                  <div class="mt-3">
                    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-4" aria-hidden="true"></a>
                  </div>
                </div>
            </div>
        </div>


        <iframe
            src="{{ asset('images/Seeder/'.$content->file_name) }}"
            width="100%"
            height="600px">
            This browser does not support PDFs. Please download the PDF to view it:
            <a href="{{ asset('images/Seeder/'.$content->file_name) }}">Download PDF</a>
        </iframe>




        {{-- pdf / End --}}
    @endif
</div>
