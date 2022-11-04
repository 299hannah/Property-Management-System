{{-- @extends('tenants.layout') --}}
@extends('admin.layouts.app')

@section('main-content')
   
    <div class="content-wrapper">
        <section class="content">
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('vacantrooms/store') }}" method="post">
               
                    {!! csrf_field() !!}
                    <div class="row mb-3">
                        <div class="col">
                            <label>House Number</label><br>
                            <input type="text" name="houseno" id="houseno" class="form-control"><br>
                        </div>
                        <div class="col">
                            <label>Floor</label><br>
                            <input type="text" name="floor" id="floor" class="form-control"><br>
                        </div>
                    </div>
                    {{-- <div style="text-align:center;">
                        <button type="submit" class="btn btn-success center" name="submit">Save</button>
                    </div> --}}
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary"  name="submit">Save changes</button>
                    </div>
                </form>
            </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        </section>
    </div>
@stop
