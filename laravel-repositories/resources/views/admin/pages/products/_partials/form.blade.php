@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $product->name ?? old('name') }}">
</div>
<div class="form-group">
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $product->price ?? old('price') }}">
</div>
<div class="form-group">
    <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $product->description ?? old('description') }}">
</div>
<div class="form-group">
    <input type="file" name="image" class="form-control">
</div>
<div>
    <button type="submit" class="btn btn-success">Enviar</button>
</div>