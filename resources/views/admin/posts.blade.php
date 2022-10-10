@extends('admin.app')

@section('content')

    <div id="content" class="site-content">
        <div id="primary" class="content-area column full">
            <main id="main" class="site-main">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <strong>Whoops ! </strong> There where some problems with your input. <br><br>
                        Veuillez bien remplir le formulaire svp !
                    </div>
                @endif
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-xs-6 col-sm-6">
                        Toggle column: <a class="toggle-vis" data-column="0">Numero</a> - <a class="toggle-vis"
                            data-column="1">Vidéo</a> - <a class="toggle-vis" data-column="2">Rubrique</a> - <a
                            class="toggle-vis" data-column="3">Titre</a> - <a class="toggle-vis"
                            data-column="4">Description
                        </a> - <a class="toggle-vis" data-column="5">Date d'ajout</a> - <a class="toggle-vis"
                            data-column="6">Date de modif</a>
                    </div>
                    <div class="col-xs-6 col-sm-6 text-right">
                        {{-- <a class="wpcmsdev-button color-blue" href="#"><span>Ajouter un nouveau post</span></a> --}}
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                            data-whatever="@mdo"><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                    </div>
                </div>

                <table id="myTable" class="table table-striped table-bordered" style="width:100%" data-aos="flip-up">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Vidéo</th>
                            <th>Rubrique</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Date d'ajout</th>
                            <th>Date de modif</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 0; ?>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $n = $n + 1 }}</td>
                                <td>
                                    <video controls preload="none" poster="{{ asset('images/CHANNEL PRO.png') }}" loop width="200" height="200">
                                        <source src="{{ asset('videos') }}/{{ $post->video }}">
                                    </video>
                                </td>
                                <td>{{ $post->libelle }}</td>
                                <td>{{ $post->titre }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ $post->created_at->format('d-m-Y H:i:s') }}</td>
                                <td>{{ $post->updated_at->format('d-m-Y H:i:s') }}</td>
                                <td>
                                    <form action="{{ route('Post.destroy', $post->id_post) }}" method="post">
                                        <a class="btn btn-primary btn-sm btn-block" href="{{ route('Post.edit', $post->id_post) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <br>
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" onclick="return confirm('Confirmer la suppression ?');" class="btn btn-danger btn-block"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- #content -->



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Nouvel enrégistrement</h4>
                </div>
                <form action="{{ route('Post.store') }}" method="post" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="video" class="control-label">Video:</label>
                            <input type="file" name="video" class="form-control" id="video" onchange="return Validation()">
                            <div id="size" style="margin-top: 10px"></div>
                        </div>
                        <div class="form-group">
                            <label for="rubrique" class="control-label">Rubrique:</label>
                            <select class="form-control js-example-basic-single" data-placeholder="Choisissez une rubrique"
                                name="rubrique" id="rubrique" style="width: 100%">
                                <option></option>
                                @foreach ($rubriques as $rubrique)
                                    <option value='{{ $rubrique->id_rubrique }}'>{{ $rubrique->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="titre" class="control-label">Titre:</label>
                            <input type="text" name="titre" class="form-control" id="titre">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
                                0%
                            </div>
                        </div><br>
                        <div id="msg"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Enrégistrer <i class="fa fa-stack-overflow" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{ asset("js/jquery.form.min.js") }}"></script>
    <script src="{{ asset("js/upload.js") }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                width: 'resolve', // need to override the changed default
                dropdownParent: $('#exampleModal'),
            });

            var table = $('#myTable').DataTable({
                "pagingType": "full_numbers",
                "language": {
                    "lengthMenu": "Affiche _MENU_ enrégistrements",
                    "zeroRecords": "Aucun résultat - désolé",
                    "info": "Page _PAGE_ sur _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(filtré sur _MAX_ entrée(s) au total)"
                },
                //"scrollY": "500px",
                "scrollX": "500px",
                "paging": true
            });

            $('a.toggle-vis').on('click', function(e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column($(this).attr('data-column'));

                // Toggle the visibility
                column.visible(!column.visible());
            });
        });
    </script>
@endsection
