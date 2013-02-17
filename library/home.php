<?php
    include "includes/header.php";
    include "includes/navigation.php";
?>

<article id="nosidebar">

    <h1> <?php echo $pageTitle ?></h1>

    <?php if (isset($message) && isset($alert)) { ?>
        <div class="alert <?php echo $alert ?>"><?php echo $message ?></div>
    <?php } ?>

    <table class="bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th class="lefted">Project Name</th>
                <th class="operations">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $db_conn = db_connect();
                $stmt = $db_conn->query('SELECT * FROM projects');
                foreach($stmt as $projects) {
            ?>
                    <tr class="centered">
                        <td><?php echo $projects['project_ID'] ?></td>
                        <td class="lefted"><?php echo $projects['project_name'] ?></td>
                        <td class="operations">
                            <a href="index.php?action=edit&amp;pid=<?php echo $projects['project_ID'] ?>" class="btn">Edit</a>
                            <a href="index.php?action=delete&amp;pid=<?php echo $projects['project_ID'] ?>" class="btn">Delete</a>
                        </td>
                    </tr>
            <?php } ?>
        </tbody>
    </table>

</article>

<?php include "includes/footer.php"; ?>