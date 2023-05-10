<div class="modal modalRight" id="modal-basic" tabindex="-1" data-bs-target="#modalForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title">Kategori</h2>
			</div>
			<div class="modal-body p-4">
				<div class="alert alert-danger" style="display:none"></div>
				<form method="POST" id="form-category_add" class="needs-validation" novalidate>
					@csrf
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-header">
									<p class="lead mb-0">Kategoriler</p>
								</div>
								<div class="card-body">
								@include('category.treeview',['name' => 'parent_id', 'display' => 'list', 'type' => 'radio', 'selected' => $category->parent_id ?? '', 'categories' => $categories])
								</div>
							</div>
						</div>
                        <div class="col-md-6">
                            <fieldset class="mb-4">
                                <div class="form-group row required">
                                    <label class="col-sm-12 col-form-label" for="name">Name</label>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name ?? "" }}" placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button data-toggle="basicSubmit" data-action="{{ $route }}" data-form="form-category_add" title="{{ $button }}" class="btn btn-lg btn-success">
					<i class="fas fa-save"></i>
					<span class="d-none d-xl-inline border-start ms-2 ps-2">{{ $button }}</span>
				</button>
				<button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal">
					<i class="fal fa-times"></i>
					<span class="d-none d-xl-inline border-start ms-2 ps-2">Kapat</span>
				</button>
			</div>
		</div>
	</div>
</div>
