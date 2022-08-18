
<!-- konten Kiri -->
<div class="col-12 col-md-8">
    <div class="card shadow">
        <div class="px-3 pt-3">
            <div data-aos="fade-right">
                <h4>Berita </h4>
            </div>
            <p><strong> Search result for : {{ request('search') }} </strong></p>
            @if(count($beritas))
            @foreach($beritas as $berita)
            <div data-aos="fade-right">
                <div class="card mb-3">
                    <a href="/berita/read/{{ $berita->slug }}" class="link-1 text-decoration-none">
                        <div class="row row-cols-2 g-0">
                            <div class="col-md-4 text-center">
                                <img src="{{ asset('storage/' . $berita->image) }}"
                                    class="img-fluid mx-2 rounded-5 my-3 " alt="" srcset="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h6 class="card-title text-black"><strong>{{ $berita->title }}</strong></h6>
                                    <p class="card-text"><small class="text-muted">Posted
                                            {{ $berita->updated_at->diffForHumans() }}</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-center">
                <p>no item found</p>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- end kontent kiri -->