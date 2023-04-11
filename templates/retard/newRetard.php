<link rel="stylesheet" href="css/newRetard.css">

<div class="allBloc">
    <div class="rtdSearchContent">
        <div class="rtdTxtContent">
            <h1 class="rtdTxt-1 txtPInter"><span class="textGreen">Rechercher un élève</span> pour ajouter une nouvelle retard</span></h1>
        </div>

        <div class="rtdHeader2">
            <?php if($_SESSION['role'] == "teacher"): ?>
                <div class="newrtdSearchBarContent">
                    <?php require_once 'components/searchBar.php'?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php require_once 'components/resultSearchUser.php'?>

    <div class="rtdResultContent">
        <div class="rtdForm">
            <?php require_once 'forms/remarkForms.php'; ?>
        </div>
    </div>
</div>
