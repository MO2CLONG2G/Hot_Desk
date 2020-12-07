<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Upload Space</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="./../lessor/lessor_handle.php">
                    <input type="hidden" class="userid" name="lease">
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Address/ Location</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Upload Image</label>

                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>
                    </div>
                <div class="form-group">
                    <label for="type" class="col-sm-3 control-label">Type</label>

                    <div class="col-sm-9">
                        <select name="type" class="form-control" required>
                            <option value="">Select Event Type ...</option>
                            <option value="hot desk">Hot Desk</option>
                            <option value="boardroom">Boardroom</option>
                            <option value="meeting">Meeting</option>
                            <option value="events area">Events Area</option>
                        </select>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="size" class="col-sm-3 control-label">Size</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="size" name="size" onkeypress="return /[0-9]/i.test(event.key)" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="salary" class="col-sm-3 control-label">Salary</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="salary" name="salary" onkeypress="return /[0-9]/i.test(event.key)" required>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" ><i class="fa fa-check-square-o"></i> Book</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Edit Student</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="./../lessor/students_handle.php">
                <input type="hidden" class="userid" name="userid">
                <div class="form-group">
                    <label for="edit_email" class="col-sm-3 control-label">Email</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_password" class="col-sm-3 control-label">Password</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_firstname" class="col-sm-3 control-label">Firstname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname" onkeypress="return /[a-z]/i.test(event.key)">
                    </div>
                </div>
                <div class="form-group">
                    <label for="edit_lastname" class="col-sm-3 control-label">Lastname</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname" onkeypress="return /[a-z]/i.test(event.key)">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
              </form>
            </div>
        </div>
    </div>
</div>


