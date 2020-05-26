
@csrf

<input type="hidden" name="user_id" value="{{ auth()->id() }}">

    <div class="form-group">

        <label for="category_id">Categoria:</label>

        <select class="form-control" name="category_id" id="category_id">

            @foreach($category as $id => $name)
                <option value="{{ $id }}" {{ (isset($post->category->id) && $id == $post->category->id) ? 'selected' : ''  }}>
                    {{ $name}}
                </option>
            @endforeach

        </select>

    </div>

    <div class="form-group">

        <label for="name">Nombre:</label>
        <input
            type="name"
            class="form-control"
            placeholder="Nombre de la entrada"
            id="name"
            name="name"
            value="{{ old('name', $post->name ?? '') }}">
        </div>

    <div class="form-group">
        <label for="slug">Slug</label>
        <input
            type="text"
            class="form-control"
            placeholder="Slug generado"
            id="slug"
            name="slug"
            value="{{ old('slug', $post->slug ?? '') }}">
    </div>

    <div class="form-group">
        <label for="excerpt">Extracto:</label>
        <textarea class="form-control" name="excerpt" id="excerpt" rows="2">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
    </div>

    <div class="form-group">
        <label for="body">Contenido</label>
        <textarea class="form-control" name="body" id="body" rows="3">{{ old('body', $post->body ?? '') }}</textarea>
    </div>


    <div class="form-group">
        <label for="file">Imagen:</label>
        <input
            type="file"
            class="form-control"
            placeholder="Elige tu imagen"
            enctype="multipart/form-data"
            target="_blank"
            id="file"
            name="file">
    </div>

    <div class="form-group">
        <label for="tags">Etiquetas</label>
        <div>
             @foreach ($tags as $tag)
                <label>
                    <input
                    type="checkbox"
                    name="tags[]"
                    id="tags[]"
                    value="{{ $tag->id }}">
                    {{ $tag->name }}
                </label>
             @endforeach
        </div>
    </div>

    <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ $btn }}">
    <a class="btn btn-secondary btn-lg btn-block" href="{{ route('posts.index') }}">Regresar</a>

    @section('scripts')
    <script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#name, #slug").stringToSlug({
                callback: function(text){
                    $('#slug').val(text);
                }
            });
        });

        CKEDITOR.config.height = 400;
		CKEDITOR.config.width  = 'auto';
		CKEDITOR.replace('body');
    </script>
    @endsection
