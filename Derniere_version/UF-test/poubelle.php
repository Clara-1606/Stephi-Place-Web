<div class="champConteneur">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom">
                    </div>
                    <div class="champConteneur">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <div class="champConteneur">
                        <label for="mdp">Mot de passe</label>
                        <input type="text" id="mdp" name="mdp1">
                    </div>
                    <div class="champConteneur">
                        <label for="mdp">Confirmez votre mot de passe</label>
                        <input type="text" id="mdp" name="mdp">
                    </div>
                    <div class="champConteneur">
                        <label for="naissance">Date de naissance</label>
                        <input type="date" id="naissance" name="naissance">
                    </div>
                    <div class="champConteneur">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="telephone">
                    </div>
                    <div class="champConteneur">
                        <label for="adresse">Adresse</label>
                        <input type="text" id="adresse" name="adresse">
                    </div>
                    <div class="champDepot">
                                <span class="titreAgenceDepot">Agence de référence</span>
                                <span class="choixTypeBien">
                                    <select name="agenceListe" id="agenceListe" class="choixTypeBienSelection">
                                    <?php foreach ($stmt1 as $c) { ?>
                                        <option value="<?=$c['id_agence']?>"><?=$c['nom_agence']?></option>
                                            <?php } ?>
                                    </select>
                                </span>
                            </div>
                    <div class="champConteneur">
                        <span class="souhaitezVous">Souhaitez vous devenir acheteur, vendeur ou les deux?</span>
                        <div class="typeMembre">
                            <input type="checkbox" id="acheteur" name="typeMembre" class="box" value="acheteur">
                            <label for="acheteur" class="acheteur">Acheteur</label>
                            <input type="checkbox" id="vendeur" name="typeMembre" class="box" value="vendeur">
                            <label for="vendeur">Vendeur</label>
                        </div>
                    </div>