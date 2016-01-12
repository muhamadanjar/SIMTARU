@extends('app')

@section('content')

	<div class="alert alert-success" role="alert">
		The bookmark has been updated. To create a bookmark, click <a href="{{ action('BookmarkController@createNewBookmark') }}" class="alert-link">here</a>.
		To manage existing bookmark, click <a href="{{ action('BookmarkController@viewAllBookmark') }}" class="alert-link">here</a> instead.
	</div>

@stop