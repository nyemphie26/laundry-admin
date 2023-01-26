@extends('Layout.main')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <!-- Card header -->
          <div class="card-header pb-0">
            <div class="d-lg-flex">
              <div>
                <h5 class="mb-0">All Categories</h5>
              </div>
              <div class="ms-auto my-auto mt-lg-0 mt-4">
                <div class="ms-auto my-auto">
                  <a href="#" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Category</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-0">
            <div class="table-responsive">
              <table class="table table-flush" id="products-list">
                <thead class="thead-light">
                  <tr>
                    <th>Category Name</th>
                    <th>Category</th>
                    <th>Variant</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div>
                          <h6 class="my-auto">Wash</h6>
                        </div>
                      </div>
                    </td>
                    <td class="text-sm">Wash, Dry, Fold</td>
                    <td class="text-xs">8kg Load, 16kg load, 20kg load</td>
                    <td class="text-sm">
                      <a href="{{ route('services.products.edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div>
                          <h6 class="my-auto">Blanket</h6>
                        </div>
                      </div>
                    </td>
                    <td class="text-sm">Bed and Linen</td>
                    <td class="text-xs">Small, Standard, Large</td>
                    <td class="text-sm">
                      <a href="{{ route('services.products.edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="d-flex">
                        <div>
                          <h6 class="my-auto">Doona</h6>
                        </div>
                      </div>
                    </td>
                    <td class="text-sm">Bed and Linen</td>
                    <td class="text-xs">Single, Double, Queen, King, Super King</td>
                    <td class="text-sm">
                      <a href="{{ route('services.products.edit') }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit product">
                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                      </a>
                    </td>
                  </tr>
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
</script>
@endsection