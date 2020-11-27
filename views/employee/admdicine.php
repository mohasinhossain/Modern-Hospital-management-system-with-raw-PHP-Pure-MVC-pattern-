  <?php
$d = new Database();
?>

<section id="blogArchive">
    <div class="container">
        <div class="col-md-6">

            <div class="form-group">
                <form method="post" action="" class="form-group">
                    <h1>input</h1>


                    <?php
                    if (isset($_POST['sub'])) {
                        $data = array(
                            "admissionid" => $d->VD($_POST['admid']),
                            "quantity" => $d->VD($_POST['quty']),
                            "medicineid" => $d->VD($_POST['medid'])
                        );

                        if ($d->insert("admedicine", $data)) {

                            echo "Save Successfully";
                        } else {
                            echo $d->Error;
                        }
                    }
                    ?>
                    <label for="exampleInputEmail1">Admission ID</label>

                    <select name="admid" class="wp-form-control wpcf7-email">
                        <option>Choose Admission ID</option>

                        <?php
                        $allAdm = $d->view("admission", "*", array("id", "asc"));
                        while ($des = $allAdm->fetch_object()) {
                            if (isset($_POST['admid']) && $_POST['admid'] == $des->id) {
                                echo "<option selected value='$des->id'>$des->id</option> ";
                            } else {
                                echo "<option value='$des->id'>$des->id</option> ";
                            }
                        }
                        ?>

                    </select><br><br>


                    <label for="exampleInputEmail1">medicine</label>

                    <select name="medid" class="wp-form-control wpcf7-email">
                        <option>Choose medicine</option>

                        <?php
                        $allMed = $d->view("medicine", "*", array("name", "asc"));
                        while ($des = $allMed->fetch_object()) {
                            if (isset($_POST['medid']) && $_POST['medid'] == $des->id) {
                                echo "<option selected value='$des->id'>$des->name</option> ";
                            } else {
                                echo "<option value='$des->id'>$des->name</option> ";
                            }
                        }
                        ?>

                    </select><br><br>
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="text" class="wp-form-control wpcf7-email" name="quty" id="exampleInputEmail1" placeholder="quentity"><br>


                    <input type="submit" name="sub" value="Post" class="btn btn-success">
                    <a href="index.php?e=admdicine-view" class="btn btn-info">view</a>


                </form> 
            </div>
        </div>


    </div>

</section>
