@extends('app')

@section('content')
					<div class="alert alert-success" role="alert">
						Your post has been successfully published.To view your blog, click <a href="#" class="alert-link">here</a>.
						To create another post, click <a href="<?php echo action('LayerController@create'); ?>" class="alert-link">here</a>.
					</div>
@stop