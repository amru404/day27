@extends('blog.app')

@section('judul')
{{$blog->judul}}
@endsection

@section('penerbit')
{{$blog->user->name}}
@endsection

@section('tanggal_terbit')
{{$blog->created_at}}
@endsection

@section('konten')
<div class="form-group">
    <div class="p-3 border rounded bg-light">
        {!! $blog->konten !!}
    </div>
</div>

<div class="form-group mt-5">
    <div class="p-3 border rounded bg-light">
        <h5>Komentar</h5>

        @if (auth()->check())
        <form action="{{route('blog.comment', [$blog->id])}}">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" name="comment" id="comment" placeholder="Tulis komentar"
                    aria-describedby="comment">

                <input type="hidden" value="" name="blog_id">
                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                <button type="submit" class="btn btn-primary btn-sm mt-2">kirim</button>
            </div>
        </form>
        @else
        <div class="mb-3">
                <input type="text" class="form-control" name="comment" id="comment" placeholder="Tulis komentar"
                    aria-describedby="comment">
                <a href="{{route('login')}}" class="btn btn-primary btn-sm mt-2">kirim</a>
            </div>
        @endif

        @foreach ($comment as $comments)
        <div class="row">
            <div class="card p-3 mt-3">
                <div class="col">
                    <h6>
                        {{$comments->user->name}} / <span><small>{{$comments->created_at}} </small></span>
                    </h6>
                    <small>
                        {{$comments->comment}}
                    </small>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>


@endsection
