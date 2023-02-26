@extends('Layout.mobile')
@section('content')
    <div class="container-fluid pb-4">
        <h1 class="text-center mb-4">Today Pick Up</h1>
        @if ($works->isEmpty())
        <h5 class="text-center mb-4">No available work for today</h5>
        @else
        @foreach ($works as $work)
        <div class="card mb-4">
          <div class="card-body">
            <div class="d-flex py-auto justify-content-between ">
              <div>
                <h5 class="font-weight-bolder mb-0">
                  {{ date('H:i A', strtotime($work->order->pickup->schedule_date)) }}
                </h5>
                <p class="text-sm mb-0">{{ GenerateStatus::AssigningStatus($work->status) }}</p>
              </div>
              <div class="dropdown d-inline">
                <a href="javascript:;" class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown" id="more">
                </a>
                <ul class="dropdown-menu px-2 py-3" aria-labelledby="more" data-popper-placement="left-start">
                  <li><a href="{{ route('mobile.details', $work->order_id) }}" class="dropdown-item border-radius-md">Details</a></li>
                  @if ($work->status == 0)
                    <li>
                      <button class="dropdown-item border-radius-md" data-order="{{ $work->order_id }}" data-status="picking" data-assign="pickup" onclick="updateStats(this)">Picking Up Now!</button>
                    </li>
                  @elseif($work->status == 1)
                    <li>
                      <button class="dropdown-item border-radius-md" data-order="{{ $work->order_id }}" data-status="picked" data-assign="pickup" onclick="uploadPhoto(this,'confirmPhoto', 'takePhoto-{{ $work->order_id }}')">Already Picked Up!</button>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
            @if ($work->status == 1)
              <form enctype="multipart/form-data" method="post">
                <input type="file" accept="image/*" id="takePhoto-{{ $work->order_id }}" capture="camera" name="photoUpload[]" style="display: none" onchange="showPreview(this)"/>
              </form>
            @endif
          </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="col-md-4">
      <div class="modal fade" id="modal-take-photo" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title font-weight-normal" id="modal-title-notification">Photo Upload</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body justify-content-center">
              <div class="py-3 text-center">
                <img class="preview-img img-fluid shadow border-radius-lg">
                <h4 class="text-gradient text-danger mt-4">Double check before submit this photo!</h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="confirmPhoto" class="btn btn-secondary" onclick="updateStats(this)">Ok, Confirm</button>
              <button type="button" class="btn btn-link ml-auto" data-bs-dismiss="modal" onclick="cancelUpload()">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('page-script')
<script src="{{ asset('assets/js/plugins/formPreviewImage.js') }}"></script>
<script src="{{ asset('assets/js/plugins/updateStatusOrder.js') }}"></script>
@endsection