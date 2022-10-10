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
                    <h1 class="text-center"> Toutes les Rubriques</h1>
                </div>
                <div class="row" style="margin-bottom: 20px">
                    <div class="col-xs-6 col-sm-6">
                        Toggle column: <a class="toggle-vis" data-column="0">Numero</a> - <a class="toggle-vis"
                            data-column="1">Rubrique </a> - <a class="toggle-vis" data-column="2">Date de
                            d'ajout</a> - <a class="toggle-vis" data-column="3">Date de
                            modification</a>
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
                            <th>Rubrique</th>
                            <th>Date d'ajout</th>
                            <th>Date de modification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 0; ?>
                        @foreach ($rubriques as $rubrique)
                            <tr>
                                    <td>{{ $n = $n + 1 }}</td>
                                    <td>{{ $rubrique->libelle }}</td>
                                    <td>{{ $rubrique->created_at->format('d-m-Y H:i:s') }}</td>
                                    <td>{{ $rubrique->updated_at->format('d-m-Y H:i:s') }}</td>
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
                <div class="modal-body">
                    <form action="{{ route('Rubrique.store') }}" method="post" id="addRubrique">
                        @csrf
                        <div class="form-group">
                            <label for="libelle" class="control-label">Libelle:</label>
                            <input type="text" name="libelle" class="form-control" id="libelle">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" form="addRubrique">Enrégistrer <i class="fa fa-stack-overflow" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
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
                    "infoFiltered": "(filtered from _MAX_ total records)"
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
