<div class="modal fade" tabindex="-1" role="dialog" id="update">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" class="form-inline needs-validation" id="form--update"
                    novalidate>
                    <input type="hidden" name="_method" value="PUT" />
                    <input type="hidden" name="id" />

                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="title" class="form-control" placeholder="Title" required />
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <input type="text" name="description" class="form-control" placeholder="Description" required />
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary update" form="form--update">Update</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>