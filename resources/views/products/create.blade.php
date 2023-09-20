@extends('products.layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }

  form div {
    padding: 8px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    <h1>Ajouter un Produit</h1>
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

      <form method="post" action="{{ route('products.store') }}">
          @csrf
          <div class="form-group">
              <label for="marque">Nom de produit :</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="prix">Description du produit :</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <button type="submit" class="btn btn-primary">Ajouter</button>

      </form>
  </div>
</div>
@endsection
