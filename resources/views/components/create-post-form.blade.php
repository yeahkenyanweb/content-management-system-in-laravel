<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="col-md-12 mb-3">
        <label for="validationCustom01" class="form-label">Post Title</label>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input
            type="text"
            class="form-control @error('title') is-invalid @enderror"
            id="validationCustom01"
            name="title"
            value="{{ old('title') }}"
            required
        >
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label for="editor" class="form-label">Content</label>
        <textarea
            class="form-control @error('body') is-invalid @enderror"
            id="editor1"
            name="body"
            rows="5"
            required
        >{{ old('body') }}</textarea>
        @error('body')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label for="images" class="form-label">Upload Images</label>
        <input
            type="file"
            class="form-control @error('images.*') is-invalid @enderror"
            id="images"
            name="images[]"
            multiple
            accept="image/*"
        >
        @error('images.*')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-12 mt-2">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-save"></i> Create Post
        </button>
    </div>
</form>
