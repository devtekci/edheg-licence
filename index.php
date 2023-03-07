<?php
    require_once 'inc/config.php';
    require_once 'inc/header.php';

    $etudiants = getAll();

    insertData();

    updateData();
?>

<div class="container">

    <div class="card shadow mt-5">
        <div class="card-header bg-dark text-light">
            <div class="row">
                <div class="col-md-4">
                    Liste des utilisateurs
                </div>
                <div class="col-md-8 d-flex justify-content-end">
                    <a href="" class="btn btn-success"  data-toggle="modal" data-target=".add">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill-add" viewBox="0 0 16 16">
                            <path
                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            <path
                                d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                        </svg>
                        Ajouter un nouvel utilisateur
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Photos</th>
                        <th scope="col">Filière</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etudiants as $etudiant ): ?>

                    <tr>
                        <th scope="row">
                            <?= $etudiant['id'] ?>
                        </th>
                        <td>
                            <?= $etudiant['nom'] ?>
                        </td>
                        <td>
                            <?= $etudiant['prenom'] ?>
                        </td>
                        <td>
                            <img src="assets/uploads/<?= $etudiant['pics'] ?>" alt="" class="img-fluid" width="40px">
                        </td>
                        <td>
                            <?= $etudiant['filiere'] ?>
                        </td>
                        <td>
                            <?= $etudiant['telephone'] ?>
                        </td>
                        <td class="justify-content-end">

                            <button type="button" class="btn btn-success" data-toggle="modal" data-target=".profile-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-info-lg" viewBox="0 0 16 16">
                                    <path
                                        d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z" />
                                </svg>
                            </button>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=".modification-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-gear-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                </svg>
                            </button>
                            <a href="delete.php?id=<?= $etudiant['id'] ?>" class="btn btn-danger" onclick="return confirm('Voulez-vous supprimez <?='Marc OTTO'?> ')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

</div>



<!-- Ajout -->
<div class="modal fade add" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un nouvel utilisateur </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post" enctype="multipart/form-data" name="ajout">

                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Nom">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom : </label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="Prénoms">
                    </div>
 
                    <div class="form-group">
                        <label for="filiere">Filière : </label>
                        <input type="text" class="form-control" name="filiere" id="filiere" placeholder="Filière">
                    </div>
            
                    <div class="form-group">
                        <label for="telephone">Téléphone : </label>
                        <input type="text" class="form-control" name="telephone" id="telephone" placeholder="0777777777">
                    </div>

                    <label for="prenom">Photos du profil : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photos" name="pics">
                            <label class="custom-file-label" for="photos">Choisir un fichier</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="ajout1">Enregistrer</button>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- Profile -->
<div class="modal fade profile-1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profile de <?="Marc Otto"?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <h4>
                                INFORMATIONS
                            </h4>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <img src="https://picsum.photos/200" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3>Marc OTTO</h3>

                            <p>
                                <strong>Nom:</strong> Marc
                            </p>
                            <p>
                                <strong>Prénom:</strong> Otto
                            </p>
                            <p>
                                <strong>Filière:</strong> 12 rue de la paix
                            </p>
                            <p>
                                <strong>Téléphone:</strong> 07 77 77 77 77
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Imprimer</button>
                <button type="button" class="btn btn-primary">Enregister</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<!-- Modification -->
<div class="modal fade modification-1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modification du Profile de <?="Marc Otto"?> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nom">Nom : </label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="Marc">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Prénom : </label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="OTTO">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Filière : </label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="OTTO">
                    </div>

                    <div class="form-group">
                        <label for="prenom">Téléphone : </label>
                        <input type="text" class="form-control" name="prenom" id="prenom" placeholder="OTTO">
                    </div>

                    <label for="prenom">Photos du profil : </label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photos">
                            <label class="custom-file-label" for="photos">Choisir un fichier</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="update">Enregistrer</button>

                </form>

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>


<?php
    require_once 'inc/footer.php';