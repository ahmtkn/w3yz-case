@if(count($categories) > 0 )
<ul class="category_hierarchies">
	@foreach($categories as $category)
	<li>
		<div class="form-check">
			<input type="{{ $type }}" class="form-check-input" id="input-category{{ $category->id }}" name="{{ $name }}@if( $type == 'checkbox' )[]@endif" value="{{ $category->id }}" @if( $type == 'radio' ) @if ( $category->id == $selected) checked @endif @else @if (in_array($category->id, $selected)) checked @endif @endif />
			<label class="form-check-label" for="input-category{{ $category->id }}">{{ $category->name }}</label>
		</div>
		@if(count($category->children) > 0)
		<ul>
			@include('category.treeview',['name' => $name, 'display' => $display, 'type' => $type, 'selected' => $selected, 'categories' => $category->children])
		</ul>
		@endif
	</li>
	@endforeach
</ul>
@endif
