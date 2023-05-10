@if(count($categories) > 0 )
@foreach($categories as $category)
<tr>
	<td class="text-left"><span class="fs-6 fw-bold">{{ $category->name }}</span></td>
	<td class="text-center">
		<a role="button" class="btn w-100 h-100 btn-secondary">{{ count($category->posts) }}</a>
	</td>
	<td class="text-center">
        <button type="button" data-toggle="basic" data-action="{{ route('category.edit', $category) }}" class="dropdown-item">
            <i class="fa-fw fa-1x fal fa-pencil"></i>
            <span class="border-start ms-2 ps-2">Düzenle</span>
        </button>
        <a role="button" class="dropdown-item" href="{{ route('category.destroy', $category) }}">
            <i class="fa-fw fa-1x fal fa-trash"></i>
            <span class="border-start ms-2 ps-2">Sil</span>
        </a>
	</td>
</tr>
@include('category.treeview_table',['categories' => $category->children])
@endforeach
@endif
