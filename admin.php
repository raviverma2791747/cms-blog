
<?php require_once("./include/session.php") ;
logged_in();
?>
    
    <?php require_once("./include/admin_header.php");?>
    <div class="container">
        <div class="card shadow">
            <h2 class="text-center">Edit Blog Menu</h2>
            <div id="add-post" class="btn btn-primary mb-5"><a>+ Add Post</a></div>
            <div>
                <table>
                    <tr>
                        <th>Page</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td>Page</td>
                        <td><a>Edit</a> <a>Delete</a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <?php require_once("./include/admin_footer.php");?>