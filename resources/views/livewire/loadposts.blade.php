<div wire:init="loadPosts">
    <div class="row" style="margin-bottom: 50px">
        <div class="col-md-6 col-sm-6">
            <label for="query" class="sr-only">Search</label>
            <input type="search" wire:model='query' id='query' class="form-control form-control-sm" placeholder="Entrez le nom d'une rubrique (ex: économie) ou d'un titre">
            <span wire:loading.delay>Loading...</span>
        </div>
        <div class="col-md-2 col-sm-2"></div>
        <div class="col-md-4 col-sm-4" align="right">
            Afficher :
            <label for="">
                <select wire:model.lazy='perPage' wire:loading.attr="disabled" id="per_page" class="form-control">
                    @for ($i = 8; $i <= 40; $i += 8)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </label>
            <br>
            <div wire:loading.delay>Loading...</div>
        </div>
    </div>
    <div class="row posts">
        {{-- chunk ou split --}}
        @isset($load)
            @foreach ($datas->chunk(100) as $chunk)
                @foreach ($chunk as $data)
                    <div class="col-md-3 col-sm-3 marge" data-aos="zoom-in" > {{-- data-aos="zoom-in"  data-aos-anchor=".other-element" --}}
                        {{-- preload="metadata" --}}
                        <video class="lazy" controls preload="none" poster="{{ asset('images/CHANNEL PRO.png') }}" loop width="100%" height="200">
                            <source src="{{ asset('videos') }}/{{ $data->video }}">
                                Votre navigateur ne permet pas de lire cette vidéo.
                                Mais vous pouvez toujours
                                <a href="{{ asset('videos') }}/{{ $data->video }}">la télécharger</a> !
                        </video>
                        <h2 class="entry-title"><a href="{{ route('Post.show', Crypt::encrypt($data->id_post)) }}" rel="bookmark">{{ $data->libelle }}</a></h2>
                        <h3 class=""><a href="{{ route('Post.show', Crypt::encrypt($data->id_post)) }}" rel="bookmark"> <em> {{ $data->titre }} </em></a></h3>
                        <p>
                            {{ $data->description }}
                        </p>
                    </div>
                @endforeach
            @endforeach
        @else
            {{-- <h1>Loading...</h1> --}}
            <div class="col-md-4 col-xs-4 col-sm-4"></div>
            <div class="col-md-4 col-xs-4 col-sm-4">
                <div id="circle">
                    <div class="loader">

                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-4 col-sm-4"></div>
        @endisset

    </div>


    <div class="row text-primary" style="margin-top: 100px">
        <div class="col-md-12">
            @isset($load)
                <div wire:loading.delay>Loading...</div>
                <div wire:loading.attr="hidden">{{ $datas->links() }}</div>
            @endisset
        </div>
    </div>
</div>
