@php
    $posted_at = old('posted_at') ?? (isset($post) ? $post->posted_at->format('Y-m-d') : null);
@endphp

@include('admin.layouts._message')
{{--{{dump($post)}}--}}
{{--{{dump($media)}}--}}
<div class="form-group">
    <label for="name" class="col-md-3 col-form-label"> {{__('posts.attributes.title')}}</label>
    <div class="col-md-9">
        <input type="text" name="title" value="{{old('title', $post->title)}}" id="title" class="form-control @error('title') is-invalid @enderror" required="true">
        @error('title')
        <div class="invalid-feedback">
            {{ $message  }}
        </div>
        @enderror
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="author_id" class="col-md-3 col-form-label"> {{__('posts.attributes.author')}}</label>    
        <div class="col-md-9">
            <select name="author_id" id="author_id" class="form-control @error('author_id') is-invalid @enderror">
            @foreach ($users as $id => $name)
                <option {{ $id == old('author_id', $post->author_id) ? 'selected' : '' }} value="{{ $id }}">{{ $name }}</option>
            @endforeach
            </select>
          @error('author_id')
            <div class="invalid-feedback">
                {{ $message  }}
            </div>
          @enderror
        </div>
    </div>

    <div class="form-group col-md-6">
        <label for="posted_at" class="col-md-3 col-form-label"> {{__('posts.attributes.posted_at')}}</label>
        <div class="col-md-9">
            <input type="datetime-local" name="posted_at" value="{{old('posted_at', $post->posted_at)}}" id="posted_at" class="form-control @error('posted_at') is-invalid @enderror" required="true">
        @error('title')
            <div class="invalid-feedback">
            {{ $message  }}
            </div>
        @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="thumbnail_id" class="col-md-3 col-form-label"> {{__('posts.attributes.thumbnail')}}</label>
    <div class="col-md-9">
        <select name="thumbnail_id" id="thumbnail_id" class="form-control @error('thumbnail_id') is-invalid @enderror">
            @foreach ($media as $id => $name)
            <option {{ $id == old($post->thumbnail_id) ? 'selected' : '' }} value="{{ $post->thumbnail_id }}">{{ $name }}</option>
            @endforeach
        </select>
          @error('thumbnail_id')
        <div class="invalid-feedback">
            {{ $message  }}
        </div>
          @enderror
    </div>
</div>


<div class="form-group">
    <label for="content" class="col-md-3 col-form-label"> {{__('posts.attributes.content')}}</label>
    <div class="col-md-9">
        <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror" required="true">{{ old('content', $post->content) }}</textarea>
          @error('content')
        <div class="invalid-feedback">
            {{ $message  }}
        </div>
          @enderror
    </div>
</div>
