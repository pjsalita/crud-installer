<div class="container my-5">
    <div class="row">
        <div class="col-10 offset-1">
            <h1>
                <a href="./">Announcements</a>
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#create">Add Announcement</button>
            </h1>
            
            <?php 
                include('partials/table.php');
                include('modals/create.php');
                include('modals/read.php');
                include('modals/update.php');
                include('modals/delete.php');
            ?>
            
        </div>
    </div>
</div>