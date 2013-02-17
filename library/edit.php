<?php
    include "includes/header.php";
    include "includes/navigation.php";
    
    $db_conn = db_connect();
    $stmt = $db_conn->prepare('SELECT * FROM projects WHERE project_ID = :project_ID');
    $stmt->bindParam(":project_ID", $pid);
    $stmt->execute();
    foreach($stmt as $projects) {
        $project_name = $projects['project_name'];
    }

?>

<article id="nosidebar">

    <h1> <?php echo $pageTitle ?></h1>

    <?php if (isset($message) && isset($alert)) { ?>
        <div class="alert <?php echo $alert ?>"><?php echo $message ?></div>
    <?php } ?>

    <form action="index.php?action=edit" method="post">

        <input type="hidden" id="operation" name="operation" value="edit">

        <table>

            <tr>
                <td class="righted"><label for="project_name">Project Name:</label></td>
                <td>
                    <input type="text" id="project_name" name="project_name" required value="<?php echo $project_name ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>

        </table>

        <table>

            <?php
                $db_conn = db_connect();
                $stmt = $db_conn->prepare('SELECT * FROM records WHERE project_ID = :project_ID');
                $stmt->bindParam(":project_ID", $pid);
                $stmt->execute();
                foreach($stmt as $records) {
            ?>
            <tr class="centered">
                <td><?php echo $records['record_ID'] ?></td>
                <td class="lefted"><?php echo $records['record_name'] ?></td>
            </tr>
            <?php } ?>

        </table>

        </table>

            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td class="centered" colspan="2">
                    <input type="submit" class="btn" name="submit" value="Submit">
                </td>
            </tr>

        </table>

    </form>

</article>

<?php include "includes/footer.php"; ?>