<div>
    <div x-data="Tabsetup()">

        <form method="POST">
            @csrf

            <div x-show="activeTab===0">

                <div class="tete" style="margin-top:20%;">
                    <h1 class="titre">Inscription:</h1>
                    <p>Etape 1</p>
                </div>

                <div class="champs">
                    <div class="groupe">
                        <h1> Êtes vous de l'ESATIC ?</h1>
                        <div class="gr" style="display: flex; justify-content: space-between">
                            <label for="yes">Oui</label>
                            <input type="radio" name="choix" id="yes" value=1 wire:model="esatic" />
                            <label for="no">Non</label>
                            <input type="radio" name="choix" id="no" value=0 wire:model="esatic" />
                        </div>

                        <p>
                        </p>

                    </div>
                </div>

            </div>

            <div x-show="activeTab===1">

                <div class="tete" style="margin-top:20%;">
                    <h1 class="titre">Inscription :</h1>
                    <p>Etape 2</p>
                </div>
                <div class="champs">
                    <div class="groupe" style="margin-top:0;">
                        <h1 class="tchamp"> Information du groupe</h1>
                        <div class="gr">

                            <label for="niveau" id="level">Niveau *</label>
                            <select id="niveau" name="niveau" class="@error('niveau')  border border-red-500 @enderror" wire:model='niveau' value="{{old("niveau")}}">

                                <option value=0>-- Choisir --</option>
                                @foreach ($niveaux as $niveau)
                                <option value="{{$niveau->id}}">{{$niveau->libelle}}</option>
                                @endforeach

                            </select>


                            <label for="">Nom de l'équipe (30 Caractères Max) * </label>
                            <input type="text" id="nomE" class="@error('nom_groupe')  border border-red-500 @enderror" wire:model.defer='nom_groupe' value="{{old("nom_groupe")}}" placeholder="Nom de l'équipe" minlength="3" maxlength="30">


                            {{-- <label for="lgr">Logo du groupe</label> <br>
                                <input type="file" id="lgr" wire:model.defer='photo_groupe' accept="image/*">  --}}

                        </div>
                    </div>
                    <div class="chef">
                        <h1 class="tchef">Chef de l'Equipe</h1>
                        <div class="info_chef">

                            @if ($esatic == 1)
                            <label for="NumMat" class="Matr">Numéro Matricule</label>
                            <input type="text" id="NumMat" class="NumMat @error('matricule_chef')  border border-red-500 @enderror" wire:model.defer='matricule_chef' value="{{old("matricule_chef")}}" placeholder="00-ESATIC0000AB" min="16" maxlength="16">
                            @endif

                            <!-- <label for="">Nom * </label> -->
                            <input type="text" class="nom @error('nom_chef')  border border-red-500 @enderror" wire:model.defer='nom_chef' value="{{old("nom_chef")}}" placeholder="Nom*">

                            <!-- <label for=""> Prénoms * </label> -->
                            <input type="text" class="Pr  @error('prenom_chef')  border border-red-500 @enderror" wire:model.defer='prenom_chef' value="{{old("prenom_chef")}}" placeholder="Prenom*">

                            <br>

                            <!-- <label for="">Genre</label> -->
                            <select class="genre" name="Genre @error('genre_chef')  border border-red-500 @enderror" wire:model.defer='genre_chef' value="{{old("genre_chef")}}">
                                <option value="g">---- Genre ----</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Féminin</option>
                            </select>

                            <!-- <label for="">Classe </label> -->
                            <select class="clax" name="Classe @error('classe_chef')  border border-red-500 @enderror" wire:model.defer='classe_chef' value="{{old("classe_chef")}}">
                                <option value="c">----@if($esatic == 1) Classe @else Ecole @endif----</option>
                                @foreach ($classes as $classe)
                                <option value="{{$esatic == 1 ? $classe->id : $classe->libelle}}">{{ $classe->libelle}}</option>
                                @endforeach
                            </select>

                            <br>

                            <label for="">Email :</label>
                            <input type="email" class="email  @error('email_chef')  border border-red-500 @enderror" wire:model.defer='email_chef' value="{{old("email_chef")}}" placeholder="sophie@example.com"> <br>


                        </div>
                    </div>
                </div>

            </div>
            <div x-show="activeTab===2">

                <div class="tete" style="margin-top:20%;">
                    @if(!$errorEmail and !$errorMatricule )
                    <h1 class="titre">Inscription:</h1>
                    <p>Etape 3 </p>
                    @else
                    <p class="titre_m" style="color:red; font-weight:bolder">Les emails et les matricules doivent êtres uniques (rafraichissez la page svp!)</p>
                    @endif
                </div>
                <div class="champs">

                    <div class="chef">
                        <h1 class="tchef">Membre 2</h1>
                        <div class="info_chef">

                            @if ($esatic == 1)
                            <label for="NumMat_m1" class="Matr">Numéro Matricule</label>
                            <input type="text" id="NumMat_m1" class="NumMat_m @error('matricule_m2')  border border-red-500 @enderror" wire:model.defer='matricule_m2' value="{{old("matricule_m2")}}" placeholder="00-ESATIC0000AB" min="16" maxlength="16">
                            @endif

                            <!-- <label for="">Nom * </label> -->
                            <input type="text" class="nom_m @error('nom_m2')  border border-red-500 @enderror" wire:model.defer='nom_m2' value="{{old("nom_m2")}}" placeholder="Nom*">


                            <!-- <label for=""> Prénoms* </label> -->
                            <input type="text" class="Pr_m @error('prenom_m2')  border border-red-500 @enderror" wire:model.defer='prenom_m2' value="{{old("prenom_m2")}}" placeholder="Prenom*">

                            <br>

                            <!-- <label for="">Genre</label> -->
                            <select class="genre_m @error('genre_m2')  border border-red-500 @enderror" wire:model.defer='genre_m2' value="{{old("genre_m2")}}">
                                <option value="g">---- Genre ----</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Féminin</option>
                            </select>


                            <!-- <label for="">Classe </label> -->
                            <select class="clax_m  @error('classe_m2')  border border-red-500 @enderror" wire:model.defer='classe_m2' value="{{old("classe_m2")}}">
                                <option vlaue="c">----@if($esatic == 1) Classe @else Ecole @endif----</option>
                                @foreach ($classes as $classe)
                                <option value="{{$esatic == 1 ? $classe->id : $classe->libelle}}">{{ $classe->libelle}}</option>
                                @endforeach

                            </select>

                            <br>

                            <div>
                                <label for="">Email :</label>
                                <input type="email" class="email_m  @error('email_m2')  border border-red-500 @enderror" wire:model.defer='email_m2' value="{{old("email_m2")}}" placeholder="sophie@example.com"> <br>


                            </div>
                        </div>
                    </div>

                    <div class="chef">
                        <h1 class="tchef">Membre 3</h1>
                        <div class="info_chef">

                            @if ($esatic == 1)
                            <label for="NumMat_m2" class="Matr">Numéro Matricule</label>
                            <input type="text" id="NumMat_m2" class="NumMat_m @error('matricule_m3')  border border-red-500 @enderror" wire:model.defer='matricule_m3' value="{{old("matricule_m3")}}" placeholder="00-ESATIC0000AB" min="16" maxlength="16">
                            @endif

                            <!-- <label for="">Nom * </label> -->
                            <input type="text" class="nom_m @error('nom_m3')  border border-red-500 @enderror" wire:model.defer='nom_m3' value="{{old("nom_m3")}}" placeholder="Nom*">


                            <!-- <label for=""> Prénoms* </label> -->
                            <input type="text" class="Pr_m @error('prenom_m3')  border border-red-500 @enderror" wire:model.defer='prenom_m3' value="{{old("prenom_m3")}}" placeholder="Prenom*">

                            <br>

                            <!-- <label for="">Genre</label> -->
                            <select class="genre_m @error('genre_m3')  border border-red-500 @enderror" wire:model.defer='genre_m3' value="{{old("genre_m3")}}">
                                <option value="g">---- Genre ----</option>
                                <option value="Masculin">Masculin</option>
                                <option value="Feminin">Féminin</option>
                            </select>


                            <!-- <label for="">Classe </label> -->
                            <select class="clax_m  @error('classe_m3')  border border-red-500 @enderror" wire:model.defer='classe_m3' value="{{old("classe_m3")}}">
                                <option vlaue="c">----@if($esatic == 1) Classe @else Ecole @endif----</option>
                                @foreach ($classes as $classe)
                                <option value="{{$esatic == 1 ? $classe->id : $classe->libelle}}">{{ $classe->libelle}}</option>
                                @endforeach

                            </select>

                            <br>

                            <div>
                                <label for="">Email :</label>
                                <input type="email" class="email_m  @error('email_m3')  border border-red-500 @enderror" wire:model.defer='email_m3' value="{{old("email_m3")}}" placeholder="sophie@example.com"> <br>


                            </div>
                        </div>
                    </div>

                </div>

                <div class=" justify-center">

                    @if($errorEmail or $errorMatricule or count($errors) > 0 )
                    <span class="mx-4 text-xl text-red-500">
                        veuillez verifier vos informations
                    </span>
                    @endif

                    <button wire:click.prevent='createEquipe' class="px-6 py-3 my-1 mr-1 text-sm font-bold text-white uppercase transition-all duration-150 rounded shadow outline-none 
                        @if(!$errorEmail and !$errorMatricule and count($errors) == 0  )  bg-myblue @else bg-gray-500 @endif ease-linearbg-emerald-500  hover:shadow-lg focus:outline-none" type="submit">
                        Confirmer l'enregistrement
                    </button>
                </div>

            </div>

        </form>

        <div class="flex justify-center gap-4 p-2 border-t">
            <button class="px-4 py-2 text-sm font-bold uppercase border rounded-md cursor-pointer text-orange border-orange hover:bg-orange hover:text-white hover:shadow" @click="activeTab--" x-show="activeTab>0">
                Précédent
            </button>
            <button class="px-4 py-2 text-sm font-bold uppercase border rounded-md cursor-pointer border-orange text-orange hover:bg-orange hover:text-white hover:shadow" @click="activeTab++" x-show="activeTab<tabs.length">
                Suivant
            </button>
        </div>
    </div>
</div>