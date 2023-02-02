@if (Session::has('success'))
    <div class="position-fixed top-1 end-1 z-index-sticky">
        <div class="toast fade show p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
            <div class="toast-header border-0">
              <i class="material-icons text-success me-2">campaign</i>
              <span class="me-auto text-gradient text-success font-weight-bold">Success</span>
              {{-- <small class="text-body">11 mins ago</small> --}}
              <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                {{ Session::get('message') }}
            </div>
        </div>
    </div>
@elseif(Session::has('error'))
    <div class="position-fixed top-1 end-1 z-index-sticky">
        <div class="toast fade show p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-danger me-2">campaign</i>
                <span class="me-auto text-gradient text-danger font-weight-bold">Aborted</span>
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                <strong>{{ Session::get('message') }}</strong>
            </div>
        </div>
    </div>
@endif

<div class="position-fixed top-1 end-1 z-index-sticky">
    @if($errors->any())
    <div class="toast fade show p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast" aria-atomic="true">
        <div class="toast-header border-0">
            <i class="material-icons text-danger me-2">campaign</i>
            <span class="me-auto text-gradient text-danger font-weight-bold">Aborted</span>
            <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
        </div>
        <hr class="horizontal dark m-0">
        <div class="toast-body">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-gradient text-danger">
                        <strong>{{ $error }}</strong>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
  </div>
