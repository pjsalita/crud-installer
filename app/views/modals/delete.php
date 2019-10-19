<div class="modal fade" tabindex="-1" role="dialog" id="delete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="index.php" method="post" class="form-inline needs-validation" id="form--delete"
                    novalidate>
                    <p>Are you sure you want to delete this announcement?</p>
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="hidden" name="id" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger delete" form="form--delete">Delete</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>