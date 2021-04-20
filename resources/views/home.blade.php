@extends('welcome')

@section('content')
    <div class="pb-3">
        <h1>Cotação</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 d-flex">
            <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                <div class="d-flex flex-row align-items-center h-100">
                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                        <i data-feather="users">Moeda</i>
                    </div>
                    <div class="card-body">
                        <select class="custom-select custom-select-lg" id="money">
                            <option selected>Selecione uma moeda</option>
                            @if (isset($money))
                                @foreach ($money as $item)
                                    <option value="{{ $item['code'] }}">
                                        {{ $item['code'] }}-{{ $item['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 d-flex">
            <div class="card border-0 bg-primary text-white text-center mb-grid w-100">
                <div class="d-flex flex-row align-items-center h-100">
                    <div class="card-icon d-flex align-items-center h-100 justify-content-center">
                        <i data-feather="users">Moeda</i>
                    </div>
                    <div class="card-body">
                        <div class="display-5" id="brl">BRL: R$:00,00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="card-header-title">Histórico</div>
                    <button class="btn btn-primary btn-sm" id="update">Atualizar Histórico</button>

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
                    <ul>
                        @if (isset($historic))
                            @forelse ($historic as $item )
                                <ul class="list-group-item">1-{{ $item->coin }}--
                                    {{ $item->name }}-- R$: {{ $item->high }} BRL   {{ date('d/m/Y', strtotime($item->created_at)) }}</ul>
                            @empty

                            @endforelse

                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
