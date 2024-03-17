@extends('layouts/contentNavbarLayout')

@section('title', 'Horizontal Layouts - Forms')

@section('content')
<div class="card">
  <h5 class="card-header">Basic with Icons</h5>
  <div class="card-body">
  <form method="POST" action="{{ route('layouts.horizontal.store') }}">
      @csrf
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="numero">Numero</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" required />
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="libelle">Libelle</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Libelle" required />
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="elaboration">Elaboration</label>
        <div class="col-sm-10">
          <select class="form-select" id="elaboration" name="elaboration" required>
            <option value="SADV(Location)">SADV(Location)</option>
            <option value="SADV(ONEE-EE)">SADV(ONEE-EE)</option>
            <option value="SADV(GC)">SADV(GC)</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="type">Type</label>
        <div class="col-sm-10">
          <select class="form-select" id="type" name="type" required>
            <option value="Animation">Animation</option>
            <option value="Affaire generaux">Affaire generaux</option>
            <option value="Economat">Economat</option>
            <option value="Economat">Divers</option>
          </select>
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="montant">Montant</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="montant" name="montant" placeholder="Montant" required />
        </div>
      </div>
      <div class="row justify-content-end">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
