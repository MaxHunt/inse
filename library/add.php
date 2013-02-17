<?php
    include "includes/header.php";
    include "includes/navigation.php";
?>

<article id="nosidebar">

    <h1> <?php echo $pageTitle ?></h1>

    <?php if (isset($message) && isset($alert)) { ?>
        <div class="alert <?php echo $alert ?>"><?php echo $message ?></div>
    <?php } ?>

    <form action="index.php?action=add" method="post">

        <input type="hidden" id="operation" name="operation" value="add">

        <table>

            <tr>
                <td class="righted"><label for="project_name">Project Name:</label></td>
                <td>
                    <input type="text" id="project_name" name="project_name" required value="">
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