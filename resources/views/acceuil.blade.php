@extends('app')

@section('content')
    <div id="content" class="site-content">
        <div id="primary" class="content-area column full">
            <main id="main" class="site-main">
                <!--<div class="row" style="margin-bottom: 40px">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="">Recherche</label>
                            <select multiple class="form-control js-example-basic-single"
                                data-placeholder="Choisissez une rubrique et/ou un titre" name="" id="">
                                <optgroup label="Rubriques">
                                    {{-- <option></option> --}}
                                    @foreach ($rubriques as $rubrique)
                                        <option value="{{ $rubrique->libelle }}">{{ $rubrique->libelle }}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Titre">
                                    <option>Emission</option>
                                    <option>Publicité</option>
                                    <option>Magazine</option>
                                    <option>Historique</option>
                                    <option>Contact</option>
                                    <option>Partenaire</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-sm btn">Validez</button>
                        </div>
                    </div>
                </div>-->

                @livewire('posts')
                <br />
            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- #content -->
@endsection
