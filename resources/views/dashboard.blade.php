@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Confirmed Guest') }}</div>

                <div class="card-body">
                    {{ $guest->where('attendance_type', '==', 'offline')->where('rsvp', '!==', null)->count() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Waiting for Confirmation') }}</div>

                <div class="card-body">
                    {{ $guest->where('attendance_type', '==', 'offline')->where('rsvp', '==', null)->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('RSVP Yes') }}</div>

                <div class="card-body">
                    {{ $guest->where('attendance_type', '==', 'offline')->where('rsvp', '==', 'yes')->count() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('RSVP No') }}</div>

                <div class="card-body">
                    {{ $guest->where('attendance_type', '==', 'offline')->where('rsvp', '==', 'no')->count() }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Estimated Number Of Attendance') }}</div>

                <div class="card-body">
                    {{ $guest->sum('number_of_attendance') }}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center my-4">
        <div class="col-md-12">
        <table class="table stripe" id="guest-table">
            <thead>
                <tr>
                    <th scope="col">Invitation Code</th>
                    <th scope="col">Guest Name</th>
                    <th scope="col">Attendance Type</th>
                    <th scope="col">RSVP</th>
                    <th scope="col">Number of Attendance</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guest as $gst)
                <tr>
                    <td>{{ $gst->invitation_code }}</th>
                    <td>{{ $gst->guest_name }}</td>
                    <td>{{ $gst->attendance_type }}</td>
                    <td>{{ $gst->attendance_type == 'online' ? '-' : ($gst->rsvp == null ? 'Not Yet' : ucfirst($gst->rsvp)) }}</td>
                    <td>{{ $gst->number_of_attendance }}</td>
                    <td>
                        <a href="#" class="trigger-modal-view" data-code="{{ $gst->invitation_code }}"><span><i class="fa-solid fa-eye"></i></span></a>&nbsp;&nbsp;&nbsp;
                        <a href="#" class="trigger-modal-edit" data-code="{{ $gst->invitation_code }}"><span><i class="fa-solid fa-pen-to-square"></i></span></a>&nbsp;&nbsp;&nbsp;
                        <a href="#" class="modal-delete"><span><i class="fa-solid fa-trash"></i></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
    </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" class="font-weight-bold">View Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Invitation Code</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-invitation-code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Guest Name</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-guest-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Attendance Type</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-attendance-type">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">RSVP</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-rsvp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Number of Attendance</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-number-of-attendance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Max Attendance</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-max-attendance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label font-weight-bold">Enable Edit Name</label>
                        <div class="col-sm-8">
                            <input type="text" readonly class="form-control-plaintext" id="static-enable-edit-name">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create / Edit -->
<div class="modal fade" id="modal-create-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create / Edit Guest</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-edit-create">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Invitation Code</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="input-invitation-code">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Guest Name</label>
                        <div class="col-sm-8">
                            <input type="text" name="guest_name" class="form-control" id="input-guest-name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Attendance Type</label>
                        <div class="col-sm-8">
                            <select name="attendance_type" class="form-control" id="input-attendance-type">
                                <option value="online">Online</option>
                                <option value="offline">Offline</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row" id="rsvp-row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">RSVP</label>
                        <div class="col-sm-8">
                            <select name="attendance_type" class="form-control" id="input-rsvp">
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                                <option value="-">-</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Number of Attendance</label>
                        <div class="col-sm-8">
                            <input type="number" name="max_attendance" class="form-control" id="input-number-of-attendance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Max Attendance</label>
                        <div class="col-sm-8">
                            <input type="number" name="max_attendance" class="form-control" id="input-max-attendance">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-4 col-form-label">Enable Edit Name</label>
                        <div class="col-sm-8">
                            <select name="enable_edit_name" class="form-control" id="input-enable-edit-name">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-create">Create</button>
                <button type="button" class="btn btn-primary" id="btn-update" data-code="">Update</button>
            </div>
        </div>
    </div>
</div>
@endsection