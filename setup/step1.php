<?php include "includes/header.php"; ?>

<article id="full">

    <h1> <?php echo $pageTitle ?></h1>

    <form action="index.php?action=setup&amp;step=2" method="post">

        <a href="javascript:showHide('advancedOptions');" class="showHide"><span>Toggle Advanced Options</span><img src="images/showhide.png" alt=""></a>

        <div id="advancedOptions" class="showHide">

            <table>

                <tr>
                    <td class="righted"><label for="db_host">Database Host:</label></td>
                    <td>
                        <input type="text" id="db_host" name="db_host" required value="localhost">
                    </td>
                </tr>
                <tr>
                    <td class="righted"><label for="db_user">Database User:</label></td>
                    <td>
                        <input type="text" id="db_user" name="db_user" required value="rsol_inse"> <!-- root/rsol_inse -->
                    </td>
                </tr>
                <tr>
                    <td class="righted"><label for="db_pass">Database Password:</label></td>
                    <td>
                        <input type="password" id="db_pass" name="db_pass" value="testing123"> <!-- testing123 -->
                    </td>
                </tr>
                <tr>
                    <td class="righted"><label for="db_name">Database Name:</label></td>
                    <td>
                        <input type="text" id="db_name" name="db_name" required value="rsol_inse"> <!-- inse/rsol_inse -->
                    </td>
                </tr>
                <tr>
                    <td class="righted"><label for="dropExisting">Drop Existing Database?</label></td>
                    <td>
                        <input type="checkbox" id="dropExisting" name="dropExisting" checked value="Yes">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td class="righted"><label for="sampleData">Install Sample Data?</label></td>
                    <td>
                        <input type="checkbox" id="sampleData" name="sampleData" checked value="Yes">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>

            </table>

        </div>

        <table>

            <tr>
                <td class="centered" colspan="1">
                    <input type="submit" class="btn" name="setup" value="Setup">
                </td>
            </tr>

        </table>

    </form>

</article>

<?php include "includes/footer.php"; ?>