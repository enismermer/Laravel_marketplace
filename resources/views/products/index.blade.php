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

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif

  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>Produit</td>
          <td>Description</td>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection