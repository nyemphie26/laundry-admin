@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-4 mb-4">
        <div class="card">
          <!-- Card header -->
          <div class="card-header pb-0">
            <div class="d-lg-flex">
              <div>
                <h5 class="mb-0">All Categories</h5>
              </div>
              <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                  <a href="{{ route('category.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Category</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px0 pb-0">
            <div class="table-responsive">
              <table class="table table-flush" id="category-list">
                <thead class="thead-light">
                  <tr>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                      <td>
                        <h6 class="my-auto">
                          {{ $category->name }}
                        </h6>
                      </td>
                      <td class="text-sm">
                        <a href="{{ route('category.edit',$category) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit category">
                          <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card">
          <!-- Card header -->
          <div class="card-header pb-0">
            <div class="d-lg-flex">
              <div>
                <h5 class="mb-0">All Services</h5>
              </div>
              <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                  <a href="{{ route('service.create') }}" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Service</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-0">
            <div class="table-responsive">
              <table class="table table-flush" id="products-list">
                <thead class="thead-light">
                  <tr>
                    <th>Service Name</th>
                    <th>Category</th>
                    <th class="">Variant</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($services as $service)
                    <tr>
                      <td>
                        <div class="d-flex">
                          <div>
                            <h6 class="my-auto">{{ $service->name }}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="text-sm">{{ $service->category->name }}</td>
                      <td class="text-xs">{{ $service->variants->count() }} Variant(s)</td>
                      <td class="text-sm">
                        <a href="{{ route('service.edit', $service) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Service">
                          <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>SKU</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('page-script')
<script src="{{ asset('assets/js/plugins/datatables.js') }}"></script>
<script>
  if (document.getElementById('products-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
      searchable: true,
      fixedHeight: false,
      perPage: 7
    });

    document.querySelectorAll(".export").forEach(function(el) {
      el.addEventListener("click", function(e) {
        var type = el.dataset.type;

        var data = {
          type: type,
          filename: "material-" + type,
        };

        if (type === "csv") {
          data.columnDelimiter = "|";
        }

        dataTableSearch.export(data);
      });
    });
  };
  if (document.getElementById('category-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#category-list", {
      searchable: false,
      fixedHeight: true,
      perPage: 7
    });

    document.querySelectorAll(".export").forEach(function(el) {
      el.addEventListener("click", function(e) {
        var type = el.dataset.type;

        var data = {
          type: type,
          filename: "material-" + type,
        };

        if (type === "csv") {
          data.columnDelimiter = "|";
        }

        dataTableSearch.export(data);
      });
    });
  };
</script>
@endsection