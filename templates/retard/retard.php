<link rel="stylesheet" href="css/retard.css">
<!-- div de la page complete -->
<div class="allBloc">
    <!-- div de la premiere partie (header) -->
    <div class="premierBloc">

        <!-- div de la premiere partie du coté gauche (header) -->
        <div class="premierBloc_Gauche">
            <h1 class="premierBloc_GaucheText"><span class="textGreen">Rechercher un élève</span> pour obtenir la liste des retards.</span></h1>
        </div>

        <!-- div de la premiere partie du coté Droit (header) -->
        <div class="premierBloc_Droit">
            <!-- Uniquement pour les educateurs (Bar de recherche + lien pour ajouter un retard) -->
            <?php if($_SESSION['role'] == "educator" || $_SESSION['role'] == "teacher"): ?>
                <div class="premierBloc_DroitSearchBar">
                    <?php require_once 'components/searchBar.php'?>
                </div>
                <a class="premierBloc_DroitBtnNewRetard" href="/DigitSchool_TFE_2023/index.php?/templates/retard/newRetard">Ajouter un nouveau retard</a>
            <?php endif; ?>

            <!-- Uniquement pour les éleves et les parents (Les 4 blocs de logo) -->
            <?php if($_SESSION['role'] == "student" || $_SESSION['role'] == "parent"): ?>
                <div class="box">
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-handshake-simple"></i></span>
                        <h1 class="textCard">Consulter</h1>
                    </div>
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-users"></i></span>
                        <h1 class="textCard">Clairement</h1>
                    </div>

                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-shield-halved"></i></span>
                        <h1 class="textCard">discrétion</h1>
                    </div>
                    <div class="card">
                        <span class="iconCard"><i class="fa-solid fa-seedling"></i></span>
                        <h1 class="textCard">à tout moments</h1>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <?php if($_SESSION['role'] == "teacher" || $_SESSION['role'] == "educator") : ?>
        <?php require_once 'components/resultSearchUser.php'; ?>
    <?php endif; ?>

    <!-- div de la deuxieme partie (filtre) -->
    <div class="deuxiemeBloc">
        <?php if($_SESSION['role'] == "parent"): ?>
            <div class="deuxiemeBloc_SearchClass">
                <h1 class="deuxiemeBloc_SearchTitle">Filtre tes recherches :</h1>
                <?php require_once 'forms/selectMonthForms.php'?>
                <?php require_once 'forms/SelectStudentForms.php'?>
                <?php if(isset($_POST['selectStudent']) && isset($_SESSION['listCours']) && $_POST['selectStudent'] != "none"): ?>
                <?php require_once 'forms/selectCoursForms.php'?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if($_SESSION['role'] == "student" || $_SESSION['role'] == "teacher" || $_SESSION['role'] == "educator"): ?>
            <div class="deuxiemeBloc_SearchClass">
                <h1 class="deuxiemeBloc_SearchTitle">Filtre tes recherches :</h1>
                <?php require_once 'forms/selectMonthForms.php'?>
                <button class="rmSearchBtn" type="submit" value="appliquer">Appliquer</button>
            </div>
        <?php endif; ?>
        
    </div>
    <!-- div de la troisieme partie (corp du texte) -->
    <div class="troisiemeBloc">
        <?php if(isset($_SESSION['resultRemark'])) :?>
            <?php foreach ($_SESSION['resultRemark'] as $result): ?>
                <div class="troisiemeBloc_Case">
                    <div class="troisiemeBloc_CaseFirst">
                        <h1 class="CaseDate"><?= $result['date'] ?></h1>
                    </div>
                    <div class="troisiemeBloc_CaseSecond">
                        <p class="CaseContent"><?=$result['title']?></p>
                        <p class="CaseClasse"><?=$result['content'] ?></p>
                        <p class="CaseClasse"><?= $result['coursName']?></p>
                        <p class="CaseClasse"><?= $result['teacherName']?></p>
                        <?php if($result['educatorName']!= null): ?>
                            <p class="CaseClasse"><?= $result['educatorName']?></p>
                        <?php endif; ?>

                        <?php if($_SESSION['role'] == "teacher" || $_SESSION['role'] == "educator") : ?>
                            <button class="troisiemeBloc_CaseSecond_BtnModifier">Modifier</button>
                            <button class="troisiemeBloc_CaseSecond_BtnDelete">Supprimer</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div> 


<!--  le professeur peut ajouter, modifier, supprimer un retard OK -->
<!--  le educator peut ajouter, modifier, supprimer un retard OK -->
<!--  l'eleve peut regarder ses retard = OK -->
<!--  le parent peut regarder ses retard et voir ceux de ses enfants = OK-->


<!--  faire la page ajouter retard -->
<!--  faire la page modifier retard -->
