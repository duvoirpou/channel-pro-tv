<div>
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <label for="query" class="sr-only">Search</label>
            <input type="search" wire:model='query' id='query' class="form-control form-control-sm"
                placeholder="Recherche">
            <span wire:loading.delay>Loading...</span>
        </div>
        {{-- <div class="col-md-6 col-xs-6"></div> --}}
    </div>
    @foreach ($commentaires as $commentaire)
        <div class="row" id="message">
            <div class="col-md-6 col-xs-6">
                <h5>{{ $commentaire->pseudo }}</h5>
            </div>
            <div class="col-md-6 col-xs-6" style="padding-top: 15px">
                <a class=''><i>Posté à {{ $commentaire->created_at->format('H:i:s') }} le
                        {{ $commentaire->created_at->format('d-m-Y') }}</i></a><br><br>
                @if (isset($LoggedUtilisateurInfo->pseudo) && $recup_utilisateur == $commentaire->id_utilisateur)
                    <span style="">
                        <!-- Button trigger modal update -->
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelId"
                            wire:click.prevent="edit({{ $commentaire->id_commentaire }})">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </button>
                        <!-- Button trigger modal delete -->
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#supprime"
                            wire:click="deleteId({{ $commentaire->id_commentaire }})">
                            <i class="fa fa-trash" aria-histyle="margin-right: 10px" aria-hidden="true"></i>
                        </button>
                    </span>
                @endif
            </div>
        </div>
        {{-- <h6>adresse@gmail.com</h6> --}}
        <p style="margin-top: 20px">
            {{ $commentaire->commentaire }}

        </p>
        <hr>
    @endforeach
    <div class="row" style="margin-bottom: 30px">{{ $commentaires->links() }}</div>


    <!-- Modal delete -->
    <div wire:ignore.self class="modal fade" id="supprime" tabindex="-1" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce commentaire ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-danger" wire:click.prevent="delete()"
                        data-dismiss="modal">Confirmer</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal for update -->
    <div wire:ignore.self class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title">Modification</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" wire:model='ids'>
                        <input type="hidden" name="recup_id_utilisateur" wire:model='recup_id_utilisateur'>
                        <input type="hidden" name="recup_id_post" wire:model='recup_id_post'>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="recup_commentaire" wire:model.defer='recup_commentaire' id="message" cols="20" rows="10"
                                class="form-control"></textarea>
                            @error('recup_commentaire')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-primary" wire:click.prevent='update()'>Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (isset($LoggedUtilisateurInfo->pseudo))
        <div class="widget-area">
            <aside class="widget">
                <h4 class="widget-title">Laisser un commentaire</h4>
                <form class="wpcf7" id="contactform">
                    <div class="form">
                        <p><input type="hidden" name="id_utilisateur" wire:model='id_utilisateur'></p>
                        {{-- value="{{ $recup_utilisateur }}" --}}
                        <p><input type="hidden" name="id_post" wire:model='id_post'></p> {{-- value="{{ $recup_post }}" --}}
                        <p>
                            <textarea name="commentaire" wire:model='commentaire' rows="3" placeholder="Message *"></textarea>
                        </p>
                        <input type="submit" wire:click.prevent='store()' id="submit" class="clearfix btn"
                            value="Commentez">
                    </div>
                </form>
            </aside>
        </div>
    @else
        <div class="widget-area" style="margin-bottom: 25px">
            <p> <a href="{{ route('connexion') }}"> Veuillez-vous connecter pour commenter la vidéo !</a> </p>
        </div>
    @endisset

    
</div>
