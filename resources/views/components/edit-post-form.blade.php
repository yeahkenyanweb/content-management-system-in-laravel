<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PATCH')
     <div class="col-md-12">
         <label for="validationCustom01" class="form-label">Post Title</label>
         <input type="text" class="form-control" id="validationCustom01" name='title' value="{{ $post->title }}"
             required>
         <div class="valid-feedback">
             Looks good!
         </div>
     </div>
     <div class="col-md-12">
         <label for="editor" class="form-label">Content</label>
         <textarea type="text" class="form-control" id="editor" name='body' required>{{ $post->body }}</textarea>
         <div class="valid-feedback">
             Looks good!
         </div>
     </div>

     <div class="col-12">
         <button class="btn btn-primary" type="submit">Submit form</button>
     </div>
 </form>
