@extends('products.layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }

  .alert {
    color: green;
    text-align: center;
  }

  h1, table {
    text-align: center;
  }

  table {
    margin: auto;
  }

  table tbody tr:nth-child(odd) {
    background-color: rgba(128, 128, 128, 0.2); /* Gris très clair et transparent */
  }

  table thead tr {
    font-weight: bold;
  }

  td {
    padding: 12px;
  }
</style>

<h1>Liste des produits</h1>

<div class="uper">
  <div>
  @if(session()->has('success'))
    <div class="alert alert-success">
      {{ session('success') }}  
    </div><br />
  @endif
  </div>
  <div>
      <a href="{{route('products.create')}}" class="btn btn-primary">Créer un produit</a>
  </div>

  <table class="table table-striped">

    <thead>
        <tr>
          <th>ID</th>
          <th>Produit</th>
          <th>Description</th>
          <th>Editer</th>
          <th>Supprimer</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td>
              <a href="{{route('products.edit', ['product' => $product])}}" class="btn btn-warning">Editer</a>
            </td>
            <td>
              <form method="post" action="{{route('products.destroy', ['product' => $product])}}">
                @csrf
                @method('delete')
                <input type="submit" value="Supprimer" class="btn btn-danger">
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection