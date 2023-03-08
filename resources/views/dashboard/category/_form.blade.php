@csrf
<div class="row">
    <br>
    <div class="form-group">
        <label for="title">Nombre categoria</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label for="url_clean">Descripción</label>
        <input class="form-control" name="description" id="description" rows="10" value="{{ $category->description}}"/>
    </div>
</div>
<br>   