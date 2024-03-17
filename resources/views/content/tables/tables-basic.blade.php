@extends('layouts/contentNavbarLayout')

@section('title', 'GestionOps')

@section('content')
    <div class="card">
        <h5 class="card-header">Light Table head</h5>
        <div class="table-responsive text-nowrap">
        <table class="table table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Numero</th>
                        <th>Libelle</th>
                        <th>Elaboration</th>
                        <th>Type</th>
                        <th>Montant</th>
                        <th>Regellement</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($gestionops->reverse() as $gestionop)
                    <tr class="@if($gestionop->regellement) 'badge bg-label-success me-1'  @endif">
                        <td>{{ $gestionop->numero }}</td>
                        <td>{{ $gestionop->libelle }}</td>
                        <td>{{ $gestionop->elaboration }}</td>
                        <td>{{ $gestionop->type }}</td>
                        <td>{{ $gestionop->montant }}</td>
                        <td>
                            @if($gestionop->regellement)
                                <span class="badge bg-label-success me-1">Yes</span>
                            @else
                                <span class="badge bg-label-warning me-1">No</span>
                            @endif
                        </td>
                        <td>
                            @if (!$gestionop->regellement)
                                <a href="{{ route('Comptabilite', $gestionop->id) }}" class="btn btn-success me-1">Comptabilite-></a>
                            @endif
                            <form action="{{ route('gestionops.destroy', $gestionop->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-1">Delete</button>
                            </form>
                            <form action="{{ route('export', $gestionop->id)}}" method="get">
                                <button type="submit" class="btn btn-primary">Export</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection
