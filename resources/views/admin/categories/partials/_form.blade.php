
@csrf

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input
            type="name"
            class="form-control"
            placeholder="Nombre de la categoria"
            id="name"
            name="name"
            value="{{ old('name', $category->name ?? '') }}">
    </div>

    <div class="form-group">
        <label for="body">Contenido</label>
        <textarea class="form-control" name="body" id="body" rows="3">{{ old('body', $category->body ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input
            type="text"
            class="form-control"
            placeholder="Slug generado"
            id="slug"
            name="slug"
            value="{{ old('slug', $category->slug ?? '') }}">
    </div>

    <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ $btn }}">
    <a class="btn btn-secondary btn-lg btn-block" href="{{ route('categories.index') }}">Regresar</a>

    @section('scripts')
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name, #slug").stringToSlug({
                callback: function(text){
                    $('#slug').val(text);
                }
            });
        });
    </script>
    @endsection
