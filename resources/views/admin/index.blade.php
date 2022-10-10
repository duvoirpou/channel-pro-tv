@extends('admin.app')

@section('content')

    <div id="content" class="site-content">
        <div id="primary" class="content-area column full">
            <main id="main" class="site-main">
                <div class="col-md-offset">
                    <h4>Profile</h4>
                    <hr>
                    <table class="table table-hover">
                        <thead>
                            <th>Nom</th>
                            <th>Email</th>
                            {{-- <th></th> --}}
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $LoggedAdminInfo->name }}</td>
                                <td>{{ $LoggedAdminInfo->email }}</td>
                                {{-- <td><a href="logout">Déconnexion</a></td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
                

            </main>
            <!-- #main -->
        </div>
        <!-- #primary -->
    </div>
    <!-- #content -->
@endsection

