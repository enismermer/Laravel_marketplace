@extends('categories.layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
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

<h1>Liste des catégories</h1>

<div class="uper">

  <table class="table table-striped">

    <thead>
        <tr>
          <td>ID</td>
          <td>Catégorie</td>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection