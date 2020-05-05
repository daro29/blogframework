
@csrf

    <div class="form-group">
        <label for="name">Nombre:</label>
        <input
            type="name"
            class="form-control"
            placeholder="Nombre de la etiqueta"
            id="name"
            name="name"
            value="{{ old('name', $tag->name ?? '') }}">
    </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input
            type="text"
            class="form-control"
            placeholder="Slug generado"
            id="slug"
            name="slug"
            value="{{ old('slug', $tag->slug ?? '') }}">
    </div>

    <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ $btn }}">
    <a class="btn btn-secondary btn-lg btn-block" href="{{ route('tags.index') }}">Regresar</a>

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
