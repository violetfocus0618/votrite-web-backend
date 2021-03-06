
<table class="table table-striped table-bordered table-hover" id="party_table">
    <thead>
        <tr>
            <th class="table-checkbox">
                <input type="checkbox" class="group-checkable changed_sel" data-set="#party_table .checkboxes" style="margin-left: 5px; margin-right: 5px;"/>
            </th>
            <th class="table-no">
                No
            </th>
            <th>
                Party Name
            </th>
            <th style="width: 6%;">
                Party Logo
            </th>
            <th style="width: 6%;">
                Actions
            </th>
        </tr>
    </thead>
    <tbody>
    @if(empty($ballots->data))
    @else
        @if(empty($parties->data))
        @else
            @foreach($parties->data as $party)
            <tr class="odd gradeX">
                <td>
                    <input type="checkbox" class="checkboxes changed_sel" data-id="{{ $party->party_id }}" style="margin-left: 5px; margin-right: 5px;"/>
                </td>
                <td>
                    {{ $loop->index+1 }}
                </td>
                <td>
                    {{ $party->party_name }}
                </td>
                <td style="text-center">
                    <img src="{{ $party->party_logo }}" width="60" height="60">
                </td>
                <td>
                    <a class="previewPartyModal" data-toggle="modal" data-id="{{ $party->party_id }}"><i class="fa fa-eye" data-toggle="tooltip" title="Preview"></i></a>
                    <a class="editPartyModal" data-toggle="modal" data-id="{{ $party->party_id }}"><i class="fa fa-edit" data-toggle="tooltip" title="Edit"></i></a>
                    <a class="deletePartyModal" data-toggle="modal" data-id="{{ $party->party_id }}"><i class="fa fa-trash-o" data-toggle="tooltip" title="Delete"></i></a>
                </td>
            </tr>
            @endforeach
        @endif
    @endif
    </tbody>
</table>

<div id="addPartyModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Add New Party</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/createParty') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="party_name" id="add_party_name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Logo:</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" name="party" accept="image/png, image/jpeg" required></input>
                </div>
            </div>
            <div class="modal-footer">
            <input type="text" id="ballot_id" name="ballot_id" hidden/>
                <button type="submit" class="btn btn-success addInvoice">
                    <span id="" class='glyphicon glyphicon-check'></span> Add
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="editPartyModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Edit The Party</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" role="form" method="post" action="{{asset('updateParty')}}" enctype="multipart/form-data">
        @csrf
			<div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="party_name" id="edit_party_name">
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Logo:</label>
                <div class="col-sm-8">
                <input type="file" class="form-control" name="edit_party" id="edit_party_logo" accept="image/png, image/jpeg"></input>
                </div>
            </div>
            <div class="modal-footer">
                <input type="text" name="ballot_id" id="edit_ballot_id" hidden>
                <input type="text" name="party_id" id="edit_party_id" hidden>
                <button type="submit" class="btn btn-success addInvoice">
                    <span id="" class='glyphicon glyphicon-check'></span> Save
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="previewPartyModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Preview The Party</h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal">
			<div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="party_name" id="party_name" readonly autofocus>
                </div>
            </div>
            <div class="form-group">
                <label class="label_des col-sm-4" for="title">Party Logo:</label>
                <div class="col-sm-8">
                    <img id="party_logo" src="https://cdn.vuetifyjs.com/images/lists/1.jpg" style="width: 60px;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove'></span> Close
                </button>
            </div>
        </form>
    </div>
</div>

<div id="deletePartiesModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete Parties</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete these Parties?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/mutiDeleteData') }}">
		@csrf      
            <input type="text" id="ballot_id" name="ballot_id" hidden/>      
			<input type="text" class="ids" name="ids" hidden />
			<input type="text" class="target_id" name="target_id" hidden />
			<input type="text" class="api" name="api" hidden />

			<button type="submit" class="btn btn-danger delete">
				<i class="fa fa-trash-o"></i> Delete
			</button>
			<button type="button" class="btn btn-warning" data-dismiss="modal">
				<span class='glyphicon glyphicon-remove'></span> Close
			</button>
		</form>
    </div>
</div>

<div id="deletePartyModal" class="modal fade" tabindex="-1" data-width="420">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <h4 class="modal-title">Delete The Party</h4>
    </div>
    <div class="modal-body">					
        <p>Are you sure you want to delete this Party?</p>
        <p class="text-warning"><small>This action cannot be undone.</small></p>
    </div>
    <div class="modal-footer">
        <form class="form-horizontal" role="form" method="post" action="{{ asset('/deleteData') }}">
        @csrf 
            <input type="text" id="ballot_id" name="ballot_id" hidden/>
			<input type="text" class="target_id" name="target_id" hidden />
			<input type="text" class="id" name="id" hidden />
			<input type="text" class="api" name="api" hidden />

			<button type="submit" class="btn btn-danger delete">
				<i class="fa fa-trash-o"></i> Delete
			</button>
			<button type="button" class="btn btn-warning" data-dismiss="modal">
                <span class='glyphicon glyphicon-remove'></span> Close
            </button>
		</form>
    </div>
</div>