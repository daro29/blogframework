
@csrf

    @isset($post->user_id)
        <input type="hidden" name="user_id" value="{{ $post->user_id }}">
    @else
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    @endisset

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
        <label for="status">Estado:</label>
        <br>
        @if ($post->status == 'PUBLISHED')
            <label><input type="radio" name="status" id="status" value="PUBLISHED" checked>Publicado</label>
            <br>
        @else
            <label><input type="radio" name="status" id="status" value="PUBLISHED">Publicado</label>
            <br>
        @endif

        @if ($post->status  == 'DRAFT')
            <label><input type="radio" name="status" id="status" value="DRAFT" checked>Borrador</label>
        @else
            <label><input type="radio" name="status" id="status" value="DRAFT">Borrador</label>
        @endif
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

    <input class="btn btn-primary btn-lg btn-block" id="btnenviar" type="submit" value="{{ $btn }}">
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
    {{-- <script>
        function LimpiarDatos(){
            $("#category_id").val('');
            $("#name").val('');
            $("#slug").val('');
            $("#excerpt").val('');
            $("#body").val('');
            $("#file").val('');
            $("#status").val('');
            $("#tags[]").val('');
        }
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-t oken"]').attr('content')
            }
        });

        $(".btnenviar").click(function(e){
            e.preventDefault();
            var category_id = $("input[name=category_id]").val();
            var name    = $("input[name=name]").val();
            var slug    = $("input[name=slug]").val();
            var excerpt = $("input[name=excerpt]").val();
            var body    = $("input[name=body]").val();
            var file    = $("input[name=file]").val();
            var status  = $("input[name=status]").val();
            var tags[]  = $("input[name=tags[]]").val();
        $.ajax({
            type:'POST',
            url: "{{ route('posts.store') }}",
            data:{category_id:category_id,name:name,slug:slug,excerpt:excerpt,body:body,file:file,status:status,tags:tags[]},
            success::function(data){
                LimpiarDatos();
            }
        });
        });
    </script> --}}
    @endsection
