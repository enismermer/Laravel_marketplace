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
    <h1>Editer un Produit</h1>
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

      <form method="post" action="{{route('products.update', ['product' => $product])}}">
          @csrf
          @method('put')
          <div class="form-group">
              <label for="marque">Nom de produit :</label>
              <input type="text" class="form-control" name="name" placeholder="Nom" value="{{$product->name}}"/>
          </div>

          <div class="form-group">
              <label for="prix">Description du produit :</label>
              <input type="text" class="form-control" name="description" placeholder="Description" value="{{$product->description}}"/>
          </div>
          <div>
              <input type="submit" class="btn btn-primary" value="Mettre à jour" />
          </div>
      </form>
  </div>
</div>
@endsection
