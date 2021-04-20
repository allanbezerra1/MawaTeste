@extends('welcome')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Usuarios Ativos</div>

                    <nav class="card-header-actions">
                        <a class="card-header-action" data-toggle="collapse" href="#card1" aria-expanded="false"
                            aria-controls="card1">
                            <i data-feather="minus-circle"></i>
                        </a>

                        <div class="dropdown">
                            <a class="card-header-action" href="#" role="button" id="card1Settings" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i data-feather="settings"></i>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="card1Settings">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>

                        <a href="#" class="card-header-action">
                            <i data-feather="x-circle"></i>
                        </a>
                    </nav>
                </div>
                <div class="card-body collapse show" id="card1">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @empty

                            @endforelse

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
